<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private string $basePath = 'cms.categories';

    private string $viewPath = 'backend.categories.';

    public function index()
    {
        $categories = Category::with('childCategories')
            ->whereNull('parent_id')
            ->get();

        return view($this->viewPath . 'index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->pluck('name', 'id')
            ->toArray();
        $category = new Category();

        return view($this->viewPath . 'create', compact('categories', 'category'));
    }

    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_id')
            ->pluck('name', 'id')
            ->get();

        return view($this->viewPath . 'edit', compact('categories', 'category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $attributes = $request->validated();

        $category->update($attributes);

        return redirect()
            ->route($this->basePath . '.index')
            ->with('success', 'News Category updated SuccessFully');

    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $attributes['slug'] = Str::slug($request->get('slug'));

        Category::create($attributes);

        return redirect()
            ->route($this->basePath . '.index')
            ->with('success', 'News Created SuccessFully');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()
            ->route($this->basePath . '.index')
            ->with('success', 'News Category deleted  SuccessFully');

    }
}
