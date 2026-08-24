<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); // Untuk URL ramah SEO
            $table->enum('tier', ['Silver', 'Gold', 'Premium'])->default('Silver'); // Tingkatan Kasta
            $table->enum('package_category', ['Nasi Box', 'Prasmanan', 'Snack', 'Tumpeng']);
            $table->enum('event_category', ['Pernikahan', 'Kantor', 'Ulang Tahun', 'Arisan', 'Umum']);
            $table->text('main_menu'); // Lauk utama
            $table->text('side_menu')->nullable(); // Snack/Dessert
            $table->text('includes')->nullable(); // Nasi, Air Mineral, Buah, dll
            $table->string('allergen_info')->nullable();
            $table->string('packaging_type')->nullable();
            $table->integer('min_order')->default(1);
            $table->decimal('price', 12, 2);
            $table->integer('daily_capacity')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Path foto produk  
            $table->boolean('is_bestseller')->default(false);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
