<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Reporter;
use Exception;
use Illuminate\Contracts\Support\Renderable;
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

    public function index(Request $request): Renderable
    {
        $is_special = $request->get('is_special') ?? false;
        $is_anchor = $request->get('is_anchor') ?? false;
        $category_id = $request->get('category');
        $reporter_id = $request->get('reporter');
        $is_banner = $request->get('is_banner');
        $guest_id = $request->get('guest');

        $q = $request->get('q');

        $selectReporters = Reporter::pluck('name', 'id')->toArray();
        $selectCategories = Category::isActive()->pluck('name', 'id')->toArray();

        $news = News::query()
            ->select('id', 'title',
                'view_count', 'publish_date',
                'slug', 'category_id', 'reporter_id', 'created_by',
                'guest_id', 'updated_by', 'c_id', 'status'
            )
            ->with([
                'reporter:name,id',
                'updatedBy:user_name,id',
                'createdBy:user_name,id',
                'guest:name,id',
                'category:name,id,slug',
            ])
            ->orderByDesc('publish_date')
            ->when($is_special, fn($query) => $query->where('is_special', true))
            ->when($reporter_id, fn($query) => $query->where('reporter_id', $reporter_id))
            ->when($guest_id, fn($query) => $query->where('guest_id', $guest_id))
            ->when($is_anchor, fn($query) => $query->where('is_anchor', true))
            ->when($is_banner, fn($query) => $query->where('is_banner', true))
            ->when($category_id, fn($query) => $query->where('category_id', $category_id))
            ->when($q, fn($query) => $query->where(function ($a) use ($q) {
                $a->where('title', 'like', $q . '%')
                    ->orWhere('sub_title', 'like', $q . '%')
                    ->orWhere('short_description', 'like', $q . '%');
            }))
            ->paginate(50)
            ->appends(request()->query());

        return view($this->viewPath . 'index',
            [
                'allNews' => $news,
                'trashed' => false,
                'selectReporters' => $selectReporters,
                'selectCategories' => $selectCategories,
            ]);
    }

    public function edit(News $news): Renderable
    {
        $statuses = News::selectNewsStatus();
        $reporters = Reporter::pluck('name', 'id')->toArray();
        $categories = Category::pluck('name', 'id')->toArray();

        return view(
            $this->viewPath . 'edit',
            compact('reporters', 'news', 'categories', 'statuses')
        );
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
            DB::beginTransaction();

            $max = DB::table('np_news')
                ->where('category_id', '=', $attributes['category_id'])
                ->groupBy('category_id')
                ->max('c_id');

            $attributes['c_id'] = ($max ?? 0) + 1;
            $attributes['created_by'] = auth()->id();

            News::query()->create($attributes);

            DB::commit();

            return redirect()
                ->route($this->baseRoute . '.index')
                ->with('success', 'News Created SuccessFully');
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());

            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->with('failed', 'Failed to create News');
        }
    }

    public function create(): Renderable
    {
        $statuses = News::selectNewsStatus();
        $reporters = Reporter::pluck('name', 'id')->toArray();
        $categories = Category::pluck('name', 'id')->toArray();

        return view($this->viewPath . 'create')
            ->with([
                'statuses' => $statuses,
                'reporters' => $reporters,
                'categories' => $categories,
            ]);
    }

    public function destroy(News $news): RedirectResponse
    {
        try {
            $news->deleted_by = Auth::id();

            $news->delete();

            return redirect()
                ->route($this->baseRoute . '.index')
                ->with('success', 'News Deleted SuccessFully');
        } catch (Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());

            return redirect()
                ->route($this->baseRoute . '.index')
                ->with('failed', 'Failed to delete news.');
        }
    }
}
