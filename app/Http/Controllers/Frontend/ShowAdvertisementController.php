<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Service\Frontend\ShowAdvertisementService;

class ShowAdvertisementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ShowAdvertisementService $showAdvertisementService, Advertisement $advertisement)
    {
        return response()->json(
            $showAdvertisementService->show($advertisement));
    }
}
