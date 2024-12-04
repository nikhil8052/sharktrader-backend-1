<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuantTrade>
 */
class QuantTradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'duration' => fake()->numberBetween($min = 1, $max = 10),
            'price' => fake()->numberBetween($min = 10, $max = 50),
        ];
    }
}
