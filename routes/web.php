<?php

use App\Http\Controllers\ArchiveNewsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('news/{id}', [ArchiveNewsController::class, 'show'])->name('news.show');

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'bl-secure'], function () {
    Auth::routes();
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/comments', [CommentController::class, 'index'])->name('comments');

Route::get('category/{slug}/news', [HomeController::class, 'newsByCategory'])->name('newsByCategory');

Route::get('category/{category}/news/{c_id}', [HomeController::class, 'show'])
    ->name('category.news.show');
