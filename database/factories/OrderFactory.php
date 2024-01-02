<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lat' => '40.731',
            'lng' => '-73.997',
            'highest_price' => '10000',
            'lowest_price' => '1000',
            'highest_space' => '150',
            'lowest_space' => '100',
            'real_estate_type_id' => rand(1, 2),
            'user_id' => rand(1, 10),
            'real_estate_category_id' => rand(1, 10),
        ];
    }
}
