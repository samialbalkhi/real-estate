<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Service\Frontend\UserAdvertisementService;
use App\Http\Requests\backend\AdvertisementRequest;

class UserAdvertisementController extends Controller
{
    public function __construct(public UserAdvertisementService $userAdvertisementService)
    {
    }

    public function index()
    {
        return response()->json($this->userAdvertisementService->index());
    }

    public function store(AdvertisementRequest $request)
    {
        return response()->json($this->userAdvertisementService->store($request));
    }

    public function show(Advertisement $userAdvertisement)
    {
        return response()->json($this->userAdvertisementService->show($userAdvertisement));
    }

    public function edit(Advertisement $userAdvertisement)
    {
        return response()->json($this->userAdvertisementService->edit($userAdvertisement));
    }

    public function update(AdvertisementRequest $request, Advertisement $userAdvertisement)
    {
        return response()->json($this->userAdvertisementService->update($request, $userAdvertisement));
    }

    public function destroy(Advertisement $userAdvertisement)
    {
        return response()->json($this->userAdvertisementService->destroy($userAdvertisement));

    }
}
