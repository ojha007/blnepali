<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryPosition;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()
            ->count(10)
            ->has(CategoryPosition::factory()->count(10))
            ->create();
    }
}
