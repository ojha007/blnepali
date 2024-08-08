<?php

namespace App\View\Composers;

use App\Repositories\CategoryRepository;
use Illuminate\View\View;

class HeaderCategoryComposer
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
    ) {}

    public function compose(View $view): void
    {
        $allCategories = $this->categoryRepository->getCategories();

        $headerCategories = $allCategories
            ->where('new_design', '=', 1)
            ->sortBy('header_position')
            ->take(10);

        $bodyCategories = $allCategories
            ->where('new_design', '=', 1)
            ->sortBy('body_position')
            ->take(10);

        $view->with([
            'allCategories' => $allCategories,
            'headerCategories' => $headerCategories,
            'bodyCategories' => $bodyCategories,
        ]);
    }
}
