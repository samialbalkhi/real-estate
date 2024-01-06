<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\UserReviewService;
use App\Http\Requests\Frontend\ReviewRequest;

class UserReviewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ReviewRequest $request, UserReviewService $userReviewService)
    {
        return $userReviewService->store($request);
    }
}
