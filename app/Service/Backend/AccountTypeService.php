<?php

namespace App\Service\Backend;

use App\Models\AccountType;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\Backend\AccountTypeRequest;

class AccountTypeService
{

    use ImageUploadTrait;

    public function index()
    {
        return AccountType::all();
    }

    public function store(AccountTypeRequest $request): AccountType
    {
        return AccountType::create([
            'name' => $request->name,
            'image' => $this->uploadImage('account_type'),
            'status' => $request->filled('status'),
            'user_id' => auth()->user()->id

        ]);
    }

    public function edit(AccountType $accountType)
    {
        return $accountType;
    }

    public function update(AccountTypeRequest $request, AccountType $accountType)
    {
        $this->updateImage($accountType);

        return $accountType->update([
            'name' => $request->name,
            'image' => $this->uploadImage('account_type'),
            'status' => $request->filled('status'),
            'user_id' => auth()->user()->id

        ]);
    }

    public function destroy(AccountType $accountType)
    {
        $this->deleteImage($accountType);

        $accountType->delete();
    }
}
