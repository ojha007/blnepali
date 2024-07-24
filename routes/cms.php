<?php

use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ReporterController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Backend\CommentController;

Route::get('dashboard', DashboardController::class)->name('index');
Route::resource('advertisements', AdvertisementController::class);
Route::resource('profile', ProfileController::class);
Route::resource('news', NewsController::class);
Route::resource('categories', CategoryController::class);
// Route::resource('comments', CommentController::class);
Route::resource('reporters', ReporterController::class);
Route::resource('banners', BannerController::class);
