<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\MapPageContentService;

class ViewCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,MapPageContentService $mapPageContentService)
    {
        return response()->json($mapPageContentService->viewCategory());
    }
}
