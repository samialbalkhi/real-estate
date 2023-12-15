<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Backend\RealEstateTypeService;

class RealEstateTypeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,RealEstateTypeService $realEstateTypeService)
    {
        return response()->json($realEstateTypeService->index());
    }
}
