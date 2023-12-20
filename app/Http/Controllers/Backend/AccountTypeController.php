<?php

namespace App\Http\Controllers\Backend;

use App\Models\AccountType;
use App\helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Service\Backend\AccountTypeService;
use App\Http\Requests\Backend\AccountTypeRequest;

class AccountTypeController extends Controller
{
    public function __construct(private AccountTypeService $accountTypeService)
    {
    }

    public function index()
    {
        return response()->json($this->accountTypeService->index());
    }

    public function store(AccountTypeRequest $request)
    {
        $this->accountTypeService->store($request);

        return ApiResponse::createSuccessResponse();
    }

    public function edit(AccountType $accountType)
    {
        return response()->json($this->accountTypeService->edit($accountType));
    }

    public function update(AccountTypeRequest $request, AccountType $accountType)
    {
        $this->accountTypeService->update($request, $accountType);

        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(AccountType $accountType)
    {
        $this->accountTypeService->destroy($accountType);

        return ApiResponse::deleteSuccessResponse();
    }
}
