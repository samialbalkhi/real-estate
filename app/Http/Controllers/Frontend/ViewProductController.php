<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\ViewProductService;

class ViewProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,ViewProductService $viewProductService,Product $product)
    {
        return response()->json($viewProductService->index($product));
        
    }
}
