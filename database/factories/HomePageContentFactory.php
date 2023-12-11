<?php

namespace Database\Factories;

use App\Models\HomePageContent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomePageContent>
 */
class HomePageContentFactory extends Factory
{
    protected $model = HomePageContent::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'description' => $this->faker->paragraph,
            'image' => 'C:/Users/User/Pictures/، 𝔭𝔧𝔪𝔠𝔞𝔣𝔢.jpg',
        ];
    }
}
