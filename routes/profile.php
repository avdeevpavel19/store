<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "profile" middleware group. Now create something great!
|
*/
Route::middleware(['isAuth', 'verified'])->group(function () {
    Route::get('/my/profile', [\App\Http\Controllers\Profile\MainController::class, 'index'])->name('profile.index');
    Route::get('/my/profile/edit', [\App\Http\Controllers\Profile\MainController::class, 'edit'])->name('profile.edit');
    Route::post('/my/profile/edit', [\App\Http\Controllers\Profile\MainController::class, 'editRequest'])->name('profile.edit.request');
    Route::get('/my/cart', [\App\Http\Controllers\Profile\MainController::class, 'userCart'])->name('profile.cart');
    Route::get('/my/cart/{id}', [\App\Http\Controllers\Profile\MainController::class, 'deleteProductFromCart'])->name('profile.cart.delete');
});
