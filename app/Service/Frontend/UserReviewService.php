<?php

namespace App\Service\Frontend;

use App\helpers\ApiResponse;
use App\Http\Requests\Frontend\ReviewRequest;
use App\Models\Review;

class UserReviewService
{
    public function store(ReviewRequest $request)
    {
        if ($this->existsReating($request)) {
            return $this->existsReatingErorr();
        }

        if ($this->existsUser($request)) {
            return $this->existsUserErorr();
        }

        Review::create(['user_id' => auth()->id()]
        + $request->validated());

        return ApiResponse::createSuccessResponse();
    }

    private function existsReating($request)
    {
        return Review::where('user_id', auth()->id())
            ->where('rated_user_id', $request->rated_user_id)
            ->exists();
    }

    private function existsReatingErorr()
    {
        return response()->data(key: 'error',
            message: 'You have already submitted a review for this user.',
            statusCode: 422);
    }

    private function existsUser($request)
    {
        return Review::userExist($request->rated_user_id)->exists();
    }

    private function existsUserErorr()
    {
        return response()->data(key: 'error',
            message: 'You cannot evaluate yourself',
            statusCode: 422);

    }
}
