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

    public function __construct(protected NewsRepository $newsRepository)
    {
    }

    public function index(): Renderable
    {
        $bodyCategories = [];
        $otherNews = $this->newsRepository->getIndexPageNonCategoryNews();
        $trendingNews = $otherNews->where('category', 'trending');
        $breakingNews = $otherNews->where('category', 'breaking')->take(3);
        $videoNews = $otherNews->where('category', 'video');
        $blSpecialNews = $otherNews->where('category', 'special');
        $anchorNews = $otherNews->where('category', 'anchor');

        $bannerNews = $this->newsRepository->getBannerNews();

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
            'frontend.index',
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
                'jiwansaili',
                'bannerNews'
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

        if (! $news) {
            abort(404);
        }

        optional($news)->increment('view_count');

        $sameCategoryNews = $allNews->where('c_id', '!=', $cId)->take(4);

        $nonCategoryNews = $this->newsRepository->getDetailPageNonCategoriesNews();
        $trendingNews = $nonCategoryNews->where('category', 'trending');
        $blSpecialNews = $nonCategoryNews->where('category', 'special');
        $breakingNews = $nonCategoryNews->where('category', 'breaking');

        $similarNews = $this->newsRepository->getSimilarNewsBySlug($news);

        return view(
            'frontend.news.show',
            compact(
                'news',
                'blSpecialNews',
                'trendingNews',
                'sameCategoryNews',
                'breakingNews',
                'similarNews',
            )
        );
    }
}
