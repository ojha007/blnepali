<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    protected string $viewPath = 'frontend.';

    public function __construct(protected NewsRepository $newsRepository) {}

    public function index(): Renderable
    {
        $bodyCategories = [];
        $otherNews = $this->newsRepository->getIndexPageNonCategoryNews();
        $trendingNews = $otherNews->where('category', 'trending');
        $breakingNews = $otherNews->where('category', 'breaking')->take(3);
        $videoNews = $otherNews->where('category', 'video');
        $blSpecialNews = $otherNews->where('category', 'special');
        $anchorNews = $otherNews->where('category', 'anchor');

        $allNews = $this->newsRepository->getHomePageNews();
        $order1News = $allNews->where('category_slug', 'news'); // samachar
        $order2News = $allNews->where('category_slug', 'art-1'); // कला
        $order3News = $allNews->where('category_slug', 'opinion'); // विचार
        $order4News = $allNews->where('category_slug', 'interview'); //अन्तर्वार्ता
        $order5News = $allNews->where('category_slug', 'blogs'); //ब्लग 59
        $ghumphir = $allNews->where('category_slug', 'tourism');
        $brandStory = $allNews->where('category_slug', 'brand-story');
        $sahitya = $allNews->where('category_slug', 'literature');
        $artha = $allNews->where('category_slug', 'econimics');
        $khel = $allNews->where('category_slug', 'sports'); //1
        $jiwansaili = $allNews->where('category_slug', 'lifestyle'); //health

        return view(
            $this->viewPath.'index',
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

    public function show(Category $category, int $cId): Renderable|RedirectResponse
    {
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
            ->union($this->newsRepository->sameCategoryNewsQuery($category->id))
            ->get();

        $news = $allNews->where('c_id', '=', $cId)->first();

        $news->increment('view_count');

        $sameCategoryNews = $allNews->where('c_id', '!=', $cId)->take(4);

        $nonCategoryNews = $this->newsRepository->getDetailPageNonCategoriesNews();
        $trendingNews = $nonCategoryNews->where('category', 'trending');
        $blSpecialNews = $nonCategoryNews->where('category', 'special');
        $breakingNews = $nonCategoryNews->where('category', 'breaking');

        $otherSamachar = [];
        $similarNews = $this->newsRepository->getSimilarNewsBySlug($news);

        return view(
            'frontend.news-detail',
            compact(
                'news',
                'blSpecialNews',
                'trendingNews',
                'sameCategoryNews',
                'breakingNews',
                'otherSamachar',
                'similarNews',
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
                'publish_date',
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

        $sameCategoryNews = $this->newsRepository->sameCategoryNewsQuery($news->category_id)
            ->where('c_id', '!=', $cId)
            ->take(3)
            ->get();

        //  yo pani DB::table('news')
        //         ->select('id', 'title')
        //         ->where('slug', 'like', '%' . $slug . '%')
        //         ->where('id', '!=', $id)
        //         ->whereNull('deleted_at')
        //         ->whereNotNull('slug')
        //         ->inRandomOrder()
        //         ->take(5)
        //         ->get();

        $otherNews = $this->newsRepository->getIndexPageNonCategoryNews();
        $trendingNews = $otherNews->where('category_slug', 'trending');
        $blSpecialNews = $otherNews->where('category_slug', 'special');
        $breakingNews = $otherNews->where('category_slug', 'breaking');
        $otherSamachar = News::query()
            ->with(['category:name,id,slug', 'reporter:name,id,image'])
            ->select([
                'title',
                'short_description',
                'guest_id',
                'image_description',
                'description',
                'video_url',
                'date_line',
                'publish_date',
                'id',
                'c_id',
                'image',
                'image_alt',
                'category_id',
                'reporter_id',
            ])
            ->orderByDesc('publish_date')
            ->skip(1)
            ->take(6)
            ->get();

        return view(
            $this->viewPath.'news-detail',
            compact(
                'news',
                'blSpecialNews',
                'trendingNews',
                'sameCategoryNews',
                'breakingNews',
                'otherSamachar'
            )
        );

    }
}
