<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register auth routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "auth" middleware group. Now create something great!
|
*/

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);

Route::get('/email/verify', [\App\Http\Controllers\Auth\RegisterController::class, 'verify'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\Auth\RegisterController::class, 'emailVerificationRequest'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [\App\Http\Controllers\Auth\RegisterController::class, 'sendEmailVerificationNotification'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store']);

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'index'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [\App\Http\Controllers\Auth\NewPasswordController::class, 'index'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [\App\Http\Controllers\Auth\NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');
