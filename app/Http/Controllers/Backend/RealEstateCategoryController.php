<?php

namespace App\Http\Controllers\Backend;

use App\helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RealEstateCategoryRequest;
use App\Models\RealEstateCategory;
use App\Service\Backend\RealEstateCategoryService;

class RealEstateCategoryController extends Controller
{
    public function __construct(private RealEstateCategoryService $realEstateCategoryService)
    {
    }

    public function index()
    {
        return response()->json($this->realEstateCategoryService->index());
    }

    public function store(RealEstateCategoryRequest $request)
    {
        $this->realEstateCategoryService->store($request);

        return Helpers::createSuccessResponse();
    }

    public function edit(RealEstateCategory $realEstateCategory)
    {
        return response()->json($this->realEstateCategoryService->edit($realEstateCategory));
    }

    public function update(RealEstateCategoryRequest $request, RealEstateCategory $realEstateCategory)
    {
        $this->realEstateCategoryService->update($request, $realEstateCategory);

        return Helpers::updateSuccessResponse();
    }

    public function destroy(RealEstateCategory $realEstateCategory)
    {
        $this->realEstateCategoryService->destroy($realEstateCategory);

        return Helpers::deleteSuccessResponse();
    }
}
