<?php

namespace App\Service\Backend;

use App\helpers\ApiResponse;
use App\Http\Requests\Backend\OfferRequest;
use App\Models\Offer;
use App\Traits\ImageUpload;

class OfferService
{
    use ImageUpload;

    public function index()
    {
        return Offer::paginate();
    }

    public function store(OfferRequest $request)
    {
        Offer::create(
            [
                'image' => $this->uploadImage('image_offer'),
            ] + $request->validated(),
        );

        return ApiResponse::createSuccessResponse();
    }

    public function edit(Offer $offer)
    {
        return $offer;
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        $this->updateImage($offer);

        $offer->update(
            [
                'image' => $this->uploadImage('image_offer'),
            ] + $request->validated(),
        );
        
        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(Offer $offer)
    {
        $this->deleteImage($offer);
        $offer->delete();

        return ApiResponse::deleteSuccessResponse();
    }
}
