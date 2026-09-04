<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SyncDatabaseSeeder extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'db:sync-export {--import : Import from seed data into database instead of exporting}';

    /**
     * The console command description.
     */
    protected $description = 'Sinkronisasi database produk, kategori, dan foto ke/dari Seeder untuk kolaborasi tim di Git.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataDir = database_path('seeders/data');
        if (!File::isDirectory($dataDir)) {
            File::makeDirectory($dataDir, 0755, true);
        }

        $imageSeedDir = public_path('images/products');
        if (!File::isDirectory($imageSeedDir)) {
            File::makeDirectory($imageSeedDir, 0755, true);
        }

        if ($this->option('import')) {
            $this->info('🔄 Mengimpor data seeder ke database...');
            $this->call('db:seed');
            $this->info('✅ Selesai mengimpor data ke database!');
            return 0;
        }

        $this->info('📦 Mengekspor data database ke Seeder & Git-tracked assets...');

        // 1. Export Categories
        $categories = Category::all()->map(function ($cat) {
            return [
                'name' => $cat->name,
                'slug' => $cat->slug,
            ];
        })->toArray();

        File::put($dataDir . '/categories.json', json_encode($categories, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $this->line(" - Berhasil mengekspor " . count($categories) . " kategori ke database/seeders/data/categories.json");

        // 2. Export Products
        $products = Product::all()->map(function ($p) {
            return [
                'name' => $p->name,
                'slug' => $p->slug,
                'tier' => $p->tier,
                'package_category' => $p->package_category,
                'event_category' => $p->event_category,
                'main_menu' => $p->main_menu,
                'side_menu' => $p->side_menu,
                'includes' => $p->includes,
                'allergen_info' => $p->allergen_info,
                'packaging_type' => $p->packaging_type,
                'min_order' => $p->min_order,
                'price' => $p->price,
                'daily_capacity' => $p->daily_capacity,
                'description' => $p->description,
                'image' => $p->image,
                'is_bestseller' => (bool) $p->is_bestseller,
                'is_active' => (bool) $p->is_active,
            ];
        })->toArray();

        File::put($dataDir . '/products.json', json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $this->line(" - Berhasil mengekspor " . count($products) . " paket menu ke database/seeders/data/products.json");

        // 3. Copy uploaded storage images to public/images/products/ so they are tracked by git
        $storageDir = storage_path('app/public/products');
        $copiedImages = 0;
        if (File::isDirectory($storageDir)) {
            foreach (File::files($storageDir) as $file) {
                $dest = $imageSeedDir . '/' . $file->getFilename();
                File::copy($file->getPathname(), $dest);
                $copiedImages++;
            }
        }
        $this->line(" - Berhasil menyinkronkan {$copiedImages} foto produk ke public/images/products/ (Terlacak di Git)");

        $this->info("\n✨ SINKRONISASI SUKSES! ✨");
        $this->comment("Langkah selanjutnya untuk dibagikan ke teman tim:");
        $this->comment("1. Jalankan: git add .");
        $this->comment("2. Jalankan: git commit -m 'Update data paket menu & seeder'");
        $this->comment("3. Jalankan: git push");
        $this->comment("\nTeman tim Anda cukup menjalankan:");
        $this->comment("git pull ; php artisan migrate --seed");

        return 0;
    }
}

