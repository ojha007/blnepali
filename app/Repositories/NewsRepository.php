<?php

namespace App\Repositories;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class NewsRepository
{
    public function getHomePageNews(): Collection
    {
        $results = DB::select(file_get_contents(database_path('procedures/homepage-news.sql')));

        return collect($results);
    }

    public function getOthersNews(): Collection
    {
        $results = DB::select(file_get_contents(database_path('procedures/non-categories-news.sql')));

        return collect($results);
    }

    public function sameCategoryNewsQuery($catId): Builder
    {
        return News::with('category:name,id,slug')
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
            ->where('category_id', '=', $catId)
            ->orderByDesc('publish_date')
            ->limit(6);
    }

    public function getNewsByCategoryIds($slug, $perPage = 20): LengthAwarePaginator
    {
        return News::with('category:name,id,slug')
            ->select([
                'sub_title',
                'id',
                'title',
                'short_description',
                'description',
                'publish_date',
                'image',
                'image_alt',
                'c_id',
                'image_description',
                'date_line',
                'category_id',
            ])
            ->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->orderByDesc('publish_date')
            ->paginate($perPage);
    }

    public function getNewsByAuthorSlug(int $reporterId, $perPage = 20): LengthAwarePaginator
    {
        return News::with('category:name,id,slug')
            ->select([
                'sub_title',
                'id',
                'title',
                'short_description',
                'description',
                'publish_date',
                'image',
                'image_alt',
                'c_id',
                'image_description',
                'date_line',
                'category_id',
                'reporter_id',
                'guest_id',
            ])
            ->where('reporter_id', '=', $reporterId)
            ->orderByDesc('publish_date')
            ->paginate($perPage);
    }

    public function getTrendingNews(): Collection
    {
        return DB::table('np_news as news')
            ->select(
                'news.title',
                'news.sub_title',
                'news.id',
                'news.c_id',
                'news.short_description',
                'reporters.image as reporter_image',
                'reporters.name as reporter_name',
                'reporters.slug as reporter_slug',
                'publish_date',
                'date_line',
                'news.image',
                'image_description',
                'image_alt',
            )
            ->leftJoin('reporters', 'news.reporter_id', '=', 'reporters.id')
            ->whereNull('news.deleted_by')
            ->where('news.status', '=', 'active')
            ->whereDate('news.publish_date', '>=', DB::raw('NOW() - INTERVAL 5 WEEK'))
            ->orderBy('news.view_count', 'desc')
            ->limit(5)
            ->get();
    }
}
