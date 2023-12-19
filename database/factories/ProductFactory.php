<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->image(),
            'location' => $this->faker->country(),
            'description' => $this->faker->paragraph(),
            'price' => rand(100, 1000),
            'status' => rand(false, true),
            'offer_id' => rand(1, 20),
        ];
    }
}
