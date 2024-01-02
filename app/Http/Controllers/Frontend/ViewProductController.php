<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\Frontend\ViewProductService;
use Illuminate\Http\Request;

class ViewProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ViewProductService $viewProductService, Product $product)
    {
        return response()->json($viewProductService->index($product));

    }
}
