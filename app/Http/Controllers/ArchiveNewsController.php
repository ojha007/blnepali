<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ArchiveNewsController extends Controller
{

    protected NewsRepository $newsRepository;

    protected CategoryRepository $categoryRepository;

    protected string $viewPath = 'archive.news.';

    public function __construct(NewsRepository $newsRepository, CategoryRepository $categoryRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show($id)
    {
        try {
            $news = DB::table('news as n')
                ->select(['n.id', 'n.title', 'n.slug', 'n.sub_title', 'n.short_description',
                    'n.description', 'r.name as reporter_name', 'g.name as guest_name',
                    'r.image as reporter_image', 'g.slug as guest_slug', 'g.image as guest_image',
                    'r.slug as reporter_slug', 'n.image_description', 'n.external_url',
                    'n.video_url', 'n.date_line', 'n.publish_date', 'n.image', 'n.image_description',
                    'n.image_alt', 'nc.category_id as category_id'])
                ->leftJoin('news_categories as nc', 'nc.news_id', '=', 'n.id')
                ->leftJoin('guests as g', 'n.guest_id', '=', 'g.id')
                ->leftJoin('reporters as r', 'n.reporter_id', '=', 'r.id')
                ->where('n.is_active', true)
                ->whereNull('n.deleted_at')
                ->where('n.id', $id)
                ->first();

            if (!$news) {
                return redirect()->route('index');
            }

            $categoryIds = (new CategoryRepository())->getCategoriesIdsById($news->category_id);
            $headerCategories = $this->categoryRepository->getFrontPageHeaderCategories(11);

            $news = $this->newsRepository->getNewsByCategoryIds($categoryIds);

            $trendingNews = $this->newsRepository->getTrendingNews(5);

            return view($this->viewPath . 'index', compact('headerCategories', 'news', 'trendingNews'));
        } catch (\Exception $exception) {
            dd($exception);
            Log::error($exception->getMessage() . '---' . $exception->getTraceAsString());
            return redirect()->route('index');
        }


    }
}
