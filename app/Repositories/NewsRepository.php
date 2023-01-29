<?php

namespace App\Repositories;

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
//        return Cache::remember('_np_news' . $catId, 48000, function () use ($order, $limit) {
        return DB::table('np_news as ne')
            ->select('ne.id', 'ne.title', 'ne.image', 'c.name as category', 'c.slug as category_slug',
                'ne.short_description', 'date_line', 'guest', 'rp.name as reporter', 'ne.c_id')
            ->leftJoin('reporters as rp', 'ne.reporter_id', '=', 'rp.id')
            ->join('categories as c', function ($q) use ($catId) {
                $q->on('c.id', '=', 'ne.category_id')
                    ->where('c.id', '=', $catId);
            })
            ->whereNull('ne.deleted_at')
            ->orderByDesc('ne.publish_date')
            ->limit($limit)
            ->get();
//        });

    }

    public function getTrendingNews($limit): Collection
    {
        $date = now()->subDays(7)->format('Y-m-d\TH:i');

        return DB::table('np_news as ne')
            ->select(
                'ne.title',
                'reporters.name as reporter',
                'ne.short_description',
                'reporters.slug as reporter_slug',
                'guest',
                'ne.image_description',
                'ne.date_line',
                'ne.id',
                'ne.c_id',
                'ne.image',
                'ne.image_alt',
                'c.slug as category_slug',
                'c.name as category'
            )
            ->leftJoin('reporters', 'ne.reporter_id', '=', 'reporters.id')
            ->join('categories as c', 'c.id', '=', 'ne.category_id')
            ->whereNull('ne.deleted_at')
            ->whereDate('ne.publish_date', '>=', $date)
            ->orderByDesc('ne.view_count')
            ->limit($limit)
            ->get();
    }

    public function getBreakingNews($limit): Collection
    {
        return DB::table('np_news as ne')
            ->select(
                'ne.title',
                'ne.id',
                'ne.short_description',
                'ne.c_id',
                'reporters.name as reporter',
                'reporters.slug as reporter_slug',
                'guest',
                'ne.date_line',
                'ne.image',
                'ne.image_description',
                'ne.image_alt',
                'c.slug as category_slug',
                'c.name as category'
            )
            ->leftJoin('reporters', 'ne.reporter_id', '=', 'reporters.id')
            ->join('categories as c', 'c.id', '=', 'ne.category_id')
            ->whereNull('ne.deleted_at')
            ->orderByDesc('publish_date')
//                ->where('publish_date', '<=', now())
            ->limit($limit)
            ->get();

    }

    public function getAnchorNews($limit = 5): Collection
    {

        return DB::table('np_news as ne')
            ->select(
                'ne.title',
                'ne.short_description',
                'ne.id',
                'ne.c_id',
                'ne.image as image',
                'ne.date_line',
                'ne.short_description',
                'reporters.name as reporter',
                'reporters.slug as reporter_slug',
                'guest',
                'ne.image_alt',
                'ne.image_description',
                'c.slug as category_slug',
                'c.name as category'
            )
            ->leftJoin('reporters', 'ne.reporter_id', '=', 'reporters.id')
            ->join('categories as c', 'c.id', '=', 'ne.category_id')
            ->whereNull('ne.deleted_at')
            ->where('ne.is_anchor', '=', 1)
            ->orderByDesc('ne.publish_date')
            ->limit($limit)
            ->get();
    }

    public function getBlSpecialNews($limit): Collection
    {
        return DB::table('np_news as ne')
            ->select(
                'ne.title',
                'ne.id',
                'ne.short_description',
                'ne.c_id',
                'reporters.name as reporter',
                'reporters.slug as reporter_slug',
                'guest',
                'ne.date_line',
                'ne.image',
                'ne.image_description',
                'ne.image_alt',
                'c.slug as category_slug',
                'c.name as category'
            )
            ->leftJoin('reporters', 'ne.reporter_id', '=', 'reporters.id')
            ->join('categories as c', 'c.id', '=', 'ne.category_id')
            ->where('ne.is_special', '=', '1')
            ->whereNull('ne.deleted_at')
            ->orderByDesc('publish_date')
//                ->where('publish_date', '<=', now())
            ->limit($limit)
            ->get();
    }

    public function sameCategoryNews($catId, $except): Collection
    {
        return DB::table('np_news as np')
            ->select(
                'np.title',
                'np.c_id',
                'np.publish_date',
                'np.image',
                'np.date_line'
            )
            ->where('np.category_id', '=', $catId)
            ->where('np.id', '!=', $except)
            ->whereNull('np.deleted_at')
            ->orderByDesc('np.publish_date')
            ->limit(5)
            ->get();
    }
    public function getNewsByCategoryIds(array $ids, $perPage = 20): LengthAwarePaginator
    {
        return DB::table('en_news as news')
            ->select(
                'news.sub_title',
                'news.id',
                'news.title',
                'news.short_description',
                'news.description',
                'news.publish_date',
                'news.image',
                'news.image_alt',
                'c.name as catName',
                'c.slug as category_slug',
                'news.c_id',
                'news.image_description',
                'news.date_line'
            )
            ->join('categories as c', 'news.category_id', '=', 'c.id')
            ->whereIn('news.category_id', $ids)
            ->whereNull('news.deleted_at')
            ->orderByDesc('news.publish_date')
            ->paginate($perPage);
    }

}
