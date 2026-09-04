<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input nama kategori
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.unique' => 'Nama kategori ini sudah ada.',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        try {
            Artisan::call('db:sync-export');
        } catch (\Throwable $e) {}

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori baru berhasil ditambahkan dan disinkronkan!');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        try {
            Artisan::call('db:sync-export');
        } catch (\Throwable $e) {}

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui dan disinkronkan!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        try {
            Artisan::call('db:sync-export');
        } catch (\Throwable $e) {}

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}