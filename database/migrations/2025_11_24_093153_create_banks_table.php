<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Account;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Account table
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('account_number', 10)->unique();
            $table->enum('account_type', ['savings', 'current', 'checking', 'investment']);
            $table->string('currency');
            $table->enum('status', ['active', 'suspended', 'close']);
            $table->decimal('balance', '15', '2');
            $table->timestamps();
        });

        // Transaction table
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Account::class)->constrained()->cascadeOnDelete();
            $table->string('reference')->unique();
            $table->enum('type', ['debit', 'credit']);
            $table->string('amount');
            $table->decimal('balance_before', 15, 2);
            $table->decimal('balance_after', 15, 2);
            $table->enum('category', [
                'transfer',
                'deposit',
                'withdrawal',
                'loan_repayment',
                'charge',
                'fee',
                'interest',
                'adjustment'
            ]);
            $table->string('description')->nullable();
            $table->string('source_account')->nullable();
            $table->string('destination_account')->nullable();
            $table->timestamps();
        });

        // Transfer table
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Account::class)->constrained()->cascadeOnDelete();
            $table->string('reference');
            $table->string('receiver_account_number');
            $table->string('receiver_bank');
            $table->enum('type', ['wire', 'domestic']);
            $table->string('amount');
            $table->enum('status', ['pending', 'successful', 'failed']);
            $table->timestamps();
        });


        // Card table
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->decimal('amount', 15, 2);
            $table->decimal('interest_rate', 5, 2);
            $table->integer('duration_months');
            $table->decimal('monthly_payment', '15', '2');
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->timestamps();
        });

        // Card table
        Schema::create('loan_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->decimal('amount', 15, 2);
            $table->date('payment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('transfers');
        Schema::dropIfExists('cards');
        Schema::dropIfExists('loans');
        Schema::dropIfExists('loan_payments');
    }
};
