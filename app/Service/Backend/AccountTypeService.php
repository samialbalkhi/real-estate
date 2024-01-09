<?php

namespace App\Service\Backend;

use App\helpers\ApiResponse;
use App\Http\Requests\Backend\AccountTypeRequest;
use App\Models\AccountType;
use App\Traits\ImageUpload;

class AccountTypeService
{
    use ImageUpload;

    public function index()
    {
        return AccountType::all();
    }

    public function store(AccountTypeRequest $request)
    {
        AccountType::create(
            [
                'image' => $this->uploadImage('account_type'),
                'user_id' => auth()->user()->id,
            ] + $request->validated(),
        );

        return ApiResponse::createSuccessResponse();
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
            ] + $request->validated(),
        );

        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(AccountType $accountType)
    {
        $this->deleteImage($accountType);
        $accountType->delete();

        return ApiResponse::deleteSuccessResponse();
    }
}
