<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

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

    public function index(): Renderable
    {
        $categories = $this->categoryRepository->getCategories();

        $headerCategories = $categories->sortBy('header_position')->take(10);
        $bodyCategories = [];

        $otherNews = $this->newsRepository->getOthersNews();
        $trendingNews = $otherNews->where('category_slug', 'trending');
        $breakingNews = $otherNews->where('category_slug', 'breaking')->take(4);
        $videoNews = $otherNews->where('category_slug', 'video');
        $blSpecialNews = $otherNews->where('category_slug', 'special');
        $anchorNews = $otherNews->where('category_slug', 'anchor');

        $allNews = $this->newsRepository->getHomePageNews();
        $order1News = $allNews->where('body_position', 1)->take(4)->values();
        $order2News = $allNews->where('body_position', 2)->take(3)->values();
        $order3News = $allNews->where('body_position', 3)->take(3)->values();
        $order4News = $allNews->where('body_position', 4)->values();
        $order5News = $allNews->where('body_position', 5)->take(4)->values();
        $order6News = $allNews->where('body_position', 6)->values();
        $order7News = $allNews->where('body_position', 7)->values();
        $order8News = $allNews->where('body_position', 8)->values();
        $order1Of4News = $allNews->where('body_position', 9)->take(3)->values();

        $ghumphir = $allNews->where('body_position', 13)->values();
        $brandStory = $allNews->where('category_id', 29)->take(6)->values();
        $sahitya = $allNews->where('body_position', 14)->values();

        return view(
            $this->viewPath . 'index',
            compact(
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
                'order8News',
                'order1Of4News',
                'ghumphir',
                'brandStory',
                'sahitya'
            )
        );
    }

    public function show(string $categorySlug, int $cId): Renderable|RedirectResponse
    {
        $category = Category::whereSlug($categorySlug)
            ->select('id')
            ->first();
        if (!$category) {
            return redirect('/');
        }

        $cacheKey = News::getCacheKey($cId);

        //        $allNews = Cache::remember($cacheKey, 1800, function () use ($cId, $category) {
        $otherNews = $this->newsRepository->sameCategoryNewsQuery($category->id);

        $allNews = News::query()
            ->with(['category:name,id,slug', 'reporter:name,id,image'])
            ->select([
                'title',
                'short_description',
                'guest_id',
                'image_description',
                'description',
                'video_url',
                'date_line',
                'id',
                'c_id',
                'image',
                'image_alt',
                'category_id',
                'reporter_id',
            ])
            ->where('category_id', $category->id)
            ->where('c_id', '=', $cId)
            ->orderByDesc('publish_date')
            ->union($otherNews)
            ->get();
        //        });

        $news = $allNews->where('c_id', '=', $cId)->first();

        //        $news->increment('view_count');

        $sameCategoryNews = $allNews->where('c_id', '!=', $cId)->take(4);

        $categories = $this->categoryRepository->getCategories();
        $headerCategories = $categories->sortBy('header_position')->take(10);

        $otherNews = $this->newsRepository->getOthersNews();
        $trendingNews = $otherNews->where('type', 'trending');
        $blSpecialNews = $otherNews->where('type', 'special');
        $breakingNews = $otherNews->where('type', 'breaking');

        return view(
            $this->viewPath . 'news-detail',
            compact(
                'news',
                'headerCategories',
                'blSpecialNews',
                'trendingNews',
                'sameCategoryNews',
                'breakingNews'
            )
        );
    }

    public function showDetail($cId)
    {

        $cacheKey = News::getCacheKey($cId);

        //        $allNews = Cache::remember($cacheKey, 1800, function () use ($cId, $category) {

        $allNews = News::query()
            ->with(['category:name,id,slug', 'reporter:name,id,image'])
            ->select([
                'title',
                'short_description',
                'guest_id',
                'image_description',
                'description',
                'video_url',
                'date_line',
                'id',
                'c_id',
                'image',
                'image_alt',
                'category_id',
                'reporter_id',
            ])
            ->where('c_id', '=', $cId)
            ->orderByDesc('publish_date')
            ->get();
        //        });

        $news = $allNews->where('c_id', '=', $cId)->first();

        //        $news->increment('view_count');

        $sameCategoryNews = $allNews->where('c_id', '!=', $cId)->take(4);

        $categories = $this->categoryRepository->getCategories();
        $headerCategories = $categories->sortBy('header_position')->take(10);

        $otherNews = $this->newsRepository->getOthersNews();
        $trendingNews = $otherNews->where('type', 'trending');
        $blSpecialNews = $otherNews->where('type', 'special');
        $breakingNews = $otherNews->where('type', 'breaking');

        return view(
            $this->viewPath . 'news-detail',
            compact(
                'news',
                'headerCategories',
                'blSpecialNews',
                'trendingNews',
                'sameCategoryNews',
                'breakingNews'
            )
        );

    }

    public function newsByCategory(string $slug): Renderable|RedirectResponse
    {
        try {
            $categoryIds = $this->categoryRepository->getCategoryIdsBySlug($slug);

            $categories = $this->categoryRepository->getCategories();
            $headerCategories = $categories->sortBy('header_position')->take(10);

            $news = $this->newsRepository->getNewsByCategoryIds($categoryIds);

            $otherNews = $this->newsRepository->getOthersNews();
            $trendingNews = $otherNews->where('type', 'trending');

            return view(
                $this->viewPath . 'category.index',
                compact('headerCategories', 'news', 'trendingNews')
            );
        } catch (Exception) {
            return redirect()->route('index');
        }
    }

    public function newsByAuthor(string $reporter_id): Renderable|RedirectResponse
    {
        try {

            $news = $this->newsRepository->getNewsByAuthorSlug($reporter_id);
            $categories = $this->categoryRepository->getCategories();
            $headerCategories = $categories->sortBy('header_position')->take(10);

            $otherNews = $this->newsRepository->getOthersNews();
            $trendingNews = $otherNews->where('type', 'trending');

            return view(
<<<<<<< HEAD
                $this->viewPath.'author.index',
=======
                $this->viewPath . 'author.index',
>>>>>>> 83992ab (reporter-name)
                compact('headerCategories', 'news', 'trendingNews')
            );
        } catch (Exception) {
            return redirect()->route('index');
        }
    }
}
