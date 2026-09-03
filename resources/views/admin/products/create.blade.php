<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-8 bg-[#faf7f2] min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            {{-- Navigation Bar Header --}}
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.dashboard') }}" 
                        class="p-2.5 rounded-2xl bg-white border border-neutral-200 text-neutral-600 hover:text-neutral-900 hover:bg-neutral-50 transition shadow-2xs group">
                        <svg class="w-4 h-4 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <div>
                        <h2 class="font-bold text-xl text-neutral-900 leading-tight">
                            Tambah Paket Menu Baru
                        </h2>
                        <p class="text-xs text-neutral-500">Lengkapi detail informasi hidangan untuk ditampilkan pada katalog.</p>
                    </div>
                </div>

                <a href="{{ route('admin.dashboard') }}" 
                    class="hidden sm:inline-flex items-center gap-2 bg-white hover:bg-neutral-50 border border-neutral-200 text-neutral-700 font-bold py-2.5 px-4 rounded-2xl text-xs transition shadow-2xs">
                    <svg class="w-4 h-4 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali ke Dashboard</span>
                </a>
            </div>

            {{-- Form Card --}}
            <div class="bg-white rounded-3xl border border-neutral-200/80 shadow-xs p-6 md:p-8">
                
                {{-- Alert Error Validasi --}}
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 p-4 rounded-2xl">
                        <p class="font-bold text-xs uppercase tracking-wider">Periksa kembali data formulir:</p>
                        <ul class="list-disc list-inside text-xs mt-1 space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.products.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data" 
                    class="space-y-6"
                    x-data="{
                        formattedPrice: '{{ old('price') ? number_format(old('price'), 0, ',', '.') : '' }}',
                        rawPrice: '{{ old('price', '') }}',
                        formatRupiah(e) {
                            let val = e.target.value.replace(/[^0-9]/g, '');
                            this.rawPrice = val;
                            if (val) {
                                this.formattedPrice = new Intl.NumberFormat('id-ID').format(val);
                            } else {
                                this.formattedPrice = '';
                            }
                        }
                    }">
                    @csrf

                    {{-- 1. INFORMASI UTAMA PAKET --}}
                    <div>
                        <div class="flex items-center gap-2 pb-3 mb-4 border-b border-neutral-100">
                            <span class="w-2 h-2 rounded-full bg-[#a4864b]"></span>
                            <h3 class="text-xs font-bold text-neutral-500 uppercase tracking-wider">Informasi Utama Paket</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Nama Paket Menu --}}
                            <div class="md:col-span-2">
                                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Nama Paket Menu <span class="text-red-500">*</span>
                                </label>
                                <input id="name" 
                                    type="text" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required 
                                    placeholder="Contoh: Paket Nasi Box Ayam Lengkuas Special" 
                                    class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]" />
                            </div>

                            {{-- Kasta / Tier Paket --}}
                            <div>
                                <label for="tier" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Kasta / Tier Paket <span class="text-red-500">*</span>
                                </label>
                                <select id="tier" name="tier" required 
                                    class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]">
                                    <option value="">-- Pilih Kasta Paket --</option>
                                    <option value="Silver" {{ old('tier') == 'Silver' ? 'selected' : '' }}>Silver (Hemat &amp; Praktis)</option>
                                    <option value="Gold" {{ old('tier') == 'Gold' ? 'selected' : '' }}>Gold (Favorit &amp; Komplit)</option>
                                    <option value="Premium" {{ old('tier') == 'Premium' ? 'selected' : '' }}>Premium (Mewah &amp; Eksklusif)</option>
                                </select>
                            </div>

                            {{-- Kategori Paket Dinamis --}}
                            <div>
                                <label for="package_category" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Kategori Paket <span class="text-red-500">*</span>
                                </label>
                                <select id="package_category" name="package_category" required 
                                    class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]">
                                    <option value="">-- Pilih Kategori --</option>
                                    @if(isset($categories) && count($categories) > 0)
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->name }}" {{ old('package_category') == $cat->name ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="Nasi Box" {{ old('package_category') == 'Nasi Box' ? 'selected' : '' }}>Nasi Box</option>
                                        <option value="Prasmanan" {{ old('package_category') == 'Prasmanan' ? 'selected' : '' }}>Prasmanan</option>
                                        <option value="Snack Box" {{ old('package_category') == 'Snack Box' ? 'selected' : '' }}>Snack Box</option>
                                        <option value="Tumpeng" {{ old('package_category') == 'Tumpeng' ? 'selected' : '' }}>Tumpeng</option>
                                    @endif
                                </select>
                            </div>

                            {{-- Kategori Acara --}}
                            <div>
                                <label for="event_category" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Kategori Acara <span class="text-red-500">*</span>
                                </label>
                                <select id="event_category" name="event_category" 
                                    class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]">
                                    <option value="Kantor" {{ old('event_category') == 'Kantor' ? 'selected' : '' }}>Kantor / Rapat / Gathering</option>
                                    <option value="Pernikahan" {{ old('event_category') == 'Pernikahan' ? 'selected' : '' }}>Pernikahan &amp; Resepsi</option>
                                    <option value="Ulang Tahun" {{ old('event_category') == 'Ulang Tahun' ? 'selected' : '' }}>Ulang Tahun</option>
                                    <option value="Arisan" {{ old('event_category') == 'Arisan' ? 'selected' : '' }}>Arisan &amp; Syukuran</option>
                                    <option value="Umum" {{ old('event_category', 'Umum') == 'Umum' ? 'selected' : '' }}>Umum / Segala Acara</option>
                                </select>
                            </div>

                            {{-- Harga per Porsi (DENGAN PEMISAH RIBUAN RUPIAH) --}}
                            <div>
                                <label for="price_display" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Harga per Porsi / Pax (Rp) <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-neutral-400 font-bold text-xs">
                                        Rp
                                    </div>
                                    <input id="price_display" 
                                        type="text" 
                                        x-model="formattedPrice"
                                        @input="formatRupiah($event)"
                                        required 
                                        placeholder="25.000" 
                                        class="w-full pl-12 pr-4 py-3 rounded-2xl border border-neutral-200 text-sm font-semibold text-neutral-900 placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]" />
                                    {{-- Hidden input for pure numerical value --}}
                                    <input type="hidden" name="price" :value="rawPrice">
                                </div>
                                <p class="text-[11px] text-neutral-400 mt-1">Format otomatis dengan titik ribuan (contoh: 25.000 atau 1.500.000)</p>
                            </div>

                            {{-- Minimal Order --}}
                            <div>
                                <label for="min_order" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Minimal Order (Porsi) <span class="text-red-500">*</span>
                                </label>
                                <input id="min_order" 
                                    type="number" 
                                    name="min_order" 
                                    value="{{ old('min_order', 20) }}" 
                                    required 
                                    min="1"
                                    class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]" />
                            </div>

                            {{-- Jenis Kemasan --}}
                            <div>
                                <label for="packaging_type" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Jenis Kemasan
                                </label>
                                <input id="packaging_type" 
                                    type="text" 
                                    name="packaging_type" 
                                    value="{{ old('packaging_type') }}" 
                                    placeholder="Contoh: Box Kertas Food Grade / Mika / Tampah Bambu" 
                                    class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]" />
                            </div>
                        </div>
                    </div>

                    {{-- 2. DETAIL RINCIAN MENU --}}
                    <div class="pt-6 border-t border-neutral-100">
                        <div class="flex items-center gap-2 pb-3 mb-4 border-b border-neutral-100">
                            <span class="w-2 h-2 rounded-full bg-[#a4864b]"></span>
                            <h3 class="text-xs font-bold text-neutral-500 uppercase tracking-wider">Detail Rincian Hidangan</h3>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label for="main_menu" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Menu Utama (Lauk &amp; Masakan Lengkap) <span class="text-red-500">*</span>
                                </label>
                                <textarea id="main_menu" name="main_menu" rows="2" required 
                                    placeholder="Contoh: Ayam Goreng Lengkuas, Sambal Goreng Ati Kentang, Tempe Orek Manis, Sayur Asem Segar" 
                                    class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]">{{ old('main_menu') }}</textarea>
                            </div>

                            <div>
                                <label for="includes" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Termasuk Pelengkap (Nasi / Minuman / Buah)
                                </label>
                                <input id="includes" 
                                    type="text" 
                                    name="includes" 
                                    value="{{ old('includes') }}" 
                                    placeholder="Contoh: Nasi Putih Pulen, Air Mineral Cup, Buah Pisang / Semangka, Kerupuk Udang" 
                                    class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]" />
                            </div>

                            <div>
                                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Deskripsi Singkat / Catatan Khusus
                                </label>
                                <textarea id="description" name="description" rows="3" 
                                    placeholder="Jelaskan keunggulan rasa bumbu rempah atau catatan khusus penyajian..." 
                                    class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- 3. UPLOAD FOTO & STATUS PAKET --}}
                    <div class="pt-6 border-t border-neutral-100">
                        <div class="flex items-center gap-2 pb-3 mb-4 border-b border-neutral-100">
                            <span class="w-2 h-2 rounded-full bg-[#a4864b]"></span>
                            <h3 class="text-xs font-bold text-neutral-500 uppercase tracking-wider">Foto &amp; Status Paket</h3>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label for="image" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                                    Upload Foto Paket Hidangan
                                </label>
                                <input id="image" type="file" name="image" accept="image/*" 
                                    class="block w-full text-xs text-neutral-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-2xl file:border-0 file:text-xs file:font-bold file:bg-[#faf4ea] file:text-[#a4864b] hover:file:bg-[#f0e4d0] file:cursor-pointer transition border border-neutral-200 rounded-2xl p-2 bg-[#fdfbf7]" />
                                <p class="text-[11px] text-neutral-400 mt-1">Format gambar didukung: JPG, PNG, WEBP (Maksimal 10MB)</p>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-6 pt-3">
                                <label class="flex items-center cursor-pointer">
                                    <input id="is_bestseller" type="checkbox" name="is_bestseller" value="1" 
                                        class="w-4 h-4 rounded border-neutral-300 text-[#a4864b] focus:ring-[#a4864b]" {{ old('is_bestseller') ? 'checked' : '' }}>
                                    <span class="ml-2.5 text-xs font-semibold text-neutral-700">
                                        Tandai sebagai Paket Favorit / Best Seller
                                    </span>
                                </label>

                                <label class="flex items-center cursor-pointer">
                                    <input id="is_active" type="checkbox" name="is_active" value="1" 
                                        class="w-4 h-4 rounded border-neutral-300 text-[#a4864b] focus:ring-[#a4864b]" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                                    <span class="ml-2.5 text-xs font-semibold text-neutral-700">
                                        Status Aktif (Tampilkan di Katalog Customer)
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- SUBMIT & CANCEL BUTTONS --}}
                    <div class="flex items-center justify-end gap-3 pt-6 border-t border-neutral-100">
                        <a href="{{ route('admin.dashboard') }}" 
                            class="px-5 py-3 rounded-2xl border border-neutral-200 text-neutral-600 hover:text-neutral-900 hover:bg-neutral-50 font-bold text-xs transition">
                            Batal
                        </a>
                        <button type="submit" 
                            class="bg-[#1a120b] hover:bg-black text-white font-bold py-3 px-8 rounded-2xl text-xs transition shadow-md flex items-center gap-2 cursor-pointer">
                            <svg class="w-4 h-4 text-[#e4c990]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Simpan Paket Menu</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>