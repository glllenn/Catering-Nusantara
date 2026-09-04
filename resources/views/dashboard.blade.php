<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-8 bg-[#faf7f2] min-h-screen" 
        x-data="{ 
            activeTab: 'all_category', 
            activeTier: 'all_tier',
            searchQuery: ''
        }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- ALERT SUKSES --}}
            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl shadow-xs text-sm font-semibold flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            {{-- 1. BANNER UTAMA DASHBOARD ADMIN (DARK ESPRESSO + GOLD) --}}
            <div class="bg-[#1a120b] rounded-3xl p-6 sm:p-9 text-white shadow-xl flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 relative overflow-hidden border border-neutral-800">
                
                {{-- Decorative subtle gold ambient corner --}}
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-[#a4864b]/15 rounded-full blur-3xl pointer-events-none"></div>

                <div class="space-y-2 z-10">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-[#e4c990] text-xs font-bold uppercase tracking-wider border border-white/10">
                        <span>Panel Administrasi</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white font-['Playfair_Display',serif] italic font-normal">
                        Selamat Datang, {{ Auth::user()->name }}
                    </h3>
                    <p class="text-white/70 text-xs sm:text-sm max-w-2xl font-light leading-relaxed">
                        Kelola paket hidangan, perbarui harga &amp; porsi, pantau ketersediaan menu, dan atur kategori katering secara mudah dan terstruktur.
                    </p>
                </div>

                {{-- Action Buttons --}}
                <div class="z-10 flex flex-wrap items-center gap-3 shrink-0">
                    {{-- Tombol Kelola Kategori --}}
                    @if(Route::has('admin.categories.index'))
                        <a href="{{ route('admin.categories.index') }}" 
                            class="bg-white/10 hover:bg-white/20 border border-white/20 text-white font-semibold px-5 py-3 rounded-2xl text-xs sm:text-sm transition flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#e4c990]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 7h.01M7 11h.01M7 15h.01M11 7h8M11 11h8M11 15h8M4 5h16a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                            </svg>
                            <span>Kelola Kategori</span>
                        </a>
                    @endif

                    {{-- Tombol Tambah Menu Baru --}}
                    <a href="{{ route('admin.products.create') }}" 
                        class="bg-[#a4864b] hover:bg-[#8f723c] text-white font-bold px-6 py-3 rounded-2xl text-xs sm:text-sm transition shadow-md flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Tambah Menu Baru</span>
                    </a>
                </div>
            </div>

            {{-- 2. RINGKASAN STATISTIK RINGKAS (4 CARDS: 2 COLUMNS ON MOBILE) --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5">
                {{-- Card 1: Total Menu Aktif --}}
                <div class="bg-white p-4 sm:p-5 rounded-3xl border border-neutral-200/80 shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div>
                        <p class="text-[10px] sm:text-[11px] font-bold text-neutral-400 uppercase tracking-wider">TOTAL MENU</p>
                        <h4 class="text-xl sm:text-2xl font-black text-neutral-900 mt-0.5 sm:mt-1">{{ $totalProducts ?? count($products) }}</h4>
                        <p class="text-[10px] sm:text-[11px] text-neutral-500 mt-0.5">Paket aktif</p>
                    </div>
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-[#faf4ea] text-[#a4864b] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                </div>

                {{-- Card 2: Menu Best Seller --}}
                <div class="bg-white p-4 sm:p-5 rounded-3xl border border-neutral-200/80 shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div>
                        <p class="text-[10px] sm:text-[11px] font-bold text-neutral-400 uppercase tracking-wider">FAVORIT</p>
                        <h4 class="text-xl sm:text-2xl font-black text-neutral-900 mt-0.5 sm:mt-1">{{ $bestsellerCount ?? $products->where('is_bestseller', true)->count() }}</h4>
                        <p class="text-[10px] sm:text-[11px] text-neutral-500 mt-0.5">Best Seller</p>
                    </div>
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-[#faf4ea] text-[#a4864b] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                </div>

                {{-- Card 3: Rata-Rata Harga / Pax --}}
                <div class="bg-white p-4 sm:p-5 rounded-3xl border border-neutral-200/80 shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div>
                        <p class="text-[10px] sm:text-[11px] font-bold text-neutral-400 uppercase tracking-wider">RATA-RATA</p>
                        <h4 class="text-base sm:text-2xl font-black text-neutral-900 mt-0.5 sm:mt-1 truncate max-w-[120px]">
                            Rp {{ number_format(($products->avg('price') ?? 0), 0, ',', '.') }}
                        </h4>
                        <p class="text-[10px] sm:text-[11px] text-neutral-500 mt-0.5">Per porsi</p>
                    </div>
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-[#faf4ea] text-[#a4864b] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>

                {{-- Card 4: Kategori Paket --}}
                <div class="bg-white p-4 sm:p-5 rounded-3xl border border-neutral-200/80 shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div>
                        <p class="text-[10px] sm:text-[11px] font-bold text-neutral-400 uppercase tracking-wider">KATEGORI</p>
                        <h4 class="text-xl sm:text-2xl font-black text-neutral-900 mt-0.5 sm:mt-1">{{ $totalCategories ?? (isset($categories) ? count($categories) : 0) }}</h4>
                        <p class="text-[10px] sm:text-[11px] text-neutral-500 mt-0.5">Kategori aktif</p>
                    </div>
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-neutral-100 text-neutral-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- 3. FILTER & PENCARIAN INSTAN --}}
            <div class="bg-white p-5 rounded-3xl border border-neutral-200/80 shadow-xs space-y-4">
                
                {{-- Search Box & Header --}}
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4">
                    <div>
                        <h4 class="text-base font-bold text-neutral-900">Katalog &amp; Pengelolaan Produk</h4>
                        <p class="text-xs text-neutral-500">Kelola informasi paket menu, harga, kasta paket, dan foto makanan.</p>
                    </div>

                    {{-- Search Input --}}
                    <div class="relative min-w-[260px]">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" 
                            x-model="searchQuery" 
                            placeholder="Cari nama paket menu..." 
                            class="w-full pl-10 pr-4 py-2.5 rounded-2xl border border-neutral-200 text-xs text-neutral-900 placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]">
                    </div>
                </div>

                {{-- Filter Tabs Category & Tier --}}
                <div class="space-y-2.5 pt-3 border-t border-neutral-100">
                    {{-- Kategori --}}
                    <div class="flex flex-wrap items-center gap-2 overflow-x-auto pb-1">
                        <span class="text-[11px] font-bold text-neutral-400 uppercase tracking-wider mr-1 shrink-0">Kategori:</span>
                        <button type="button" @click="activeTab = 'all_category'" 
                            :class="activeTab === 'all_category' ? 'bg-[#1a120b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                            class="px-3.5 py-1.5 rounded-full text-xs font-semibold transition cursor-pointer shrink-0">
                            Semua Kategori
                        </button>
                        @if(isset($categories))
                            @foreach($categories as $cat)
                                <button type="button" @click="activeTab = '{{ Str::slug($cat->name) }}'" 
                                    :class="activeTab === '{{ Str::slug($cat->name) }}' ? 'bg-[#1a120b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                                    class="px-3.5 py-1.5 rounded-full text-xs font-semibold transition cursor-pointer shrink-0">
                                    {{ $cat->name }}
                                </button>
                            @endforeach
                        @endif
                    </div>

                    {{-- Kasta / Tier --}}
                    <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-neutral-100 overflow-x-auto pb-1">
                        <span class="text-[11px] font-bold text-neutral-400 uppercase tracking-wider mr-1 shrink-0">Kasta Menu:</span>
                        <button type="button" @click="activeTier = 'all_tier'" 
                            :class="activeTier === 'all_tier' ? 'bg-[#a4864b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                            class="px-3 py-1 rounded-full text-xs font-semibold transition cursor-pointer shrink-0">
                            Semua Kasta
                        </button>
                        <button type="button" @click="activeTier = 'silver'" 
                            :class="activeTier === 'silver' ? 'bg-[#a4864b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                            class="px-3 py-1 rounded-full text-xs font-semibold transition cursor-pointer shrink-0">
                            Silver
                        </button>
                        <button type="button" @click="activeTier = 'gold'" 
                            :class="activeTier === 'gold' ? 'bg-[#a4864b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                            class="px-3 py-1 rounded-full text-xs font-semibold transition cursor-pointer shrink-0">
                            Gold
                        </button>
                        <button type="button" @click="activeTier = 'premium'" 
                            :class="activeTier === 'premium' ? 'bg-[#a4864b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                            class="px-3 py-1 rounded-full text-xs font-semibold transition cursor-pointer shrink-0">
                            Premium
                        </button>
                    </div>
                </div>

            </div>

            {{-- 4. GRID KATALOG PAKET MENU --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($products as $product)
                    @php
                        $categorySlug = Str::slug($product->package_category);
                        $tierSlug = Str::slug($product->tier ?? 'general');
                        $nameLower = strtolower($product->name);
                    @endphp

                    <div x-show="(activeTab === 'all_category' || activeTab === '{{ $categorySlug }}') && (activeTier === 'all_tier' || activeTier === '{{ $tierSlug }}') && (searchQuery === '' || '{{ $nameLower }}'.includes(searchQuery.toLowerCase()))"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="bg-white rounded-3xl p-5 border border-neutral-200/80 shadow-xs flex flex-col justify-between hover:border-[#a4864b]/60 transition duration-300">
                        
                        <div>
                            {{-- Foto Produk --}}
                            <div class="relative h-48 rounded-2xl overflow-hidden bg-neutral-100">
                                @if($product->image_url || $product->image)
                                    <img src="{{ $product->image_url ?? asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                                        class="w-full h-full object-cover"
                                        onerror="this.onerror=null; this.src='/images/PaketGoldAyamBakar.png';">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-neutral-400 text-xs font-medium">
                                        Tidak Ada Foto
                                    </div>
                                @endif

                                @if($product->is_bestseller)
                                    <span class="absolute top-3 left-3 bg-white/95 text-[#a4864b] text-[10px] font-bold px-3 py-1 rounded-full shadow-xs flex items-center gap-1 border border-neutral-200">
                                        <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span>Best Seller</span>
                                    </span>
                                @endif

                                <div class="absolute top-3 right-3 flex flex-col items-end gap-1">
                                    <span class="bg-[#1a120b] text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow-xs">
                                        {{ $product->package_category }}
                                    </span>
                                    @if($product->tier)
                                        <span class="bg-[#a4864b] text-white text-[9px] uppercase font-bold px-2 py-0.5 rounded-full shadow-xs">
                                            {{ $product->tier }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Title & Harga --}}
                            <div class="mt-4 space-y-1">
                                <h4 class="font-bold text-neutral-900 text-base leading-snug line-clamp-1">{{ $product->name }}</h4>
                                <p class="text-[#a4864b] font-extrabold text-lg">
                                    Rp {{ number_format($product->price, 0, ',', '.') }} <span class="text-xs font-normal text-neutral-400">/ pax</span>
                                </p>
                            </div>

                            {{-- Min Order & Menu --}}
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-neutral-100 text-[11px]">
                                <div>
                                    <p class="text-neutral-400 font-medium">Min. Order</p>
                                    <p class="font-bold text-neutral-800 mt-0.5">{{ $product->min_order }} porsi</p>
                                </div>
                                <div>
                                    <p class="text-neutral-400 font-medium">Menu Utama</p>
                                    <p class="font-bold text-neutral-800 mt-0.5 line-clamp-2">{{ $product->main_menu }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="grid grid-cols-2 gap-2.5 mt-5 pt-3 border-t border-neutral-100">
                            {{-- Edit Button --}}
                            <a href="{{ route('admin.products.edit', $product->id) }}" 
                                class="py-2.5 px-3 rounded-xl border border-neutral-300 hover:border-neutral-900 text-neutral-800 hover:bg-neutral-50 font-bold text-xs text-center transition flex items-center justify-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                                <span>Edit Menu</span>
                            </a>

                            {{-- Delete Button --}}
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket {{ $product->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="w-full py-2.5 px-3 rounded-xl bg-red-50 hover:bg-red-100 text-red-700 font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <svg class="w-3.5 h-3.5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-neutral-400 bg-white rounded-3xl border border-neutral-200/80">
                        Belum ada paket menu yang ditambahkan. Silakan klik tombol <strong>Tambah Menu Baru</strong> di atas.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>