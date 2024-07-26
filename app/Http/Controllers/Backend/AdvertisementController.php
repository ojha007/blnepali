<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AdvertisementRequest;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class AdvertisementController extends Controller
{
    private string $baseRoute = 'cms.advertisements.';

    private string $viewPath = 'backend.advertisement.';

    public function index()
    {
        $advertisements = Advertisement::all()
            ->sortByDesc('id');

        return view($this->viewPath.'index', compact('advertisements'));
    }

    public function create()
    {
        $advertisement = new Advertisement;

        return view($this->viewPath.'.create')
            ->with([
                'advertisement' => $advertisement,
                'selectAdsSubFor' => $this->adsPositions(),
                'selectAdsFor' => Advertisement::adsPage(),
                'placement' => Advertisement::adsPlacements(),
            ]);
    }

    public function edit(Advertisement $advertisement)
    {
        return view($this->viewPath.'.edit')
            ->with([
                'advertisement' => $advertisement,
                'selectAdsSubFor' => $this->adsPositions(),
                'selectAdsFor' => Advertisement::adsPage(),
                'placement' => Advertisement::adsPlacements(),
            ]);
    }

    public function update(AdvertisementRequest $request, Advertisement $advertisement): RedirectResponse
    {
        $attributes = $request->validated();

        $advertisement->update($attributes);

        return redirect()
            ->route($this->baseRoute.'.index')
            ->with('success', 'Advertisement Updated SuccessFully');
    }

    public function store(AdvertisementRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        Advertisement::create($attributes);

        return redirect()
            ->route($this->baseRoute.'.index')
            ->with('success', 'Advertisement Created SuccessFully');
    }

    public function show(Advertisement $advertisement)
    {
        return view($this->viewPath.'show', compact('advertisement'));
    }

    public function destroy(Advertisement $advertisement): RedirectResponse
    {
        $advertisement->delete();

        return redirect()
            ->route($this->baseRoute.'.index')
            ->with('success', 'Advertisement Deleted SuccessFully');
    }

    private function adsPositions(): array
    {
        $toArray = [
            'top_menu' => 'Top Menu',
            'logo_and_menu' => 'Logo and Menu',
            'logo' => 'Logo',
            'footer' => 'Footer',
        ];

        return Category::pluck('name', 'slug')
            ->union($toArray)
            ->toArray();
    }
}
