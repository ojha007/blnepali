<?php

use App\Http\Controllers\ArchiveNewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsByCategoryController;
use App\Http\Controllers\NewsByReporterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('news/{id}', [ArchiveNewsController::class, 'show'])->name('news.show');

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'bl-secure'], function () {
    Auth::routes();
});

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('category/{categorySlug}', NewsByCategoryController::class)->name('newsByCategory');

Route::get('news/author/{reporter_id}', NewsByReporterController::class)->name('newsByAuthor');

Route::get('category/{category:slug}/news/{c_id}', [HomeController::class, 'show'])
    ->name('category.news.show');

Route::get('news/detail/{c_id}', [HomeController::class, 'showDetail'])->name('showDetail');

Route::get('preeti-to-unicode', fn() => view('frontend.unicode.preeti-to-unicode'))->name('preeti-to-unicode');
Route::get('roman-to-unicode', fn() => view('frontend.unicode.roman-to-nepali'))->name('roman-to-unicode');
Route::get('unicode-to-preeti', fn() => view('fronted.unicode.unicode-to-preeti'))->name('unicode-to-preeti');
