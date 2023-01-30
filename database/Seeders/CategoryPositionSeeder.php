<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryPosition;
use Illuminate\Database\Seeder;

class CategoryPositionSeeder extends Seeder
{
    public function run(): void
    {
        CategoryPosition::factory()
            ->has(Category::factory()->count(10))
            ->create();
    }
}
