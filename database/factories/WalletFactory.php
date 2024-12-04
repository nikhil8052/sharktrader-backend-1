<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory(1)->create();
        $team = Team::factory(1)->create();

        $user->first()->teams()->attach($team->first()->id,[
           'team_id' => $team->first()->id
        ]);

        return [
            'user_id' => $user->first()->id,
            'amount' => fake()->numberBetween($min = 500, $max = 1000),
            'type' => 'erc',
        ];
    }
}
