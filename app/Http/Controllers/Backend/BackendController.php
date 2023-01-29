<?php

namespace App\Http\Controllers\Backend;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\News;
use App\Models\Reporter;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $attributes = [
            [
                'title' => 'Total Publish News',
                'fa' => 'newspaper-o',
                'bg' => 'green',
                'count' => $this->newsCount()
            ],
            [
                'title' => 'Active Guests',
                'fa' => 'users',
                'bg' => 'yellow',
                'count' => $this->guestsCount()
            ],
            [
                'title' => 'Active Reporters',
                'fa' => 'users',
                'bg' => 'orange',
                'count' => $this->reportersCounts()
            ],
            [
                'title' => 'Total Category',
                'fa' => 'list-alt',
                'bg' => 'info',
                'count' => $this->categoryCount()
            ],
            [
                'title' => 'Total Ads',
                'fa' => 'ad',
                'bg' => 'aqua',
                'count' => $this->adsCounts()
            ],

        ];

        return view('backend::index', compact('attributes'));
    }

    protected function newsCount(): int
    {
        return News::count();
    }


    protected function reportersCounts()
    {
        return Reporter::count();
    }

    protected function categoryCount()
    {
        return Category::count();
    }

    protected function adsCounts()
    {
        return Advertisement::count();
    }


}
