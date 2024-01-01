<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\Frontend\ShowProductSevice;

class ShowProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ShowProductSevice $showProductSevice, Product $product)
    {
        return response()->json($showProductSevice->show($product));
    }
}
