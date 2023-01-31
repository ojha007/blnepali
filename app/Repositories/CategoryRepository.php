<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{

    public function getFrontPageHeaderCategories($limit = 10): Collection
    {
        return DB::table('categories')
            ->select('categories.name', 'categories.slug')
            ->where('parent_id', null)
            ->where('is_active', true)
            ->join('category_positions', 'categories.id', '=', 'category_positions.category_id')
            ->whereNotNull('category_positions.front_header_position')
            ->orderBy('category_positions.front_header_position', 'ASC')
            ->limit($limit)
            ->get();

    }

    public function getFrontPageBodyCategories($limit = 16): Collection
    {

        return DB::table('categories')
            ->select('categories.id', 'front_body_position', 'categories.name', 'categories.slug')
            ->where('is_active', true)
            ->join('category_positions', 'categories.id', '=', 'category_positions.category_id')
            ->whereNotNull('category_positions.front_body_position')
            ->orderBy('category_positions.front_body_position', 'ASC')
            ->limit($limit)
            ->get();

    }

    public function getCategoryIdsBySlug($slug): array
    {
        $category = DB::table('categories')
            ->select('id')
            ->where('slug', '=', $slug)
            ->first();

        if (!$category) return [];

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

        if (!$category) return [];

        $subCategoriesIds = $this->getSubCategoriesId($category->id);

        return array_merge($subCategoriesIds, [$category->id]);
    }

}
