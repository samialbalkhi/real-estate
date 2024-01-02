<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Frontend\ViewSectionService;
use Illuminate\Http\Request;

class ViewSectionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ViewSectionService $viewSectionService)
    {
        return response()->json(
            $viewSectionService->viewSection());
    }
}
