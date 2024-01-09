<?php

namespace App\Service\Backend;

use App\helpers\ApiResponse;
use App\Http\Requests\Backend\RealEstateCategoryRequest;
use App\Models\RealEstateCategory;

class RealEstateCategoryService
{
    public function index()
    {
        return RealEstateCategory::paginate();
    }

    public function store(RealEstateCategoryRequest $request)
    {
        RealEstateCategory::create($request->validated());

        return ApiResponse::createSuccessResponse();
    }

    public function edit(RealEstateCategory $realEstateCategory)
    {
        return $realEstateCategory;
    }

    public function update(RealEstateCategoryRequest $request, RealEstateCategory $realEstateCategory)
    {
        $realEstateCategory->update($request->validated());

        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(RealEstateCategory $realEstateCategory)
    {
        $realEstateCategory->delete();

        return ApiResponse::deleteSuccessResponse();
    }
}
