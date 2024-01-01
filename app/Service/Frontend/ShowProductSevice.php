<?php

namespace App\Service\Frontend;

use App\Models\Product;

class ShowProductSevice
{
    public function show(Product $product)
    {
        if ($product->product_discount > 0) {
            $subtotal = ($product->price * $product->product_discount) / 100;

            return [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'location' => $product->location,
                'description' => $product->description,
                'price' => $product->price,
                'product_discount' => $product->product_discount,
                'subtotal' => $subtotal,
            ];
        }

        return $product->only(['id', 'name', 'image', 
        'location', 'description', 
        'price', 'product_discount']);
    }   
}
