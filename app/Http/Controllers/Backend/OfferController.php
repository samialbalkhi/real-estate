<?php

namespace App\Http\Controllers\Backend;

use App\helpers\Helpers;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\OfferService;
use App\Http\Requests\Backend\OfferRequest;

class OfferController extends Controller
{
    public function __construct(private OfferService $offerService)
    {
    }

    public function index()
    {
        return response()->json($this->offerService->index());
    }


    public function store(OfferRequest $request)
    {
        return response()->json($this->offerService->store($request));
    }


    public function edit(Offer $offer)
    {
        return response()->json($this->offerService->edit($offer));
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        $this->offerService->update($request, $offer);
        return response()->json(Helpers::updateSuccessResponse());
    }


    public function destroy(Offer $offer)
    {
        
        $this->offerService->destroy($offer);
        return response()->json(Helpers::deleteSuccessResponse());
    }
}
