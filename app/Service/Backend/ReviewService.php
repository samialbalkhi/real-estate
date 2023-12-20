<?php

namespace App\Service\Backend;

use Illuminate\Support\Facades\DB;

class ReviewService
{
    public function index()
    {
        return DB::table('reviews')
            ->select(
                'reviewers.id as reviewer_id',
                'reviewers.name as reviewer_name',
                'rated_users.id as rated_user_id',
                'rated_users.name as rated_user_name',
                DB::raw('AVG(reviews.rating) as average_rating')
            )
            ->join('users as reviewers', 'reviewers.id', '=', 'reviews.user_id')
            ->join('users as rated_users', 'rated_users.id', '=', 'reviews.rated_user_id')
            ->groupBy('reviewers.id', 'reviewers.name', 'rated_users.id', 'rated_users.name')
            ->paginate();
    }
}
