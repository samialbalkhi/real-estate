<?php

namespace App\Service\Backend;

use App\Http\Requests\Backend\SectionRequest;
use App\Models\Section;

class SectionService
{
    public function index()
    {
        return Section::all();
    }

    public function store(SectionRequest $request): Section
    {
        return Section::create($request->validated());
    }

    public function edit(Section $section)
    {
        return $section;
    }

    public function update(SectionRequest $request, Section $section)
    {
        $section->update($request->validated());
    }

    public function destroy(Section $section)
    {
        $section->delete();
    }
}
