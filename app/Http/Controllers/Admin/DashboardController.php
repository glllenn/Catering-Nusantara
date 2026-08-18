<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalBestSeller = Product::where('is_bestseller', true)->count();
        
        // Harga Termurah & Termahal
        $minPrice = Product::min('price') ?? 0;
        $maxPrice = Product::max('price') ?? 0;
        
        $totalCategories = Category::count();
        $products = Product::latest()->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalBestSeller',
            'minPrice',
            'maxPrice',
            'totalCategories',
            'products'
        ));
    }
}