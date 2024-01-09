<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Service\Frontend\ShowAdvertisementService;
use Illuminate\Http\Request;

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
