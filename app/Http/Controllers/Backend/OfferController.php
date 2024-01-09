<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\OfferRequest;
use App\Models\Offer;
use App\Service\Backend\OfferService;
use Illuminate\Http\Response;

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
        return response()->json(
            $this->offerService->store($request), Response::HTTP_CREATED);

    }

    public function edit(Offer $offer)
    {
        return response()->json($this->offerService->edit($offer));
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        return response()->json($this->offerService->update($request, $offer));

    }

    public function destroy(Offer $offer)
    {

        return response()->json($this->offerService->destroy($offer));

    }
}
