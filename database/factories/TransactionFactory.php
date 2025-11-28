<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;
use Illuminate\Support\Str;

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
        $before = fake()->numberBetween(5000, 200000);
        $amount = fake()->numberBetween(500, 20000);
        $type = fake()->randomElement(['credit', 'debit']);
        $after = $type === 'credit' ? ($before + $amount) : ($before - $amount);
        return [
            'account_id' => Account::factory(),
            'reference' => Str::uuid(),
            'type' => $type,
            'category' => fake()->randomElement(['transfer', 'deposit', 'withdrawal', 'fee', 'interest']),
            'amount' => $amount,
            'balance_before' => $before,
            'balance_after' => $after,
            'description' => fake()->sentence(),
            'source_account' => fake()->bankAccountNumber(),
        'destination_account' => fake()->bankAccountNumber(),
        ];
    }
}
