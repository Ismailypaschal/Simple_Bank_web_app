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
            $table->enum('account_type', ['savings', 'current', 'checking', 'investment'])->default('savings');
            $table->string('currency')->default('NGN');
            $table->enum('status', ['active', 'suspended', 'close'])->default('active');
            $table->decimal('balance', '15', '2')->default(0);
            $table->timestamps();
        });

        // Deposit table
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Account::class)->constrained()->cascadeOnDelete();
            $table->decimal('amount', 15, 2);
            $table->enum('deposit_type', ['Bitcoin', 'Dogecoin', 'Ethereum', 'Paypal']);
            $table->string('deposit_address');
            $table->string('deposit_proof');
            $table->timestamps();
        });

        // Withdrawal table
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Account::class)->constrained()->cascadeOnDelete();
            $table->decimal('amount', 15, 2);
            $table->enum('withdraw_type', ['Bitcoin', 'Dogecoin', 'Ethereum', 'Paypal']);
            $table->string('withdraw_address');
            $table->string('deposit_proof');
            $table->timestamps();
        });

        // Transaction table
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Account::class)->constrained()->cascadeOnDelete();
            $table->string('reference')->unique();
            $table->enum('type', ['debit', 'credit']);
            $table->decimal('amount', 15, 2);
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
            $table->decimal('amount', 15, 2);
            $table->string('reference');
            $table->string('bene_account_name');
            $table->string('bene_account_number');
            $table->string('bank_name');
            $table->string('country')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('routing_number')->nullable();
            $table->enum('account_type', ['savings', 'current', 'checking', 'investment']);
            $table->enum('transfer_type', ['wire', 'domestic']);
            $table->enum('status', ['pending', 'successful', 'failed']);
            $table->string('description');
            $table->timestamps();
        });

        // Card table
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Account::class)->constrained()->cascadeOnDelete();
            $table->string('card_number');
            $table->enum('type', ['visa', 'mastercard', 'verve', 'americanexpress']);
            $table->date('expiry_date');
            $table->enum('status', ['active', 'blocked', 'pending', 'expired'])->default('active');
            $table->timestamps();
        });

        // Loan table
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
        Schema::dropIfExists('deposits');
        Schema::dropIfExists('withdrawals');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('transfers');
        Schema::dropIfExists('cards');
        Schema::dropIfExists('loans');
        Schema::dropIfExists('loan_payments');
    }
};
