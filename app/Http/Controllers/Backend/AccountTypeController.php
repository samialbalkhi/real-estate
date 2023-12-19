<?php

namespace App\Http\Controllers\Backend;

use App\helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AccountTypeRequest;
use App\Models\AccountType;
use App\Service\Backend\AccountTypeService;

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

        return Helpers::createSuccessResponse();
    }

    public function edit(AccountType $accountType)
    {
        return response()->json($this->accountTypeService->edit($accountType));
    }

    public function update(AccountTypeRequest $request, AccountType $accountType)
    {
        $this->accountTypeService->update($request, $accountType);

        return Helpers::updateSuccessResponse();
    }

    public function destroy(AccountType $accountType)
    {
        $this->accountTypeService->destroy($accountType);

        return Helpers::deleteSuccessResponse();
    }
}
