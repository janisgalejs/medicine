<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Medicine\MedicineController;
use App\Http\Controllers\Medicine\SchedulesController;

/**
 * Main index  (home)
 */
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Authentication
 */
Auth::routes();

Route::get('/auth/redirect/{driver}', [LoginController::class, 'redirectToProvider'])
    ->name('auth.provider.redirect');

Route::get('/auth/callback/{driver}', [LoginController::class, 'handleProviderCallback'])
    ->name('auth.provider.callback');

/**
 * Email verification
 */
Route::get('/email/verify', [VerificationController::class, 'show'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

/**
 * Protected with verified authentication
 */
Route::middleware(['auth', 'verified'])->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::resource('medicine', MedicineController::class);
    Route::resource('schedules', SchedulesController::class);
});

