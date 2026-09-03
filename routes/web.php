<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Catering Nusantara
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. HALAMAN UTAMA & PUBLIK (CUSTOMER)
// ==========================================

// Route Utama (Landing Page dengan data produk & kategori)
Route::get('/', function () {
    // Ambil data produk & kategori untuk katalog filter & modal pop-up
    $products = Product::latest()->get();
    $categories = Category::all();

    return view('welcome', compact('products', 'categories'));
})->name('home');

// Alias Route khusus Customer
Route::get('/customer', function () {
    $products = Product::latest()->get();
    $categories = Category::all();

    return view('welcome', compact('products', 'categories'));
})->name('customer.home');



// ==========================================
// 2. GROUP ROUTE KHUSUS ADMIN (AUTH & VERIFIED)
// ==========================================
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin (Penggabungan statistik + katalog)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Katalog Produk
    Route::resource('products', ProductController::class);

    // CRUD Kategori Paket Menu
    Route::resource('categories', CategoryController::class)->except(['create', 'show', 'edit']);
});


// ==========================================
// 3. ROUTE PROFIL ADMIN (BREEZE)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ==========================================
// 4. ALIAS ROUTE DASHBOARD & AUTHENTICATION
// ==========================================
// Redirect /dashboard bawaan Breeze langsung ke /admin/dashboard
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth Routes (Login, Register, Logout, Reset Password)
require __DIR__.'/auth.php';