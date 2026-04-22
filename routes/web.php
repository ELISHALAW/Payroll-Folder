<?php

use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// 1. Simplified Static Routes
Route::view('/', 'welcome')->name('home');

// 2. Guest-Only Routes (Login/Register)
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

    // Password Reset
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])
        ->name('password.reset');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


    Route::get('send-Email/',[ForgotPasswordController::class,'index'])->name('auth.sendEmail');
});

// 3. Authenticated-Only Routes
Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
