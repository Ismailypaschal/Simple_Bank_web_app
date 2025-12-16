<?php

use App\Http\Controllers\User\RegisterUserController;
use App\Http\Controllers\User\SessionUserController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\DomesticTransferController;
use App\Http\Controllers\User\WireTransferController;
use App\Http\Controllers\User\VirtualCardController;
use App\Http\Controllers\User\LoanMortgageController;
use App\Http\Controllers\User\SendEmailVerificationNotificationController;
use App\Http\Controllers\User\ForgottenPasswordController;
use App\Http\Controllers\User\ResetPasswordController;
use App\Http\Controllers\User\UpdateProfileController;
use App\Http\Controllers\User\SecurityPinController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


Route::prefix('user')->group(function () {
    Route::get('signup', [RegisterUserController::class, 'showSignup'])->name('user.signup');
    Route::post('signup', [RegisterUserController::class, 'storeSignup'])->name('store.signup');
    Route::get('signin', [SessionUserController::class, 'showSignin'])->name('login');
    Route::post('signin', [SessionUserController::class, 'storeSignin'])->name('store.signin');
    // Forgot password routes
    Route::get('forgot-password', [ForgottenPasswordController::class, 'showForm'])->name('password.request');
    Route::post('forgot-password', [ForgottenPasswordController::class, 'sendResetLink'])->middleware('throttle:6,1')->name('password.email');
    Route::get('forgot-password/confirm', [ForgottenPasswordController::class, 'confirmLink'])->name('notification');
    // Reset password routes
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPassword'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'storeResetPassword'])->name('password.update');
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::prefix('email')->group(function () {
        Route::get('verify', [SendEmailVerificationNotificationController::class, 'sendNotification'])->name('verification.notice');
        Route::get(
            'verify/{id}/{hash}',
            [SendEmailVerificationNotificationController::class, 'verificationRequest']
        )->middleware('signed')->name('verification.verify');
        Route::any(
            'verification-notification',
            [SendEmailVerificationNotificationController::class, 'linkConfirm']
        )->middleware('throttle:6,1')->name('verification.send');
    });
    // Create or verify Pin
    Route::get('verify/security-pin', [SecurityPinController::class, 'showSecurityPin'])->name('pin.verify');
    Route::post('verify/security-pin', [SecurityPinController::class, 'storeSecurityPin'])->name('pin.check');
    // Dashboard
    Route::middleware('pin.verified')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'showIndex'])->middleware('verified')->name('user.dashboard');
    });
    // Deposit 
    Route::get('online_deposit', [DashboardController::class, 'showOnlineDeposit'])->middleware('verified')->name('online_deposit');
    Route::post('online_deposit', [DepositController::class, 'storeDeposit'])->middleware('verified')->name('deposit');
    // Domestic Transfer
    Route::get('domestic_transfer', [DashboardController::class, 'showDomesticTransfer'])->middleware('verified')->name('domestic_transfer');
    Route::post('domestic_transfer', [DomesticTransferController::class, 'storeDomesticTransfer'])->middleware('verified')->name('domestic.transfer');
    // Wire Transfer
    Route::get('wire_transfer', [DashboardController::class, 'showWireTransfer'])->middleware('verified')->name('wire_transfer');
    Route::post('wire_transfer', [WireTransferController::class, 'storeWireTransfer'])->middleware('verified')->name('wire.transfer');
    // Virtual Card
    Route::get('virtual_card', [DashboardController::class, 'showVirtualTransfer'])->middleware('verified')->name('virtual_card');
    Route::get('create_virtual_card', [DashboardController::class, 'showCreateVirtualTransfer'])->middleware('verified')->name('create.virtual_card');
    Route::post('create_virtual_card', action: [VirtualCardController::class, 'generatevirtualCard'])->middleware('verified')->name('store.virtual_card');
    // Loan
    Route::get('loan_mortgage', [DashboardController::class, 'showLoanMortgage'])->middleware('verified')->name('loan_mortgage');
    Route::post('loan_mortgage', [LoanMortgageController::class, 'storeLoanMortgage'])->middleware('verified')->name('loan');
    // Transaction historys
    Route::get('credit_debit_transactions', [DashboardController::class, 'showCreditDebit'])->middleware('verified')->name('credit_debit');
    Route::get('wire_transactions', [DashboardController::class, 'showWire'])->middleware('verified')->name('wire');
    Route::get('domestic_transaction', [DashboardController::class, 'showDomestic'])->middleware('verified')->name('domestic');
    Route::get('loan_transaction', [DashboardController::class, 'LoanData'])->middleware('verified')->name('loan_transaction');
    // Account Manager
    Route::get('account_manager', [DashboardController::class, 'showAccountManager'])->middleware('verified')->name('account_manager');
    // Profile
    Route::get('profile', [DashboardController::class, 'showProfile'])->middleware('verified')->name('profile');
    Route::post('update_profile', [UpdateProfileController::class, 'updateProfilePhoto'])->middleware('verified')->name('update.profile');
    Route::post('update_password', [UpdateProfileController::class, 'updatePassword'])->middleware('verified')->name('update.password');
    Route::post('update_pin', [UpdateProfileController::class, 'updatePin'])->middleware('verified')->name('update.pin');

    Route::post('logout', [SessionUserController::class, 'destroy'])->name('user.logout');
});
