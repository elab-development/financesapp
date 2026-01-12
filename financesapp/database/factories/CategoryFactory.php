<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['inflow', 'outflow']);

        $inflows = ['Sallary', 'Hobby', 'Freelance', 'Gift', 'Scholarship'];
        $outflows = ['Food', 'Drinks', 'Transit', 'Rent', 'Dates', 'Retail'];

        return [
            'user_id' => User::factory(),
            'name' => $type === 'inflow'
                ? $this->faker->randomElement($inflows)
                : $this->faker->randomElement($outflows),
            'type' => $type,
            'parent_id' => null,
            'active' => true,
        ];
    }
}
