<?php

namespace App\Http\Resources\Frontend\UserAdvertisement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ShowResource extends JsonResource
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
            'description' => $this->description,
            'width_street' => $this->width_street,
            'number_of_room' => $this->number_of_room,
            'number_of_hall' => $this->number_of_hall,
            'number_of_bathroom' => $this->number_of_bathroom,
            'floor_number' => $this->floor_number,
            'rental_period' => $this->rental_period,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'price' => $this->price,
            'space' => $this->space,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'user' => [
                'name' => $this->user->name,
                'phone' => $this->user->phone,
            ],
            'realEstateType' => [
                'name' => $this->realEstateType->name,
            ],
            'realEstateCategory' => [
                'name' => $this->realEstateCategory->name,
            ],

            'advertisingPictures' => $this->advertisingPictures->map(function ($advertisingPictures) {
                return [
                    'image' => $advertisingPictures->image,
                ];
            }),
            'viewsCount' => $this->views()->count(),
        ];
    }
}
