<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ReviewRequest;
use App\Service\Frontend\UserReviewService;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ReviewRequest $request, UserReviewService $userReviewService)
    {
        return response()->json($userReviewService->store($request));
    }
}
