<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Service\Backend\AdvertisementCountService;

class AdvertisementCountController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,AdvertisementCountService $advertisementCountService)
    {
        return response()->json([
           $advertisementCountService->advertisementCount()
        ]);
    }
}
