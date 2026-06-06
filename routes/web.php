<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

// ANA SAYFA YÖNLENDİRMESİ
// Herkese açık Müşteri Vitrini (React)
Route::get('/', function () {
    return view('welcome');
});

// LOGIN ROUTES
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');
});

// ADMIN ROUTES
Route::prefix('/admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    
    // Admin Dashboard
    Route::get('/', function() { return "Admin Panel - Mobility B2B"; })->name('index'); 

    // Category Routes
    Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{category}', 'show')->name('show');
        Route::get('/edit/{category}', 'edit')->name('edit');
        Route::put('/update/{category}', 'update')->name('update');
        Route::delete('/delete/{category}', 'destroy')->name('destroy');
    });

    // Product Routes
    Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{product}', 'show')->name('show');
        Route::get('/edit/{product}', 'edit')->name('edit');
        Route::put('/update/{product}', 'update')->name('update');
        Route::delete('/delete/{product}', 'destroy')->name('destroy');
    });
});