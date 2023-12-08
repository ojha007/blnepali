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
        $results = DB::select(file_get_contents(DB::raw(database_path('procedures/homepage-news.sql'))));

        return collect($results);
    }

    public function getOthersNews(): Collection
    {
        $results = DB::select(file_get_contents(DB::raw(database_path('procedures/non-categories-news.sql'))));

        return collect($results);
    }

    public function sameCategoryNewsQuery($catId): Builder
    {
        return News::with('category:name,id,slug')
            ->select([
                'title', 'short_description', 'guest_id', 'image_description', 'description', 'video_url',
                'date_line', 'id', 'c_id', 'image', 'image_alt', 'category_id', 'reporter_id'
            ])
            ->where('category_id', '=', $catId)
            ->orderByDesc('publish_date')
            ->limit(6);
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
