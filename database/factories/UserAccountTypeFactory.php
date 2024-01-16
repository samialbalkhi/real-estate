<?php

namespace Database\Factories;

use App\Models\UserAccountType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAccountType>
 */
class UserAccountTypeFactory extends Factory
{
    protected $model = UserAccountType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 20),
            'account_type_id' => rand(1, 5),
        ];
    }
}
