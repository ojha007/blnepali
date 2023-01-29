<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReporterRequest;
use App\Models\Reporter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ReporterController extends Controller
{
    private string $viewPath = 'backend.reporters.';
    private string $basePath = 'cms.reporters.';

    public function index(Request $request)
    {
        $reporters = Reporter::withCount('news')
            ->paginate(20)
            ->appends($request->query());

        return view($this->viewPath . 'index', compact('reporters'));
    }

    public function create()
    {
        return view($this->viewPath . 'create');
    }

    public function edit(Reporter $reporter)
    {
        return view($this->viewPath . 'edit', compact('reporter'));
    }

    public function store(ReporterRequest $request): RedirectResponse
    {
        $attributes = $request->validated();;

        Reporter::create($attributes);

        return redirect()
            ->route($this->basePath . '.index')
            ->with('success', 'Reporter created Successfully');

    }

    public function update(ReporterRequest $request, Reporter $reporter): RedirectResponse
    {
        $attributes = $request->validated();;

        $reporter->update($attributes);

        return redirect()
            ->route($this->basePath . '.index')
            ->with('success', 'Reporter updated Successfully');

    }

    public function destroy(Reporter $reporter): RedirectResponse
    {
        $reporter->delete();

        return redirect()
            ->route($this->basePath . '.index')
            ->with('success', 'Contact deleted Successfully');

    }
}
