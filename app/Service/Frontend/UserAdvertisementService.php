<?php

namespace App\Service\Frontend;

use App\Traits\ImageUpload;
use App\helpers\ApiResponse;
use App\Models\Advertisement;
use App\Models\AdvertisingPicture;
use App\Http\Requests\backend\AdvertisementRequest;
use App\Http\Resources\Frontend\UserAdvertisement\ShowResource;
use App\Http\Resources\Frontend\UserAdvertisement\IndexResource;

class UserAdvertisementService
{
    use ImageUpload;
    public function index()
    {
        return $this->advertisementsPaginate();
    }

    public function store(AdvertisementRequest $request)
    {
        $validatedData = $request->validated();
        unset($validatedData['listOfImage']);
        $AdvertisementID = Advertisement::create(
            [
                'user_id' => auth()->user()->id,
                'featured' => false,
                'status' => false,
            ] + $validatedData,
        );

        $this->createImage($request, $AdvertisementID);

        return ApiResponse::createSuccessResponse();
    }

    public function show(Advertisement $userAdvertisement)
    {
        return new ShowResource($userAdvertisement);
    }

    public function edit(Advertisement $userAdvertisement)
    {
        return $userAdvertisement;
    }

    public function update(AdvertisementRequest $request, Advertisement $userAdvertisement)
    {
        $userAdvertisement->update(
            [
                'user_id' => auth()->user()->id,
                'featured' => false,
                'status' => false,
            ] + $request->validated(),
        );

        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(Advertisement $userAdvertisement)
    {
         $userAdvertisement->delete();
         return ApiResponse::deleteSuccessResponse();

    }

    private function advertisementsPaginate()
    {
        $advertisements = Advertisement::Active()
            ->where('user_id', auth()->user()->id)
            ->paginate(10);

        return [
            'data' => IndexResource::collection($advertisements),

            'meta' => [
                'total' => $advertisements->total(),
                'current_page' => $advertisements->currentPage(),
                'total_pages' => $advertisements->lastPage(),
            ],
        ];
    }

    private function createImage($request, $advertisementID)
    {
        $AdvertisementID = Advertisement::find($advertisementID->id);

        $image = [];
        for ($i = 0; $i < count($request->listOfImage); $i++) {
            $image = $AdvertisementID->advertisingPictures()->create([
                'image' => $request->file('listOfImage')[$i]['image']->store('image_advertising', 'public'),
            ]);
            $images[] = $image;
        }
    }
}
