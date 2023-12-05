<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Reporter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    protected string $baseRoute = 'cms.news';

    protected string $viewPath = 'backend.news.';

    public function index(Request $request)
    {
        $is_special = $request->get('is_special') ?? false;
        $is_anchor = $request->get('is_anchor') ?? false;
        $category_id = $request->get('category');
        $reporter_id = $request->get('reporter');
        $guest_id = $request->get('guest');

        $q = $request->get('q');

        $selectReporters = Reporter::pluck('name', 'id')->toArray();

        $selectCategories = Category::isActive()
            ->pluck('name', 'id')
            ->toArray();

        $news = News::with(['reporter:name,id', 'updatedBy:user_name,id', 'createdBy:user_name,id', 'category:name,id,slug'])
            ->orderByDesc('publish_date')
            ->when($is_special, function ($query) {
                $query->where('is_special', true);
            })
            ->when($reporter_id, function ($query) use ($reporter_id) {
                $query->where('reporter_id', $reporter_id);
            })
            ->when($guest_id, function ($query) use ($guest_id) {
                $query->where('guest_id', $guest_id);
            })
            ->when($is_anchor, function ($query) {
                $query->where('is_anchor', true);
            })->when($category_id, function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            })->when($q, function ($a) use ($q) {
                $a->where('title', 'like', $q . '%')
                    ->orWhere('sub_title', 'like', $q . '%')
                    ->orWhere('short_description', 'like', $q . '%');
            })
            ->paginate(50)
            ->appends(request()->query());

        return view($this->viewPath . 'index',
            [
                'allNews' => $news,
                'trashed' => false,
                'selectReporters' => $selectReporters,
                'selectCategories' => $selectCategories
            ]);
    }

    public function create()
    {
        $statuses = News::selectNewsStatus();
        $reporters = Reporter::pluck('name', 'id')->toArray();
        $categories = Category::pluck('name', 'id')->toArray();

        return view($this->viewPath . 'create')
            ->with([
                'statuses' => $statuses,
                'reporters' => $reporters,
                'categories' => $categories
            ]);
    }

    public function edit(News $news)
    {
        $statuses = News::selectNewsStatus();
        $reporters = Reporter::pluck('name', 'id')->toArray();
        $categories = Category::pluck('name', 'id')->toArray();


        return view($this->viewPath . 'edit', compact('reporters', 'news', 'categories', 'statuses'));
    }

    public function update(NewsRequest $request, News $news): RedirectResponse
    {
        $attributes = $request->validated();

        $attributes['updated_by'] = auth()->id();

        $news->update($attributes);

        return redirect()
            ->route($this->baseRoute . '.index')
            ->with('success', 'News Updated SuccessFully');
    }

    public function store(NewsRequest $request): RedirectResponse
    {
        $attributes = $request->validated();
        try {
            $max = DB::table('np_news')
                ->where('category_id', '=', $attributes['category_id'])
                ->groupBy('category_id')
                ->max('c_id');

            $attributes['c_id'] = ($max ?? 0) + 1;
            $attributes['created_by'] = auth()->id();

            News::create($attributes);

            return redirect()->route($this->baseRoute . '.index')
                ->with('success', 'News Created SuccessFully');
        } catch (\Throwable $exception) {

            Log::error($exception->getMessage() . '-' . $exception->getTraceAsString());
            DB::rollBack();
            return redirect()->back()->withInput()
                ->with('failed', 'Failed to create News');
        }
    }

    public function destroy(News $news): RedirectResponse
    {
        try {

            $news->deleted_by = Auth::id();
            $news->delete();

            return redirect()->route($this->baseRoute . '.index')
                ->with('success', 'News Deleted SuccessFully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage() . '-' . $exception->getTraceAsString());
            return redirect()->route($this->baseRoute . '.index')
                ->with('failed', 'Failed to delete news.');
        }
    }
}
