<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::factory()
            ->count(50)
            ->has(Category::factory()->count(10))
            ->create();
    }
}
