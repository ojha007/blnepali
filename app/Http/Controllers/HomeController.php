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
        $headerCategories = $this->categoryRepository->getFrontPageHeaderCategories(11);
        $bodyCategories = $this->categoryRepository->getFrontPageBodyCategories(10);

        $categories = [];
        $order1News = $this->newsRepository->getNewsByOrderId(1, 10);
        $order2News = $this->newsRepository->getNewsByOrderId(2, 4);
        $order3News = $this->newsRepository->getNewsByOrderId(24, 10);
        $order4News = $this->newsRepository->getNewsByOrderId(29, 4);
        $order5News = $this->newsRepository->getNewsByOrderId(4, 4);
        $order6News = $this->newsRepository->getNewsByOrderId(11, 4);
        $order7News = $this->newsRepository->getNewsByOrderId(22, 4);
        $order8News = $this->newsRepository->getNewsByOrderId(26, 6);
        $anchorNews = $this->newsRepository->getAnchorNews();
        $trendingNews = $this->newsRepository->getTrendingNews(5);
        $blSpecialNews = $this->newsRepository->getBlSpecialNews(6);
        $breakingNews = $this->newsRepository->getBreakingNews(6);
        $videoNews = $this->newsRepository->getNewsByOrderId(7, 5);

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
                'title', 'short_description', 'guest', 'image_description', 'description',
                'date_line', 'id', 'c_id', 'image', 'image_alt', 'category_id', 'reporter_id'
            ])
            ->where('category_id', $catId)
            ->where('c_id', '=', $cId)
            ->orderByDesc('publish_date')
            ->first();

        $headerCategories = $this->categoryRepository->getFrontPageHeaderCategories(11);
        $blSpecialNews = $this->newsRepository->getBlSpecialNews(5);

        $trendingNews = $this->newsRepository->getTrendingNews(5);
        $sameCategoryNews = $this->newsRepository->sameCategoryNews($catId, $news->id);

        return view($this->viewPath . 'news-detail', compact('news',
            'headerCategories', 'blSpecialNews', 'trendingNews', 'sameCategoryNews'));

    }

    public function newsByCategory($slug)
    {
        try {
            $categoryIds = $this->categoryRepository->getAllCategoriesIds($slug);

            $headerCategories = $this->categoryRepository->getFrontPageHeaderCategories(11);

            $news = $this->newsRepository->getNewsByCategoryIds($categoryIds);

            $trendingNews = $this->newsRepository->getTrendingNews(5);

            return view($this->viewPath . 'category.index', compact('headerCategories', 'news', 'trendingNews'));
        } catch (\Exception $exception) {

            return redirect()->route('index');
        }
    }

}
