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
//        if ($news->is_anchor)
//            DB::unprepared(file_get_contents(database_path('procedures/anchor_news.sql')));
//
//        if ($news->is_special)
//            DB::unprepared(file_get_contents(database_path('procedures/special_news.sq')));
//
//        if ($news->category->is_video) {
//            DB::unprepared(file_get_contents(database_path('procedures/video_news.sql')));
//        }
    }

    /**
     * Handle the News "updated" event.
     *
     * @param News $news
     * @return void
     */
    public function updated(News $news)
    {
//        if ($news->is_anchor)
//            DB::unprepared(file_get_contents(database_path('procedures/anchor_news.sql')));
//
//        if ($news->is_special)
//            DB::unprepared(file_get_contents(database_path('procedures/special_news.sq')));
//
//        if ($news->category->is_video) {
//            DB::unprepared(file_get_contents(database_path('procedures/video_news.sql')));
//        }
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
