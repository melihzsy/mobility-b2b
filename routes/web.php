<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CheckoutController;

// ==========================================
// 1. GENEL ROTALAR (Herkesin erişebildiği yerler)
// ==========================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// ==========================================
// MÜŞTERİ ÖDEME (CHECKOUT) ROTALARI
// ==========================================
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

// ==========================================
// 2. GİRİŞ (LOGIN) ROTALARI
// ==========================================
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');
});


// ==========================================
// 3. ADMİN PANELİ ROTALARI (Sadece yetkililer)
// ==========================================
// prevent-back kalkanımızı buraya ana gruba dahil ettik!
Route::prefix('/admin')->name('admin.')->middleware(['auth', 'role:admin', 'prevent-back'])->group(function () {

    // Admin Dashboard
    Route::get('/', function () {
        return view('admin.index');
    })->name('dashboard');

    // Kategori Yönetimi
    Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{category}', 'show')->name('show');
        Route::get('/edit/{category}', 'edit')->name('edit');
        Route::put('/update/{category}', 'update')->name('update');
        Route::delete('/delete/{category}', 'destroy')->name('destroy');
    });

    // Ürün Yönetimi
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