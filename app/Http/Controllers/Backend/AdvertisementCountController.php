<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Service\Backend\AdvertisementCountService;
use Illuminate\Http\Request;

class AdvertisementCountController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, AdvertisementCountService $advertisementCountService)
    {
        return response()->json([
            $advertisementCountService->advertisementCount(),
        ]);
    }
}
