<?php

namespace App\Service\Backend;

use App\Models\Offer;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\OfferRequest;

class OfferService
{
    use ImageUploadTrait;

    public function index()
    {
        return Offer::paginate();
    }

    public function store(OfferRequest $request): Offer
    {

        return Offer::create([
            'name' => $request->name,
            'image' => $this->uploadImage('image_offer'),
            'status' => $request->filled('status')
        ]);
    }

    public function edit(Offer $offer)
    {
        return $offer;
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        $this->updateImage('image_offer');

        return $offer->update([
            'name' => $request->name,
            'image' => $this->uploadImage('image_offer'),
            'status' => $request->filled('status')
        ]);
    }


    public function destroy(Offer $offer)
    {
     
        $this->deleteImage($offer->image);
         $offer->delete();
    }
}
