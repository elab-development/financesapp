<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
    public function definition(): array
    {
        $users = User::all()->pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($users),
            'name' => fake()->word(),
            'type' => fake()->randomElement(['bank', 'cash', 'savings', 'crypto', 'other']),
            'currency' => fake()->randomElement(['RSD', 'EUR']),
            'initial_state' => fake()->randomFloat(2, 0, 10000),
            'current_state' => fake()->randomFloat(2, 0, 10000),
            'active' => fake()->boolean(90),
        ];
    }
}
