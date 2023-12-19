<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Service\Backend\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ReviewService $reviewService)
    {

        return response()->json($reviewService->index());
    }
}
