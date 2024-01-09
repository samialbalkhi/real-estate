<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Service\Frontend\GetSimilarAdvertisementService;
use Illuminate\Http\Request;

class GetSimilarAdvertisementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(GetSimilarAdvertisementService $getSimilarAdvertisementService, Advertisement $advertisement)
    {
        return response()->json(
            $getSimilarAdvertisementService->getSimilarAdvertisement($advertisement));
    }
}
