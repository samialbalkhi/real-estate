<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Frontend\MapPageContentService;
use Illuminate\Http\Request;

class ViewCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, MapPageContentService $mapPageContentService)
    {
        return response()->json($mapPageContentService->viewCategory());
    }
}
