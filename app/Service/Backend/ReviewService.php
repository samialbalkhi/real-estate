<?php

namespace App\Service\Backend;

use Illuminate\Support\Facades\DB;

class ReviewService
{
    public function index()
    {
        return DB::table('reviews')
            ->select('users.id', 'users.name', DB::raw('AVG(reviews.rating) as average_rating'))
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->groupBy('users.id', 'users.name')
            ->paginate();
    }
}
