<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Pastikan folder storage public/products tersedia
        $storageDir = storage_path('app/public/products');
        if (!File::isDirectory($storageDir)) {
            File::makeDirectory($storageDir, 0777, true);
        }

        // 2. Salin foto dari public/images/products/ ke storage/app/public/products/ jika belum ada
        $seedImagesDir = public_path('images/products');
        if (File::isDirectory($seedImagesDir)) {
            foreach (File::files($seedImagesDir) as $file) {
                $target = $storageDir . '/' . $file->getFilename();
                if (!File::exists($target)) {
                    File::copy($file->getPathname(), $target);
                }
            }
        }

        // 3. Muat data produk dari JSON jika ada, atau gunakan default
        $jsonFile = database_path('seeders/data/products.json');
        if (File::exists($jsonFile)) {
            $products = json_decode(File::get($jsonFile), true) ?? [];
        } else {
            $products = [
                [
                    'name' => 'Paket Nasi Box Hemat',
                    'slug' => Str::slug('Paket Nasi Box Hemat'),
                    'tier' => 'Silver',
                    'package_category' => 'Nasi Box',
                    'event_category' => 'Kantor',
                    'main_menu' => 'Ayam Goreng Lengkuas, Tempe Orek, Sayur Sop',
                    'side_menu' => 'Kerupuk Udang, Sambal Bajak',
                    'includes' => 'Nasi putih pulen, air mineral cup',
                    'allergen_info' => 'Ayam segar harian, tanpa MSG berlebih',
                    'packaging_type' => 'Box kertas food grade',
                    'min_order' => 20,
                    'price' => 22000,
                    'daily_capacity' => 300,
                    'description' => 'Menu harian ekonomis untuk kebutuhan kantor dan rapat, praktis dan mengenyangkan.',
                    'image' => 'PaketSilverAyamBakar.png',
                    'is_bestseller' => true,
                    'is_active' => true,
                ],
                [
                    'name' => 'Paket Prasmanan Pernikahan',
                    'slug' => Str::slug('Paket Prasmanan Pernikahan'),
                    'tier' => 'Premium',
                    'package_category' => 'Prasmanan',
                    'event_category' => 'Pernikahan',
                    'main_menu' => 'Rendang Sapi Padang, Ayam Bakar Bumbu Rujak, Kakap Asam Manis, Sop Kimlo',
                    'side_menu' => 'Puding Coklat Vla, Es Buah Segar',
                    'includes' => 'Nasi putih pulen, kerupuk udang, aneka sambal, buah potong',
                    'allergen_info' => 'Daging sapi & ayam pilihan, 100% Halal',
                    'packaging_type' => 'Chafing dish prasmanan + alat saji lengkap',
                    'min_order' => 100,
                    'price' => 45000,
                    'daily_capacity' => 1000,
                    'description' => 'Paket lengkap resepsi pernikahan mewah dengan pelayanan penataan meja saji.',
                    'image' => 'PaketPremiumChickenSalted.png',
                    'is_bestseller' => true,
                    'is_active' => true,
                ],
                [
                    'name' => 'Paket Tumpeng Mini Nusantara',
                    'slug' => Str::slug('Paket Tumpeng Mini Nusantara'),
                    'tier' => 'Gold',
                    'package_category' => 'Tumpeng',
                    'event_category' => 'Ulang Tahun',
                    'main_menu' => 'Ayam Suwir Gurih, Telur Balado, Tempe Orek Kering, Perkedel Kentang',
                    'side_menu' => 'Kerupuk, Acar Kuning Segar',
                    'includes' => 'Nasi kuning wangi pulen, sambal goreng ati kentang',
                    'allergen_info' => 'Bumbu rempah alami tanpa pengawet',
                    'packaging_type' => 'Mika eksklusif + alas daun pisang',
                    'min_order' => 10,
                    'price' => 250000,
                    'daily_capacity' => 50,
                    'description' => 'Tumpeng mini estetik untuk syukuran ulang tahun dan momen berkah bersama.',
                    'image' => 'TumpengMini.png',
                    'is_bestseller' => true,
                    'is_active' => true,
                ],
                [
                    'name' => 'Paket Snack Box Arisan',
                    'slug' => Str::slug('Paket Snack Box Arisan'),
                    'tier' => 'Silver',
                    'package_category' => 'Snack Box',
                    'event_category' => 'Arisan',
                    'main_menu' => 'Lemper Ayam, Risoles Ragout, Kue Lumpur Keju',
                    'side_menu' => 'Air Mineral Cup',
                    'includes' => 'Tissue & tusuk gigi',
                    'allergen_info' => 'Kue basah fresh setiap hari',
                    'packaging_type' => 'Box mika cantik',
                    'min_order' => 15,
                    'price' => 18000,
                    'daily_capacity' => 500,
                    'description' => 'Pilihan kue basah tradisional favorit untuk menemani arisan keluarga dan syukuran.',
                    'image' => 'Box.png',
                    'is_bestseller' => false,
                    'is_active' => true,
                ],
            ];
        }

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug'] ?? Str::slug($product['name'])],
                $product
            );
        }
    }
}