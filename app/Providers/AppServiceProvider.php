<?php

namespace App\Providers;

use App\View\Composers\HeaderCategoryComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LogViewer::auth(fn($request) => true);
        View::composer('*', HeaderCategoryComposer::class);
    }
}
