<?php

namespace App\Http\Controllers\Backend;

use App\helpers\Helpers;
use Illuminate\Http\Request;
use App\Models\RealEstateCategory;
use App\Http\Controllers\Controller;
use App\Service\Backend\RealEstateCategoryService;
use App\Http\Requests\Backend\RealEstateCategoryRequest;

class RealEstateCategoryController extends Controller
{
  public function __construct(private RealEstateCategoryService $realEstateCategoryService){}
  
  
    public function index()
    {
        return response()->json($this->realEstateCategoryService->index());
    }

  
    public function store(RealEstateCategoryRequest $request)
    {
        return response()->json($this->realEstateCategoryService->store($request));
    
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
