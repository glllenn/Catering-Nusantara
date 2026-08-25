<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Catering Nusantara') }} - Cita Rasa Autentik Indonesia</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite (Tailwind CSS) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        /* Custom Hex Accent Color sesuai Canva */
        .bg-canva-orange { background-color: #f6a11a; }
        .text-canva-orange { color: #f6a11a; }
        .border-canva-orange { border-color: #f6a11a; }
        .shadow-canva-orange { box-shadow: 0 10px 25px -5px rgba(246, 161, 26, 0.35); }
    </style>
</head>
<body class="font-['Plus_Jakarta_Sans',sans-serif] bg-white text-gray-900 antialiased selection:bg-[#f6a11a] selection:text-white">

    <!-- ========================================== -->
    <!-- 1. NAVBAR (Presisi Canva)                  -->
    <!-- ========================================== -->
    <!-- =========================== =============== -->
    <!-- 1. NAVBAR (Logo Diperbesar)                 -->
    <!-- ========================================== -->
    <!-- ========================================== -->
    <!-- 1. NAVBAR DENGAN ANIMATED UNDERLINE        -->
    <!-- ========================================== -->
    <header class="fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-md transition-all">
        <div class="max-w-[1280px] mx-auto px-6 md:px-12 h-24 flex items-center justify-between">
            
            {{-- Logo --}}
            <a href="#beranda" class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Gunungan Nusantara" class="h-16 md:h-20 w-auto object-contain transition-transform duration-300 hover:scale-105"
                    onerror="this.onerror=null; this.src='/image/logo.png';" />
            </a>

            {{-- Menu Navigasi (Dengan Garis Meluncur Otomatis) --}}
            <nav class="hidden md:flex items-center gap-10 text-lg font-semibold text-gray-800 relative" id="nav-menu">
                
                {{-- GARIS INDIKATOR ANIMASI (Bergerak Otomatis) --}}
                <span id="nav-indicator" class="absolute bottom-0 h-[3px] bg-[#f6a11a] rounded-full transition-all duration-300 ease-in-out"></span>

                <a href="#beranda" class="nav-item py-2 hover:text-[#f6a11a] transition" data-section="beranda">Beranda</a>
                <a href="#tentang-kami" class="nav-item py-2 hover:text-[#f6a11a] transition" data-section="tentang-kami">Tentang Kami</a>
                <a href="#paket" class="nav-item py-2 hover:text-[#f6a11a] transition" data-section="paket">Paket</a>
                <a href="#galeri" class="nav-item py-2 hover:text-[#f6a11a] transition" data-section="galeri">Galeri</a>
                <a href="#testimoni" class="nav-item py-2 hover:text-[#f6a11a] transition" data-section="testimoni">Testimoni</a>
            </nav>

            {{-- Admin Login --}}
            <div class="flex items-center">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold bg-gray-900 text-white px-5 py-2.5 rounded-full hover:bg-black transition shadow-sm">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-semibold text-gray-400 hover:text-[#f6a11a] transition">
                        Admin Log In
                    </a>
                @endauth
            </div>

        </div>
    </header>


    <!-- ========================================== -->
    <!-- 2. BERANDA / HERO SECTION                  -->
    <!-- ========================================== -->
    <!-- ========================================== -->
    <!-- 2. BERANDA / HERO SECTION                  -->
    <!-- ========================================== -->
    <section id="beranda" class="min-h-screen pt-28 pb-16 flex items-center justify-center relative overflow-hidden bg-white">

        {{-- Bulatan / Dot Oranye Background Canva --}}
        <div class="absolute top-[34%] left-[45%] w-4 h-4 bg-canva-orange rounded-full z-0 opacity-90"></div>
        <div class="absolute top-[42%] left-[43%] w-7 h-7 bg-canva-orange rounded-full z-0 opacity-95"></div>
        <div class="absolute top-[32%] left-[50%] w-3 h-3 bg-canva-orange rounded-full z-0 opacity-80"></div>

        <div class="max-w-[1280px] mx-auto px-6 md:px-12 w-full grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">

            <!-- KOLOM KIRI: TEKS HEADLINE, TAGLINE & TOMBOL -->
            <div class="lg:col-span-6 space-y-6 text-center lg:text-left">
                
                {{-- Headline Utama --}}
                <h1 class="text-6xl sm:text-7xl lg:text-[80px] font-extrabold text-black tracking-tight leading-[1.02]">
                    Catering <br />
                    Nusantara
                </h1>

                {{-- Tagline Tambahan --}}
                <p class="text-gray-500 text-base sm:text-lg max-w-lg leading-relaxed font-normal mx-auto lg:mx-0">
                    Hidangan cita rasa autentik khas Nusantara, diracik dengan bahan segar pilihan untuk menyempurnakan setiap momen istimewa Anda.
                </p>

                {{-- Group Tombol Aksi --}}
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-8 pt-2">
                    {{-- Tombol Pesan Sekarang (#f6a11a) --}}
                    <a href="https://wa.me/" target="_blank"
                        class="inline-flex items-center justify-center bg-canva-orange hover:bg-[#e09015] text-white font-medium text-lg px-9 py-3.5 rounded-full shadow-canva-orange transition-all transform hover:-translate-y-0.5">
                        Pesan Sekarang
                    </a>

                    {{-- Tombol Lihat Menu dengan Underline Oranye --}}
                    <a href="#paket" class="group relative inline-flex items-center justify-center font-medium text-lg text-canva-orange py-2 transition">
                        <span>Lihat Menu</span>
                        <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-8 h-[3px] bg-canva-orange rounded-full transition-all group-hover:w-full"></span>
                    </a>
                </div>
            </div>

            <!-- KOLOM KANAN: GAMBAR TUMPENG & BADGE CANVA -->
            <div class="lg:col-span-6 relative flex justify-center items-center">
                <div class="relative w-full max-w-[520px] lg:max-w-[620px]">

                    <!-- GAMBAR TUMPENG BANNER -->
                    <img src="{{ asset('images/newbanner.png') }}"
                        alt="Catering Tumpeng Nusantara"
                        class="w-full h-auto object-contain max-h-[560px] drop-shadow-2xl mx-auto relative z-10 transition duration-500 hover:scale-[1.01]"
                        onerror="this.onerror=null; this.src='/image/tempeng-removebg-preview.png';" />

                    <!-- BADGE KANAN ATAS: "rasa masakannya enak" -->
                    <div class="absolute top-[22%] right-[-10px] sm:right-[-25px] z-20 bg-canva-orange text-white text-xs sm:text-sm font-medium px-6 py-3 rounded-2xl shadow-md text-center leading-tight min-w-[160px] pointer-events-none">
                        rasa masakannya<br>enak
                    </div>

                    <!-- BADGE KIRI BAWAH: "Pengirimannya cepat" -->
                    <div class="absolute bottom-[24%] left-[-10px] sm:left-[-25px] z-20 bg-canva-orange text-white text-xs sm:text-sm font-medium px-5 py-2.5 rounded-2xl shadow-md text-center leading-tight min-w-[145px] pointer-events-none">
                        Pengirimannya<br>cepat
                    </div>

                </div>
            </div>

        </div>

    </section>

   <!-- ========================================== -->
    <!-- 3. SECTION TENTANG KAMI                    -->
    <!-- ========================================== -->
    <section id="tentang-kami" class="py-24 bg-white relative overflow-hidden">
        
        <div class="max-w-[1280px] mx-auto px-6 md:px-12 w-full grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

            <!-- KOLOM KIRI: FOTO UTAMA TUMPENG (SDH TERMASUK BUBBLE BADGE) -->
            <div class="lg:col-span-6 relative flex justify-center items-center">
                <div class="relative w-full max-w-[540px] lg:max-w-[600px]">

                    <!-- FOTO TUMPENG BESERTA BADGE KEUANGGULAN -->
                    <img src="{{ asset('images/tentangcatering.png') }}"
                        alt="Tentang Catering Nusantara"
                        class="w-full h-auto object-contain drop-shadow-2xl mx-auto relative z-10 transition duration-500 hover:scale-[1.01]"
                        onerror="this.onerror=null; this.src='/image/tempeng-removebg-preview.png';" />

                    <!-- ORNAMEN DOT ORANYE BACKGROUND CANVA -->
                    <div class="absolute -top-6 -left-6 w-4 h-4 bg-[#f6a11a] rounded-full opacity-80 z-0"></div>
                    <div class="absolute -bottom-6 left-1/3 w-6 h-6 bg-[#f6a11a] rounded-full opacity-90 z-0"></div>
                    <div class="absolute top-1/2 -right-6 w-3 h-3 bg-[#f6a11a] rounded-full opacity-70 z-0"></div>

                </div>
            </div>

            <!-- KOLOM KANAN: TEKS DETAIL ABOUT US -->
            <div class="lg:col-span-6 space-y-6 text-left">
                
                {{-- Label Sub-Heading --}}
                <div class="inline-flex items-center gap-2">
                    <span class="text-xs uppercase tracking-widest font-bold text-[#f6a11a]">TENTANG KAMI</span>
                    <span class="w-8 h-[2px] bg-[#f6a11a] rounded-full"></span>
                </div>

                {{-- Headline Utama --}}
                <h2 class="text-4xl sm:text-5xl font-extrabold text-black leading-[1.15] tracking-tight">
                    Cita Rasa Nusantara, <br />
                    Disajikan dengan <br />
                    Sepenuh Hati
                </h2>

                {{-- Paragraf Deskripsi --}}
                <p class="text-gray-500 text-sm sm:text-base leading-relaxed">
                    Kami percaya bahwa setiap acara istimewa layak ditemani hidangan terbaik. Dengan bahan-bahan segar, proses memasak yang higienis, dan cita rasa autentik khas Indonesia, kami siap menghadirkan pengalaman kuliner yang berkesan untuk setiap momen Anda.
                </p>

                {{-- 3 Poin Keunggulan Teks --}}
                <div class="space-y-5 pt-2">
                    
                    {{-- Poin 1 --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-orange-50 text-[#f6a11a] flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 3c-4.97 0-9 4.03-9 9 0 2.12.74 4.07 1.97 5.61L4.35 19.4c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.9-1.9C9.2 19.54 10.55 20 12 20c4.97 0 9-4.03 9-9s-4.03-9-9-9z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Bahan Berkualitas</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Kami hanya menggunakan bahan pilihan agar setiap hidangan tetap segar dan lezat.</p>
                        </div>
                    </div>

                    {{-- Poin 2 --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-orange-50 text-[#f6a11a] flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Koki Berpengalaman</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Diracik oleh tim profesional yang berpengalaman dalam berbagai jenis acara.</p>
                        </div>
                    </div>

                    {{-- Poin 3 --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-orange-50 text-[#f6a11a] flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Pelayanan Terbaik</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Mulai dari persiapan hingga penyajian, kami selalu mengutamakan kepuasan pelanggan.</p>
                        </div>
                    </div>

                </div>

                {{-- Tombol Pelajari Lebih Lanjut --}}
                <div class="pt-4">
                    <a href="https://wa.me/" target="_blank"
                        class="inline-flex items-center gap-3 bg-[#f6a11a] hover:bg-[#e09015] text-white font-semibold text-sm px-7 py-3.5 rounded-full shadow-canva-orange transition-all transform hover:-translate-y-0.5">
                        <span>Pelajari Lebih Lanjut</span>
                        <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 fill-current text-white" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                </div>

            </div>

        </div>

    </section>

    <!-- ========================================== -->
    <!-- 4. SECTION PAKET KAMI (Full White & Filter 2 Baris) -->
    <!-- ========================================== -->
    <section id="paket" class="py-24 bg-white relative" 
        x-data="{ 
            activeCategory: 'semua',
            activeTier: 'semua', 
            selectedProduct: null, 
            isModalOpen: false,
            openModal(product) {
                this.selectedProduct = product;
                this.isModalOpen = true;
                document.body.classList.add('overflow-hidden');
            },
            closeModal() {
                this.isModalOpen = false;
                document.body.classList.remove('overflow-hidden');
            }
        }">

        <div class="max-w-[1280px] mx-auto px-6 md:px-12 w-full space-y-10">

            {{-- HEADLINE SECTION PAKET --}}
            <div class="text-left space-y-3">
                <div class="inline-flex items-center gap-2">
                    <span class="text-xs uppercase tracking-widest font-bold text-[#f6a11a]">PAKET KAMI</span>
                    <span class="w-8 h-[2px] bg-[#f6a11a] rounded-full"></span>
                </div>
                <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 tracking-tight">
                    Pilih Paket Favorit Anda
                </h2>
                <p class="text-gray-500 text-sm sm:text-base max-w-xl">
                    Berbagai pilihan paket catering lezat dan berkualitas untuk setiap momen spesial Anda.
                </p>
            </div>

            {{-- FILTER TERPISAH (2 BARIS: KATEGORI & KASTA/TIER) --}}
            <div class="bg-white p-5 rounded-3xl border border-gray-100 space-y-4">
                
                {{-- BARIS 1: KATEGORI PAKET (Dinamis dari Backend) --}}
                <div class="flex flex-wrap items-center gap-2.5">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider mr-2 min-w-[100px]">Kategori:</span>
                    
                    <button @click="activeCategory = 'semua'"
                        :class="activeCategory === 'semua' ? 'bg-[#f6a11a] text-white shadow-md shadow-orange-500/20' : 'bg-white text-gray-600 hover:bg-orange-50 hover:text-[#f6a11a] border border-gray-200/80'"
                        class="px-5 py-2 rounded-xl text-xs font-bold transition-all duration-200">
                        Semua Kategori
                    </button>

                    @if(isset($categories))
                        @foreach($categories as $cat)
                            <button @click="activeCategory = '{{ Str::slug($cat->name) }}'"
                                :class="activeCategory === '{{ Str::slug($cat->name) }}' ? 'bg-[#f6a11a] text-white shadow-md shadow-orange-500/20' : 'bg-white text-gray-600 hover:bg-orange-50 hover:text-[#f6a11a] border border-gray-200/80'"
                                class="px-5 py-2 rounded-xl text-xs font-bold transition-all duration-200">
                                {{ $cat->name }}
                            </button>
                        @endforeach
                    @endif
                </div>

                {{-- BARIS 2: KASTA / TIER PAKET (Gold, Silver, Premium) --}}
                <div class="flex flex-wrap items-center gap-2.5 pt-3 border-t border-gray-200/60">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider mr-2 min-w-[100px]">Kasta Paket:</span>

                    <button @click="activeTier = 'semua'"
                        :class="activeTier === 'semua' ? 'bg-amber-800 text-white shadow-md' : 'bg-white text-gray-600 hover:bg-orange-50 border border-gray-200/80'"
                        class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all duration-200">
                        Semua Kasta
                    </button>

                    <button @click="activeTier = 'silver'"
                        :class="activeTier === 'silver' ? 'bg-amber-800 text-white shadow-md' : 'bg-white text-gray-600 hover:bg-orange-50 border border-gray-200/80'"
                        class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all duration-200">
                        Silver
                    </button>

                    <button @click="activeTier = 'gold'"
                        :class="activeTier === 'gold' ? 'bg-amber-800 text-white shadow-md' : 'bg-white text-gray-600 hover:bg-orange-50 border border-gray-200/80'"
                        class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all duration-200">
                        Gold
                    </button>

                    <button @click="activeTier = 'premium'"
                        :class="activeTier === 'premium' ? 'bg-amber-800 text-white shadow-md' : 'bg-white text-gray-600 hover:bg-orange-50 border border-gray-200/80'"
                        class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all duration-200">
                        Premium
                    </button>
                </div>

            </div>

            {{-- GRID KATALOG PRODUK (RASIO CARD FOTO 4:3) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($products ?? [] as $product)
                    @php
                        $catSlug = Str::slug($product->package_category);
                        $tierSlug = Str::slug($product->tier ?? '');
                    @endphp

                    <div x-show="(activeCategory === 'semua' || activeCategory === '{{ $catSlug }}') && (activeTier === 'semua' || activeTier === '{{ $tierSlug }}')"
                         x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         @click="openModal({{ json_encode($product) }})"
                         class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:border-[#f6a11a] transition-all duration-300 cursor-pointer group flex flex-col justify-between">
                        
                        <div>
                            <!-- FOTO PRODUK RASIO 4:3 -->
                            <div class="relative aspect-[4/3] w-full overflow-hidden bg-gray-100">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs font-medium">
                                        Tidak Ada Foto
                                    </div>
                                @endif

                                @if($product->is_bestseller)
                                    <span class="absolute top-3 left-3 bg-white/95 text-[#f6a11a] text-[10px] font-bold px-3 py-1 rounded-full shadow-sm">
                                        ★ Favorit
                                    </span>
                                @endif

                                @if($product->tier)
                                    <span class="absolute top-3 right-3 bg-amber-800/90 backdrop-blur-sm text-white text-[9px] uppercase font-bold px-2.5 py-0.5 rounded-full shadow-sm">
                                        {{ $product->tier }}
                                    </span>
                                @endif
                            </div>

                            <!-- INFORMASI PRODUK -->
                            <div class="p-5 text-center space-y-2">
                                <span class="text-[10px] uppercase font-bold text-[#f6a11a] tracking-wider block">
                                    {{ $product->package_category }}
                                </span>
                                <h3 class="font-bold text-gray-900 text-base group-hover:text-[#f6a11a] transition line-clamp-1">
                                    {{ $product->name }}
                                </h3>
                                <div class="w-6 h-[2px] bg-[#f6a11a] mx-auto rounded-full opacity-60"></div>
                                <p class="text-sm text-[#f6a11a] font-black">
                                    Rp {{ number_format($product->price, 0, ',', '.') }} <span class="text-xs text-gray-400 font-normal">/ pax</span>
                                </p>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-gray-400 bg-white rounded-3xl border border-gray-100">
                        Belum ada paket menu yang tersedia.
                    </div>
                @endforelse
            </div>

            {{-- BANNER CUSTOM ORDER --}}
            <div class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-6 mt-12">
                <div class="flex items-center gap-4 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-full bg-orange-50 text-[#f6a11a] flex items-center justify-center shrink-0 mx-auto sm:mx-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-gray-900 text-base">Butuh paket custom?</h4>
                        <p class="text-xs text-gray-500 mt-0.5">Kami siap membantu menyesuaikan paket sesuai kebutuhan acara Anda.</p>
                    </div>
                </div>

                <a href="https://wa.me/" target="_blank"
                    class="inline-flex items-center gap-2 border border-[#f6a11a] text-[#f6a11a] hover:bg-[#f6a11a] hover:text-white font-bold text-xs px-6 py-3 rounded-full transition-all duration-300 shrink-0">
                    <span>Hubungi Kami</span>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                </a>
            </div>

        </div>

        <!-- ========================================== -->
        <!-- POP-UP MODAL DETAIL PAKET (DINAMIS BACKEND)-->
        <!-- ========================================== -->
        <div x-show="isModalOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-black/60 backdrop-blur-md"
             style="display: none;">
            
            <div class="absolute inset-0" @click="closeModal()"></div>

            <div class="relative bg-white w-full max-w-2xl rounded-3xl overflow-hidden shadow-2xl z-10 my-auto transform transition-all"
                 @click.stop>
                
                <button @click="closeModal()" 
                    class="absolute top-4 right-4 z-20 bg-black/50 hover:bg-black text-white w-9 h-9 rounded-full flex items-center justify-center transition">
                    ✕
                </button>

                <template x-if="selectedProduct">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-0">
                        <!-- FOTO DETAIL MODAL -->
                        <div class="md:col-span-5 relative h-64 md:h-full bg-gray-100">
                            <img :src="selectedProduct.image ? '/storage/' + selectedProduct.image : '/image/tempeng-removebg-preview.png'" 
                                 :alt="selectedProduct.name" 
                                 class="w-full h-full object-cover">
                        </div>

                        <!-- DESKRIPSI & INFO DINAMIS BACKEND -->
                        <div class="md:col-span-7 p-6 md:p-8 space-y-4">
                            <div>
                                {{-- Kategori & Tier Dinamis Backend --}}
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-[10px] uppercase font-bold bg-orange-100 text-[#f6a11a] px-2.5 py-0.5 rounded-md" 
                                          x-text="selectedProduct.package_category"></span>
                                    <template x-if="selectedProduct.tier">
                                        <span class="text-[10px] uppercase font-bold bg-amber-800 text-white px-2 py-0.5 rounded-md" 
                                              x-text="selectedProduct.tier"></span>
                                    </template>
                                </div>

                                <h3 class="text-2xl font-extrabold text-gray-900 leading-snug" x-text="selectedProduct.name"></h3>
                                <p class="text-xl font-black text-[#f6a11a] mt-1">
                                    Rp <span x-text="new Intl.NumberFormat('id-ID').format(selectedProduct.price)"></span>
                                    <span class="text-xs font-normal text-gray-400">/ pax</span>
                                </p>
                            </div>

                            <div class="space-y-3 pt-3 border-t border-gray-100 text-xs">
                                <div>
                                    <span class="font-bold text-gray-900 block mb-1">Minimal Pemesanan:</span>
                                    <p class="text-[#f6a11a] bg-orange-50 px-3 py-1.5 rounded-lg inline-block font-semibold" 
                                       x-text="selectedProduct.min_order + ' porsi'"></p>
                                </div>

                                <div>
                                    <span class="font-bold text-gray-900 block mb-1">Daftar Menu Utama:</span>
                                    <p class="text-gray-600 leading-relaxed bg-gray-50 p-3 rounded-xl border border-gray-100" 
                                       x-text="selectedProduct.main_menu"></p>
                                </div>
                            </div>

                            <!-- CTA PESAN VIA WHATSAPP -->
                            <div class="pt-4">
                                <a :href="'https://wa.me/?text=Halo%20Catering%20Nusantara,%20saya%20ingin%20memesan%20' + encodeURIComponent(selectedProduct.name)" 
                                   target="_blank"
                                   class="w-full bg-[#f6a11a] hover:bg-[#e09015] text-white font-bold text-sm py-3.5 px-6 rounded-full shadow-lg shadow-orange-500/20 transition flex items-center justify-center gap-2">
                                    <span>Pesan Paket Ini</span>
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </template>

            </div>
        </div>

    </section>

    <!-- ========================================== -->
    <!-- 5. SECTION GALERI KAMI (Auto-Slider Horizontal) -->
    <!-- ========================================== -->
    <section id="galeri" class="py-24 bg-white relative overflow-hidden"
        x-data="{ 
            activeGalleryTab: 'semua',
            previewImage: null,
            isPreviewOpen: false,
            autoScrollInterval: null,
            openPreview(imgUrl) {
                this.previewImage = imgUrl;
                this.isPreviewOpen = true;
                document.body.classList.add('overflow-hidden');
            },
            closePreview() {
                this.isPreviewOpen = false;
                document.body.classList.remove('overflow-hidden');
            },
            initAutoScroll() {
                const container = this.$refs.sliderContainer;
                if (!container) return;
                
                this.autoScrollInterval = setInterval(() => {
                    // Geser sejauh 320px ke kanan secara otomatis
                    if (container.scrollLeft + container.clientWidth >= container.scrollWidth - 10) {
                        container.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        container.scrollBy({ left: 320, behavior: 'smooth' });
                    }
                }, 3500); // Bergeser setiap 3.5 detik
            },
            stopAutoScroll() {
                if (this.autoScrollInterval) clearInterval(this.autoScrollInterval);
            },
            scrollManual(direction) {
                const container = this.$refs.sliderContainer;
                const scrollAmount = direction === 'left' ? -340 : 340;
                container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        }"
        x-init="initAutoScroll()"
        @mouseenter="stopAutoScroll()"
        @mouseleave="initAutoScroll()">

        {{-- Background Ornamen Canva --}}
        <div class="absolute top-12 right-[45%] w-3.5 h-3.5 bg-[#f6a11a] rounded-full opacity-80 z-0"></div>
        <div class="absolute top-20 right-[42%] w-6 h-6 bg-[#f6a11a] rounded-full opacity-90 z-0"></div>
        <div class="absolute top-36 right-[12%] w-4 h-4 bg-[#f6a11a] rounded-full opacity-70 z-0"></div>

        <div class="max-w-[1280px] mx-auto px-6 md:px-12 w-full space-y-8 relative z-10">

            {{-- HEADLINE SECTION & NAVIGASI TOMBOL PANAH --}}
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="text-left space-y-3">
                    <div class="inline-flex items-center gap-2">
                        <span class="text-xs uppercase tracking-widest font-bold text-[#f6a11a]">GALERI KAMI</span>
                        <span class="w-8 h-[2px] bg-[#f6a11a] rounded-full"></span>
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 tracking-tight">
                        Momen Spesial, <br />
                        Hidangan Berkesan
                    </h2>
                    <p class="text-gray-500 text-sm sm:text-base max-w-xl">
                        Beberapa momen berharga bersama Catering Nusantara yang telah menjadi bagian dari acara istimewa Anda.
                    </p>
                </div>

                {{-- TOMBOL PANAH GESER MANUAL --}}
                <div class="flex items-center gap-3 shrink-0">
                    <button @click="scrollManual('left')" 
                        class="w-11 h-11 rounded-full border border-gray-200 hover:border-[#f6a11a] bg-white text-gray-700 hover:text-[#f6a11a] flex items-center justify-center transition shadow-sm hover:shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button @click="scrollManual('right')" 
                        class="w-11 h-11 rounded-full border border-gray-200 hover:border-[#f6a11a] bg-white text-gray-700 hover:text-[#f6a11a] flex items-center justify-center transition shadow-sm hover:shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- FILTER KATEGORI ACARA --}}
            <div class="flex flex-wrap items-center gap-3 pt-2">
                <button @click="activeGalleryTab = 'semua'"
                    :class="activeGalleryTab === 'semua' ? 'bg-[#f6a11a] text-white shadow-md shadow-orange-500/20' : 'bg-gray-50 text-gray-600 hover:bg-orange-50 hover:text-[#f6a11a] border border-gray-100'"
                    class="px-6 py-2.5 rounded-full text-xs font-bold transition-all duration-200">
                    Semua
                </button>

                @if(isset($categories) && count($categories) > 0)
                    @foreach($categories as $cat)
                        <button @click="activeGalleryTab = '{{ Str::slug($cat->name) }}'"
                            :class="activeGalleryTab === '{{ Str::slug($cat->name) }}' ? 'bg-[#f6a11a] text-white shadow-md shadow-orange-500/20' : 'bg-gray-50 text-gray-600 hover:bg-orange-50 hover:text-[#f6a11a] border border-gray-100'"
                            class="px-6 py-2.5 rounded-full text-xs font-bold transition-all duration-200">
                            {{ $cat->name }}
                        </button>
                    @endforeach
                @endif
            </div>

            {{-- CONTAINER SLIDER HORIZONTAL AUTOMATIS --}}
            <div class="relative w-full">
                <div x-ref="sliderContainer" 
                     class="flex gap-5 overflow-x-auto scrollbar-none scroll-smooth py-2 px-1 snap-x snap-mandatory">
                    
                    @php
                        $galleryProducts = collect($products ?? [])->filter(fn($p) => !empty($p->image));
                    @endphp

                    @forelse($galleryProducts as $product)
                        @php
                            $catSlug = Str::slug($product->package_category);
                        @endphp

                        <div x-show="activeGalleryTab === 'semua' || activeGalleryTab === '{{ $catSlug }}'"
                             x-transition:enter="transition ease-out duration-300"
                             @click="openPreview('{{ asset('storage/' . $product->image) }}')"
                             class="snap-start shrink-0 w-[290px] sm:w-[340px] h-[240px] sm:h-[270px] relative rounded-3xl overflow-hidden group cursor-pointer border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300">
                            
                            <!-- GAMBAR FOTO -->
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            
                            <!-- HOVER CAPTION OVERLAY -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 p-5 flex flex-col justify-end">
                                <span class="text-[10px] uppercase font-bold text-[#f6a11a] tracking-wider">{{ $product->package_category }}</span>
                                <h4 class="text-white font-extrabold text-base leading-snug">{{ $product->name }}</h4>
                            </div>
                        </div>
                    @empty
                        <div class="w-full py-16 text-center text-gray-400 bg-gray-50 rounded-3xl border border-gray-100">
                            Belum ada foto galeri yang diunggah.
                        </div>
                    @endforelse

                </div>
            </div>

            {{-- BANNER BOTTOM --}}
            <div class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-2xl bg-orange-50 text-[#f6a11a] flex items-center justify-center shrink-0 mx-auto sm:mx-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-gray-900 text-base">Ingin lihat lebih banyak momen?</h4>
                        <p class="text-xs text-gray-500 mt-0.5">Kami siap hadir di acara istimewa Anda berikutnya.</p>
                    </div>
                </div>

                <a href="https://wa.me/" target="_blank"
                    class="inline-flex items-center gap-2 border border-[#f6a11a] text-[#f6a11a] hover:bg-[#f6a11a] hover:text-white font-bold text-xs px-6 py-3 rounded-full transition-all duration-300 shrink-0">
                    <span>Hubungi Kami</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>

        </div>

        <!-- LIGHTBOX POP-UP PREVIEW FOTO FULLSCREEN -->
        <div x-show="isPreviewOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md"
             style="display: none;">
            
            <div class="absolute inset-0" @click="closePreview()"></div>

            <div class="relative max-w-4xl max-h-[90vh] rounded-3xl overflow-hidden z-10">
                <button @click="closePreview()" 
                    class="absolute top-4 right-4 z-20 bg-black/60 hover:bg-black text-white w-10 h-10 rounded-full flex items-center justify-center transition">
                    ✕
                </button>
                <img :src="previewImage" alt="Preview Galeri" class="w-full h-auto max-h-[85vh] object-contain rounded-3xl">
            </div>
        </div>

    </section>

    <!-- ========================================== -->
    <!-- 3. SECTION LAINNYA (Tentang Kami, Paket, Dll) -->
    <!-- ========================================== -->
    @if(view()->exists('pengguna.sections.tentang_kami'))
        @include('pengguna.sections.tentang_kami')
    @endif

    @if(view()->exists('pengguna.sections.paket'))
        @include('pengguna.sections.paket')
    @endif

    @if(view()->exists('pengguna.sections.galeri'))
        @include('pengguna.sections.galeri')
    @endif

    @if(view()->exists('pengguna.sections.testimoni'))
        @include('pengguna.sections.testimoni')
    @endif

    @if(view()->exists('pengguna.sections.footer'))
        @include('pengguna.sections.footer')
    @else
        <footer class="bg-gray-900 text-gray-400 py-8 text-center text-xs">
            <p>&copy; {{ date('Y') }} Catering Nusantara. All rights reserved.</p>
        </footer>
    @endif
    
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
</body>
</html>