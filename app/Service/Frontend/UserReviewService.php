<?php
namespace App\Service\Frontend;

use App\helpers\ApiResponse;
use App\Http\Requests\Frontend\ReviewRequest;
use App\Models\Review;

class UserReviewService
{
    public function store(ReviewRequest $request)
    {
        if ($this->existsReating($request)) 
        
        return $this->erorrResponse() ;

        Review::create([
            'rating' => $request->rating,
            'user_id' => auth()->user()->id,
            'rated_user_id' => $request->rated_user_id,
        ]);

        return ApiResponse::createSuccessResponse();
    }

    private function existsReating($request)
    {
        return Review::where('user_id', auth()->user()->id)
            ->where('rated_user_id', $request->rated_user_id)
            ->exists();
    }

    public function erorrResponse()
    {
        return response()->data(key: 'error',
         message: 'You have already submitted a review for this user.',
          statusCode: 422);
    }
}
