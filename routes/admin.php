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
    Route::get('/value/delete/{id}', [\App\Http\Controllers\Admin\ValueController::class, 'delete'])->name('admin.value.delete');

    Route::get('/brands', [\App\Http\Controllers\Admin\BrandController::class, 'index'])->name('admin.brands.index');
    Route::get('/brand/add', [\App\Http\Controllers\Admin\BrandController::class, 'add'])->name('admin.brand.add');
    Route::post('/brand/add', [\App\Http\Controllers\Admin\BrandController::class, 'addRequest'])->name('admin.brand.add.request');
    Route::get('/brand/edit/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::post('/brand/edit/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'editRequest'])->name('admin.brand.edit.request');
    Route::get('/brand/delete/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'delete'])->name('admin.brand.delete');

    Route::get('/colors', [\App\Http\Controllers\Admin\ColorController::class, 'index'])->name('admin.colors.index');
    Route::get('/color/add', [\App\Http\Controllers\Admin\ColorController::class, 'add'])->name('admin.color.add');
    Route::post('/color/add', [\App\Http\Controllers\Admin\ColorController::class, 'addRequest'])->name('admin.color.add.request');
    Route::get('/color/edit/{id}', [\App\Http\Controllers\Admin\ColorController::class, 'edit'])->name('admin.color.edit');
    Route::post('/color/edit/{id}', [\App\Http\Controllers\Admin\ColorController::class, 'editRequest'])->name('admin.color.edit.request');
    Route::get('/color/delete/{id}', [\App\Http\Controllers\Admin\ColorController::class, 'delete'])->name('admin.color.delete');

    Route::get('/products/category/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/product/category/add/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'add'])->name('admin.product.add');
    Route::post('/product/category/add', [\App\Http\Controllers\Admin\ProductController::class, 'addRequest'])->name('admin.product.add.request');
});
