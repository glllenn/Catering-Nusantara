<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Paket Nasi Box Hemat',
                'slug' => Str::slug('Paket Nasi Box Hemat'),
                'tier' => 'Silver',
                'package_category' => 'Nasi Box',
                'event_category' => 'Kantor',
                'main_menu' => 'Ayam Goreng, Tempe Orek, Sayur Sop',
                'side_menu' => 'Kerupuk',
                'includes' => 'Nasi putih, air mineral gelas',
                'allergen_info' => 'Ayam segar harian, tanpa MSG tambahan',
                'packaging_type' => 'Box kertas food grade',
                'min_order' => 20,
                'price' => 22000,
                'daily_capacity' => 300,
                'description' => 'Menu harian ekonomis untuk kebutuhan kantor/rapat, praktis dan mengenyangkan',
                'is_bestseller' => true,
            ],
            [
                'name' => 'Paket Prasmanan Pernikahan',
                'slug' => Str::slug('Paket Prasmanan Pernikahan'),
                'tier' => 'Premium',
                'package_category' => 'Prasmanan',
                'event_category' => 'Pernikahan',
                'main_menu' => 'Rendang, Ayam Bakar, Ikan Asam Manis, Sayur Lodeh',
                'side_menu' => 'Puding, Es Buah',
                'includes' => 'Nasi putih, kerupuk, sambal, buah potong',
                'allergen_info' => 'Daging sapi & ayam pilihan, disesuaikan permintaan halal/alergen',
                'packaging_type' => 'Chafing dish + alat saji lengkap',
                'min_order' => 100,
                'price' => 45000,
                'daily_capacity' => 1000,
                'description' => 'Paket lengkap untuk resepsi pernikahan, termasuk penataan meja prasmanan',
                'is_bestseller' => true,
            ],
            [
                'name' => 'Paket Tumpeng Mini',
                'slug' => Str::slug('Paket Tumpeng Mini'),
                'tier' => 'Gold',
                'package_category' => 'Tumpeng',
                'event_category' => 'Ulang Tahun',
                'main_menu' => 'Ayam Suwir, Telur Balado, Tempe Kering',
                'side_menu' => 'Kerupuk, Acar',
                'includes' => 'Nasi kuning, sambal goreng ati',
                'allergen_info' => 'Tanpa pengawet, dimasak hari yang sama',
                'packaging_type' => 'Tampah + daun pisang',
                'min_order' => 10,
                'price' => 250000,
                'daily_capacity' => 20,
                'description' => 'Tumpeng ukuran mini untuk perayaan kecil di rumah/kantor, tampilan tetap menarik',
                'is_bestseller' => true,
            ],
        ];

        // KODE BARU (Aman dari Duplikasi):
foreach ($products as $product) {
    Product::updateOrCreate(
        ['slug' => $product['slug']], // Cek berdasarkan slug
        $product                      // Jika ada di-update, jika belum ada di-create
    );
}
    }
}