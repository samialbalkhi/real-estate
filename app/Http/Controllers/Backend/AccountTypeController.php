<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AccountTypeRequest;
use App\Models\AccountType;
use App\Service\Backend\AccountTypeService;
use Illuminate\Http\Response;

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
        return response()->json(
            $this->accountTypeService->store($request), Response::HTTP_CREATED);
    }

    public function edit(AccountType $accountType)
    {
        return response()->json($this->accountTypeService->edit($accountType));
    }

    public function update(AccountTypeRequest $request, AccountType $accountType)
    {
        return response()->json($this->accountTypeService->update($request, $accountType));
    }

    public function destroy(AccountType $accountType)
    {
        return response()->json($this->accountTypeService->destroy($accountType));
    }
}
