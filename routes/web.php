<?php

use App\Http\Controllers\User\RegisterUserController;
use App\Http\Controllers\User\SessionUserController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\sendEmailVerificationNotificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


Route::prefix('user')->group(function () {
    Route::get('signup', [RegisterUserController::class, 'showSignup'])->name('user.signup');
    Route::post('signup', [RegisterUserController::class, 'storeSignup'])->name('store.signup');
    Route::get('signin', [SessionUserController::class, 'showSignin'])->name('login');
    Route::post('signin', [SessionUserController::class, 'storeSignin'])->name('store.signin');
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::prefix('email')->middleware('auth')->group(function () {
        Route::get('verify', [sendEmailVerificationNotificationController::class, 'sendNotification'])->name('verification.notice');
        Route::get(
            'verify/{id}/{hash}',
            [sendEmailVerificationNotificationController::class, 'verificationRequest']
        )->middleware('signed')->name('verification.verify');
        Route::any(
            'verification-notification',
            [sendEmailVerificationNotificationController::class, 'linkConfirm']
        )->middleware('throttle:6,1')->name('verification.send');
    });

    Route::get('dashboard', [DashboardController::class, 'showIndex'])->middleware('verified')->name('user.dashboard');
    Route::post('logout', [SessionUserController::class, 'destroy'])->name('user.logout');
});
