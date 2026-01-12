<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use App\Models\Wallet;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transfer>
 */
class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'wallet_fromid' => Wallet::factory(),
            'wallet_inid' => Wallet::factory(),
            'user_id' => User::factory(),
            'amount' => $this->faker->randomFloat(2, 100, 30000),
            'currency' => $this->faker->randomElement(['RSD', 'EUR']),
            'comission' => $this->faker->randomFloat(2, 0, 100),
            'date' => $this->faker->dateTimeBetween('-2 months', 'now')->format('Y-m-d'),
            'description' => $this->faker->optional()->sentence(3),
        ];
    }
}
