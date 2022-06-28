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

//Route::get('/', function () {
//    return view('welcome');
//})->name('welcome');


Route::get('/', [\App\Http\Controllers\Catalog\MainController::class, 'index'])->name('catalog.index');
