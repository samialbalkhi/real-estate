<?php

namespace App\Http\Controllers\Backend;

use App\helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SectionRequest;
use App\Models\Section;
use App\Service\Backend\SectionService;

class SectionController extends Controller
{
    public function __construct(private SectionService $sctionService)
    {
    }

    public function index()
    {
        return response()->json($this->sctionService->index());
    }

    public function store(SectionRequest $request)
    {
        $this->sctionService->store($request);

        return ApiResponse::createSuccessResponse();

    }

    public function edit(Section $section)
    {
        return response()->json($this->sctionService->edit($section));

    }

    public function update(SectionRequest $request, Section $section)
    {
        $this->sctionService->update($request, $section);

        return ApiResponse::updateSuccessResponse();

    }

    public function destroy(Section $section)
    {
        $this->sctionService->destroy($section);

        return ApiResponse::deleteSuccessResponse();

    }
}
