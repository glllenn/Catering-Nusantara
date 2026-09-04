<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-8 bg-[#faf7f2] min-h-screen" 
        x-data="{ 
            activeTab: 'all_category', 
            activeTier: 'all_tier',
            searchQuery: ''
        }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- Alert Sukses --}}
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

            {{-- Header Katalog + Tombol Tambah --}}
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-6 rounded-3xl border border-neutral-200/80 shadow-xs">
                <div>
                    <h3 class="text-xl font-bold text-neutral-900">Katalog Seluruh Paket Menu</h3>
                    <p class="text-xs text-neutral-500 mt-1">Kelola data menu, harga paket, minimal pemesanan, dan foto hidangan.</p>
                </div>
                
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.dashboard') }}" 
                        class="px-4 py-2.5 rounded-2xl border border-neutral-200 text-neutral-600 hover:text-neutral-900 hover:bg-neutral-50 font-bold text-xs transition flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('admin.products.create') }}" 
                        class="bg-[#a4864b] hover:bg-[#8f723c] text-white font-bold px-5 py-2.5 rounded-2xl text-xs transition shadow-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Tambah Menu Baru</span>
                    </a>
                </div>
            </div>

            {{-- Filter Kategori & Kasta (Tab Interaktif) --}}
            <div class="bg-white p-5 rounded-3xl border border-neutral-200/80 shadow-xs space-y-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-[11px] font-bold text-neutral-400 uppercase tracking-wider mr-1">Kategori:</span>
                    <button type="button" @click="activeTab = 'all_category'" 
                        :class="activeTab === 'all_category' ? 'bg-[#1a120b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                        class="px-3.5 py-1.5 rounded-full text-xs font-semibold transition cursor-pointer">
                        Semua Kategori
                    </button>
                    @if(isset($categories))
                        @foreach($categories as $cat)
                            <button type="button" @click="activeTab = '{{ Str::slug($cat->name) }}'" 
                                :class="activeTab === '{{ Str::slug($cat->name) }}' ? 'bg-[#1a120b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                                class="px-3.5 py-1.5 rounded-full text-xs font-semibold transition cursor-pointer">
                                {{ $cat->name }}
                            </button>
                        @endforeach
                    @endif
                </div>

                <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-neutral-100">
                    <span class="text-[11px] font-bold text-neutral-400 uppercase tracking-wider mr-1">Kasta Menu:</span>
                    <button type="button" @click="activeTier = 'all_tier'" 
                        :class="activeTier === 'all_tier' ? 'bg-[#a4864b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                        class="px-3 py-1 rounded-full text-xs font-semibold transition cursor-pointer">
                        Semua Kasta
                    </button>
                    <button type="button" @click="activeTier = 'silver'" 
                        :class="activeTier === 'silver' ? 'bg-[#a4864b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                        class="px-3 py-1 rounded-full text-xs font-semibold transition cursor-pointer">
                        Silver
                    </button>
                    <button type="button" @click="activeTier = 'gold'" 
                        :class="activeTier === 'gold' ? 'bg-[#a4864b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                        class="px-3 py-1 rounded-full text-xs font-semibold transition cursor-pointer">
                        Gold
                    </button>
                    <button type="button" @click="activeTier = 'premium'" 
                        :class="activeTier === 'premium' ? 'bg-[#a4864b] text-white shadow-xs' : 'bg-[#fdfbf7] text-neutral-600 hover:text-neutral-900 border border-neutral-200'"
                        class="px-3 py-1 rounded-full text-xs font-semibold transition cursor-pointer">
                        Premium
                    </button>
                </div>
            </div>

            {{-- Grid Katalog Card UI --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($products as $product)
                    @php
                        $categorySlug = Str::slug($product->package_category);
                        $tierSlug = Str::slug($product->tier ?? 'general');
                    @endphp

                    <div x-show="(activeTab === 'all_category' || activeTab === '{{ $categorySlug }}') && (activeTier === 'all_tier' || activeTier === '{{ $tierSlug }}')"
                        x-transition
                        class="bg-white rounded-3xl p-5 border border-neutral-200/80 shadow-xs flex flex-col justify-between hover:border-[#a4864b]/60 transition duration-300">
                        <div>
                            {{-- Foto Produk --}}
                            <div class="relative h-48 rounded-2xl overflow-hidden bg-neutral-100">
                                @if($product->image_url || $product->image)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='/images/PaketGoldAyamBakar.png';">
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
                            <a href="{{ route('admin.products.edit', $product->id) }}" 
                                class="py-2.5 px-3 rounded-xl border border-neutral-300 hover:border-neutral-900 text-neutral-800 hover:bg-neutral-50 font-bold text-xs text-center transition flex items-center justify-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                                <span>Edit Menu</span>
                            </a>

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
                        Belum ada paket menu yang ditambahkan.
                    </div>
                @endforelse
            </div>

            @if(method_exists($products, 'links'))
                <div class="pt-4">
                    {{ $products->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>