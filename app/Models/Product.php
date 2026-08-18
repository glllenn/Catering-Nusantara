<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi secara massal
     */
    protected $fillable = [
        'name',
        'slug',
        'tier',
        'package_category',
        'event_category',
        'main_menu',
        'side_menu',
        'includes',
        'allergen_info',
        'packaging_type',
        'min_order',
        'price',
        'daily_capacity',
        'description',
        'image',
        'is_bestseller',
        'is_active', // Ditambahkan untuk toggle status aktif/sembunyi
    ];

    /**
     * Casting tipe data kolom
     */
    protected $casts = [
        'is_bestseller'  => 'boolean',
        'is_active'      => 'boolean',
        'price'          => 'integer',
        'min_order'      => 'integer',
        'daily_capacity' => 'integer',
    ];

    /**
     * Menyertakan atribut buatan (virtual) saat di-serialize ke JSON (API)
     */
    protected $appends = [
        'image_url',
    ];

    /**
     * Accessor untuk mendapatkan URL lengkap gambar produk (Sangat berguna untuk React FE)
     */
    public function getImageUrlAttribute(): ?string
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }

        return null; // Atau return URL gambar placeholder default jika tidak ada gambar
    }
}