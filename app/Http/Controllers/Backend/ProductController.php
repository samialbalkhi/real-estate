<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Service\Backend\ProductService;
use App\Http\Requests\Backend\ProductRequest;

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
        $this->productService->store($request);

        return ApiResponse::createSuccessResponse();
    }

    public function edit(Product $product)
    {
        return response()->json($this->productService->edit($product));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->productService->update($request, $product);

        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(Product $product)
    {
        $this->productService->destroy($product);

        return ApiResponse::deleteSuccessResponse();
    }
}
