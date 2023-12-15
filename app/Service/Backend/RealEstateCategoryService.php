<?php

namespace App\Service\Backend;

use App\Models\RealEstateCategory;
use App\Http\Requests\Backend\RealEstateCategoryRequest;

class RealEstateCategoryService
{

    public function index()
    {
        return RealEstateCategory::paginate();
    }


    public function store(RealEstateCategoryRequest $request): RealEstateCategory
    {
        return RealEstateCategory::create([
            'name' => $request->name,
            'status' => $request->filled('status')
        ]);
    }


    public function edit(RealEstateCategory $realEstateCategory)
    {
        return $realEstateCategory;
    }

    public function update(RealEstateCategoryRequest $request, RealEstateCategory $realEstateCategory)
    {
        return $realEstateCategory->update([
            'name' => $request->name,
            'status' => $request->filled('status')
        ]);
    }

    public function destroy(RealEstateCategory $realEstateCategory)
    {
        return $realEstateCategory->delete();
    }
}
