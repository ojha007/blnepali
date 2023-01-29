<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'bl-secure'], function () {
    Auth::routes();
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('category/{category}/news/{c_id}', [HomeController::class, 'show'])
    ->name('category.news.show');


