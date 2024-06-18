<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Cache;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     *
     * @return void
     */
    public function created(News $news)
    {
        Cache::forget(News::CACHE_KEY);
        Cache::forget(News::otherNewsCacheKey());
    }

    /**
     * Handle the News "updated" event.
     *
     * @return void
     */
    public function updated(News $news)
    {
        $cacheKey = sprintf(News::CACHE_KEY.'::%s', $news->c_id);

        Cache::forget($cacheKey);
    }

    /**
     * Handle the News "deleted" event.
     *
     * @return void
     */
    public function deleted(News $news)
    {
        //
    }

    /**
     * Handle the News "restored" event.
     *
     * @return void
     */
    public function restored(News $news)
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(News $news)
    {
        //
    }
}
