<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/product-category', [WebsiteController::class, 'category'])->name('product-category');
Route::get('/product-detail', [WebsiteController::class, 'product'])->name('product-detail');
Route::get('/show-cart', [CartController::class, 'index'])->name('show-cart');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

    Route::get('/sub-category/create', [SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::get('/sub-category', [SubCategoryController::class, 'index'])->name('sub-category.index');

});
