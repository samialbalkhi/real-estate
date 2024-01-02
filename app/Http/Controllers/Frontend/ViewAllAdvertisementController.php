<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Frontend\ViewAllAdvertisementService;
use Illuminate\Http\Request;

class ViewAllAdvertisementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ViewAllAdvertisementService $viewAllAdvertisementService)
    {
        return response()->json($viewAllAdvertisementService->index());
    }
}
