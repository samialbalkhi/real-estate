<?php

namespace App\Service\Frontend;

use App\Models\Product;

class ViewProductService
{
    public function index(Product $product)
    {
        return Product::with('offer:id,name')->Active()
            ->select('id', 'name', 'image', 'offer_id', 'product_discount')
            ->where('offer_id', $product->id)
            ->get();
    }
}
