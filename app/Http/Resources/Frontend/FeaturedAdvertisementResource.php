<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FeaturedAdvertisementResource extends JsonResource
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
            'description' => substr($this->description,0,75),
            'number_of_room' => $this->number_of_room,
            'number_of_hall' => $this->number_of_hall,
            'number_of_bathroom' => $this->number_of_bathroom,
            'floor_number' => $this->floor_number,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'price' => $this->price,
            'space' => $this->space,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'advertisingPictures' => $this->advertisingPictures->map(function ($advertisingPictures) {
                return [
                    'image' => $advertisingPictures->image,
                ];
            }),
            
        ];
    }
}
