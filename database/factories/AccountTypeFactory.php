<?php

namespace Database\Factories;

use App\Models\AccountType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountType>
 */
class AccountTypeFactory extends Factory
{

    protected $model = AccountType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'image' => 'C:/Users/User/Pictures/، 𝔭𝔧𝔪𝔠𝔞𝔣𝔢.jpg',
            'status' => rand(true, false),
            'user_id' => rand(1,10),

        ];
    }
}
