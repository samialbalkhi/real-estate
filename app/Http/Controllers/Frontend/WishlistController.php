<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Frontend\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct(private WishlistService $wishlistService)
    {

    }

    public function store(Request $request)
    {
        return response()->json($this->wishlistService->store($request));
    }

    public function numberOfAdvertisement()
    {
        return $this->wishlistService->numberOfAdvertisement();
    }

    public function index()
    {
        return $this->wishlistService->index();
    }

    public function delete($rowId)
    {
        return $this->wishlistService->delete($rowId);
    }
}
