<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     *
     * @param News $news
     * @return void
     */
    public function created(News $news)
    {
        if ($news->is_anchor)
            DB::select(file_get_contents(database_path('procedures/anchor_news.sq')));

        if ($news->is_special)
            DB::select(file_get_contents(database_path('procedures/special_news.sq')));

        if ($news->category->is_video) {
            DB::select(file_get_contents(database_path('procedures/video_news.sq')));
        }
    }

    /**
     * Handle the News "updated" event.
     *
     * @param News $news
     * @return void
     */
    public function updated(News $news)
    {
        if ($news->is_anchor)
            DB::select(file_get_contents(database_path('procedures/anchor_news.sq')));

        if ($news->is_special)
            DB::select(file_get_contents(database_path('procedures/special_news.sq')));

        if ($news->category->is_video) {
            DB::select(file_get_contents(database_path('procedures/video_news.sq')));
        }
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param News $news
     * @return void
     */
    public function deleted(News $news)
    {
        //
    }

    /**
     * Handle the News "restored" event.
     *
     * @param News $news
     * @return void
     */
    public function restored(News $news)
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param News $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        //
    }
}
