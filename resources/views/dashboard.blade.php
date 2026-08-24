<x-app-layout>
    {{-- Slot Header Atas Dikosongkan agar Navbar/Title Dobel Hilang --}}
    <x-slot name="header"></x-slot>

    <div class="py-6 bg-[#f8f9fa] min-h-screen" x-data="{ activeTab: 'all_category', activeTier: 'all_tier' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ALERT SUKSES --}}
            @if(session('success'))
                <div class="bg-orange-50 border-l-4 border-[#f6a11a] text-orange-900 p-4 rounded-2xl shadow-sm font-semibold text-sm flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-[#f6a11a] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            {{-- TITLE UTAMA --}}
            <div>
                <h2 class="text-xl font-bold text-gray-900">Dashboard Penjualan & Katalog Admin</h2>
            </div>

            {{-- 1. BANNER SELAMAT DATANG ORANYE + TOMBOL AKSI --}}
            <div class="bg-[#f6a11a] rounded-3xl p-6 sm:p-8 text-white shadow-md flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 relative overflow-hidden">
                <div class="space-y-1.5 z-10">
                    <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                        Selamat Datang, Admin Catering Nusantara!
                    </h3>
                    <p class="text-orange-100 text-xs sm:text-sm max-w-2xl font-medium">
                        Pantau statistik penjualan katalog menu dan kelola data produk Catering Nusantara.
                    </p>
                </div>

                {{-- GROUP TOMBOL AKSI (TAMBAH MENU & KELOLA KATEGORI) --}}
                <div class="z-10 flex flex-wrap items-center gap-3 shrink-0">
                    {{-- Tombol Kelola Kategori --}}
                    @if(Route::has('admin.categories.index'))
                        <a href="{{ route('admin.categories.index') }}" 
                            class="bg-white/20 hover:bg-white/30 border border-white/40 text-white font-bold px-5 py-3 rounded-2xl text-sm transition flex items-center gap-2 backdrop-blur-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 11h.01M7 15h.01M11 7h8M11 11h8M11 15h8M4 5h16a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                            </svg>
                            Kelola Kategori
                        </a>
                    @endif

                    {{-- Tombol Tambah Menu Baru (Single Plus Icon) --}}
                    <a href="{{ route('admin.products.create') }}" 
                        class="bg-white hover:bg-orange-50 text-[#f6a11a] font-bold px-5 py-3 rounded-2xl text-sm transition shadow-sm flex items-center gap-2 transform hover:scale-105">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Menu Baru
                    </a>
                </div>
            </div>

            {{-- 2. RINGKASAN STATISTIK (4 CARDS) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                {{-- Card 1: Total Menu Aktif --}}
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">TOTAL MENU AKTIF</p>
                        <h4 class="text-2xl font-black text-gray-900 mt-1">{{ $totalProducts ?? 0 }}</h4>
                        <p class="text-[10px] text-gray-400 mt-0.5">Paket siap dipesan</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-orange-50 text-[#f6a11a] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                </div>

                {{-- Card 2: Menu Best Seller --}}
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">MENU BEST SELLER</p>
                        <h4 class="text-2xl font-black text-gray-900 mt-1">{{ $bestsellerCount ?? 0 }}</h4>
                        <p class="text-[10px] text-gray-400 mt-0.5">Favorit Pelanggan</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-orange-50 text-[#f6a11a] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                </div>

                {{-- Card 3: Rata-Rata Harga / Pax --}}
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">RATA-RATA HARGA / PAX</p>
                        <h4 class="text-2xl font-black text-gray-900 mt-1">
                            Rp {{ number_format(($products->avg('price') ?? 0), 0, ',', '.') }}
                        </h4>
                        <p class="text-[10px] text-gray-400 mt-0.5">Variasi harga paket</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-orange-50 text-[#f6a11a] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>

                {{-- Card 4: Kategori Paket --}}
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">KATEGORI PAKET</p>
                        <h4 class="text-2xl font-black text-gray-900 mt-1">{{ $totalCategories ?? 0 }}</h4>
                        <p class="text-[10px] text-gray-400 mt-0.5">Nasi Box, Prasmanan, dll</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-gray-100 text-gray-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- 3. SUBTITLE DAFTAR PAKET MENU & FILTER --}}
            <div class="pt-2">
                <h3 class="text-lg font-bold text-gray-900">Daftar Seluruh Paket Menu</h3>
                <p class="text-xs text-gray-500 mt-0.5">Kelola informasi paket menu, harga, porsi, serta foto produk.</p>
            </div>

            {{-- TAB FILTER CATEGORY & TIER --}}
            <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm space-y-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider mr-2">KATEGORI:</span>
                    <button @click="activeTab = 'all_category'" 
                        :class="activeTab === 'all_category' ? 'bg-[#f6a11a] text-white' : 'bg-gray-100 text-gray-600 hover:bg-orange-50 hover:text-[#f6a11a]'"
                        class="px-4 py-1.5 rounded-xl text-xs font-bold transition">
                        Semua Kategori
                    </button>
                    @if(isset($categories))
                        @foreach($categories as $cat)
                            <button @click="activeTab = '{{ Str::slug($cat->name) }}'" 
                                :class="activeTab === '{{ Str::slug($cat->name) }}' ? 'bg-[#f6a11a] text-white' : 'bg-gray-100 text-gray-600 hover:bg-orange-50 hover:text-[#f6a11a]'"
                                class="px-4 py-1.5 rounded-xl text-xs font-bold transition">
                                {{ $cat->name }}
                            </button>
                        @endforeach
                    @endif
                </div>

                <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-gray-100">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider mr-2">KASTA PAKET:</span>
                    <button @click="activeTier = 'all_tier'" 
                        :class="activeTier === 'all_tier' ? 'bg-orange-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-orange-50 hover:text-[#f6a11a]'"
                        class="px-3 py-1 rounded-lg text-xs font-bold transition">
                        Semua Kasta
                    </button>
                    <button @click="activeTier = 'silver'" 
                        :class="activeTier === 'silver' ? 'bg-orange-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-orange-50 hover:text-[#f6a11a]'"
                        class="px-3 py-1 rounded-lg text-xs font-bold transition">
                        Silver
                    </button>
                    <button @click="activeTier = 'gold'" 
                        :class="activeTier === 'gold' ? 'bg-orange-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-orange-50 hover:text-[#f6a11a]'"
                        class="px-3 py-1 rounded-lg text-xs font-bold transition">
                        Gold
                    </button>
                    <button @click="activeTier = 'premium'" 
                        :class="activeTier === 'premium' ? 'bg-orange-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-orange-50 hover:text-[#f6a11a]'"
                        class="px-3 py-1 rounded-lg text-xs font-bold transition">
                        Premium
                    </button>
                </div>
            </div>

            {{-- 4. GRID KATALOG PAKET MENU --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($products as $product)
                    @php
                        $categorySlug = Str::slug($product->package_category);
                        $tierSlug = Str::slug($product->tier ?? 'general');
                    @endphp

                    <div x-show="(activeTab === 'all_category' || activeTab === '{{ $categorySlug }}') && (activeTier === 'all_tier' || activeTier === '{{ $tierSlug }}')"
                         x-transition
                         class="bg-white rounded-3xl p-4 border border-gray-100 shadow-sm flex flex-col justify-between hover:border-[#f6a11a] transition duration-200">
                        <div>
                            {{-- Foto Produk --}}
                            <div class="relative h-48 rounded-2xl overflow-hidden bg-gray-100">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs font-medium">
                                        Tidak Ada Foto
                                    </div>
                                @endif

                                @if($product->is_bestseller)
                                    <span class="absolute top-3 left-3 bg-white/95 text-[#f6a11a] text-[11px] font-bold px-3 py-1 rounded-full shadow-sm flex items-center gap-1 border border-orange-100">
                                        ★ Favorit Menu
                                    </span>
                                @endif

                                <div class="absolute top-3 right-3 flex flex-col items-end gap-1">
                                    <span class="bg-[#f6a11a] text-white text-[11px] font-bold px-2.5 py-0.5 rounded-full shadow-sm">
                                        {{ $product->package_category }}
                                    </span>
                                    @if($product->tier)
                                        <span class="bg-orange-700 text-white text-[9px] uppercase font-bold px-2 py-0.5 rounded-full shadow-sm">
                                            {{ $product->tier }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Title & Harga --}}
                            <div class="mt-4 space-y-1">
                                <h4 class="font-bold text-gray-900 text-base leading-snug">{{ $product->name }}</h4>
                                <p class="text-[#f6a11a] font-extrabold text-lg">
                                    Rp {{ number_format($product->price, 0, ',', '.') }} <span class="text-xs font-normal text-gray-400">/ pax</span>
                                </p>
                            </div>

                            {{-- Min Order & Menu --}}
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-gray-100 text-[11px]">
                                <div>
                                    <p class="text-gray-400">Min. Order</p>
                                    <p class="font-bold text-gray-800 mt-0.5">{{ $product->min_order }} porsi</p>
                                </div>
                                <div>
                                    <p class="text-gray-400">Menu Utama</p>
                                    <p class="font-bold text-gray-800 mt-0.5 line-clamp-2">{{ $product->main_menu }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="grid grid-cols-2 gap-3 mt-5">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="w-full py-2 px-3 rounded-xl border border-[#f6a11a] text-[#f6a11a] hover:bg-orange-50 font-bold text-xs text-center transition">
                                📝 Edit
                            </a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket {{ $product->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full py-2 px-3 rounded-xl bg-orange-50 hover:bg-orange-100 text-orange-700 font-bold text-xs transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-gray-400 bg-white rounded-3xl border border-gray-100">
                        Belum ada paket menu yang ditambahkan.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>