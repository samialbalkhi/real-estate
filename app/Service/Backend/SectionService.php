<?php 
namespace App\Service\Backend;

use App\Models\Section;
use App\helpers\Helpers;
use App\Http\Requests\Backend\SectionRequest;


class SectionService{

    public function index()
    {
        return Section::all();
    }


    public function store(SectionRequest $request): Section 
    {
        return Section::create(['status'=>$request->filled('status')
        ]+$request->validated());
    }


    public function edit(Section $section)
    {
        return $section ;
    }

    public function update(SectionRequest $request, Section $section)
    {
         $section->update(['status'=>$request->filled('status')
         ]+$request->validated());

    }

    public function destroy(Section $section)
    {
        $section->delete();
    }
}