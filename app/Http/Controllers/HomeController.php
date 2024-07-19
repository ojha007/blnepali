<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    protected string $viewPath = 'frontend.';

    public function __construct(
        protected NewsRepository $newsRepository,
        protected CategoryRepository $categoryRepository
    ) {
    }

    public function index(): Renderable
    {
        $bodyCategories = [];

        $otherNews = $this->newsRepository->getOthersNews();
        $trendingNews = $otherNews->where('category_slug', 'trending');
        $breakingNews = $otherNews->where('category_slug', 'breaking')->take(4);
        $videoNews = $otherNews->where('category_slug', 'video');
        $blSpecialNews = $otherNews->where('category_slug', 'special');
        $anchorNews = $otherNews->where('category_slug', 'anchor');

        $allNews = $this->newsRepository->getHomePageNews();
        $order1News = $allNews->where('category_id', 60); // samachar
        $order2News = $allNews->where('category_id', 22); // कला
        $order3News = $allNews->where('category_id', 11); // विचार
        $order4News = $allNews->where('category_id', 25); //अन्तर्वार्ता
        $order5News = $allNews->where('category_id', 26); //ब्लग 59
        $ghumphir = $allNews->where('category_id', 9);
        $brandStory = $allNews->where('category_id', 29);
        $sahitya = $allNews->where('category_id', 32);
        $artha = $allNews->where('category_id', 4);
        $khel = $allNews->where('category_id', 1); //1
        $jiwansaili = $allNews->where('category_id', 72);

        return view(
            $this->viewPath . 'index',
            compact(
                'order1News',
                'trendingNews',
                'breakingNews',
                'videoNews',
                'anchorNews',
                'blSpecialNews',
                'order2News',
                'order3News',
                'order4News',
                'order5News',
                'bodyCategories',
                'ghumphir',
                'brandStory',
                'sahitya',
                'artha',
                'khel',
                'jiwansaili'
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

        $news->increment('view_count');

        $sameCategoryNews = $allNews->where('c_id', '!=', $cId)->take(4);

        $otherNews = $this->newsRepository->getOthersNews();
        $trendingNews = $otherNews->where('category_slug', 'trending');
        $blSpecialNews = $otherNews->where('category_slug', 'special');
        $breakingNews = $otherNews->where('category_slug', 'breaking');

        return view(
            $this->viewPath . 'news-detail',
            compact(
                'news',
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

        $news->increment('view_count');

        $sameCategoryNews = $allNews->where('c_id', '!=', $cId)->take(4);

        $otherNews = $this->newsRepository->getOthersNews();
        $trendingNews = $otherNews->where('category_slug', 'trending');
        $blSpecialNews = $otherNews->where('category_slug', 'special');
        $breakingNews = $otherNews->where('category_slug', 'breaking');

        return view(
            $this->viewPath . 'news-detail',
            compact(
                'news',
                'blSpecialNews',
                'trendingNews',
                'sameCategoryNews',
                'breakingNews'
            )
        );

    }
}
