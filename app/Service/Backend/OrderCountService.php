<?php

namespace App\Service\Backend;

use App\Models\Order;

class OrderCountService
{
    public function orderCount()
    {
        return ['order_count' => Order::count()];
    }
}
