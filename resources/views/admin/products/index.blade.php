<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Katalog Paket Menu') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Alert Sukses --}}
            @if(session('success'))
                <div class="bg-orange-50 border-l-4 border-orange-500 text-orange-800 p-4 rounded-2xl shadow-sm font-semibold text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Header Katalog + Tombol Tambah --}}
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-2xl font-black text-gray-900">Daftar Seluruh Paket Menu</h3>
                    <p class="text-xs text-gray-500 mt-1">Kelola informasi paket menu, harga, porsi, serta foto produk Catering Nusantara.</p>
                </div>
                <a href="{{ route('admin.products.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-5 py-2.5 rounded-2xl text-sm transition shadow-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                    Tambah Paket Baru
                </a>
            </div>

            {{-- Grid Katalog Card UI (Presisi dengan Dashboard) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($products as $product)
                    <div class="bg-white rounded-3xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                        <div>
                            {{-- Thumbnail Foto Rounded --}}
                            <div class="relative h-52 rounded-2xl overflow-hidden bg-gray-100">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs font-medium">
                                        Tidak Ada Foto
                                    </div>
                                @endif

                                @if($product->is_bestseller)
                                    <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm text-orange-600 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 fill-current text-amber-500" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        Favorit Menu
                                    </span>
                                @endif

                                <span class="absolute top-3 right-3 bg-orange-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full shadow-sm">
                                    {{ $product->package_category }}
                                </span>
                            </div>

                            {{-- Informasi Judul & Harga --}}
                            <div class="mt-4 space-y-1">
                                <h4 class="font-bold text-gray-900 text-lg leading-snug">{{ $product->name }}</h4>
                                <p class="text-orange-500 font-extrabold text-xl">
                                    Rp {{ number_format($product->price, 0, ',', '.') }} <span class="text-xs font-normal text-gray-400">/ pax</span>
                                </p>
                            </div>

                            {{-- Detail Min Order & Menu Utama --}}
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-4 border-t border-gray-100 text-xs">
                                <div class="flex items-start gap-2">
                                    <div class="text-gray-400 mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Min. Order</p>
                                        <p class="font-bold text-gray-800 mt-0.5">{{ $product->min_order }} porsi</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-2">
                                    <div class="text-gray-400 mt-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Menu Utama</p>
                                        <p class="font-bold text-gray-800 mt-0.5 line-clamp-2">{{ $product->main_menu }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Action Edit & Hapus --}}
                        <div class="grid grid-cols-2 gap-3 mt-6">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="w-full py-2.5 px-4 rounded-xl border border-orange-500 text-orange-500 hover:bg-orange-50 font-bold text-xs transition flex items-center justify-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Edit
                            </a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket {{ $product->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-orange-100/60 hover:bg-orange-200/80 text-orange-700 font-bold text-xs transition flex items-center justify-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    Hapus
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

            {{-- Navigasi Pagination --}}
            <div class="mt-6">
                {{ $products->links() }}
            </div>

        </div>
    </div>
</x-app-layout>