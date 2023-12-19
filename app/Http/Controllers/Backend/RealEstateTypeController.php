<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Service\Backend\RealEstateTypeService;
use Illuminate\Http\Request;

class RealEstateTypeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, RealEstateTypeService $realEstateTypeService)
    {
        return response()->json($realEstateTypeService->index());
    }
}
