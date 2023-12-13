<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use App\helpers\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\SectionService;
use App\Http\Requests\Backend\SectionRequest;

class SectionController extends Controller
{
public function __construct(private SectionService $sctionService){}

    public function index()
    {
        return response()->json($this->sctionService->index());
    }


    public function store(SectionRequest $request)
    {
        return response()->json($this->sctionService->store($request));
        
    }


    public function edit(Section $section)
    {
        return response()->json($this->sctionService->edit($section));
        
    }

    public function update(SectionRequest $request, Section $section)
    {
       $this->sctionService->update($request,$section);
       return Helpers::updateSuccessResponse();

    }

    public function destroy(Section $section)
    {
         $this->sctionService->destroy($section);
        return Helpers::deleteSuccessResponse();

        
    }
}
