<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    protected $model = \App\Models\Loan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'amount' => fake()->randomFloat(2, 1000, 10000),
            'interest_rate' => fake()->randomFloat(2, 1, 15),
            'duration_months' => fake()->numberBetween(6, 60),
            'monthly_payment' => fake()->randomFloat(2, 100, 500),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected', 'completed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
