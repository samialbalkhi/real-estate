<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Backend\OrderService;

class OrderController extends Controller
{
    public function  __construct(private OrderService $orderService)
    {
        
    }
    public function index()
    {
        return response()->json($this->orderService->index());
    }

    public function show(Order $order)
    {
        return response()->json($this->orderService->show($order));
        
    }
}
