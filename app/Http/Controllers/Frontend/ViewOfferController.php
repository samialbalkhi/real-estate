<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Frontend\ViewOfferService;
use Illuminate\Http\Request;

class ViewOfferController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ViewOfferService $viewOfferService)
    {
        return response()->json($viewOfferService->index());
    }
}
