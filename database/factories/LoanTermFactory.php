<?php

namespace Database\Factories;

use App\Models\LoanTerm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoanTerm>
 */
class LoanTermFactory extends Factory
{
    protected $model = LoanTerm::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'loan_time' => $this->faker->numberBetween(1, 30),
        ];
    }
}
