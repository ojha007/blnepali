<?php

namespace App\Repositories;

use App\Enums\StatusEnum;
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

    public function getIndexPageNonCategoryNews(): Collection
    {
        $results = DB::select(file_get_contents(database_path('procedures/non-categories-news.sql')));

        return collect($results);
    }

    public function getDetailPageNonCategoriesNews(): Collection
    {
        $results = DB::select(file_get_contents(database_path('procedures/detail-page-non-categories-news.sql')));

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
            ->whereNull(['deleted_at', 'deleted_by'])
            ->where('status', '=', StatusEnum::ACTIVE)
            ->limit(6);
    }

    /**
     * @array<int> $categoriesIds
     */
    public function getNewsByCategoryIds(array $categoriesIds, int $perPage = 20): LengthAwarePaginator
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
            ->whereIn('category_id', $categoriesIds)
            ->orderByDesc('publish_date')
            ->whereNull(['deleted_at', 'deleted_by'])
            ->where('status', '=', StatusEnum::ACTIVE)
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
                'news.publish_date',
                'news.date_line',
                'news.image',
                'news.image_description',
                'news.image_alt',
                'categories.slug as category_slug',
            )
            ->leftJoin('reporters', 'news.reporter_id', '=', 'reporters.id')
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->whereNull(['news.deleted_by', 'news.deleted_at'])
            ->where('news.status', '=', 'active')
            ->whereDate('news.publish_date', '>=', DB::raw('NOW() - INTERVAL 5 WEEK'))
            ->orderByDesc('news.view_count')
            ->limit(5)
            ->get();
    }

    public function getNewsByNonCategory(string $slug, int $perPage = 20): LengthAwarePaginator
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
            ->when($slug === 'anchor', fn(Builder $news) => $news->where('is_anchor', true))
            ->when($slug === 'special', fn(Builder $news) => $news->where('is_special', true))
            ->whereNull(['deleted_at', 'deleted_by'])
            ->where('status', '=', StatusEnum::ACTIVE)
            ->orderByDesc('publish_date')
            ->paginate($perPage);
    }

    public function getSimilarNewsBySlug(News $news): Collection
    {
        return News::with(['category:name,id,slug', 'reporter:id,name,slug'])
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
            ->when(
                is_string($news->slug),
                fn(Builder $query) => $query->where('slug', 'like', $news->slug)
            )
            ->where('id', '!=', $news->id)
            ->whereNull(['deleted_at', 'deleted_by'])
            ->where('status', '=', StatusEnum::ACTIVE)
            ->orderByDesc('publish_date')
            ->limit(3)
            ->get();
    }
}
