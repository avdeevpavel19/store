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
