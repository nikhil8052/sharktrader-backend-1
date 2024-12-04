<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shark>
 */
class SharkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'cost' => fake()->numberBetween($min = 1, $max = 100),
            'duration' => fake()->numberBetween($min = 1, $max = 5),
            'percentage' => fake()->numberBetween($min = 1, $max = 10),
            'status' => true,
        ];
    }
}
