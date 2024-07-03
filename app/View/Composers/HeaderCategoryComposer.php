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
        $view->with(
            'headerCategories',
            $this->categoryRepository->getCategories()->sortBy('header_position')->take(10)
        );
    }
}
