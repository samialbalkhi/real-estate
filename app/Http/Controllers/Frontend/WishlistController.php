<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\WishlistService;

class WishlistController extends Controller
{
    public function __construct(private WishlistService $wishlistService)
    {
        
    }
    public function store(Request $request){
        return response()->json($this->wishlistService->store($request));
    }

    public function  numberOfProduct()
    {
        return $this->wishlistService->numberOfProduct();
    }
    public function  show()
    {
        return $this->wishlistService->show();
    }
  
    public function  delete($rowId)
    {
        return $this->wishlistService->delete($rowId);
    }
}
