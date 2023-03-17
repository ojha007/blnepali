<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\News;
use App\Models\Reporter;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class NewsRepository
{
    public function getNews(array $categories): Collection
    {
        $categoryIds = array_keys($categories);
        $categories = collect($categories);

        $limitQuery = [];
        foreach ($categories as $id => $limit) {
            $limitQuery[] = sprintf('SELECT %s AS category_id, %s AS limit_per_category', $id, $limit);
        }

        $limitQuery = '(' . implode(' UNION ALL ', $limitQuery) . ' ) l';

        return DB::table(function ($query) use ($categories) {
            $query->select([
                'np_news.id',
                'title',
                'short_description',
                'guest',
                'np_news.image_description',
                'category_id',
                'image_alt',
                'c.name as category_name',
                'date_line',
                'publish_date',
                'c.slug as category_slug',
                'c_id',
                'np_news.image',
                'r.id as reporter_id',
                'r.name as reporter_name'
            ])
                ->from('np_news')
                ->join('categories as c', 'np_news.category_id', '=', 'c.id')
                ->join('reporters as r', 'np_news.reporter_id', '=', 'r.id')
                ->whereIn('np_news.category_id', $categories->keys())
                ->whereNull('np_news.deleted_at')
                ->where('np_news.status', '=', 'active')
                ->orderByDesc('np_news.publish_date')
                ->get()
                ->groupBy('np_news.category_id');
        }, 'n')
            ->join(DB::raw($limitQuery), 'n.category_id', '=', 'l.category_id')
            ->whereRaw('n.id IN (
                 SELECT id FROM (
                  SELECT id,
                  ROW_NUMBER() OVER (PARTITION BY category_id ORDER BY publish_date DESC) AS row_num
                  FROM np_news
                  WHERE category_id IN (' . implode(',', $categoryIds) . ')
                ) x
            WHERE row_num <= l.limit_per_category
           )')
            ->orderByDesc('publish_date')
            ->get()
            ->map(function ($item) {
                $news = new News([
                    'title' => $item->title,
                    'short_description' => $item->short_description,
                    'guest' => $item->guest,
                    'image_description' => $item->image_description,
                    'date_line' => $item->date_line,
                    'id' => $item->id,
                    'c_id' => $item->c_id,
                    'image' => $item->image,
                    'image_alt' => $item->image_alt,
                    'category_id' => $item->category_id,
                ]);
                $news->setRelation('category', new Category([
                    'name' => $item->category_name,
                    'id' => $item->category_id,
                    'slug' => $item->category_slug,
                ]));
                $news->setRelation('reporter', new Reporter([
                    'name' => $item->reporter_name,
                    'id' => $item->reporter_id,
                ]));
                return $news;
            });
    }

    /** @deprecated */
    public function getNewsByOrderId(int $catId, int $limit): Collection
    {
        return News::with(['category:name,id,slug', 'reporter:name,id'])
            ->select([
                'title', 'short_description', 'guest', 'image_description', 'publish_date',
                'date_line', 'id', 'c_id', 'image', 'image_alt', 'category_id', 'reporter_id'
            ])
            ->where('category_id', $catId)
            ->orderByDesc('publish_date')
            ->limit($limit)
            ->get();

    }

    /** @deprecated */
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

    /** @deprecated */
    public function getBreakingNews($limit): Collection
    {
        return DB::table('np_news as np')
            ->select(['np.title', 'c_id', 'np.image', 'c.slug as category_slug', 'short_description'])
            ->join('categories as c', 'c.id', '=', 'np.category_id')
            ->where('np.is_breaking', '=', 1)
            ->orderByDesc('publish_date')
            ->limit($limit)
            ->get();
    }

    public function getOthersNews(): Collection
    {
        $select = [
            'np.title', 'c_id', 'np.id', 'np.image', 'short_description',
            'short_description', 'image_alt', 'date_line',
            'np.image_description', 'guest', 'np.category_id',
            'c.slug as category_slug', 'c.name as category_name'
        ];
        $date = now()->subDays(7)->format('Y-m-d\TH:i');

        return DB::table('np_news as np')
            ->select($select)
            ->selectRaw('NULL as reporter_id,NULL as reporter_name,"breaking" as type')
            ->join('categories as c', 'c.id', '=', 'np.category_id')
            ->where('np.is_breaking', '=', 1)
            ->whereNull('np.deleted_at')
            ->where('status', '=', 'active')
            ->orderByDesc('publish_date')
            ->limit(5)
            ->unionAll(function (Builder $query) use ($select, &$date) {
                $query->from('np_news as np')
                    ->select($select)
                    ->selectRaw('rp.id as reporter_id,rp.name as reporter_name,"trending" as type')
                    ->join('categories as c', 'c.id', '=', 'np.category_id')
                    ->join('reporters as rp', 'rp.id', '=', 'np.reporter_id')
                    ->whereDate('publish_date', '>=', $date)
                    ->whereNull('np.deleted_at')
                    ->where('status', '=', 'active')
                    ->orderByDesc('view_count')
                    ->limit(6);
            })
            ->unionAll(function (Builder $query) use ($select) {
                $query->from('np_news as np')
                    ->select($select)
                    ->selectRaw('NULL as reporter_id,NULL as reporter_name, "anchor" as type')
                    ->join('categories as c', 'c.id', '=', 'np.category_id')
                    ->where('np.is_anchor', '=', 1)
                    ->whereNull('np.deleted_at')
                    ->where('status', '=', 'active')
                    ->orderByDesc('publish_date')
                    ->limit(5);
            })
            ->unionAll(function (Builder $query) use ($select) {
                $query->from('np_news as np')
                    ->select($select)
                    ->selectRaw('NULL as reporter_id,NULL as reporter_name,"special" as type')
                    ->join('categories as c', 'c.id', '=', 'np.category_id')
                    ->where('np.is_special', '=', 1)
                    ->whereNull('np.deleted_at')
                    ->where('status', '=', 'active')
                    ->orderByDesc('publish_date')
                    ->limit(5);
            })
            ->get()
            ->map(function ($item) {
                $news = new News([
                    'title' => $item->title,
                    'guest' => $item->guest,
                    'date_line' => $item->date_line,
                    'id' => $item->id,
                    'c_id' => $item->c_id,
                    'image' => $item->image,
                    'category_id' => $item->category_id,
                    'type' => $item->type,
                ]);
                $news->setRelation('category', new Category([
                    'name' => $item->category_name,
                    'id' => $item->category_id,
                    'slug' => $item->category_slug,
                ]));
                $news->setRelation('reporter', new Reporter([
                    'name' => $item->reporter_name,
                    'id' => $item->reporter_id,
                ]));
                return $news;
            });
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
