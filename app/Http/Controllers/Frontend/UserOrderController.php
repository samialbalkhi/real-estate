<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\OrderRequest;
use App\Models\Order;
use App\Service\Frontend\UserOrderService;
use Illuminate\Http\Response;

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
        return response()->json(
            $this->userOrderService->store($request), Response::HTTP_CREATED);
    }

    public function edit(Order $userOrder)
    {
        return $this->userOrderService->edit($userOrder);
    }

    public function update(OrderRequest $request, Order $userOrder)
    {
        return response()->json($this->userOrderService->update($request, $userOrder));
    }

    public function destroy(Order $userOrder)
    {
        return response()->json($this->userOrderService->destroy($userOrder));
    }
}
