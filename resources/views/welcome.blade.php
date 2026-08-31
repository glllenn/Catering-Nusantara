<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Catering Nusantara') }} - Cita Rasa Autentik Indonesia</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <link href="https://api.fontshare.com/v2/css?f[]=perandory@400,500,600,700&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite (Tailwind CSS) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        /* Custom Hex Accent Color sesuai Canva */
        .bg-canva-orange {
            background-color: #f6a11a;
        }

        .text-canva-orange {
            color: #f6a11a;
        }

        .border-canva-orange {
            border-color: #f6a11a;
        }

        .shadow-canva-orange {
            box-shadow: 0 10px 25px -5px rgba(246, 161, 26, 0.35);
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body x-data
    class="font-['Plus_Jakarta_Sans',sans-serif] bg-white text-gray-900 antialiased selection:bg-[#f6a11a] selection:text-white">

   <section id="beranda" class="relative min-h-screen flex flex-col justify-between overflow-hidden bg-[#140d07]">

    {{-- FOTO BACKGROUND HERO DENGAN KECERAHAN PAS (TIDAK TERLALU GELAP) --}}
    <div class="absolute inset-0 w-full h-full">
        <img src="{{ asset('images/herobaru.jpg') }}" alt="Catering Tumpeng Nusantara"
            class="w-full h-full object-fill filter brightness-65 contrast-105" 
            onerror="this.onerror=null; this.src='/image/herobaru.jpg';" />
        
        {{-- Overlay Gelap Tipis (Transparan Halus) --}}
        <div class="absolute inset-0 bg-black/30 pointer-events-none"></div>
    </div>

    {{-- NAVBAR — Fixed, Full-Width --}}
    <header id="site-header"
    class="fixed top-0 left-0 w-full z-20 border-b border-transparent transition-all duration-300">
    <div class="w-full px-6 sm:px-10 lg:px-16 h-28 flex items-center justify-between">

        {{-- Logo Diperbesar Lagi --}}
        <a href="#beranda" class="flex items-center gap-3 shrink-0">
            <img src="{{ asset('images/logo.png') }}" alt="Logo"
                class="h-20 md:h-24 w-auto object-contain transition-transform duration-300 hover:scale-105"
                onerror="this.onerror=null; this.src='/image/logo.png';" />
        </a>

        {{-- Menu Navigasi Utama (Jarak Antar Teks Diperlebar: gap-12 lg:gap-16) --}}
        <nav class="hidden md:flex items-center gap-12 lg:gap-16 text-lg font-bold tracking-wider" id="nav-menu">
            <a href="#beranda" data-section="beranda" 
                class="nav-item text-white/70 hover:text-white transition-all duration-300">
                Beranda
            </a>
            <a href="#tentang-kami" data-section="tentang-kami" 
                class="nav-item text-white/70 hover:text-white transition-all duration-300">
                Tentang Kami
            </a>
            <a href="#paket" data-section="paket" 
                class="nav-item text-white/70 hover:text-white transition-all duration-300">
                Paket
            </a>
            <a href="#galeri" data-section="galeri" 
                class="nav-item text-white/70 hover:text-white transition-all duration-300">
                Galeri
            </a>
            <a href="#testimoni" data-section="testimoni" 
                class="nav-item text-white/70 hover:text-white transition-all duration-300">
                Testimoni
            </a>
            <a href="#cara_pemesanan" data-section="cara_pemesanan" 
                class="nav-item text-white/70 hover:text-white transition-all duration-300">
                Order
            </a>
        </nav>

        {{-- Tombol Keranjang Belanja (Berjarak/Memiliki Ruang Khusus di Kanan: ml-4 sm:ml-8) --}}
        <div class="flex items-center ml-4 sm:ml-8">
            <button type="button" @click="$store.cart.toggle()"
                class="relative p-3.5 rounded-full text-white/90 hover:text-white hover:bg-white/10 transition-all flex items-center justify-center cursor-pointer group"
                title="Buka Keranjang Belanja">
                <svg class="w-8 h-8 transform group-hover:scale-110 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span x-show="$store.cart && $store.cart.totalCount > 0"
                    x-text="$store.cart ? $store.cart.totalCount : 0"
                    x-transition:enter="transition ease-out duration-200 transform"
                    x-transition:enter-start="scale-0" x-transition:enter-end="scale-100"
                    class="absolute -top-1 -right-1 bg-[#f6a11a] text-white text-[11px] font-black h-5 min-w-[20px] px-1.5 rounded-full flex items-center justify-center border-2 border-[#140d07] shadow-lg animate-pulse"
                    style="display: none;">
                </span>
            </button>
        </div>
    </div>
</header>

    {{-- KONTEN HERO — Menggunakan Font Perandory Semicondensed (Ukuran Ekstra Besar) --}}
    <div class="relative z-10 w-full px-6 md:px-16 lg:px-20 pt-32 pb-10 my-auto">
        <div class="max-w-5xl">

            <h1 class="font-['Perandory','Playfair_Display',serif] text-6xl sm:text-8xl lg:text-[160px] tracking-normal leading-[0.98] uppercase">
                <span class="block text-white">WELCOME TO</span>
                <span class="block text-white">CATERING</span>
                <span class="block text-[#a4864b]">NUSANTARA</span>
            </h1>

        </div>
    </div>

    {{-- Garis Putih Tipis Horizontal Pembatas di Bagian Bawah Hero --}}
    <div class="relative z-10 w-full px-6 md:px-16 lg:px-20 pb-8">
        <div class="w-full h-[1.5px] bg-white/40"></div>
    </div>

</section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const header = document.getElementById('site-header');
            const hero = document.getElementById('beranda');
            if (!header || !hero) return;

            function toggleHeader() {
                const heroBottom = hero.offsetTop + hero.offsetHeight;
                const scrolledPastHero = window.scrollY + header.offsetHeight >= heroBottom;

                if (scrolledPastHero) {
                    header.classList.add('bg-[#140d07]/95', 'backdrop-blur-md', 'border-white/10');
                    header.classList.remove('border-transparent');
                } else {
                    header.classList.remove('bg-[#140d07]/95', 'backdrop-blur-md', 'border-white/10');
                    header.classList.add('border-transparent');
                }
            }

            toggleHeader();
            window.addEventListener('scroll', toggleHeader);
            window.addEventListener('resize', toggleHeader);
        });
    </script>

    {{-- ✨ PEMISAH TRANSISI: Wave halus agar batas hero gelap → section putih tidak patah
    <div class="absolute bottom-0 left-0 w-full leading-[0] z-10 pointer-events-none" aria-hidden="true">
        <svg class="w-full h-[60px] sm:h-[90px]" viewBox="0 0 1440 100" preserveAspectRatio="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0,40 C240,90 480,0 720,20 C960,40 1200,100 1440,50 L1440,100 L0,100 Z" fill="#ffffff"></path>
        </svg>
    </div> --}}

<!-- ========================================== -->
<!-- 2. SECTION TENTANG KAMI                    -->
<!-- ========================================== -->
<section id="tentang-kami" class="scroll-mt-50 min-h-screen flex flex-col justify-center py-28 lg:py-36 bg-white relative overflow-hidden">
    
    <div class="max-w-[1340px] mx-auto px-6 sm:px-10 lg:px-16 w-full space-y-20 lg:space-y-32">
        
        {{-- BARIS ATAS: JUDUL UTAMA (KIRI) & DESKRIPSI LENGKAP (KANAN) --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-start">
            
            <!-- KOLOM KIRI: HEADING JUDUL (TENTANG KAMI + GARIS DI SAMPING) -->
            <div class="lg:col-span-4 flex flex-col items-start pt-2">
                
                {{-- Text TENTANG Jumbo --}}
                <h2 class="font-['Perandory','Playfair_Display',serif] text-6xl sm:text-7xl lg:text-[84px] tracking-wider text-[#a4864b] uppercase leading-none">
                    TENTANG
                </h2>
                
                {{-- Container KAMI + Garis Hitam Horizontal di SAMPING --}}
                <div class="flex items-center gap-4 mt-2 w-full max-w-[280px]">
                    <span class="text-base sm:text-lg font-medium tracking-[0.3em] text-gray-600 uppercase shrink-0">
                        KAMI
                    </span>
                    {{-- Garis Hitam di Samping Kata KAMI --}}
                    <div class="flex-1 h-[2.5px] bg-black"></div>
                </div>

            </div>

         <!-- KOLOM KANAN: DESKRIPSI UTAMA (DIBUAT LEBIH TURUN & LEBIH KE KANAN) -->
<div class="lg:col-span-7 lg:col-start-6 space-y-8 text-left pt-16 lg:pt-52 lg:pl-8">

    {{-- Headline Utama Bold --}}
    <h3 class="text-3xl sm:text-4xl lg:text-[44px] font-extrabold text-black leading-[1.18] tracking-tight">
        Cita Rasa Nusantara,<br class="hidden sm:inline" />
        Disajikan dengan Sepenuh Hati
    </h3>

    {{-- Paragraf Konten --}}
    <div class="space-y-5 text-gray-700 text-base sm:text-lg lg:text-[19px] leading-relaxed font-normal">
        <p>
            Catering Nusantara menghadirkan aneka hidangan khas Indonesia dengan cita rasa autentik, menggunakan bahan berkualitas dan olahan yang higienis. Kami melayani berbagai kebutuhan acara, mulai dari syukuran, pernikahan, rapat, hingga acara keluarga dengan pilihan menu yang beragam dan pelayanan terbaik.
        </p>
        <p>
            Menghadirkan pengalaman kuliner Indonesia yang autentik dengan cita rasa khas Nusantara, bahan berkualitas, dan pelayanan terpercaya. Catering Nusantara menjadi solusi hidangan praktis untuk berbagai acara dengan pilihan menu beragam, penyajian higienis, serta rasa lezat yang menghadirkan kepuasan bagi setiap pelanggan.
        </p>
    </div>

</div>

        </div>
{{-- BARIS BAWAH: VISI MISI (DIATASIN SEDIKIT / JARAK LEBIH PAS) --}}
<div class="pt-2 lg:pt-4 flex flex-col sm:flex-row items-start sm:items-center gap-6 lg:gap-8">
    
    {{-- Pill Button Visi Misi --}}
    <span class="inline-flex items-center justify-center bg-[#a4864b] text-white font-medium text-base sm:text-lg px-9 py-3 rounded-full shrink-0 shadow-sm">
        Visi Misi
    </span>

    {{-- Teks Deskripsi Visi Misi --}}
    <p class="text-sm sm:text-base text-gray-700 leading-relaxed max-w-3xl">
        Menjadi penyedia jasa catering Nusantara terpercaya yang menyajikan hidangan autentik berkualitas tinggi melalui pelayanan profesional, higienis, dan inovatif demi kepuasan pelanggan di setiap acara.
    </p>
</div>

    </div>
</section>
     
<!-- ========================================== -->
<!-- 4. SECTION PAKET KAMI (Full Dynamic & Interaktif) -->
<!-- ========================================== -->
<section id="paket" class="scroll-mt-24 py-24 bg-white relative" 
    x-data="{ 
        activeCategory: 'semua',
        selectedProduct: null,
        isModalOpen: false,
        portion: 1,
        address: '',
        
        openModal(product) {
            this.selectedProduct = product;
            this.portion = product.min_order ? parseInt(product.min_order) : 1;
            this.address = '';
            this.isModalOpen = true;
            document.body.classList.add('overflow-hidden');
        },
        closeModal() {
            this.isModalOpen = false;
            document.body.classList.remove('overflow-hidden');
        },
        incrementPortion() {
            this.portion++;
        },
        decrementPortion() {
            let min = this.selectedProduct && this.selectedProduct.min_order ? parseInt(this.selectedProduct.min_order) : 1;
            if (this.portion > min) {
                this.portion--;
            }
        },
        addToCart() {
            if (this.selectedProduct) {
                let itemPayload = {
                    ...this.selectedProduct,
                    qty: this.portion,
                    address_note: this.address
                };
                if (window.Alpine && Alpine.store('cart')) {
                    Alpine.store('cart').addItem(itemPayload);
                }
                this.closeModal();
            }
        }
    }">

    <div class="max-w-[1340px] mx-auto px-6 sm:px-10 lg:px-16 w-full space-y-12">

        {{-- HEADLINE SECTION PAKET --}}
        <div class="text-left">
            <div class="flex flex-col items-start pt-2">
                <h2 class="font-['Perandory','Playfair_Display',serif] text-6xl sm:text-7xl lg:text-[84px] tracking-wider text-[#a4864b] uppercase leading-none">
                    PAKET
                </h2>
                <div class="flex items-center gap-4 mt-2 w-full max-w-[280px]">
                    <span class="text-base sm:text-lg font-medium tracking-[0.3em] text-gray-600 uppercase shrink-0">
                        KAMI
                    </span>
                    <div class="flex-1 h-[2.5px] bg-black"></div>
                </div>
            </div>
        </div>

        {{-- FILTER PIL CAPSULE INTERAKTIF (4 KATEGORI UTAMA + SEMUA) --}}
        <div class="flex flex-wrap items-center gap-3 sm:gap-4 pt-2">
            @php
                $filters = [
                    'semua' => 'Semua',
                    'gold' => 'Gold',
                    'silver' => 'Silver',
                    'premium' => 'Premium',
                    'tumpeng' => 'Tumpeng'
                ];
            @endphp

            @foreach($filters as $key => $label)
                <button type="button" 
                    @click="activeCategory = '{{ $key }}'"
                    :class="activeCategory === '{{ $key }}' 
                        ? 'bg-[#a4864b] text-white shadow-sm' 
                        : 'bg-white text-[#a4864b] border-[1.5px] border-[#a4864b]/70 hover:bg-orange-50/40'"
                    class="inline-flex items-center justify-center font-medium text-base sm:text-lg px-8 py-2.5 rounded-full shrink-0 transition-all duration-200 cursor-pointer">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        {{-- GRID KATALOG PRODUK --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
            @forelse($products ?? [] as $product)
                @php
                    // Helper slug dari category & tier backend
                    $catSlug = Str::slug($product->package_category ?? '');
                    $tierSlug = Str::slug($product->tier ?? '');
                    $nameSlug = Str::slug($product->name ?? '');
                @endphp

                {{-- CARD UTAMA --}}
                <div 
                    x-show="activeCategory === 'semua' || '{{ $catSlug }}'.includes(activeCategory) || '{{ $tierSlug }}'.includes(activeCategory) || '{{ $nameSlug }}'.includes(activeCategory)"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    @click="openModal({{ json_encode($product) }})"
                    class="bg-white rounded-3xl overflow-hidden border border-gray-100/80 shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer group flex flex-col p-4">
                    
                    {{-- Container Foto Menjorok (Inset) --}}
                    <div class="relative aspect-[1/1] w-full rounded-[2.2rem] overflow-hidden bg-gray-100">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs font-medium bg-gray-50">
                                Tidak Ada Foto
                            </div>
                        @endif
                    </div>

                    {{-- INFORMASI PRODUK --}}
                    <div class="pt-5 px-1 flex flex-col space-y-3">
                        <div class="space-y-1">
                            <h3 class="font-bold text-gray-900 text-[17px] leading-tight line-clamp-1 group-hover:text-[#a4864b] transition">
                                {{ $product->name }}
                            </h3>
                            <p class="text-xl font-extrabold text-[#a4864b] leading-none">
                                Rp {{ number_format($product->price, 0, ',', '.') }}<span class="text-[11px] text-gray-400 font-normal pl-1">/ pax</span>
                            </p>
                        </div>

                        <div class="w-full h-px bg-gray-100"></div>

                        {{-- Minimal Order & Menu Utama --}}
                        <div class="flex items-start justify-between gap-3 text-gray-700 pt-1">
                            <div class="flex items-start gap-1.5 min-w-[75px]">
                                <svg class="w-4 h-4 text-[#a4864b] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13h2l3 9l9-18l3 9h2" />
                                </svg>
                                <div class="text-[10px] leading-tight">
                                    <span class="font-normal text-gray-400 block">Min Order</span>
                                    <p class="font-bold text-gray-800">{{ $product->min_order ?? '1' }} porsi</p>
                                </div>
                            </div>
                            
                            <div class="w-px h-6 bg-gray-100 shrink-0 mt-1"></div>

                            <div class="flex-1 flex items-start gap-1.5 overflow-hidden">
                                <svg class="w-4 h-4 text-[#a4864b] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                <div class="text-[10px] leading-tight flex-1">
                                    <span class="font-normal text-gray-400 block">Menu Utama</span>
                                    <p class="font-bold text-gray-800 line-clamp-1">{{ $product->main_menu ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center text-gray-400 bg-white rounded-3xl border border-dashed border-gray-200">
                    Belum ada paket menu yang tersedia.
                </div>
            @endforelse
        </div>

    </div>

    <!-- ========================================== -->
    <!-- POP-UP MODAL DETAIL PAKET (GLASSMORPHISM)  -->
    <!-- ========================================== -->
    <div x-show="isModalOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" 
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-black/40 backdrop-blur-md"
        style="display: none;">

        {{-- Background Overlay Click to Close --}}
        <div class="absolute inset-0" @click="closeModal()"></div>

        {{-- Kartu Modal Glassmorphism --}}
        <div class="relative w-full max-w-3xl bg-white/90 backdrop-blur-xl rounded-3xl overflow-hidden shadow-2xl z-10 my-auto border border-white/40 transform transition-all"
            @click.stop>

            {{-- Button X Close --}}
            <button @click="closeModal()"
                class="absolute top-4 right-4 z-20 bg-gray-100 hover:bg-gray-200 text-gray-600 w-9 h-9 rounded-full flex items-center justify-center transition cursor-pointer">
                ✕
            </button>

            <template x-if="selectedProduct">
                <div class="grid grid-cols-1 md:grid-cols-12 items-stretch">
                    
                    {{-- FOTO PRODUK (SEBELAH KIRI - DIPERBESAR) --}}
                    <div class="md:col-span-5 relative min-h-[260px] md:min-h-full bg-gray-100">
                        <img :src="selectedProduct.image ? '/storage/' + selectedProduct.image : '/images/herobaru.jpg'"
                            :alt="selectedProduct.name" 
                            class="w-full h-full object-cover">
                    </div>

                    {{-- DESKRIPSI & FORM KALKULATOR (SEBELAH KANAN) --}}
                    <div class="md:col-span-7 p-6 sm:p-8 space-y-5 text-left flex flex-col justify-between">
                        
                        <div class="space-y-3">
                            {{-- Header Detail --}}
                            <div>
                                <span class="text-[11px] uppercase font-bold tracking-wider text-[#a4864b] block mb-1"
                                    x-text="selectedProduct.package_category || 'Katalog Catering'"></span>
                                <h3 class="text-2xl font-extrabold text-gray-900 leading-snug"
                                    x-text="selectedProduct.name"></h3>
                                <p class="text-xl font-bold text-[#a4864b] mt-1">
                                    Rp <span x-text="new Intl.NumberFormat('id-ID').format(selectedProduct.price)"></span>
                                    <span class="text-xs font-normal text-gray-400">/ pax</span>
                                </p>
                            </div>

                            {{-- Deskripsi Ringkas / Menu Utama --}}
                            <div class="text-xs text-gray-600 space-y-1 pt-2 border-t border-gray-200/60">
                                <span class="font-bold text-gray-800 block">Daftar Menu Utama:</span>
                                <p class="bg-gray-50/80 p-3 rounded-xl border border-gray-100 leading-relaxed"
                                    x-text="selectedProduct.main_menu || 'Menu lezat pilihan khas Nusantara.'"></p>
                            </div>

                            {{-- Pilihan Porsi (Tambah / Kurang) --}}
                            <div class="pt-2">
                                <label class="text-xs font-bold text-gray-800 block mb-1.5">Jumlah Porsi:</label>
                                <div class="flex items-center gap-3">
                                    <div class="inline-flex items-center border border-gray-200 rounded-full bg-white p-1">
                                        <button type="button" @click="decrementPortion()"
                                            class="w-7 h-7 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold flex items-center justify-center transition">
                                            -
                                        </button>
                                        <span class="px-4 font-bold text-sm text-gray-900" x-text="portion"></span>
                                        <button type="button" @click="incrementPortion()"
                                            class="w-7 h-7 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold flex items-center justify-center transition">
                                            +
                                        </button>
                                    </div>
                                    <span class="text-xs text-gray-400" x-text="'Min. ' + (selectedProduct.min_order || 1) + ' porsi'"></span>
                                </div>
                            </div>

                            {{-- Form Alamat Pengiriman (Opsional) --}}
                            <div class="pt-1">
                                <label class="text-xs font-bold text-gray-800 block mb-1">Catatan / Alamat Pengiriman (Opsional):</label>
                                <input type="text" x-model="address" placeholder="Masukkan alamat lokasi acara Anda..."
                                    class="w-full px-3.5 py-2 text-xs rounded-xl border border-gray-200 focus:outline-none focus:border-[#a4864b] bg-white/70">
                            </div>
                        </div>

                        {{-- TOTAL ESTIMASI & BUTTON KERANJANG --}}
                        <div class="pt-4 border-t border-gray-200/60 space-y-3">
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-medium text-gray-500">Total Estimasi:</span>
                                <span class="text-lg font-extrabold text-[#a4864b]">
                                    Rp <span x-text="new Intl.NumberFormat('id-ID').format(selectedProduct.price * portion)"></span>
                                </span>
                            </div>

                            <button type="button" @click="addToCart()"
                                class="w-full bg-[#a4864b] hover:bg-[#8e733f] text-white font-bold text-sm py-3 px-6 rounded-full transition-all flex items-center justify-center gap-2 cursor-pointer shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span>+ Masukkan Keranjang</span>
                            </button>
                        </div>

                    </div>
                </div>
            </template>

        </div>
    </div>

</section>

<!-- ========================================== -->
<!-- 5. SECTION GALERI KAMI (Premium Nusantara Look) -->
<!-- ========================================== -->
<!-- Background solid #a4864b -->
<section id="galeri" class="py-24 bg-[] relative overflow-hidden group">
    
    {{-- EFEK LATAR BELAKANG: OVERLAY POLA BATIK TRANSPARAN HALUS --}}
    <!-- Memberikan tekstur elegan agar background tidak polos, namun tetap clean -->
    <div class="absolute inset-0 opacity-[0.04] pointer-events-none z-0" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4MCIgaGVpZ2h0PSI4MCIgdmlld0JveD0iMCAwIDgwIDgwIj48ZyBmaWxsPSIjMDAwMDAwIiBmaWxsLW9wYWNpdHk9IjEuMCI+PHBhdGggZD0iTTAgMGg4MHY4MEgwVjB6bTQwIDQwSDB2NDBoNDBWNDB6bTAgMEg4MFYwaDQwVjQwSDB6bTQwIDQwSDB2NDBoNDBWNzB6bTAgMEg4MFY4MEg0MFY0MHoiLz48L2c+PC9zdmc+');"></div>

    <!-- Container untuk Header Teks (Rata Tengah Atas) -->
    <div class="max-w-[1340px] mx-auto px-6 sm:px-10 lg:px-16 w-full relative z-10 mb-20 text-center flex flex-col items-center">
        {{-- Gaya Judul Baru: Minimalis, Hitam, Rata Tengah --}}
        <span class="text-sm sm:text-base font-semibold tracking-[0.4em] text-gray-950 uppercase block mb-3">
            - GALERI KAMI -
        </span>
        <h2 class="font-['Perandory','Playfair_Display',serif] text-4xl sm:text-5xl lg:text-6xl text-gray-950 leading-tight max-w-2xl">
            Momen Kehangatan dalam Setiap Hidangan
        </h2>
        {{-- Garis dekoratif kecil --}}
        <div class="w-20 h-1 bg-gray-950 rounded-full mt-6 opacity-80"></div>
    </div>

    <!-- CONTAINER GALERI FOTO (Layout Clean & Premium) -->
    <div class="relative w-full z-10 space-y-8">

        {{-- BARIS FOTO ATAS: GESER KE KANAN --}}
        <!-- hover:paused dihilangkan dari sini, agar section tidak menghentikan scroll -->
        <div class="relative w-full overflow-hidden flex items-center">
            <!-- Container Animasi -->
            <div class="flex items-center space-x-6 shrink-0 animation-scroll-r w-[200%] sm:w-[150%]">
                @for ($i = 0; $i < 2; $i++) {{-- Loop 2x untuk tak terputus --}}
                    {{-- Setiap item card foto --}}
                    <!-- Tambahkan kelas hover:paused secara spesifik di card foto -->
                    <div class="shrink-0 aspect-[4/3] w-[280px] sm:w-[320px] rounded-3xl overflow-hidden shadow-2xl shadow-black/20 hover:scale-105 hover:paused transition-all duration-500 cursor-pointer border-4 border-white/90">
                        <img src="{{ asset('images/PaketPremiumChickenSalted.png') }}" alt="Galeri Baris Atas {{ $i * 4 + 1 }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="shrink-0 aspect-[4/3] w-[280px] sm:w-[320px] rounded-3xl overflow-hidden shadow-2xl shadow-black/20 hover:scale-105 hover:paused transition-all duration-500 cursor-pointer border-4 border-white/90">
                        <img src="{{ asset('images/PaketGoldAyamBakar.png') }}" alt="Galeri Baris Atas {{ $i * 4 + 2 }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="shrink-0 aspect-[4/3] w-[280px] sm:w-[320px] rounded-3xl overflow-hidden shadow-2xl shadow-black/20 hover:scale-105 hover:paused transition-all duration-500 cursor-pointer border-4 border-white/90">
                        <img src="{{ asset('images/PaketGoldAyamSerundeng.png') }}" alt="Galeri Baris Atas {{ $i * 4 + 3 }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="shrink-0 aspect-[4/3] w-[280px] sm:w-[320px] rounded-3xl overflow-hidden shadow-2xl shadow-black/20 hover:scale-105 hover:paused transition-all duration-500 cursor-pointer border-4 border-white/90">
                        <img src="{{ asset('images/PaketSilverAyamBakar.png') }}" alt="Galeri Baris Atas {{ $i * 4 + 4 }}"
                            class="w-full h-full object-cover">
                    </div>
                @endfor
            </div>
        </div>

        {{-- BARIS FOTO BAWAH: GESER KE KIRI --}}
        <!-- hover:paused dihilangkan dari sini -->
        <div class="relative w-full overflow-hidden flex items-center">
            <!-- Container Animasi -->
            <div class="flex items-center space-x-6 shrink-0 animation-scroll-l w-[200%] sm:w-[150%]">
                @for ($i = 0; $i < 2; $i++) {{-- Loop 2x untuk tak terputus --}}
                    {{-- Setiap item card foto --}}
                    <!-- Tambahkan kelas hover:paused secara spesifik di card foto -->
                    <div class="shrink-0 aspect-[4/3] w-[280px] sm:w-[320px] rounded-3xl overflow-hidden shadow-2xl shadow-black/20 hover:scale-105 hover:paused transition-all duration-500 cursor-pointer border-4 border-white/90">
                        <img src="{{ asset('images/PaketGoldAyamTeriyaki.png') }}" alt="Galeri Baris Bawah {{ $i * 4 + 1 }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="shrink-0 aspect-[4/3] w-[280px] sm:w-[320px] rounded-3xl overflow-hidden shadow-2xl shadow-black/20 hover:scale-105 hover:paused transition-all duration-500 cursor-pointer border-4 border-white/90">
                        <img src="{{ asset('images/PaketGoldChickenPop.png') }}" alt="Galeri Baris Bawah {{ $i * 4 + 2 }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="shrink-0 aspect-[4/3] w-[280px] sm:w-[320px] rounded-3xl overflow-hidden shadow-2xl shadow-black/20 hover:scale-105 hover:paused transition-all duration-500 cursor-pointer border-4 border-white/90">
                        <img src="{{ asset('images/NasiPasundaanAyamSuir.png') }}" alt="Galeri Baris Bawah {{ $i * 4 + 3 }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="shrink-0 aspect-[4/3] w-[280px] sm:w-[320px] rounded-3xl overflow-hidden shadow-2xl shadow-black/20 hover:scale-105 hover:paused transition-all duration-500 cursor-pointer border-4 border-white/90">
                        <img src="{{ asset('images/PaketSilverAyamLadaHitam.png') }}" alt="Galeri Baris Bawah {{ $i * 4 + 4 }}"
                            class="w-full h-full object-cover">
                    </div>
                @endfor
            </div>
        </div>

    </div>

</section>

<!-- ========================================== -->
<!-- 🌟 SECTION TESTIMONI (Clean & Minimalis)   -->
<!-- ========================================== -->
<section id="testimoni"
    class="scroll-mt-24 pt-24 pb-32 sm:pb-40 bg-gradient-to-b from-white via-orange-50/10 to-orange-50/30 relative overflow-hidden group"
    x-data="{
        testimonials: [
            { id: 1, name: 'Bpk. Hendra Kurnia', event: 'Gathering Kantor', comment: 'Nasi box-nya sangat komplit, rasa rempah Nusantara autentik dan ayam bakarnya empuk meresap. Pengantaran tepat waktu sebelum acara.' },
            { id: 2, name: 'Ibu Dewi Lestari', event: 'Acara Lamaran', comment: 'Pelayanan sangat profesional dari konsultasi sampai selesai. Tumpeng mini dan prasmanan dipuji oleh semua tamu keluarga.' },
            { id: 3, name: 'Rizky & Dinda', event: 'Resepsi Pernikahan', comment: 'Paket prasmanan pernikahan sangat memuaskan. Makanan selalu hangat, tertata mewah, dan porsi aman sampai akhir acara.' },
            { id: 4, name: 'Siti Aminah', event: 'Syukuran Rumah', comment: 'Tumpeng Komplit Nusantara hiasannya cantik sekali, rasanya gurih pulen, dan sambal goreng hatinya benar-benar juara!' }
        ],
        currentIndex: 0,
        intervalTimer: null,
        isPaused: false,

        init() { this.startAutoScroll(); },
        startAutoScroll() {
            this.stopAutoScroll();
            this.intervalTimer = setInterval(() => { 
                if (!this.isPaused) this.nextTestimonial(); 
            }, 5000);
        },
        stopAutoScroll() { if (this.intervalTimer) clearInterval(this.intervalTimer); },
        nextTestimonial() { this.currentIndex = (this.currentIndex + 1) % this.testimonials.length; },
        prevTestimonial() { this.currentIndex = (this.currentIndex - 1 + this.testimonials.length) % this.testimonials.length; },
        goTo(index) { this.currentIndex = index; }
    }">

    {{-- Background Ornament Blur --}}
    <div class="absolute -top-32 -left-24 w-[500px] h-[500px] bg-orange-100/40 rounded-full blur-3xl pointer-events-none z-0"></div>
    <div class="absolute -bottom-32 -right-24 w-[500px] h-[500px] bg-amber-100/30 rounded-full blur-3xl pointer-events-none z-0"></div>

    <div class="max-w-[1000px] mx-auto px-6 sm:px-10 lg:px-16 w-full space-y-12 relative z-10">

        {{-- HEADLINE SECTION: RATA TENGAH MINIMALIS --}}
        <div class="text-center flex flex-col items-center">
            <span class="text-sm sm:text-base font-semibold tracking-[0.4em] text-gray-950 uppercase block mb-3">
                - APA KATA MEREKA -
            </span>
            <h2 class="font-['Perandory','Playfair_Display',serif] text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-950 leading-tight max-w-2xl">
                Kepuasan Anda, Kebanggaan Bagi Kami
            </h2>
            <div class="w-20 h-1 bg-gray-950 rounded-full mt-6 opacity-80"></div>
        </div>

        {{-- SHOWCASE TESTIMONI BERGANTIAN (CARD UTAMA RATA TENGAH) --}}
        <div class="w-full flex flex-col" @mouseenter="isPaused = true" @mouseleave="isPaused = false">
            <div class="relative w-full bg-white rounded-[32px] sm:rounded-[40px] p-8 sm:p-14 border border-orange-100/70 shadow-xl shadow-orange-950/5 overflow-hidden flex flex-col justify-between min-h-[320px] sm:min-h-[360px]">

                {{-- Watermark Quote Icon --}}
                <div class="absolute top-8 right-10 text-[#a4864b] pointer-events-none select-none opacity-10">
                    <svg class="w-24 h-24 fill-current" viewBox="0 0 32 32">
                        <path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14H8c0-2.2 1.8-4 4-4V8h-2zm14 0c-3.3 0-6 2.7-6 6v10h10V14h-6c0-2.2 1.8-4 4-4V8h-2z" />
                    </svg>
                </div>

                {{-- Indikator Urutan Ulasan --}}
                <div class="flex items-center justify-between z-10 mb-4">
                    <span class="inline-flex items-center gap-2 text-xs font-bold text-[#a4864b] uppercase tracking-widest bg-orange-50/80 px-4 py-1.5 rounded-full border border-orange-200/50">
                        <span class="w-2 h-2 rounded-full bg-[#a4864b] animate-ping"></span>
                        Ulasan Pelanggan
                    </span>
                    <span class="text-xs font-bold text-gray-400">
                        <span x-text="currentIndex + 1" class="text-gray-900 font-extrabold text-sm"></span> /
                        <span x-text="testimonials.length"></span>
                    </span>
                </div>

                {{-- KONTEN TESTIMONI (TEKS & NAMA SAJA) --}}
                <div class="relative flex-1 flex flex-col justify-center my-4 z-10">
                    <template x-for="(testi, index) in testimonials" :key="testi.id">
                        <div x-show="currentIndex === index"
                            x-transition:enter="transition ease-out duration-500 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 scale-98"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-300 transform absolute inset-0"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 -translate-y-4 scale-98"
                            class="w-full space-y-6">

                            {{-- Isi Komentar/Pesan --}}
                            <blockquote class="text-gray-800 text-lg sm:text-2xl font-medium leading-relaxed italic pr-4">
                                &ldquo;<span x-text="testi.comment"></span>&rdquo;
                            </blockquote>

                            {{-- Nama Pengirim & Info Acara (Tanpa Foto) --}}
                            <div class="pt-4 border-t border-gray-100/80 flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                                <div>
                                    <h4 class="font-extrabold text-gray-900 text-lg sm:text-xl leading-tight" x-text="testi.name"></h4>
                                    <p class="text-[#a4864b] text-xs sm:text-sm font-semibold mt-0.5" x-text="testi.event"></p>
                                </div>
                            </div>

                        </div>
                    </template>
                </div>

                {{-- KONTROL NAVIGASI (DOTS & BUTTON PREV/NEXT) --}}
                <div class="flex items-center justify-between pt-6 border-t border-gray-100/80 z-10">
                    {{-- Dots Pagination --}}
                    <div class="flex items-center gap-2">
                        <template x-for="(testi, index) in testimonials" :key="'dot-' + testi.id">
                            <button type="button" @click="goTo(index)" :title="'Testimoni ' + (index + 1)"
                                class="h-2.5 rounded-full transition-all duration-300 cursor-pointer"
                                :class="currentIndex === index ? 'w-8 bg-[#a4864b]' : 'w-2.5 bg-gray-200 hover:bg-[#a4864b]/40'"></button>
                        </template>
                    </div>

                    {{-- Tombol Prev & Next --}}
                    <div class="flex items-center gap-2.5">
                        <button type="button" @click="prevTestimonial()" title="Sebelumnya"
                            class="w-10 h-10 rounded-full bg-gray-50 hover:bg-[#a4864b] text-gray-600 hover:text-white border border-gray-200/80 flex items-center justify-center transition-all cursor-pointer shadow-sm active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" /></svg>
                        </button>
                        <button type="button" @click="nextTestimonial()" title="Berikutnya"
                            class="w-10 h-10 rounded-full bg-orange-50 hover:bg-[#a4864b] text-[#a4864b] hover:text-white border border-orange-200 flex items-center justify-center transition-all cursor-pointer shadow-sm active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" /></svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>


    <section id="cara_pemesanan" class="py-24 bg-white relative">
        <div class="max-w-[1280px] mx-auto px-6 md:px-12 w-full space-y-12">

            {{-- HEADLINE SECTION CARA PEMESANAN --}}
            <div class="text-left space-y-3">
                <div class="inline-flex items-center gap-2">
                    <span class="text-xs uppercase tracking-widest font-bold text-[#f6a11a]">CARA PEMESANAN</span>
                    <span class="w-8 h-[2px] bg-[#f6a11a] rounded-full"></span>
                </div>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                    Langkah Mudah Memesan
                </h2>
                <p class="text-gray-500 text-sm sm:text-base max-w-xl">
                    Ikuti 3 langkah praktis berikut untuk memesan menu catering favorit Anda.
                </p>
            </div>

            {{-- 3 CARDS STEP CONTAINER --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Card 1 -->
                <div
                    class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_10px_30px_rgba(0,0,0,0.04)] relative flex flex-col items-center text-center group hover:shadow-[0_15px_35px_rgba(246,161,26,0.1)] transition-all duration-300">
                    <!-- Badge Number -->
                    <div
                        class="absolute top-6 left-6 w-9 h-9 rounded-full bg-[#f6a11a] text-white font-bold text-sm flex items-center justify-center shadow-md">
                        01
                    </div>

                    <!-- Image Illustration Placeholder -->
                    <div
                        class="w-48 h-48 rounded-full bg-orange-50/60 flex items-center justify-center my-4 overflow-hidden p-4">
                        <img src="/image/step1.png" alt="Explore Our Menu"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" />
                    </div>

                    <!-- Card Content -->
                    <h3 class="text-lg font-bold text-[#f6a11a] mb-2">
                        Explore Our Menu
                    </h3>
                    <p class="text-gray-500 text-xs sm:text-sm leading-relaxed max-w-xs">
                        Pilih makanan yang kamu inginkan dari katalog kami.
                    </p>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_10px_30px_rgba(0,0,0,0.04)] relative flex flex-col items-center text-center group hover:shadow-[0_15px_35px_rgba(246,161,26,0.1)] transition-all duration-300">
                    <!-- Badge Number -->
                    <div
                        class="absolute top-6 left-6 w-9 h-9 rounded-full bg-[#f6a11a] text-white font-bold text-sm flex items-center justify-center shadow-md">
                        02
                    </div>

                    <!-- Image Illustration Placeholder -->
                    <div
                        class="w-48 h-48 rounded-full bg-orange-50/60 flex items-center justify-center my-4 overflow-hidden p-4">
                        <img src="/image/step2.png" alt="Order via WhatsApp"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" />
                    </div>

                    <!-- Card Content -->
                    <h3 class="text-lg font-bold text-[#f6a11a] mb-2">
                        Order via WhatsApp
                    </h3>
                    <p class="text-gray-500 text-xs sm:text-sm leading-relaxed max-w-xs">
                        Klik tombol WhatsApp untuk menghubungi admin dan mulai pesan.
                    </p>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_10px_30px_rgba(0,0,0,0.04)] relative flex flex-col items-center text-center group hover:shadow-[0_15px_35px_rgba(246,161,26,0.1)] transition-all duration-300">
                    <!-- Badge Number -->
                    <div
                        class="absolute top-6 left-6 w-9 h-9 rounded-full bg-[#f6a11a] text-white font-bold text-sm flex items-center justify-center shadow-md">
                        03
                    </div>

                    <!-- Image Illustration Placeholder -->
                    <div
                        class="w-48 h-48 rounded-full bg-orange-50/60 flex items-center justify-center my-4 overflow-hidden p-4">
                        <img src="/image/step3.png" alt="Confirm Your Order"
                            class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" />
                    </div>

                    <!-- Card Content -->
                    <h3 class="text-lg font-bold text-[#f6a11a] mb-2">
                        Confirm Your Order
                    </h3>
                    <p class="text-gray-500 text-xs sm:text-sm leading-relaxed max-w-xs">
                        Diskusikan detail pesanan, pembayaran, dan pengiriman bersama admin.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================== -->
    <!-- 🏢 SECTION FOOTER & KONTAK RESMI           -->
    <!-- ========================================== -->
    <footer class="bg-[#120c08] text-white relative overflow-hidden pt-20 pb-10 border-t border-white/10">

        {{-- Background Gradient Accent Ornaments --}}
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#f6a11a]/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 right-10 w-96 h-96 bg-orange-600/10 rounded-full blur-3xl pointer-events-none">
        </div>

        <div class="max-w-[1280px] mx-auto px-6 md:px-12 w-full relative z-10">

            {{-- 1. PRE-FOOTER CTA CARD --}}
            <div
                class="bg-gradient-to-r from-[#1c130c] via-[#24190f] to-[#1c130c] rounded-[32px] p-8 sm:p-12 border border-white/10 shadow-2xl mb-16 flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="space-y-3 text-center lg:text-left max-w-2xl">
                    <div
                        class="inline-flex items-center gap-2 bg-[#f6a11a]/15 text-[#f6a11a] px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                        <span>✨</span>
                        <span>Momen Spesial Dimulai Dari Sini</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight leading-snug">
                        Siap Mewujudkan Acara Impian Anda Bersama Kami?
                    </h3>
                    <p class="text-white/70 text-sm sm:text-base leading-relaxed">
                        Konsultasikan menu catering pernikahan, kantor, syukuran, atau tumpeng Anda secara gratis. Kami
                        siap memberikan penawaran dan pelayanan terbaik!
                    </p>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-4 shrink-0">
                    {{-- Tombol Tanpa Efek Neon/Glow (Flat/Solid Warna Datar) --}}
                    <a href="https://wa.me/628561155113?text=Halo%20Catering%20Nusantara,%20saya%20ingin%20berkonsultasi%20mengenai%20pemesanan%20catering."
                        target="_blank"
                        class="bg-[#f6a11a] hover:bg-[#e09015] text-white font-extrabold text-sm sm:text-base px-8 py-4 rounded-full transition-all duration-300 flex items-center gap-2.5">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                        </svg>
                        <span>Konsultasi via WhatsApp</span>
                    </a>
                    <a href="#paket"
                        class="bg-white/10 hover:bg-white/20 text-white font-bold text-sm sm:text-base px-7 py-4 rounded-full border border-white/15 transition-all">
                        Lihat Katalog Menu
                    </a>
                </div>
            </div>

            {{-- 2. MAIN FOOTER CONTENT (4 KOLOM) --}}
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 pb-16 border-b border-white/10">

                {{-- KOLOM 1: IDENTITAS BRAND & OWNER (lg:col-span-4) --}}
                <div class="lg:col-span-4 space-y-6">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Catering Nusantara Logo"
                            class="h-16 w-auto object-contain"
                            onerror="this.onerror=null; this.src='/image/logo.png';" />
                    </div>

                    <p class="text-white/70 text-sm leading-relaxed">
                        Catering Nusantara menyajikan hidangan bercita rasa autentik khas Nusantara dengan bahan segar
                        pilihan. Melayani berbagai kebutuhan acara pernikahan, instansi, hingga syukuran keluarga di
                        wilayah Bogor dan sekitarnya.
                    </p>

                    <div class="space-y-2 pt-2 text-xs text-white/60">
                        <div class="flex items-center gap-2">
                            <span class="text-[#f6a11a] font-bold">Pemilik / PIC:</span>
                            <span class="text-white font-semibold">Eva Rudianti</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-[#f6a11a] font-bold">Tahun Berdiri:</span>
                            <span class="text-white font-semibold">Est. 2024</span>
                        </div>
                    </div>

                    {{-- Social Media Icons --}}
                    <div class="flex items-center gap-3 pt-2">
                        <a href="https://instagram.com/cateringnusantara_bogor" target="_blank"
                            title="Instagram @cateringnusantara_bogor"
                            class="w-10 h-10 rounded-full bg-white/5 hover:bg-[#f6a11a] text-white/80 hover:text-white border border-white/10 flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>

                        <a href="https://wa.me/628561155113" target="_blank" title="WhatsApp 08561155113"
                            class="w-10 h-10 rounded-full bg-white/5 hover:bg-[#25D366] text-white/80 hover:text-white border border-white/10 flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                            </svg>
                        </a>

                        {{-- Icon Email Diperbaiki --}}
                        <a href="mailto:Waroengpecelayam99@gmail.com" title="Email Waroengpecelayam99@gmail.com"
                            class="w-10 h-10 rounded-full bg-white/5 hover:bg-[#f6a11a] text-white/80 hover:text-white border border-white/10 flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <svg class="w-5 h-5 stroke-current fill-none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- KOLOM 2: JELAJAHI / MENU NAVIGASI (lg:col-span-2) --}}
                <div class="lg:col-span-2 space-y-4">
                    <h4 class="text-white font-extrabold tracking-wide uppercase text-sm border-b border-white/10 pb-2">
                        Navigasi
                    </h4>
                    <ul class="space-y-2.5 text-sm text-white/70">
                        <li>
                            <a href="#beranda" class="hover:text-[#f6a11a] transition-colors flex items-center gap-2">
                                <span class="text-[#f6a11a]">›</span> Beranda
                            </a>
                        </li>
                        <li>
                            <a href="#tentang-kami"
                                class="hover:text-[#f6a11a] transition-colors flex items-center gap-2">
                                <span class="text-[#f6a11a]">›</span> Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="#paket" class="hover:text-[#f6a11a] transition-colors flex items-center gap-2">
                                <span class="text-[#f6a11a]">›</span> Katalog Paket
                            </a>
                        </li>
                        <li>
                            <a href="#galeri" class="hover:text-[#f6a11a] transition-colors flex items-center gap-2">
                                <span class="text-[#f6a11a]">›</span> Galeri
                            </a>
                        </li>
                        <li>
                            <a href="#testimoni" class="hover:text-[#f6a11a] transition-colors flex items-center gap-2">
                                <span class="text-[#f6a11a]">›</span> Testimoni
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- KOLOM 3: LAYANAN SPESIAL (lg:col-span-2) --}}
                <div class="lg:col-span-2 space-y-4">
                    <h4 class="text-white font-extrabold tracking-wide uppercase text-sm border-b border-white/10 pb-2">
                        Layanan Kami
                    </h4>
                    <ul class="space-y-2.5 text-sm text-white/70">
                        <li class="hover:text-white transition">Catering Pernikahan</li>
                        <li class="hover:text-white transition">Prasmanan Kantor</li>
                        <li class="hover:text-white transition">Nasi Box Eksklusif</li>
                        <li class="hover:text-white transition">Tumpeng Nusantara</li>
                        <li class="hover:text-white transition">Syukuran & Aqiqah</li>
                        <li class="hover:text-white transition">Custom Menu Prasmanan</li>
                    </ul>
                </div>

                {{-- KOLOM 4: KONTAK & ALAMAT USAHA (lg:col-span-4) --}}
                <div class="lg:col-span-4 space-y-4">
                    <h4 class="text-white font-extrabold tracking-wide uppercase text-sm border-b border-white/10 pb-2">
                        Hubungi & Lokasi
                    </h4>

                    <div class="space-y-4 text-sm text-white/80">
                        {{-- Alamat --}}
                        <div class="flex items-start gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-orange-500/10 text-[#f6a11a] flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-4 h-4 stroke-current fill-none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs text-white/50 block font-semibold">Alamat Usaha:</span>
                                <span class="leading-relaxed">Jln. Kapten Yusuf Gang Purnama, Tamansari, Bogor, Jawa
                                    Barat</span>
                            </div>
                        </div>

                        {{-- WhatsApp / Telepon --}}
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs text-white/50 block font-semibold">WhatsApp / Telepon:</span>
                                <a href="https://wa.me/628561155113" target="_blank"
                                    class="font-bold text-[#f6a11a] hover:underline">
                                    08561155113
                                </a>
                            </div>
                        </div>

                        {{-- Email Diperbaiki --}}
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-orange-500/10 text-[#f6a11a] flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 stroke-current fill-none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs text-white/50 block font-semibold">Email:</span>
                                <a href="mailto:Waroengpecelayam99@gmail.com"
                                    class="hover:text-[#f6a11a] transition-colors break-all">
                                    Waroengpecelayam99@gmail.com
                                </a>
                            </div>
                        </div>

                        {{-- Instagram --}}
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-pink-500/10 text-pink-400 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs text-white/50 block font-semibold">Instagram:</span>
                                <a href="https://instagram.com/cateringnusantara_bogor" target="_blank"
                                    class="hover:text-[#f6a11a] transition-colors font-medium">
                                    @cateringnusantara_bogor
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- 3. BOTTOM COPYRIGHT BAR --}}
            <div
                class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-white/50 text-center sm:text-left">
                <p>
                    &copy; 2024 - {{ date('Y') }} <span class="text-white font-bold">Catering Nusantara</span>. All
                    rights reserved.
                    <span class="block sm:inline sm:ml-1">Owner: Eva Rudianti.</span>
                </p>
                <div class="flex items-center gap-6">
                    <a href="#beranda" class="hover:text-[#f6a11a] transition">Kembali ke Atas ↑</a>
                </div>
            </div>

        </div>
    </footer>

    <!-- ========================================== -->
    <!-- 🛒 SLIDE-OVER CART DRAWER & FLOATING CART -->
    <!-- ========================================== -->

    <!-- FLOATING CART BUTTON (BOTTOM RIGHT) -->
    <div x-show="$store.cart && $store.cart.totalCount > 0" x-cloak
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="translate-y-10 opacity-0 scale-90"
        x-transition:enter-end="translate-y-0 opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="translate-y-0 opacity-100 scale-100"
        x-transition:leave-end="translate-y-10 opacity-0 scale-90" class="fixed bottom-6 right-6 z-40">
        <button @click="$store.cart.toggle()"
            class="bg-[#f6a11a] hover:bg-[#e09015] text-white font-bold px-5 py-3.5 rounded-full shadow-2xl flex items-center gap-3 transition-all duration-300 transform hover:scale-105 hover:-translate-y-1 border-2 border-white cursor-pointer group">
            <div class="relative">
                <svg class="w-6 h-6 transform group-hover:rotate-6 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span x-text="$store.cart ? $store.cart.totalCount : 0"
                    class="absolute -top-2 -right-2 bg-white text-[#f6a11a] text-[10px] font-black h-5 min-w-[20px] px-1 rounded-full flex items-center justify-center shadow">
                </span>
            </div>
            <div class="text-left leading-tight hidden sm:block">
                <span class="text-[10px] text-white/90 uppercase font-semibold block">Keranjang</span>
                <span class="text-xs font-black">Rp <span
                        x-text="$store.cart ? $store.cart.formatPrice($store.cart.totalPrice) : 0"></span></span>
            </div>
        </button>
    </div>

    <!-- TOAST NOTIFICATION -->
    <div x-show="$store.cart && $store.cart.showToastNotification" x-cloak
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="-translate-y-5 opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-5 opacity-0"
        class="fixed top-24 right-6 z-50 max-w-sm bg-gray-900/95 backdrop-blur-md text-white px-5 py-3.5 rounded-2xl shadow-2xl flex items-center gap-3 border border-white/10">
        <div class="w-7 h-7 rounded-full bg-[#f6a11a] text-white flex items-center justify-center shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <p class="text-xs font-semibold leading-snug" x-text="$store.cart ? $store.cart.toastMessage : ''"></p>
    </div>

    <!-- MODAL CARD BESAR KERANJANG (CENTERED POP-UP WITH BLUR BACKDROP) -->
    <div x-show="$store.cart && $store.cart.isOpen" x-cloak x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 lg:p-10 overflow-y-auto">

        <!-- Backdrop overlay with blur -->
        <div class="fixed inset-0 bg-black/65 backdrop-blur-md transition-opacity" @click="$store.cart.close()"></div>

        <!-- CARD BESAR PUTIH -->
        <div x-show="$store.cart && $store.cart.isOpen" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
            class="relative w-full max-w-4xl max-h-[90vh] bg-white rounded-[28px] sm:rounded-[36px] shadow-2xl overflow-hidden flex flex-col z-10 border border-gray-100 my-auto"
            @click.stop>

            <!-- CARD HEADER -->
            <div
                class="p-6 sm:p-7 border-b border-gray-100 flex items-center justify-between bg-gradient-to-r from-orange-50/70 via-white to-amber-50/40">
                <div class="flex items-center gap-3.5 sm:gap-4">
                    <div
                        class="w-12 h-12 rounded-2xl bg-[#f6a11a]/15 text-[#f6a11a] flex items-center justify-center shrink-0 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-gray-900 text-xl sm:text-2xl leading-tight">Keranjang Pesanan
                            Anda</h3>
                        <p class="text-xs sm:text-sm text-gray-500 mt-0.5">
                            <span class="font-bold text-[#f6a11a]"
                                x-text="$store.cart ? $store.cart.totalItems : 0"></span> menu terpilih •
                            <span class="font-bold text-gray-800"
                                x-text="$store.cart ? $store.cart.totalCount : 0"></span> porsi total
                        </p>
                    </div>
                </div>

                <button @click="$store.cart.close()"
                    class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-gray-900 flex items-center justify-center font-bold text-lg transition cursor-pointer shadow-sm">
                    ✕
                </button>
            </div>

            <!-- CARD BODY: LIST ITEM & INPUT CATATAN -->
            <div class="p-5 sm:p-7 flex-1 overflow-y-auto space-y-6">
                <!-- EMPTY STATE -->
                <template x-if="!$store.cart || $store.cart.items.length === 0">
                    <div class="h-full flex flex-col items-center justify-center text-center py-16 space-y-4">
                        <div
                            class="w-24 h-24 rounded-3xl bg-orange-50 text-[#f6a11a] flex items-center justify-center shadow-inner">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-extrabold text-gray-900 text-lg">Keranjang Belanja Masih Kosong</h4>
                            <p class="text-xs sm:text-sm text-gray-500 max-w-sm mt-1.5 leading-relaxed">
                                Anda belum memilih paket menu. Silakan jelajahi katalog kami dan klik ikon keranjang
                                pada menu favorit Anda.
                            </p>
                        </div>
                        <a href="#paket" @click="$store.cart.close()"
                            class="bg-[#f6a11a] hover:bg-[#e09015] text-white text-xs sm:text-sm font-bold px-7 py-3 rounded-full shadow-lg shadow-orange-500/20 transition inline-flex items-center gap-2 cursor-pointer">
                            <span>Jelajahi Paket Menu</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </template>

                <!-- FILLED STATE -->
                <template x-if="$store.cart && $store.cart.items.length > 0">
                    <div class="space-y-6">
                        <!-- DAFTAR ITEM DI KERANJANG -->
                        <div class="space-y-3.5">
                            <template x-for="item in $store.cart.items" :key="item.id">
                                <div
                                    class="bg-gray-50/70 hover:bg-white rounded-2xl sm:rounded-3xl p-4 sm:p-5 border border-gray-100 hover:border-[#f6a11a]/30 hover:shadow-md transition-all flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">

                                    <!-- Info Produk (Foto + Nama) -->
                                    <div class="flex items-center gap-4 min-w-0 flex-1">
                                        <div
                                            class="w-18 h-18 sm:w-20 sm:h-20 rounded-2xl overflow-hidden bg-gray-200 shrink-0 shadow-sm">
                                            <img :src="item.image ? '/storage/' + item.image : '/image/tempeng-removebg-preview.png'"
                                                :alt="item.name" class="w-full h-full object-cover">
                                        </div>
                                        <div class="min-w-0">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span
                                                    class="text-[9px] uppercase font-extrabold bg-orange-100 text-[#f6a11a] px-2 py-0.5 rounded-md"
                                                    x-text="item.package_category"></span>
                                                <template x-if="item.tier">
                                                    <span
                                                        class="text-[9px] uppercase font-bold bg-amber-800 text-white px-2 py-0.5 rounded-md"
                                                        x-text="item.tier"></span>
                                                </template>
                                            </div>
                                            <h5 class="font-extrabold text-gray-900 text-base sm:text-lg leading-snug truncate"
                                                x-text="item.name"></h5>
                                            <p class="text-xs text-gray-500 mt-0.5">
                                                Rp <span x-text="$store.cart.formatPrice(item.price)"></span>
                                                <span class="text-[10px] text-gray-400">/ pax</span>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Stepper Plus Minus & Total Item -->
                                    <div
                                        class="flex items-center justify-between sm:justify-end gap-4 w-full sm:w-auto pt-2 sm:pt-0 border-t sm:border-t-0 border-gray-200/60">

                                        <!-- TOMBOL PLUS & MINUS -->
                                        <div
                                            class="flex items-center gap-1.5 bg-white px-3 py-1.5 rounded-full border border-gray-200 shadow-sm">
                                            <button @click="$store.cart.updateQty(item.id, -1)" title="Kurangi 1 Porsi"
                                                class="w-7 h-7 rounded-full bg-gray-100 hover:bg-red-50 text-gray-700 hover:text-red-500 flex items-center justify-center font-black text-base transition cursor-pointer active:scale-90">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="3" d="M20 12H4" />
                                                </svg>
                                            </button>

                                            <div class="px-2 min-w-[48px] text-center leading-tight">
                                                <span class="font-black text-gray-900 text-sm sm:text-base"
                                                    x-text="item.qty"></span>
                                                <span class="text-[10px] text-gray-400 font-semibold block">porsi</span>
                                            </div>

                                            <button @click="$store.cart.updateQty(item.id, 1)" title="Tambah 1 Porsi"
                                                class="w-7 h-7 rounded-full bg-orange-100 hover:bg-[#f6a11a] text-[#f6a11a] hover:text-white flex items-center justify-center font-black text-base transition cursor-pointer active:scale-90 shadow-sm">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="3" d="M12 4v16m8-8H4" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- SUB TOTAL -->
                                        <div class="text-right min-w-[110px] sm:min-w-[130px]">
                                            <span
                                                class="text-[10px] text-gray-400 font-bold block uppercase">Subtotal</span>
                                            <span class="font-black text-[#f6a11a] text-base sm:text-lg leading-tight">
                                                Rp <span x-text="$store.cart.formatPrice(item.price * item.qty)"></span>
                                            </span>
                                        </div>

                                        <!-- TOMBOL HAPUS -->
                                        <button @click="$store.cart.removeItem(item.id)" title="Hapus Menu Ini"
                                            class="w-9 h-9 rounded-full text-gray-400 hover:text-red-500 hover:bg-red-50 flex items-center justify-center transition shrink-0 cursor-pointer">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </template>
                        </div>

                        <!-- KOLOM CATATAN KHUSUS -->
                        <div
                            class="bg-gray-50/80 rounded-2xl sm:rounded-3xl p-4 sm:p-5 border border-gray-100 space-y-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#f6a11a]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <label class="text-xs font-extrabold text-gray-800 uppercase tracking-wider">
                                    Catatan Tambahan Pesanan <span
                                        class="text-gray-400 font-normal lowercase">(opsional)</span>
                                </label>
                            </div>
                            <textarea x-model="$store.cart.customerNote"
                                placeholder="Tuliskan tanggal acara, jam pengantaran, alamat lokasi, atau permintaan khusus (misal: sambal dipisah, tanpa MSG, dsb)..."
                                rows="2"
                                class="w-full text-xs sm:text-sm rounded-xl border border-gray-200 focus:border-[#f6a11a] focus:ring-[#f6a11a] p-3 text-gray-800 resize-none bg-white outline-none"></textarea>
                        </div>
                    </div>
                </template>
            </div>

            <!-- CARD FOOTER: TOTAL & CHECKOUT BUTTON -->
            <template x-if="$store.cart && $store.cart.items.length > 0">
                <div
                    class="p-5 sm:p-7 border-t border-gray-100 bg-gray-50/90 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-center sm:text-left">
                        <span class="text-xs text-gray-500 font-medium block">
                            Total Pembayaran (<span x-text="$store.cart.totalItems"></span> menu • <span
                                x-text="$store.cart.totalCount"></span> porsi)
                        </span>
                        <div class="text-2xl sm:text-3xl font-black text-gray-900 leading-tight mt-0.5">
                            Rp <span x-text="$store.cart.formatPrice($store.cart.totalPrice)"
                                class="text-[#f6a11a]"></span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <button @click="$store.cart.clearCart()"
                            class="px-4 py-3 text-xs font-bold text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-full transition cursor-pointer">
                            Kosongkan
                        </button>

                        <!-- TOMBOL CHECKOUT VIA WHATSAPP -->
                        <a :href="$store.cart.checkoutWhatsAppUrl" target="_blank"
                            class="flex-1 sm:flex-initial bg-[#25D366] hover:bg-[#20ba59] text-white font-extrabold text-sm sm:text-base py-4 px-8 rounded-full shadow-xl shadow-emerald-500/25 transition-all duration-300 flex items-center justify-center gap-2.5 transform hover:-translate-y-0.5 active:scale-95 cursor-pointer">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                            </svg>
                            <span>Pesan via WhatsApp</span>
                        </a>
                    </div>
                </div>
            </template>

        </div>
    </div>

    <!-- SCRIPT ALPINE CART STORE -->
    <script>
        function initCateringCart() {
            if (typeof Alpine === 'undefined') return;
            if (Alpine.store('cart')) return;

            Alpine.store('cart', {
                items: JSON.parse(localStorage.getItem('cn_cart') || '[]'),
                isOpen: false,
                customerNote: '',
                toastMessage: '',
                showToastNotification: false,
                toastTimeout: null,

                save() {
                    localStorage.setItem('cn_cart', JSON.stringify(this.items));
                },

                get totalCount() {
                    return this.items.reduce((sum, item) => sum + Number(item.qty), 0);
                },

                get totalItems() {
                    return this.items.length;
                },

                get totalPrice() {
                    return this.items.reduce((sum, item) => sum + (Number(item.price) * Number(item.qty)), 0);
                },

                addItem(product, qty = null) {
                    if (!product) return;
                    const minQty = product.min_order && parseInt(product.min_order) > 0 ? parseInt(product.min_order) : 1;
                    const quantityToAdd = qty !== null ? Number(qty) : (minQty > 1 ? minQty : 1);

                    const existing = this.items.find(item => item.id === product.id);
                    if (existing) {
                        existing.qty += (qty !== null ? Number(qty) : 1);
                    } else {
                        this.items.push({
                            id: product.id,
                            name: product.name,
                            price: Number(product.price),
                            image: product.image,
                            package_category: product.package_category,
                            tier: product.tier,
                            min_order: minQty,
                            qty: quantityToAdd
                        });
                    }
                    this.save();
                    this.showToast('"' + product.name + '" berhasil ditambahkan ke keranjang!');
                },

                updateQty(id, delta) {
                    const item = this.items.find(i => i.id === id);
                    if (!item) return;
                    item.qty = Number(item.qty) + delta;
                    if (item.qty <= 0) {
                        this.removeItem(id);
                    } else {
                        this.save();
                    }
                },

                removeItem(id) {
                    this.items = this.items.filter(i => i.id !== id);
                    this.save();
                },

                clearCart() {
                    if (confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
                        this.items = [];
                        this.save();
                    }
                },

                toggle() {
                    this.isOpen = !this.isOpen;
                    if (this.isOpen) {
                        document.body.classList.add('overflow-hidden');
                    } else {
                        document.body.classList.remove('overflow-hidden');
                    }
                },

                open() {
                    this.isOpen = true;
                    document.body.classList.add('overflow-hidden');
                },

                close() {
                    this.isOpen = false;
                    document.body.classList.remove('overflow-hidden');
                },

                formatPrice(num) {
                    return new Intl.NumberFormat('id-ID').format(num || 0);
                },

                get checkoutWhatsAppUrl() {
                    const phone = '628561155113';
                    if (this.items.length === 0) return '#';

                    let text = 'Halo *Catering Nusantara*, saya ingin memesan menu catering berikut:\n\n';
                    text += '🛒 *RINCIAN PESANAN:*\n';
                    text += '================================\n';

                    this.items.forEach((item, index) => {
                        const subtotal = Number(item.price) * Number(item.qty);
                        text += `${index + 1}. *${item.name}*\n`;
                        if (item.package_category) text += `   • Kategori: ${item.package_category}\n`;
                        text += `   • Jumlah: ${item.qty} porsi\n`;
                        text += `   • Harga: Rp ${this.formatPrice(item.price)} / pax\n`;
                        text += `   • Subtotal: Rp ${this.formatPrice(subtotal)}\n\n`;
                    });

                    text += '================================\n';
                    text += `📦 *Total Menu:* ${this.totalItems} menu (${this.totalCount} porsi)\n`;
                    text += `💰 *TOTAL ESTIMASI: Rp ${this.formatPrice(this.totalPrice)}*\n`;

                    if (this.customerNote && this.customerNote.trim() !== '') {
                        text += `\n📝 *Catatan Khusus:*\n${this.customerNote.trim()}\n`;
                    }

                    text += '\nMohon informasi ketersediaan menu dan tata cara pembayarannya. Terima kasih! 🙏';

                    return `https://wa.me/${phone}?text=${encodeURIComponent(text)}`;
                },

                showToast(msg) {
                    this.toastMessage = msg;
                    this.showToastNotification = true;
                    if (this.toastTimeout) clearTimeout(this.toastTimeout);
                    this.toastTimeout = setTimeout(() => {
                        this.showToastNotification = false;
                    }, 3000);
                }
            });
        }

        document.addEventListener('alpine:init', initCateringCart);
        if (window.Alpine) {
            initCateringCart();
        }
    </script>

    <!-- SCRIPT ANIMASI SCROLL & UNDERLINE MOVER -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navItems = document.querySelectorAll('.nav-item');
            const indicator = document.getElementById('nav-indicator');
            const sections = document.querySelectorAll('section[id]');

            // Fungsi untuk menggeser garis indicator ke posisi link aktif
            function moveIndicator(activeLink) {
                if (!activeLink || !indicator) return;

                const linkRect = activeLink.getBoundingClientRect();
                const parentRect = activeLink.parentElement.getBoundingClientRect();

                // Hitung posisi horizontal & lebar garis
                indicator.style.width = `${linkRect.width}px`;
                indicator.style.left = `${linkRect.left - parentRect.left}px`;

                // Update warna font teks aktif
                navItems.forEach(item => {
                    item.classList.remove('text-gray-900', 'font-bold');
                    item.classList.add('text-gray-600');
                });
                activeLink.classList.add('text-gray-900', 'font-bold');
                activeLink.classList.remove('text-gray-600');
            }

            // Deteksi scroll layar & pindahkan garis ke section yang sedang dilihat
            const observerOptions = {
                root: null,
                rootMargin: '-30% 0px -50% 0px',
                threshold: 0
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const activeId = entry.target.getAttribute('id');
                        const matchingLink = document.querySelector(`.nav-item[data-section="${activeId}"]`);
                        if (matchingLink) {
                            moveIndicator(matchingLink);
                        }
                    }
                });
            }, observerOptions);

            sections.forEach(section => observer.observe(section));

            // Set posisi awal indikator saat pertama load
            const initialActive = document.querySelector('.nav-item[data-section="beranda"]');
            if (initialActive) moveIndicator(initialActive);

            // Redraw posisi garis saat window di-resize
            window.addEventListener('resize', () => {
                const currentActive = document.querySelector('.nav-item.font-bold');
                if (currentActive) moveIndicator(currentActive);
            });
        });
    </script>
</body>

</html>