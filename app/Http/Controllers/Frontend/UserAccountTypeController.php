<?php

namespace App\Http\Controllers\Frontend;

use App\Models\AccountType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\UserAccountTypeServeice;
use App\Http\Requests\Frontend\UserAccountTypeRequest;

class UserAccountTypeController extends Controller
{
    public function __construct(private UserAccountTypeServeice $userAccountTypeServeice)
    {
    }
    public function index()
    {
        return response()->json($this->userAccountTypeServeice->index());
    }

    public function store(UserAccountTypeRequest $request)
    {
        return response()->json($this->userAccountTypeServeice->store($request));
    }
}
