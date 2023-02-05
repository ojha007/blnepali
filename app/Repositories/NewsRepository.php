<?php

namespace App\Repositories;

use App\Models\News;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class NewsRepository
{
    /**
     * @param int $catId
     * @param int $limit
     * @return Collection
     */
    public function getNewsByOrderId(int $catId, int $limit): Collection
    {
        return News::with(['category:name,id,slug', 'reporter:name,id'])
            ->select([
                'title', 'short_description', 'guest', 'image_description',
                'date_line', 'id', 'c_id', 'image', 'image_alt', 'category_id', 'reporter_id'
            ])
            ->where('category_id', $catId)
            ->orderByDesc('publish_date')
            ->limit($limit)
            ->get();

    }

    public function getTrendingNews($limit): Collection
    {
        $date = now()->subDays(7)->format('Y-m-d\TH:i');

        return News::with('category:name,id,slug', 'reporter:name,id')
            ->select([
                'title', 'short_description', 'guest', 'image_description',
                'date_line', 'id', 'c_id', 'image', 'image_alt', 'category_id', 'reporter_id'
            ])
            ->whereDate('publish_date', '>=', $date)
            ->orderByDesc('view_count')
            ->limit($limit)
            ->get();
    }

    public function getBreakingNews($limit): Collection
    {
        return News::withoutTrashed()
            ->with('category:name,id,slug', 'reporter:name,id')
            ->select([
                'title', 'short_description', 'guest', 'image_description',
                'date_line', 'id', 'c_id', 'image', 'image_alt', 'category_id', 'reporter_id'
            ])
            ->orderByDesc('publish_date')
            ->limit($limit)
            ->get();
    }

    public function getAnchorNews(): Collection
    {
        return DB::table('anchor_news')->get();
    }

    public function getVideosNews(): Collection
    {
        return DB::table('videos_news')->get();
    }

    public function getBlSpecialNews(): Collection
    {
        return DB::table('special_news')->get();
    }

    public function sameCategoryNews($catId, $except): Collection
    {
        return News::with('category:name,id,slug')
            ->select(['title', 'date_line', 'c_id', 'image', 'category_id'])
            ->where('category_id', '=', $catId)
            ->where('id', '!=', $except)
            ->orderByDesc('publish_date')
            ->limit(5)
            ->get();
    }

    public function getNewsByCategoryIds(array $ids, $perPage = 20): LengthAwarePaginator
    {
        return News::with('category:name,id,slug')
            ->select([
                'sub_title', 'id', 'title', 'short_description', 'description',
                'publish_date', 'image', 'image_alt', 'c_id', 'image_description',
                'date_line', 'category_id'
            ])
            ->whereIn('category_id', $ids)
            ->orderByDesc('publish_date')
            ->paginate($perPage);
    }

}
