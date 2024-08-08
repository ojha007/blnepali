<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\NewsRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsByCategoryController extends Controller
{
    public function __construct(protected NewsRepository $newsRepository) {}

    public function __invoke(string $categorySlug): Renderable|RedirectResponse
    {
        try {
            $nonCategories = ['anchor', 'bl-special'];

            if (in_array($categorySlug, $nonCategories)) {
                $news = $this->newsRepository->getNewsByNonCategory($categorySlug);
            } else {
                $category = Category::whereSlug($categorySlug)->first();

                $categoryIds = DB::table('categories')
                    ->where('id', $category->id)
                    ->orWhere('parent_id', $category->id)
                    ->pluck('id')
                    ->toArray();

                $news = $this->newsRepository->getNewsByCategoryIds($categoryIds);
            }

            $trendingNews = $this->newsRepository->getTrendingNews();

            return view('frontend.category.index', compact('news', 'trendingNews'));

        } catch (Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());

            return redirect()->route('index');
        }
    }
}
