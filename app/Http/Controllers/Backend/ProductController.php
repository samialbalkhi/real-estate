<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Product;
use App\Service\Backend\ProductService;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {
    }

    public function index()
    {
        return response()->json($this->productService->index());
    }

    public function store(ProductRequest $request)
    {
        return response()->json(
            $this->productService->store($request), Response::HTTP_CREATED);

    }

    public function edit(Product $product)
    {
        return response()->json($this->productService->edit($product));
    }

    public function update(ProductRequest $request, Product $product)
    {
        return response()->json($this->productService->update($request, $product));

    }

    public function destroy(Product $product)
    {
        return response()->json($this->productService->destroy($product));

    }
}
