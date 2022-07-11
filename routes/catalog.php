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
Route::middleware('verified')->group(function () {
    Route::get('/', [\App\Http\Controllers\Catalog\MainController::class, 'index'])->name('catalog.index');
    Route::get('/product/{title}', [\App\Http\Controllers\Catalog\MainController::class, 'showProduct'])->name('catalog.show');
    Route::get('/category/{id}', [\App\Http\Controllers\Catalog\MainController::class, 'categoryProduct'])->name('catalog.categoryProduct');
    Route::get('/search', [\App\Http\Controllers\Catalog\MainController::class, 'searchProduct'])->name('search');

    Route::get('/review/add/{id}', [\App\Http\Controllers\Catalog\MainController::class, 'addReview'])
        ->middleware('isAuth')
        ->name('review.add');
    Route::post('/review/add/{id}', [\App\Http\Controllers\Catalog\MainController::class, 'addReviewRequest'])
        ->middleware('isAuth')
        ->name('review.add.request');

    Route::post('/product', [\App\Http\Controllers\Catalog\MainController::class, 'addProductRequest'])->name('add.product.request');
});
