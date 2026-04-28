<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Payroll\PayrollController;
use App\Http\Controllers\Settings\BasicDetailController;
use App\Http\Controllers\Settings\SettingsController;
use Illuminate\Support\Facades\Route;

// 1. Simplified Static Routes
Route::view('/', 'welcome')->name('home');

// 2. Guest-Only Routes (Login/Register/Reset)
Route::middleware('guest')->group(function () {

    // Register Group
    Route::controller(RegisterController::class)->group(function () {
        Route::get('register', 'index')->name('register');
        Route::post('register', 'store')->name('register.store');
    });

    // Login Group
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'index')->name('login');
        Route::post('login', 'authenticate')->name('login.authenticate');
    });

    // Password Reset Group
    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('send-Email', 'index')->name('auth.sendEmail');
        Route::post('forgot-password', 'sendResetLinkEmail')->name('password.email');
        Route::get('reset-password/{token}', 'showResetPassword')->name('password.reset');

        Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])
            ->name('password.update');
    });
});

// 3. Authenticated-Only Routes
Route::middleware('auth')->group(function () {
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/{id}', [SettingsController::class, 'index'])->name('user');

        Route::prefix('company')->name('company.')->group(function () {
            // Basic Details Route
            Route::get('/basic/{id}', [BasicDetailController::class, 'index'])->name('basic');

            // Add more here later (Bank, Other, etc.)
        });
    });

    Route::prefix('payroll')->name('payroll.')->group(function () {
        Route::get('/', [PayrollController::class, 'index'])->name('payrolls');
        Route::match(['get', 'post'], '/process', [PayrollController::class, 'store'])->name('process');
    });

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
