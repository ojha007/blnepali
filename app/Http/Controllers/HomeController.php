<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\News;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    protected NewsRepository $newsRepository;

    protected CategoryRepository $categoryRepository;

    protected string $viewPath = 'frontend.';

    public function __construct(NewsRepository $newsRepository, CategoryRepository $categoryRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getCategories();
        $headerCategories = $categories->sortBy('header_position')->take(10);
        $bodyCategories = [];

        $otherNews = $this->newsRepository->getOthersNews();
        $trendingNews = $otherNews->where('category_slug', 'trending');
        $breakingNews = $otherNews->where('category_slug', 'breaking');
        $videoNews = $otherNews->where('category_slug', 'video');
        $blSpecialNews = $otherNews->where('category_slug', 'special');
        $anchorNews = $otherNews->where('category_slug', 'anchor');

        $allNews = $this->newsRepository->getHomePageNews();

        $order1News = $allNews->where('category_id', 1)->take(4)->values();
        $order2News = $allNews->where('category_id', 2)->values();
        $order3News = $allNews->where('category_id', 35)->values();
        $order4News = $allNews->where('category_id', 4)->values();
        $order5News = $allNews->where('category_id', 22)->values();
        $order6News = $allNews->where('category_id', 11)->values();
        $order7News = $allNews->where('category_id', 9)->values();
        $order8News = $allNews->where('category_id', 26)->values();

        return view($this->viewPath . 'index', compact(
            'order1News',
            'trendingNews',
            'breakingNews',
            'videoNews',
            'anchorNews',
            'blSpecialNews',
            'headerCategories',
            'order2News',
            'categories',
            'order3News',
            'order4News',
            'order5News',
            'order6News',
            'order7News',
            'bodyCategories',
            'order8News'));
    }

    public function show($categorySlug, $cId)
    {
        $category = Category::whereSlug($categorySlug)
            ->select('id')
            ->first();
        if (!$category) return redirect('/');

        $cacheKey = sprintf(News::CACHE_KEY . '::%s', $cId);

        $allNews = Cache::remember($cacheKey, 1800, function () use ($cId, $category) {
            $otherNews = $this->newsRepository->sameCategoryNewsQuery($category->id);
            return News::query()
                ->with(['category:name,id,slug', 'reporter:name,id,image'])
                ->select([
                    'title', 'short_description', 'guest', 'image_description', 'description', 'video_url',
                    'date_line', 'id', 'c_id', 'image', 'image_alt', 'category_id', 'reporter_id'
                ])
                ->where('category_id', $category->id)
                ->where('c_id', '=', $cId)
                ->orderByDesc('publish_date')
                ->union($otherNews)
                ->get();
        });

        $news = $allNews->where('c_id', '=', $cId)->first();
        $news->increment('view_count');

        $sameCategoryNews = $allNews->where('c_id', '!=', $cId);

        $categories = $this->categoryRepository->getCategories();
        $headerCategories = $this->categoryRepository->filterFrontCategories($categories, 11, 'front_header_position');

        $otherNews = $this->newsRepository->getOthersNews();
        $trendingNews = $otherNews->where('type', 'trending');
        $blSpecialNews = $otherNews->where('type', 'special');

        return view($this->viewPath . 'news-detail', compact('news',
            'headerCategories', 'blSpecialNews', 'trendingNews', 'sameCategoryNews'));

    }

    public function newsByCategory($slug)
    {
        try {
            $categoryIds = $this->categoryRepository->getCategoryIdsBySlug($slug);

            $categories = $this->categoryRepository->getCategories();
            $headerCategories = $this->categoryRepository->filterFrontCategories($categories, 11, 'front_header_position');

            $news = $this->newsRepository->getNewsByCategoryIds($categoryIds);

            $otherNews = $this->newsRepository->getOthersNews();
            $trendingNews = $otherNews->where('type', 'trending');

            return view($this->viewPath . 'category.index', compact('headerCategories', 'news', 'trendingNews'));
        } catch (\Exception $exception) {
            return redirect()->route('index');
        }
    }
}
