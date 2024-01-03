<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Frontend\UserOrderService;
use App\Http\Requests\Backend\OrderRequest;

class UserOrderController extends Controller
{
    public function __construct(private UserOrderService $userOrderService)
    {
    }

    public function index()
    {
        return $this->userOrderService->index();
    }

    public function show(Order $userOrder)
    {
        return $this->userOrderService->show($userOrder);
    }

    public function store(OrderRequest $request)
    {
        $this->userOrderService->store($request);
        return ApiResponse::createSuccessResponse();
    }

    public function edit(Order $userOrder)
    {
        return $this->userOrderService->edit($userOrder);
    }

    public function update(OrderRequest $request, Order $userOrder)
    {
        $this->userOrderService->update($request, $userOrder);
        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(Order $userOrder)
    {
        $this->userOrderService->destroy($userOrder);
        return ApiResponse::deleteSuccessResponse();
    }
}
