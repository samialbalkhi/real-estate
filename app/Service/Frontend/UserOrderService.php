<?php

namespace App\Service\Frontend;

use App\helpers\ApiResponse;
use App\Http\Requests\Backend\OrderRequest;
use App\Models\Order;

class UserOrderService
{
    public function index()
    {
        return Order::with('realEstateType:id,name', 'realEstateCategory:id,name')
            ->where('user_id', auth()->id())
            ->get(['id', 'lat', 'lng', 'highest_price', 'lowest_price', 'highest_space', 'lowest_space', 'real_estate_type_id', 'real_estate_category_id', 'created_at']);
    }

    public function show(Order $userOrder)
    {
        return Order::with('realEstateType:id,name', 'realEstateCategory:id,name')
            ->select('id', 'lat', 'lng',
                'highest_price', 'lowest_price',
                'highest_space', 'lowest_space',
                'real_estate_category_id',
                'real_estate_type_id', 'created_at')->find($userOrder->id);
    }

    public function store(OrderRequest $request)
    {
        Order::create(['user_id' => auth()->id()] + $request->validated());

        return ApiResponse::createSuccessResponse();
    }

    public function edit(Order $userOrder)
    {
        return Order::with('realEstateType:id,name', 'realEstateCategory:id,name')
            ->select('id', 'lat', 'lng',
                'highest_price', 'lowest_price',
                'highest_space', 'lowest_space',
                'real_estate_category_id',
                'real_estate_type_id', 'created_at')->find($userOrder->id);
    }

    public function update(OrderRequest $request, Order $userOrder)
    {
        $userOrder->update(['user_id' => auth()->id()] + $request->validated());

        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return ApiResponse::deleteSuccessResponse();

    }
}
