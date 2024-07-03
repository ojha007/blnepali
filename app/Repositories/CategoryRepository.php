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
            fn () => Category::query()->whereNull('parent_id')->get()
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

        //        $category = Category::query()->where('slug', $slug)->first();
        //
        //        if (!$category) {
        //            return [];
        //        }
        //
        //        $subCategoriesIds = $this->getSubCategoriesId($category->id);
        //
        //        return array_merge($subCategoriesIds, [$category->id]);
    }

    public function getCategoriesIdsById($id): array
    {
        $category = DB::table('categories')
            ->select('id')
            ->where('id', '=', $id)
            ->first();

        if (! $category) {
            return [];
        }

        $subCategoriesIds = $this->getSubCategoriesId($category->id);

        return array_merge($subCategoriesIds, [$category->id]);
    }

    private function getSubCategoriesId(int $parentId): array
    {
        return Category::query()->where('parent_id', $parentId)->pluck('id')->toArray();
    }
}
