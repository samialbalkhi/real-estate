<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ViewLatestAdvertisementService;

class ViewLatestAdvertisementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ViewLatestAdvertisementService $viewLatestAdvertisementService)
    {
        return response()->json($viewLatestAdvertisementService->viewLatestAdvertisement());
    }
}
