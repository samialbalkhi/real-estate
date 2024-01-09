<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RealEstateCategoryRequest;
use App\Models\RealEstateCategory;
use App\Service\Backend\RealEstateCategoryService;
use Illuminate\Http\Response;

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
        return response()->json(
            $this->realEstateCategoryService->store($request), Response::HTTP_CREATED);
    }

    public function edit(RealEstateCategory $realEstateCategory)
    {
        return response()->json($this->realEstateCategoryService->edit($realEstateCategory));
    }

    public function update(RealEstateCategoryRequest $request, RealEstateCategory $realEstateCategory)
    {
        return response()->json($this->realEstateCategoryService->update($request, $realEstateCategory));
    }

    public function destroy(RealEstateCategory $realEstateCategory)
    {
        return response()->json($this->realEstateCategoryService->destroy($realEstateCategory));
    }
}
