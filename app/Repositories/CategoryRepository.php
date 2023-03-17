<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\CategoryPosition;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    protected Category $category;

    public function getCategories(): Collection
    {
        return Category::query()
            ->select('categories.id', 'name', 'slug', 'front_body_position', 'front_header_position')
            ->join('category_positions as cp', 'cp.category_id', '=', 'categories.id')
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->whereNotNull('front_header_position')
            ->orWhereNotNull('front_body_position')
            ->get()
            ->map(function ($item) {
                $category = new Category([
                    'id' => $item->id,
                    'name' => $item->name,
                    'slug' => $item->slug
                ]);
                return $category->setRelation('position', new CategoryPosition([
                    'front_header_position' => $item->front_header_position,
                    'front_body_position' => $item->front_body_position,
                ]));

            });
    }

    public function filterFrontCategories(Collection $categories, int $limit, string $location): Collection
    {
        return $categories
            ->each(fn(Category $category) => $category->position->{$location})
            ->filter()
            ->sortBy(fn(Category $category) => $category->position->{$location})
            ->take($limit);

    }

    public function getFrontPageHeaderCategories(): Collection
    {
        return DB::table('categories')
            ->select('categories.id', 'front_header_position', 'categories.name', 'categories.slug')
            ->where('is_active', true)
            ->join('category_positions', 'categories.id', '=', 'category_positions.category_id')
            ->whereNotNull('category_positions.front_header_position')
            ->orderBy('category_positions.front_header_position', 'ASC')
            ->limit(11)
            ->get();

    }

    public function getFrontPageBodyCategories(Collection $categories, int $limit = 16): Collection
    {
        return $categories
            ->each(fn(Category $category) => $category->position->front_body_position)
            ->filter()
            ->sortBy(fn(Category $category) => $category->position->front_body_position)
            ->take($limit);

//        return DB::table('categories')
//            ->select('categories.id', 'front_body_position', 'categories.name', 'categories.slug')
//            ->where('is_active', true)
//            ->join('category_positions', 'categories.id', '=', 'category_positions.category_id')
//            ->whereNotNull('category_positions.front_body_position')
//            ->orderBy('category_positions.front_body_position', 'ASC')
//            ->limit(16)
//            ->get();

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
