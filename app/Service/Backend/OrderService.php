<?php

namespace App\Service\Backend;

use App\Models\Order;

class OrderService
{
    public function index()
    {
        return Order::paginate();
    }

    public function show(Order $order)
    {
        return $order;
    }
}
