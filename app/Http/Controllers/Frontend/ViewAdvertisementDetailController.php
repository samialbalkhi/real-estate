<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Service\Frontend\ViewAdvertisementDetailService;

class ViewAdvertisementDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ViewAdvertisementDetailService $viewAdvertisementDetailService,Advertisement $advertisement)
    {
        return response()->json(
            $viewAdvertisementDetailService->ViewAdvertisementDetail($advertisement));
    }
}
