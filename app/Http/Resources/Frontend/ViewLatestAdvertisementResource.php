<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ViewLatestAdvertisementResource extends JsonResource
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
            'description' => substr($this->description, 0, 75),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'realEstateType' => [
                'name' => $this->realEstateType->name,
            ],

            'advertisingPictures' => $this->advertisingPictures->map(function ($advertisingPictures) {
                return [
                    'image' => $advertisingPictures->image,
                ];
            }),
        ];
    }
}
