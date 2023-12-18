<?php

namespace App\Http\Controllers\Backend;

use App\helpers\Helpers;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Service\Backend\AdvertisementService;
use App\Http\Requests\backend\AdvertisementRequest;

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
       $this->advertisementService->update($request, $advertisement);
       return response()->json(Helpers::updateSuccessResponse());
    }
}
