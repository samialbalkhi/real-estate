<?php

namespace App\Service\Backend;

use App\Http\Requests\Backend\RealEstateCategoryRequest;
use App\Models\RealEstateCategory;

class RealEstateCategoryService
{
    public function index()
    {
        return RealEstateCategory::paginate();
    }

    public function store(RealEstateCategoryRequest $request): RealEstateCategory
    {
        return RealEstateCategory::create($request->validated());
    }

    public function edit(RealEstateCategory $realEstateCategory)
    {
        return $realEstateCategory;
    }

    public function update(RealEstateCategoryRequest $request, RealEstateCategory $realEstateCategory)
    {
        $realEstateCategory->update($request->validated());
    }

    public function destroy(RealEstateCategory $realEstateCategory)
    {
        $realEstateCategory->delete();
    }
}
