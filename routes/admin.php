<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::middleware('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.index');

    Route::get('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/category/add', [\App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('admin.category.add');
    Route::post('/category/add', [\App\Http\Controllers\Admin\CategoryController::class, 'addRequest'])->name('admin.category.add.request');
});
