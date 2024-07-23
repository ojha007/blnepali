<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class NewsByReporterController extends Controller
{
    public function __construct(
        protected NewsRepository $newsRepository,
        protected CategoryRepository $categoryRepository
    ) {}

    public function __invoke(int $reporter_id): Renderable|RedirectResponse
    {
        try {
            $news = $this->newsRepository->getNewsByAuthorSlug($reporter_id);

            $trendingNews = $this->newsRepository->getTrendingNews();

            return view('frontend.author.index', compact('news', 'trendingNews'));

        } catch (Exception) {
            return redirect()->route('index');
        }
    }
}
