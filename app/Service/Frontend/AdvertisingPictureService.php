<?php
namespace App\Service\Frontend;

use App\helpers\ApiResponse;
use App\Models\AdvertisingPicture;
use App\Http\Requests\Frontend\AdvertisingPictureRequest;
use App\Traits\ImageUpload;

class AdvertisingPictureService
{
    use ImageUpload;
    public function edit(AdvertisingPicture $advertisingPicture)
    {
        return AdvertisingPicture::where('advertisement_id', $advertisingPicture->id)->get();
    }

    public function update(AdvertisingPictureRequest $request, AdvertisingPicture $advertisingPicture)
    {
        $this->updateImage($advertisingPicture);
        $advertisingPicture->update([
            'image' => $this->uploadImage('image_advertising'),
            'advertisement_id' => $advertisingPicture->advertisement_id,
        ]);
        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(AdvertisingPicture $advertisingPicture)
    {
        $advertisingPicture->delete();
        $this->deleteImage($advertisingPicture);
        return ApiResponse::deleteSuccessResponse();
    }
}
