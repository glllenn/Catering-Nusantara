<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyProfileController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes - Catering Nusantara
|--------------------------------------------------------------------------
*/

// API Katalog Produk (Hanya tampilkan produk yang is_active = true)
Route::get('/products', function () {
    $category = request('package_category');
    
    $query = \App\Models\Product::where('is_active', true);

    if ($category) {
        $query->where('package_category', $category);
    }

    return response()->json($query->latest()->get());
});

// API Profil Usaha
Route::get('/company-profile', [CompanyProfileController::class, 'index']);

// API Testimoni
Route::get('/testimonials', [TestimonialController::class, 'index']);