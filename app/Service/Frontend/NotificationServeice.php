<?php

namespace App\Service\Frontend;

use App\Models\Advertisement;
use App\Models\Order;

class NotificationServeice
{
    public function store()
    {
        $advertisements = $this->verifyTheAdvertisement();
        $orders = $this->verifyTheOrder();
        $notifications = [];

        foreach ($orders as $order) {
            foreach ($advertisements as $advertisement) {
                if ($this->advertisementMatchesOrder($advertisement, $order) && $this->isOwnerAuthenticated($order)) {
                    $this->sendNotificationToOwner($order->user, 'New alert: One of your requests has become available!');
                    $notifications[] = 'New alert: One of your requests has become available!';
                }
            }
        }

        return [
            'message' => 'Request processed successfully',
            'notifications' => $notifications,
        ];

    }

    private function verifyTheOrder()
    {
        return Order::with('realEstateType:id,name',
            'realEstateCategory:id,name', 'user:id,name')->get([
                'lat', 'lng', 'highest_price', 'lowest_price',
                'highest_space', 'lowest_space', 'real_estate_type_id',
                'real_estate_category_id', 'user_id']);
    }

    private function verifyTheAdvertisement()
    {
        return Advertisement::with('realEstateType:id,name',
            'realEstateCategory:id,name')->get([
                'lat', 'lng', 'price', 'space',
                'real_estate_type_id', 'real_estate_category_id',
            ]);
    }

    private function advertisementMatchesOrder($advertisement, $order)
    {
        return $advertisement->lat == $order->lat &&
        $advertisement->lng == $order->lng &&
        $advertisement->price <= $order->highest_price &&
        $advertisement->price >= $order->lowest_price &&
        $advertisement->space <= $order->highest_space &&
        $advertisement->space >= $order->lowest_space &&
        $advertisement->real_estate_type_id == $order->real_estate_type_id &&
        $advertisement->real_estate_category_id == $order->real_estate_category_id;
    }

    private function isOwnerAuthenticated($order)
    {
        return auth()->check() && $order->user && auth()->user()->id == $order->user->id;
    }

    private function sendNotificationToOwner($user, $message)
    {
        if ($this->isOwnerAuthenticated($user)) {
            notify()->success($message);
        }
    }
}
