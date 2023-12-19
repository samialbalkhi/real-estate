<?php

namespace Database\Factories;

use App\Models\RealEstateCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealEstateCategory>
 */
class RealEstateCategoryFactory extends Factory
{
    protected $model = RealEstateCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'status' => rand(true, false),
        ];
    }
}
