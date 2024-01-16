<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetProfileUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $totalReviews = $this->reviews->count();
        $totalRating = $this->reviews->sum('rating');

        $averageRating = $totalReviews > 0 ? $totalRating / $totalReviews : 0;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image,
            'phone' => $this->phone,
            'created_at' => $this->created_at->format('m/d/Y'),
            'userAccountTypes' => $this->userAccountTypes->map(function ($userAccountType) {
                return [
                    'account_type' => [
                        'name' => $userAccountType->accountType->name,
                    ],
                ];
            }),
            'averageRating' => $averageRating,
        ];
    }
}
