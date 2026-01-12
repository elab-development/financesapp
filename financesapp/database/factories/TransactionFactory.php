<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['inflow', 'outflow']);
        return [
            'wallet_id' => Wallet::factory(),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),

            'type' => $type,
            'amount' => $this->faker->randomFloat(2, 100, 30000),
            'date' => $this->faker->dateTimeBetween('-2 months', 'now')->format('Y-m-d'),
            'description' => $this->faker->optional()->sentence(3),
        ];
    }
}
