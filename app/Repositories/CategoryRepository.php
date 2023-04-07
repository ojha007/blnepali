<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    protected Category $category;

    public function getCategories(): Collection
    {
        return Cache::rememberForever(Category::CACHE_KEY, function () {
            return Category::query()
                ->select('categories.id', 'name', 'slug')
                ->isActive()
                ->parentNull()
                ->whereHas('position', fn($query) => $query->frontPagePosition())
                ->with("position:category_id,front_body_position,front_header_position")
                ->get();
        });
    }

    /**
     * @param Collection<Category> $categories
     * @param int $limit
     * @param string $location
     * @return Collection<Category>
     */
    public function filterFrontCategories(Collection $categories, int $limit, string $location): Collection
    {
        return $categories
            ->filter(fn(Category $category) => $category->position->{$location})
            ->sortBy(fn(Category $category) => $category->position->{$location})
            ->take($limit);
    }

    public function getFrontPageHeaderCategories($limit = 11): Collection
    {
        return Cache::rememberForever(Category::HEADER_CACHE_KEY, function () use ($limit) {
            return DB::table('categories')
                ->select('categories.id', 'front_header_position', 'categories.name', 'categories.slug')
                ->where('is_active', true)
                ->join('category_positions', 'categories.id', '=', 'category_positions.category_id')
                ->whereNotNull('category_positions.front_header_position')
                ->orderBy('category_positions.front_header_position', 'ASC')
                ->limit($limit)
                ->get();
        });
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
