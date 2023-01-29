<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class CategoryRepository
{

    public function getFrontPageHeaderCategories($limit = 10): Collection
    {
        return Cache::remember('_frontPageHeaderCategoriesByPosition', 10000, function () use ($limit) {
            return DB::table('categories')
                ->select('categories.name', 'categories.slug')
                ->where('parent_id', null)
                ->where('is_active', true)
                ->join('category_positions', 'categories.id', '=', 'category_positions.category_id')
                ->whereNotNull('category_positions.front_header_position')
                ->orderBy('category_positions.front_header_position', 'ASC')
                ->limit($limit)
                ->get();
        });
    }

    public function getFrontPageBodyCategories($limit = 16): Collection
    {

        return Cache::remember('bl_frontFrontPageBodyCategories', 10000, function () use ($limit) {
            return DB::table('categories')
                ->select('categories.id', 'front_body_position', 'categories.name', 'categories.slug')
                ->where('is_active', true)
                ->join('category_positions', 'categories.id', '=', 'category_positions.category_id')
                ->whereNotNull('category_positions.front_body_position')
                ->orderBy('category_positions.front_body_position', 'ASC')
                ->limit($limit)
                ->get();
        });
    }
    public function getAllCategoriesIds($slug): array
    {
        $toReturn = [];

        $category = DB::table('categories')
            ->select('id')
            ->where('slug', '=', $slug)
            ->first();

        $toReturn[0] = $category->id;

        $subCategories = DB::table('categories')
            ->select('id')
            ->where('parent_id', $category->id)
            ->get()
            ->map(function ($cat) {
                return $cat->id;
            })->toArray();

        return array_merge($toReturn, $subCategories);
    }

}
