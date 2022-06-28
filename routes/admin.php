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
    Route::get('/category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'editRequest'])->name('admin.category.edit.request');
    Route::get('/category/delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.category.delete');

    Route::get('/properties', [\App\Http\Controllers\Admin\PropertyController::class, 'index'])->name('admin.properties.index');
    Route::get('/property/add', [\App\Http\Controllers\Admin\PropertyController::class, 'add'])->name('admin.property.add');
    Route::post('/property/add', [\App\Http\Controllers\Admin\PropertyController::class, 'addRequest'])->name('admin.property.add.request');
    Route::get('/property/edit/{id}', [\App\Http\Controllers\Admin\PropertyController::class, 'edit'])->name('admin.property.edit');
    Route::post('/property/edit/{id}', [\App\Http\Controllers\Admin\PropertyController::class, 'editRequest'])->name('admin.property.edit.request');
    Route::get('/property/delete/{id}', [\App\Http\Controllers\Admin\PropertyController::class, 'delete'])->name('admin.property.delete');

    Route::get('/values', [\App\Http\Controllers\Admin\ValueController::class, 'index'])->name('admin.values.index');
    Route::get('/value/add', [\App\Http\Controllers\Admin\ValueController::class, 'add'])->name('admin.value.add');
    Route::post('/value/add', [\App\Http\Controllers\Admin\ValueController::class, 'addRequest'])->name('admin.value.add.request');
    Route::get('/value/edit/{id}', [\App\Http\Controllers\Admin\ValueController::class, 'edit'])->name('admin.value.edit');
    Route::post('/value/edit/{id}', [\App\Http\Controllers\Admin\ValueController::class, 'editRequest'])->name('admin.value.edit.request');
});
