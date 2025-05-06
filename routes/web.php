<?php

use Illuminate\Support\Facades\Route;
use Mews\Captcha\Captcha;

use App\Http\Controllers\Auth\LoginController;

// Show login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login
Route::post('/login', [LoginController::class, 'login'])->name('login.custom');

// Send OTP
Route::post('/send-otp', [LoginController::class, 'sendOtp'])->name('send.otp');

// Dashboard (after login)
Route::get('/', function () {
    return view('welcome'); // this is your dashboard after successful login
})->middleware('auth')->name('dashboard');

