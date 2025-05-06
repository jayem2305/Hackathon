<?php

use Illuminate\Support\Facades\Route;
use Mews\Captcha\Captcha;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminController;
// Show login form
use App\Http\Controllers\AuditLogController;

Route::get('/audit-logs', [AuditLogController::class, 'index'])->middleware('auth');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login
Route::post('/login', [LoginController::class, 'login'])->name('login.custom');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Send OTP
Route::post('/send-otp', [LoginController::class, 'sendOtp'])->name('send.otp');

// Dashboard (after login)
Route::get('/', function () {
    return view('welcome'); // this is your dashboard after successful login
})->middleware('auth')->name('dashboard');

Route::get('/faculty', function () {
    return view('client'); // this is your dashboard after successful login
})->middleware('auth')->name('client');
// These should be public

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/listofaccount', [AdminController::class, 'listOfAccounts'])->name('listofaccount');
Route::get('/certificate', [AdminController::class, 'certificate'])->name('certificate');
Route::get('/track', [AdminController::class, 'track'])->name('track');
Route::get('/audit', [AdminController::class, 'audit'])->name('audit');


Route::resource('users', UserController::class);
Route::post('/listofaccount', [UserController::class, 'update']);

// Add a custom route for deactivation
Route::post('/users/{id}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');
Route::post('/users/{id}/admin', [UserController::class, 'admin'])->name('users.admin');
Route::post('/users/{id}/faculty', [UserController::class, 'faculty'])->name('users.faculty');

Route::get('/users/data', [UserController::class, 'getDataForTable']);
Route::get('/user-count', [UserController::class, 'getUserCount']);
Route::get('/user-count-admin', [UserController::class, 'getUserCountadmin']);
Route::get('/user-count-faculty', [UserController::class, 'getUserCountfaculty']);
