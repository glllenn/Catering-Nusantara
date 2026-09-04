<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $jsonFile = database_path('seeders/data/categories.json');
        if (\Illuminate\Support\Facades\File::exists($jsonFile)) {
            $categories = json_decode(\Illuminate\Support\Facades\File::get($jsonFile), true) ?? [];
            foreach ($categories as $cat) {
                Category::updateOrCreate(
                    ['slug' => $cat['slug'] ?? Str::slug($cat['name'])],
                    ['name' => $cat['name']]
                );
            }
        } else {
            $defaultCategories = [
                'Nasi Box',
                'Prasmanan',
                'Tumpeng',
                'Snack Box',
                'Hampers',
                'Coffee Break',
            ];

            foreach ($defaultCategories as $categoryName) {
                Category::firstOrCreate(
                    ['slug' => Str::slug($categoryName)],
                    ['name' => $categoryName]
                );
            }
        }
    }
}
