<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home', function () {
    return '<h1>ini adalah halaman home</h1>';
});

Route::get('/profile', function () {
    return '<h1>ini adalah halaman profile</h1>';
});

Route::get('/contact', function () {
    return '<h1>ini adalah halaman contact</h1>';
});

Route::get('/about-us', function () {
    return '<h1>ini adalah halaman about us</h1>';
});

Route::get('/cart', function () {
    return '<h1>ini adalah halaman cart</h1>';
});

Route::get('/checkout', function () {
    return '<h1>ini adalah halaman checkout</h1>';
});

Route::get('/orders', function () {
    return '<h1>ini adalah halaman orders</h1>';
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
