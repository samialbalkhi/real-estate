<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Frontend\ViewLatestAdvertisementService;
use Illuminate\Http\Request;

class ViewLatestAdvertisementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ViewLatestAdvertisementService $viewLatestAdvertisementService)
    {
        return response()->json($viewLatestAdvertisementService->viewLatestAdvertisement());
    }
}
