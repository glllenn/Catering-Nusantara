<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                {{ __('Edit Paket Menu: ') . $product->name }}
            </h2>
            <a href="{{ route('admin.dashboard') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2 px-4 rounded-xl text-sm transition flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50/50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 md:p-8">
                
                {{-- Alert Error Validasi --}}
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-2xl">
                        <p class="font-bold text-sm">Terjadi kesalahan input:</p>
                        <ul class="list-disc list-inside text-xs mt-1 space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Informasi Utama Paket --}}
                    <div>
                        <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">Informasi Utama Paket</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Nama Paket Menu --}}
                            <div>
                                <x-input-label for="name" :value="__('Nama Paket Menu')" />
                                <x-text-input id="name" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-orange-500 focus:ring-orange-500 text-sm" type="text" name="name" :value="old('name', $product->name)" required />
                            </div>

                            {{-- Kasta / Tier Paket (Opsi Ditentukan Admin) --}}
                            <div>
                                <x-input-label for="tier" :value="__('Kasta / Tier Paket')" />
                                <select id="tier" name="tier" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-orange-500 focus:ring-orange-500 text-sm" required>
                                    <option value="Silver" {{ old('tier', $product->tier) == 'Silver' ? 'selected' : '' }}>Silver</option>
                                    <option value="Gold" {{ old('tier', $product->tier) == 'Gold' ? 'selected' : '' }}>Gold</option>
                                    <option value="Premium" {{ old('tier', $product->tier) == 'Premium' ? 'selected' : '' }}>Premium</option>
                                </select>
                            </div>

                            {{-- Kategori Paket Dinamis --}}
                            <div>
                                <x-input-label for="package_category" :value="__('Kategori Paket')" />
                                <select id="package_category" name="package_category" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-orange-500 focus:ring-orange-500 text-sm" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @if(isset($categories) && count($categories) > 0)
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->name }}" {{ old('package_category', $product->package_category) == $cat->name ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    @else
                                        @foreach(['Nasi Box', 'Prasmanan', 'Snack Box', 'Tumpeng'] as $cat)
                                            <option value="{{ $cat }}" {{ old('package_category', $product->package_category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            {{-- Kategori Acara --}}
                            <div>
                                <x-input-label for="event_category" :value="__('Kategori Acara')" />
                                <select id="event_category" name="event_category" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-orange-500 focus:ring-orange-500 text-sm">
                                    @foreach(['Kantor', 'Pernikahan', 'Ulang Tahun', 'Arisan', 'Umum'] as $evt)
                                        <option value="{{ $evt }}" {{ old('event_category', $product->event_category) == $evt ? 'selected' : '' }}>{{ $evt }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Harga per Porsi --}}
                            <div>
                                <x-input-label for="price" :value="__('Harga per Porsi / Pax (Rp)')" />
                                <x-text-input id="price" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-orange-500 focus:ring-orange-500 text-sm" type="number" name="price" :value="old('price', $product->price)" required />
                            </div>

                            {{-- Minimal Order --}}
                            <div>
                                <x-input-label for="min_order" :value="__('Minimal Order (Porsi)')" />
                                <x-text-input id="min_order" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-orange-500 focus:ring-orange-500 text-sm" type="number" name="min_order" :value="old('min_order', $product->min_order)" required />
                            </div>

                            {{-- Jenis Kemasan --}}
                            <div class="md:col-span-2">
                                <x-input-label for="packaging_type" :value="__('Jenis Kemasan')" />
                                <x-text-input id="packaging_type" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-orange-500 focus:ring-orange-500 text-sm" type="text" name="packaging_type" :value="old('packaging_type', $product->packaging_type)" />
                            </div>
                        </div>
                    </div>

                    {{-- Detail Rincian Menu --}}
                    <div class="pt-6 border-t border-gray-100">
                        <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">Detail Rincian Menu</h3>
                        <div class="space-y-4">
                            <div>
                                <x-input-label for="main_menu" :value="__('Menu Utama (Lauk & Masakan Lengkap)')" />
                                <textarea id="main_menu" name="main_menu" rows="2" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-orange-500 focus:ring-orange-500 text-sm" required>{{ old('main_menu', $product->main_menu) }}</textarea>
                            </div>

                            <div>
                                <x-input-label for="includes" :value="__('Termasuk (Nasi / Minuman / Buah)')" />
                                <x-text-input id="includes" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-orange-500 focus:ring-orange-500 text-sm" type="text" name="includes" :value="old('includes', $product->includes)" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Deskripsi Singkat')" />
                                <textarea id="description" name="description" rows="3" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-orange-500 focus:ring-orange-500 text-sm">{{ old('description', $product->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Upload Foto & Status Paket --}}
                    <div class="pt-6 border-t border-gray-100">
                        <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">Foto & Pengaturan Menu</h3>
                        <div class="space-y-4">
                            <div>
                                <x-input-label for="image" :value="__('Ganti Foto Paket Menu (Opsional)')" />
                                @if($product->image)
                                    <div class="my-3 flex items-center gap-4">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Preview" class="w-24 h-24 object-cover rounded-2xl border border-gray-200 shadow-sm">
                                        <span class="text-xs text-gray-400">Foto saat ini</span>
                                    </div>
                                @endif
                                <input id="image" type="file" name="image" accept="image/*" class="block mt-2 w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-600 hover:file:bg-orange-100 transition cursor-pointer" />
                                <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengganti foto. Maksimal 10MB.</p>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-6 pt-2">
                                <div class="flex items-center">
                                    <input id="is_bestseller" type="checkbox" name="is_bestseller" value="1" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" {{ old('is_bestseller', $product->is_bestseller) ? 'checked' : '' }}>
                                    <label for="is_bestseller" class="ml-2 text-sm font-semibold text-gray-700 cursor-pointer">
                                        Tandai sebagai Paket Favorit / Best Seller
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="is_active" type="checkbox" name="is_active" value="1" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                                    <label for="is_active" class="ml-2 text-sm font-semibold text-gray-700 cursor-pointer">
                                        Status Aktif (Tampilkan di Website Customer)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="flex justify-end pt-6 border-t border-gray-100">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded-2xl shadow-sm transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            Perbarui Paket Menu
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>