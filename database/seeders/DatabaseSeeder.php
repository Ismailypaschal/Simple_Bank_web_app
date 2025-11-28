<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Loan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Users
        User::factory(10)->create();

        // Loans
        Loan::factory(10)->create();

        // Accounts (each attached to a random user + random bank)
        Account::factory(20)->create();

        // Transactions (each attached to a random account)
        Transaction::factory(50)->create();
    }
}
