<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => User::factory(),
            // "account_number" => fake()->unique()->bankAccountNumber(),
            'account_number' => fake()->numerify('##########'), // 10 digits
            "account_type" => fake()->randomElement(['savings', 'current', 'checking', 'investment']),
            "currency" => "NGN",
            "balance" => fake()->numberBetween(10000, 500000),
            'status' => "active",
        ];
    }
}
