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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image,
            'phone' => $this->phone,
            'created_at' => $this->created_at->format('m/d/Y'),
            'accountTypes' => $this->accountTypes->map(function ($accountType) {
                return [
                    'name' => $accountType->name,
                ];
            }),
        ];
    }
}
