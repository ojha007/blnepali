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
        return Cache::rememberForever(
            'categories',
<<<<<<< Updated upstream
            fn () => Category::query()->get()
=======
            fn() => Category::query()
                ->whereIn('slug', [
                    'sports',
                    'break',
                    'bl-special',
                    'economics',
                    'news',
                    'art-1',
                    'literature',
                    'blogs',
                    'tourism',
                    'anchor',
                    'opinion'
                ])
                ->get()
>>>>>>> Stashed changes
        );
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
