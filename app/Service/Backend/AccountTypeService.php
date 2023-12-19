<?php

namespace App\Service\Backend;

use App\Http\Requests\Backend\AccountTypeRequest;
use App\Models\AccountType;
use App\Traits\ImageUploadTrait;

class AccountTypeService
{
    use ImageUploadTrait;

    public function index()
    {
        return AccountType::all();
    }

    public function store(AccountTypeRequest $request): AccountType
    {
        return AccountType::create(
            [
                'image' => $this->uploadImage('account_type'),
                'user_id' => auth()->user()->id,
            ] + $request->validated()
        );
    }

    public function edit(AccountType $accountType)
    {
        return $accountType;
    }

    public function update(AccountTypeRequest $request, AccountType $accountType)
    {
        $this->updateImage($accountType);

        $accountType->update(
            [
                'image' => $this->uploadImage('account_type'),
                'user_id' => auth()->user()->id,
            ] + $request->validated()
        );
    }

    public function destroy(AccountType $accountType)
    {
        $this->deleteImage($accountType);

        $accountType->delete();
    }
}
