<?php

use App\Http\Controllers\homepageController;
use Illuminate\Support\Facades\Route;
// use Livewire\Volt\Volt;

Route::get('/', [homepageController::class, 'index']);
Route::get('products', [homepageController::class, 'products']);
Route::get('product/{slug}', [homepageController::class, 'product']);
Route::get('categories', [homepageController::class, 'categories']);
Route::get('category/{slug}', [homepageController::class, 'category']);
Route::get('cart', [homepageController::class, 'cart']);
Route::get('checkout', [homepageController::class, 'checkout']);
