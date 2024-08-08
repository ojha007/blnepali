<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function getCategories(): Collection
    {
        return Category::query()->get();
        return Cache::remember('categories',1, fn () => Category::query()->get());
    }

    public function getCategoryIdsBySlug(string $slug): array
    {
        return DB::select('WITH RECURSIVE categoriesIds AS
            (
                SELECT id, parent_id, 0 AS level FROM categories WHERE slug = ?
                UNION ALL
                SELECT c.id,c.parent_id,ch.level + 1 FROM categories c
                INNER JOIN categoryIds ch ON c.parent_id = ch.id
            )', [$slug]);
    }
}
