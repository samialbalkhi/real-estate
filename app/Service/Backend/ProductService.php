<?php

namespace App\Service\Backend;

use App\Http\Requests\Backend\ProductRequest;
use App\Models\Product;
use App\Traits\ImageUploadTrait;

class ProductService
{
    use ImageUploadTrait;

    public function index()
    {
        return Product::paginate();
    }

    public function store(ProductRequest $request): Product
    {
        return Product::create([
            'image' => $this->uploadImage('image_product'),

        ] +
            $request->validated());
    }

    public function edit(Product $product)
    {
        return $product;
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->updateImage($product);

        $product->update([
            'image' => $this->uploadImage('image_product'),

        ] +
            $request->validated());
    }

    public function destroy(Product $product)
    {
        $this->deleteImage($product);
        $product->delete();
    }
}
