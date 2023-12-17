<?php

namespace Database\Factories;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    protected $model = Advertisement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->paragraph(),
            'width_street' => $this->faker->randomNumber(),
            'number_of_room' => $this->faker->randomNumber(),
            'number_of_hall' => $this->faker->randomNumber(),
            'number_of_bathroom' => $this->faker->randomNumber(),
            'floor_number' => $this->faker->randomNumber(),
            'number_of_people' => $this->faker->randomNumber(),
            'age_of_real_estate' => $this->faker->date(),
            'rental_period' => 'years',
            'lat' => '40.731',
            'lng' => '-73.997',
            'price' => $this->faker->numberBetween(1000, 2000),
            'space' => $this->faker->numberBetween(100, 2000),
            'status' => false,
            'featured' => false,
            'user_id' => rand(1, 10),
        ];
    }
}
