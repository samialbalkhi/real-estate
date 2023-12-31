<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ViewHomepageService;

class ViewHomepageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ViewHomepageService $viewHomepageService)
    {
        return response()->json($viewHomepageService->index());
    }
}
