<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Catalog Routes
|--------------------------------------------------------------------------
|
| Here is where you can register catalog routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "catalog" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\Catalog\MainController::class, 'index'])->name('catalog.index');
Route::get('/product/{title}', [\App\Http\Controllers\Catalog\MainController::class, 'showProduct'])->name('catalog.show');
