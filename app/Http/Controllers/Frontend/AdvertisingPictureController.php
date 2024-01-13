<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\AdvertisingPicture;
use App\Http\Controllers\Controller;
use App\Service\Frontend\AdvertisingPictureService;
use App\Http\Requests\Frontend\AdvertisingPictureRequest;

class AdvertisingPictureController extends Controller
{
    public function __construct(private AdvertisingPictureService $advertisingPictureService)
    {
    }
    public function edit(AdvertisingPicture $advertisingPicture)
    {
        return response()->json($this->advertisingPictureService->edit($advertisingPicture));
    }

    public function update(AdvertisingPictureRequest $request, AdvertisingPicture $advertisingPicture)
    {
        return response()->json($this->advertisingPictureService->update($request, $advertisingPicture));
    }

    public function destroy(AdvertisingPicture $advertisingPicture)
    {
        return response()->json($this->advertisingPictureService->destroy($advertisingPicture));
    }
}
