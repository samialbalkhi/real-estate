<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\AdvertisementRequest;
use App\Models\Advertisement;
use App\Service\Backend\AdvertisementService;

class AdvertisementController extends Controller
{
    public function __construct(private AdvertisementService $advertisementService)
    {
    }

    public function index()
    {
        return response()->json($this->advertisementService->index());
    }

    public function edit(Advertisement $advertisement)
    {
        return response()->json($this->advertisementService->edit($advertisement));
    }

    public function update(AdvertisementRequest $request, Advertisement $advertisement)
    {
        return response()->json($this->advertisementService->update($request, $advertisement));

    }
}
