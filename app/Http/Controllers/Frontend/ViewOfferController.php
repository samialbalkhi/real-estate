<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ViewOfferService;

class ViewOfferController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ViewOfferService $viewOfferService)
    {
        return response()->json($viewOfferService->index());
    }
}
