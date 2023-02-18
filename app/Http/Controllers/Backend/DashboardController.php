<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\News;
use App\Models\Reporter;

class DashboardController extends Controller
{
    public function index()
    {
        $attributes = [
            [
                'title' => 'Total Publish News',
                'fa' => 'newspaper-o',
                'bg' => 'green',
                'count' => News::count()
            ],
            [
                'title' => 'Active Reporters',
                'fa' => 'users',
                'bg' => 'orange',
                'count' => Reporter::count()
            ],
            [
                'title' => 'Total Category',
                'fa' => 'list-alt',
                'bg' => 'info',
                'count' => Category::count()
            ],
            [
                'title' => 'Total Ads',
                'fa' => 'ad',
                'bg' => 'aqua',
                'count' => Advertisement::count()
            ],

        ];
        return view('backend.index', compact('attributes'));
    }
}
