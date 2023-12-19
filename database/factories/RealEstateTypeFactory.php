<?php

namespace Database\Factories;

use App\Models\RealEstateType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealEstateType>
 */
class RealEstateTypeFactory extends Factory
{
    protected $model = RealEstateType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['housing', 'Rent']),
        ];
    }
}
