<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk (Katalog)
     */
public function index()
    {
        // Ambil data produk dan kategori dari database
        $products = Product::latest()->paginate(10);
        $categories = Category::all();

        // Kirimkan kedua variabel ke view
        return view('admin.products.index', compact('products', 'categories'));
    }
    /**
     * Menampilkan form tambah paket menu baru
     */
    public function create()
{
    $categories = \App\Models\Category::all();
    return view('admin.products.create', compact('categories'));
}
    /**
     * Menyimpan paket menu baru ke database
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        
        // Generate Slug unik dari nama produk
        $data['slug'] = Str::slug($request->name) . '-' . time();
        
        // Handle checkbox boolean
        $data['is_bestseller'] = $request->boolean('is_bestseller');

        // Handle upload foto produk
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Paket menu berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail produk
     */
    public function show(Product $product)
    {
        return redirect()->route('admin.products.edit', $product->id);
    }

    /**
     * Menampilkan form edit paket menu
     */
    public function edit(Product $product)
{
    $categories = \App\Models\Category::all();
    return view('admin.products.edit', compact('product', 'categories'));
}

    /**
     * Memperbarui data paket menu
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        
        // Generate Slug baru berdasarkan ID
        $data['slug'] = Str::slug($request->name) . '-' . $product->id;
        
        // Handle checkbox boolean
        $data['is_bestseller'] = $request->boolean('is_bestseller');

        // Jika ada upload foto baru
        if ($request->hasFile('image')) {
            // Hapus foto lama di storage jika ada
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            
            // Simpan foto baru
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Paket menu berhasil diperbarui!');
    }

    /**
     * Menghapus paket menu
     */
    public function destroy(Product $product)
    {
        // Hapus file foto dari storage jika ada
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Paket menu berhasil dihapus!');
    }
}