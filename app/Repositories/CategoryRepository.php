<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function getCategories(): Collection
    {
        return Category::query()->whereNull('parent_id')->get();
    }

    public function getCategoryIdsBySlug($slug): array
    {
        $category = DB::table('categories')
            ->select('id')
            ->where('slug', '=', $slug)
            ->first();

        if (! $category) {
            return [];
        }

        $subCategoriesIds = $this->getSubCategoriesId($category->id);

        return array_merge($subCategoriesIds, [$category->id]);
    }

    private function getSubCategoriesId($parentId): array
    {
        return DB::table('categories')
            ->select('id')
            ->where('parent_id', $parentId)
            ->get()
            ->map(function ($cat) {
                return $cat->id;
            })->toArray();
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
}
