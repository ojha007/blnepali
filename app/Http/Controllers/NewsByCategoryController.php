<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class NewsByCategoryController extends Controller
{
    public function __construct(
        protected NewsRepository $newsRepository,
        protected CategoryRepository $categoryRepository
    ) {}

    public function __invoke(Category $category): Renderable|RedirectResponse
    {
        try {
            $categoryIds = DB::table('categories')
                ->where('id', $category->id)
                ->orWhere('parent_id', $category->id)
                ->pluck('id')
                ->toArray();

            $news = $this->newsRepository->getNewsByCategoryIds($categoryIds);

            $trendingNews = $this->newsRepository->getTrendingNews();

            return view('frontend.category.index', compact('news', 'trendingNews'));

        } catch (Exception) {
            return redirect()->route('index');
        }
    }
}
