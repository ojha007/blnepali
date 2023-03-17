<?php

namespace App\Http\Controllers;


use App\Models\News;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\DB;

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
        $headerCategories = $this->categoryRepository->filterFrontCategories($categories, 11, 'front_header_position');
        $bodyCategories = $this->categoryRepository->filterFrontCategories($categories, 11, 'front_body_position');

//        $trendingNews = $this->newsRepository->getTrendingNews(5);
//        $anchorNews = $this->newsRepository->getAnchorNews();
//        $blSpecialNews = $this->newsRepository->getBlSpecialNews();
//        $breakingNews = $this->newsRepository->getBreakingNews(6);
//        $videoNews = $this->newsRepository->getVideosNews();

        $otherNews = $this->newsRepository->getOthersNews();
        $trendingNews = $otherNews->where('type', 'trending');
        $breakingNews = $otherNews->where('type', 'breaking');
        $videoNews = $otherNews->where('type', 'video');
        $blSpecialNews = $otherNews->where('type', 'special');
        $anchorNews = $otherNews->where('type', 'anchor');

        $categoryIds = [1 => 10, 2 => 4, 35 => 6, 4 => 4, 22 => 4, 11 => 4, 9 => 4, 26 => 6];

        $allNews = $this->newsRepository->getNews($categoryIds);

        $order1News = $allNews->where('category_id', 1);
        $order2News = $allNews->where('category_id', 2);
        $order3News = $allNews->where('category_id', 35);
        $order4News = $allNews->where('category_id', 4);
        $order5News = $allNews->where('category_id', 22);
        $order6News = $allNews->where('category_id', 11);
        $order7News = $allNews->where('category_id', 9);
        $order8News = $allNews->where('category_id', 26);

//        $order1News = $this->newsRepository->getNewsByOrderId(1,10);
//        $order2News = $this->newsRepository->getNewsByOrderId(2, 4);
//        $order3News = $this->newsRepository->getNewsByOrderId(35, 6);
//        $order4News = $this->newsRepository->getNewsByOrderId(4, 4);
//        $order5News = $this->newsRepository->getNewsByOrderId(22, 4);
//        $order6News = $this->newsRepository->getNewsByOrderId(11, 4);
//        $order7News = $this->newsRepository->getNewsByOrderId(9, 4);
//        $order8News = $this->newsRepository->getNewsByOrderId(26, 6);


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

    public function show($category, $cId)
    {
        $catId = DB::table('categories')
            ->select('id')
            ->where('slug', '=', $category)
            ->first()->id;

        if (!$catId) return redirect('/');

        $news = News::with(['category:name,id,slug', 'reporter:name,id,image'])
            ->select([
                'title', 'short_description', 'guest', 'image_description', 'description', 'video_url',
                'date_line', 'id', 'c_id', 'image', 'image_alt', 'category_id', 'reporter_id'
            ])
            ->where('category_id', $catId)
            ->where('c_id', '=', $cId)
            ->orderByDesc('publish_date')
            ->first();

        $news->increment('view_count');

        $headerCategories = $this->categoryRepository->getFrontPageHeaderCategories(11);
        $blSpecialNews = $this->newsRepository->getBlSpecialNews();

        $trendingNews = $this->newsRepository->getTrendingNews(5);
        $sameCategoryNews = $this->newsRepository->sameCategoryNews($catId, $news->id);

        return view($this->viewPath . 'news-detail', compact('news',
            'headerCategories', 'blSpecialNews', 'trendingNews', 'sameCategoryNews'));

    }

    public function newsByCategory($slug)
    {
        try {
            $categoryIds = $this->categoryRepository->getCategoryIdsBySlug($slug);

            $headerCategories = $this->categoryRepository->getFrontPageHeaderCategories(11);

            $news = $this->newsRepository->getNewsByCategoryIds($categoryIds);

            $trendingNews = $this->newsRepository->getTrendingNews(5);

            return view($this->viewPath . 'category.index', compact('headerCategories', 'news', 'trendingNews'));
        } catch (\Exception $exception) {

            return redirect()->route('index');
        }
    }

}
