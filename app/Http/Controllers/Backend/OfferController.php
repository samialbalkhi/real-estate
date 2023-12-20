<?php

namespace App\Http\Controllers\Backend;

use App\helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\OfferRequest;
use App\Models\Offer;
use App\Service\Backend\OfferService;

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
        $this->offerService->store($request);

        return ApiResponse::createSuccessResponse();
    }

    public function edit(Offer $offer)
    {
        return response()->json($this->offerService->edit($offer));
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        $this->offerService->update($request, $offer);

        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(Offer $offer)
    {

        $this->offerService->destroy($offer);

        return ApiResponse::deleteSuccessResponse();
    }
}
