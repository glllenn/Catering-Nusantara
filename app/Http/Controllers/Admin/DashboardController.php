<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
    {
        // Ambil ringkasan statistik
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $bestsellerCount = Product::where('is_bestseller', true)->count();

        // Ambil data produk & kategori untuk katalog filter di dashboard
        $products = Product::latest()->get();
        $categories = Category::all();

        return view('dashboard', compact(
            'totalProducts', 
            'totalCategories', 
            'bestsellerCount',
            'products', 
            'categories'
        ));
    }
}