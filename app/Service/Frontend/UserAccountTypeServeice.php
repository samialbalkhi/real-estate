<?php
namespace App\Service\Frontend;

use App\Models\AccountType;
use App\helpers\ApiResponse;
use App\Models\UserAccountType;
use App\Http\Requests\Frontend\UserAccountTypeRequest;
use App\Models\UserAccountType as ModelsUserAccountType;

class UserAccountTypeServeice
{
    public function index()
    {
        return AccountType::Active()->get(['id', 'name']);
    }

    public function store(UserAccountTypeRequest $request)
    {
        UserAccountType::create(['user_id' => auth()->id()] + $request->validated());
        return ApiResponse::createSuccessResponse();
    }
}
