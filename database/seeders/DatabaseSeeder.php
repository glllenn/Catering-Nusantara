<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Gunakan updateOrCreate agar password selalu sinkron/ter-reset ke 'password123'
        User::updateOrCreate(
            ['email' => 'admin@cateringnusantara.com'], // Kunci pencarian
            [
                'name' => 'Admin Catering Nusantara',
                'password' => Hash::make('password123'),
            ]
        );

        // Panggil Seeder Kategori & Produk
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}