<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Frontend\ViewHomepageService;
use Illuminate\Http\Request;

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
