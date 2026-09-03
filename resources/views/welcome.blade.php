<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Catering Nusantara') }} — Cita Rasa Autentik untuk Setiap Momen Istimewa</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=perandory@400,500,600,700&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite (Tailwind CSS) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        :root {
            --brand-gold: #a4864b;
            --brand-gold-hover: #8f723c;
            --brand-dark: #0d0805;
            --brand-espresso: #1a120b;
            --brand-cream: #faf7f2;
            --brand-warm-bg: #fdfbf7;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Scroll reveal animation styles */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .reveal-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-400 { transition-delay: 400ms; }

        /* Filmstrip animations */
        @keyframes filmstrip-up { 0% { transform: translateY(0); } 100% { transform: translateY(-50%); } }
        @keyframes filmstrip-down { 0% { transform: translateY(-50%); } 100% { transform: translateY(0); } }
        .animate-filmstrip-up-1 { animation: filmstrip-up 35s linear infinite; }
        .animate-filmstrip-up-2 { animation: filmstrip-up 45s linear infinite; }
        .animate-filmstrip-down-1 { animation: filmstrip-down 40s linear infinite; }
        .animate-filmstrip-down-2 { animation: filmstrip-down 50s linear infinite; }
    </style>
</head>

<body x-data
    class="font-['Plus_Jakarta_Sans',sans-serif] bg-[#fdfbf7] text-neutral-800 antialiased selection:bg-[#a4864b] selection:text-white overflow-x-hidden">

    <!-- ========================================== -->
    <!-- 🌟 1. LUXURY INTRO SCREEN (PRELOADER)      -->
    <!-- ========================================== -->
    <div id="site-preloader"
        class="fixed inset-0 z-[100] bg-[#0d0805] text-white flex flex-col items-center justify-center transition-all duration-700 ease-out">
        <div class="text-center space-y-4 px-6">
            <div class="relative w-20 h-20 sm:w-24 sm:h-24 mx-auto mb-2">
                <img src="{{ asset('images/logo.png') }}" alt="Catering Nusantara"
                    class="w-full h-full object-contain filter drop-shadow-md animate-pulse"
                    onerror="this.onerror=null; this.src='/image/logo.png';" />
            </div>
            <div class="space-y-1.5">
                <span class="text-xs sm:text-sm font-semibold tracking-[0.35em] text-[#a4864b] uppercase block">
                    Catering &amp; Kuliner Nusantara
                </span>
                <h1 class="font-['Perandory','Playfair_Display',serif] text-2xl sm:text-3xl lg:text-4xl font-normal tracking-wider text-white">
                    CATERING NUSANTARA
                </h1>
            </div>
            <div class="w-24 h-[1.5px] bg-[#a4864b]/60 mx-auto rounded-full mt-4"></div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 🧭 2. NAVBAR (ORIGINAL HEADER & ISLAND)    -->
    <!-- ========================================== -->
    <header id="site-header"
        class="fixed top-0 left-0 w-full z-40 transition-all duration-500 py-5 sm:py-6 px-6 sm:px-10 lg:px-16">
        
        <div id="header-inner"
            class="w-full max-w-7xl mx-auto flex items-center justify-between transition-all duration-500">
            
            {{-- Logo & Nama Usaha (Kiri) --}}
            <a href="#beranda" class="flex items-center gap-3.5 shrink-0 group">
                <img src="{{ asset('images/logo.png') }}" alt="Catering Nusantara Logo"
                    class="h-11 sm:h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
                    onerror="this.onerror=null; this.src='/image/logo.png';" />
                <div class="flex flex-col text-left">
                    <span class="font-['Perandory','Playfair_Display',serif] text-lg sm:text-xl lg:text-2xl font-bold tracking-wider text-white transition-colors duration-300" id="nav-brand-title">
                        CATERING NUSANTARA
                    </span>
                    <span class="text-[10px] sm:text-[11px] uppercase tracking-[0.25em] text-[#e4c990] font-medium transition-colors duration-300" id="nav-brand-sub">
                        Cita Rasa Autentik
                    </span>
                </div>
            </a>

            {{-- Link Navigasi Bahasa Indonesia (Font Size Diperbesar & Jelas) --}}
            <nav id="nav-menu" class="hidden md:flex items-center gap-7 lg:gap-9 text-sm lg:text-[15px] font-semibold tracking-wide">
                <a href="#beranda" class="nav-item text-white/90 hover:text-white transition-colors duration-200">
                    Beranda
                </a>
                <a href="#tentang-kami" class="nav-item text-white/90 hover:text-white transition-colors duration-200">
                    Tentang Kami
                </a>
                <a href="#paket" class="nav-item text-white/90 hover:text-white transition-colors duration-200">
                    Paket Menu
                </a>
                <a href="#galeri" class="nav-item text-white/90 hover:text-white transition-colors duration-200">
                    Galeri
                </a>
                <a href="#testimoni" class="nav-item text-white/90 hover:text-white transition-colors duration-200">
                    Testimoni
                </a>
                <a href="#cara_pemesanan" class="nav-item text-white/90 hover:text-white transition-colors duration-200">
                    Cara Order
                </a>
            </nav>

            {{-- Tombol Keranjang Belanja & Admin Panel (Kanan) --}}
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('admin.dashboard') }}" 
                        class="hidden sm:inline-flex items-center gap-2 bg-[#1a120b]/90 hover:bg-[#1a120b] border border-[#a4864b]/40 text-white font-bold py-2.5 px-4 rounded-full text-xs transition shadow-lg backdrop-blur-sm">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Dashboard Admin</span>
                    </a>
                @endauth

                <button type="button" @click="$store.cart.toggle()" id="nav-cart-btn"
                    class="relative p-2.5 sm:p-3 rounded-full text-white hover:bg-white/15 transition-all flex items-center justify-center cursor-pointer border border-white/20"
                    title="Buka Keranjang">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span x-show="$store.cart && $store.cart.totalCount > 0"
                        x-text="$store.cart ? $store.cart.totalCount : 0"
                        class="absolute -top-1 -right-1 bg-[#a4864b] text-white text-[10px] font-bold h-4 min-w-[18px] px-1 rounded-full flex items-center justify-center"
                        style="display: none;">
                    </span>
                </button>
            </div>

        </div>
    </header>

    <!-- ========================================================= -->
    <!-- 👑 3. SECTION BERANDA DENGAN FILMSTRIP BERGERAK (HERO)    -->
    <!-- ========================================================= -->
    @php
        // =========================================================
        // 🎞️ SLOT INPUT FOTO FILMSTRIP BERANDA (Bisa Diganti/Tambah)
        // =========================================================
        $filmstripCol1 = [
            'images/PaketGoldAyamBakar.png',
            'images/PaketPremiumChickenSalted.png',
            'images/Tumpeng.png',
            'images/Kebuli.png',
            'images/NasiPasundaanAyamSuir.png',
            'images/PaketGoldAyamSerundeng.png',
        ];

        $filmstripCol2 = [
            'images/PaketSilverAyamBakar.png',
            'images/PaketGoldAyamTeriyaki.png',
            'images/TumpengMini.png',
            'images/PaketGoldChickenPop.png',
            'images/Box.png',
            'images/PaketSilverAyamLadaHitam.png',
        ];

        $filmstripCol3 = [
            'images/PaketPremiumChickenSalted.png',
            'images/NasiPasundaanAyamSuir.png',
            'images/PaketGoldAyamBakar.png',
            'images/Tumpeng.png',
            'images/tentangNusantara.png',
            'images/Kebuli.png',
        ];

        $filmstripCol4 = [
            'images/PaketGoldAyamTeriyaki.png',
            'images/PaketSilverAyamBakar.png',
            'images/TumpengMini.png',
            'images/PaketGoldChickenPop.png',
            'images/PaketGoldAyamSerundeng.png',
            'images/Box.png',
        ];
    @endphp

    <section id="beranda"
        class="relative min-h-[92vh] lg:min-h-screen flex flex-col justify-between overflow-hidden bg-[#0d0805] rounded-b-2xl sm:rounded-b-3xl lg:rounded-b-[36px] shadow-2xl z-20">

        <!-- 🎞️ BACKGROUND: MULTI-COLUMN FILMSTRIP GRID (Border Radius Kecil & Rapi) -->
        <div class="absolute -inset-x-24 -inset-y-36 flex justify-center gap-4 sm:gap-6 transform -rotate-6 sm:-rotate-12 pointer-events-none opacity-40 sm:opacity-45 scale-110">
            
            {{-- Kolom 1 (Bergerak ke Atas) --}}
            <div class="flex flex-col gap-4 sm:gap-6 animate-filmstrip-up-1 shrink-0">
                @for ($loop1 = 0; $loop1 < 2; $loop1++)
                    @foreach ($filmstripCol1 as $img)
                        <div class="aspect-[4/5] w-[180px] sm:w-[240px] lg:w-[270px] rounded-lg sm:rounded-xl overflow-hidden bg-neutral-900 border-2 border-black/80 shadow-2xl shrink-0">
                            <img src="{{ asset($img) }}" alt="Menu" class="w-full h-full object-cover filter brightness-90 contrast-105"
                                onerror="this.src='/image/herobaru.jpg';">
                        </div>
                    @endforeach
                @endfor
            </div>

            {{-- Kolom 2 (Bergerak ke Bawah) --}}
            <div class="flex flex-col gap-4 sm:gap-6 animate-filmstrip-down-1 shrink-0">
                @for ($loop2 = 0; $loop2 < 2; $loop2++)
                    @foreach ($filmstripCol2 as $img)
                        <div class="aspect-[4/5] w-[180px] sm:w-[240px] lg:w-[270px] rounded-lg sm:rounded-xl overflow-hidden bg-neutral-900 border-2 border-black/80 shadow-2xl shrink-0">
                            <img src="{{ asset($img) }}" alt="Menu" class="w-full h-full object-cover filter brightness-90 contrast-105"
                                onerror="this.src='/image/herobaru.jpg';">
                        </div>
                    @endforeach
                @endfor
            </div>

            {{-- Kolom 3 (Bergerak ke Atas) --}}
            <div class="flex flex-col gap-4 sm:gap-6 animate-filmstrip-up-2 shrink-0 hidden sm:flex">
                @for ($loop3 = 0; $loop3 < 2; $loop3++)
                    @foreach ($filmstripCol3 as $img)
                        <div class="aspect-[4/5] w-[180px] sm:w-[240px] lg:w-[270px] rounded-lg sm:rounded-xl overflow-hidden bg-neutral-900 border-2 border-black/80 shadow-2xl shrink-0">
                            <img src="{{ asset($img) }}" alt="Menu" class="w-full h-full object-cover filter brightness-90 contrast-105"
                                onerror="this.src='/image/herobaru.jpg';">
                        </div>
                    @endforeach
                @endfor
            </div>

            {{-- Kolom 4 (Bergerak ke Bawah) --}}
            <div class="flex flex-col gap-4 sm:gap-6 animate-filmstrip-down-2 shrink-0 hidden md:flex">
                @for ($loop4 = 0; $loop4 < 2; $loop4++)
                    @foreach ($filmstripCol4 as $img)
                        <div class="aspect-[4/5] w-[180px] sm:w-[240px] lg:w-[270px] rounded-lg sm:rounded-xl overflow-hidden bg-neutral-900 border-2 border-black/80 shadow-2xl shrink-0">
                            <img src="{{ asset($img) }}" alt="Menu" class="w-full h-full object-cover filter brightness-90 contrast-105"
                                onerror="this.src='/image/herobaru.jpg';">
                        </div>
                    @endforeach
                @endfor
            </div>

        </div>

        <!-- 🖤 MULTI-LAYER DARK GRADIENT OVERLAY (Mencegah Teks Tertutup Foto) -->
        <div class="absolute inset-0 bg-gradient-to-b from-[#0d0805]/90 via-[#0d0805]/70 to-[#0d0805]/95 pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_transparent_15%,_#0d0805_90%)] pointer-events-none"></div>

        <!-- ✍️ FOREGROUND HERO TYPOGRAPHY (Bahasa Indonesia & Font Size Diperbesar) -->
        <div class="relative z-30 max-w-5xl mx-auto px-6 sm:px-10 lg:px-16 w-full text-center my-auto pt-36 sm:pt-44 pb-16 space-y-6 sm:space-y-8">
            
            {{-- Top Subhead --}}
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15">
                <span class="text-xs sm:text-sm font-semibold tracking-[0.25em] text-[#e4c990] uppercase">
                    ✦ Sajian Autentik untuk Setiap Momen Istimewa ✦
                </span>
            </div>

            {{-- Giant Script / Serif Hero Title (Diperbesar & Disesuaikan) --}}
            <div class="space-y-3">
                <h1 class="font-['Playfair_Display',serif] italic font-normal text-8xl sm:text-[120px] lg:text-[150px] xl:text-[170px] text-white leading-[0.88] tracking-tight drop-shadow-2xl">
                    Catering
                </h1>
                <p class="text-xs sm:text-base lg:text-lg font-extrabold tracking-[0.35em] sm:tracking-[0.45em] text-[#e4c990] uppercase pt-2">
                    &amp; Kuliner Pernikahan Nusantara
                </p>
            </div>

            {{-- Hero Description in Indonesian (Enlarged) --}}
            <p class="text-white/95 text-base sm:text-xl lg:text-2xl font-light leading-relaxed max-w-3xl mx-auto">
                Menghadirkan kelezatan warisan kuliner Indonesia dengan bahan segar berkualitas, penyajian higienis, dan pelayanan terpercaya untuk pesta pernikahan, jamuan kantor, dan syukuran keluarga.
            </p>

            {{-- Dual Action Buttons --}}
            <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
                <a href="#paket"
                    class="bg-[#f6a11a] hover:bg-[#e09015] text-[#0d0805] font-extrabold text-sm sm:text-base px-9 py-4 rounded-full transition-all duration-200 shadow-lg">
                    Jelajahi Paket Menu
                </a>
                <a href="https://wa.me/628561155113?text=Halo%20Catering%20Nusantara,%20saya%20ingin%20berkonsultasi%20mengenai%20layanan%20catering."
                    target="_blank"
                    class="bg-transparent hover:bg-white/10 text-white font-semibold text-sm sm:text-base px-8 py-4 rounded-full border border-white/40 transition-all duration-200">
                    Konsultasi via WhatsApp
                </a>
            </div>

        </div>

        <!-- ⬇️ BOTTOM HERO BAR -->
        <div class="relative z-30 w-full max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 pb-8">
            <div class="w-full flex items-center justify-between border-t border-white/20 pt-5 text-xs sm:text-sm text-white/70 tracking-wider">
                <div class="flex items-center gap-4 sm:gap-8 uppercase font-medium text-xs sm:text-sm">
                    <span>Est. 2024</span>
                    <span>•</span>
                    <span>Tamansari, Bogor</span>
                    <span>•</span>
                    <span>100% Halal &amp; Higienis</span>
                </div>
                <a href="#tentang-kami" class="hidden sm:inline-flex items-center gap-2 text-white/80 hover:text-white transition-colors text-xs sm:text-sm">
                    <span>Scroll ke bawah</span>
                    <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </a>
            </div>
        </div>

    </section>

    <!-- ================================================================= -->
    <!-- 📖 4. SECTION TENTANG KAMI (EXPANDED 2-PART EDITORIAL EXPERIENCE) -->
    <!-- ================================================================= -->
    <section id="tentang-kami" class="scroll-mt-24 py-28 lg:py-36 bg-[#fdfbf7] relative overflow-hidden">
        
        <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 w-full space-y-32">
            
            <!-- ========================================== -->
            <!-- BAGIAN 1: FILOSOFI KAMI (Our Philosophy)   -->
            <!-- ========================================== -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                {{-- Kolom Kiri: Heading & Cerita --}}
                <div class="lg:col-span-6 space-y-6 reveal-on-scroll">
                    
                    <div class="inline-flex items-center gap-2.5 px-3.5 py-1 rounded-full bg-[#faf4ea] text-[#a4864b] text-xs font-bold uppercase tracking-wider">
                        <span>01 / FILOSOFI &amp; CERITA KAMI</span>
                    </div>

                    <h2 class="font-['Playfair_Display',serif] italic font-normal text-5xl sm:text-6xl lg:text-7xl text-neutral-900 leading-[1.08] tracking-tight">
                        Filosofi Rasa Kami
                    </h2>

                    <div class="space-y-4 text-neutral-700 text-base sm:text-lg leading-relaxed font-light">
                        <p>
                            Bagi kami di <strong>Catering Nusantara</strong>, setiap masakan adalah jembatan yang menghubungkan tradisi, rasa cinta, dan kehangatan keluarga. Didirikan pada tahun 2024 oleh <strong>Eva Rudianti</strong> di Tamansari, Bogor, kami mendedikasikan diri untuk menyajikan hidangan autentik Indonesia dengan standar mutu terbaik.
                        </p>
                        <p>
                            Kami memilih rempah-rempah lokal segar langsung dari petani Nusantara dan mengolahnya dengan teknik memasak perlahan (*slow-cooked tradition*) agar kelezatan bumbu meresap sempurna hingga ke serat terdalam.
                        </p>
                    </div>

                    {{-- Quote Founder Box --}}
                    <div class="pt-4 border-l-2 border-[#a4864b] pl-5 py-1">
                        <blockquote class="font-['Playfair_Display',serif] italic text-base sm:text-lg text-neutral-800 leading-snug">
                            &ldquo;Bagi kami, kesuksesan sebuah perayaan diukur dari senyuman puas para tamu setelah menyantap setiap suapan hidangan.&rdquo;
                        </blockquote>
                        <span class="text-xs font-bold text-[#a4864b] block uppercase tracking-wider mt-2">
                            — Eva Rudianti, Founder &amp; Pemilik
                        </span>
                    </div>

                </div>

                {{-- Kolom Kanan: Multi-Photo Showcase Cards --}}
                <div class="lg:col-span-6 grid grid-cols-2 gap-4 sm:gap-6 reveal-on-scroll delay-100">
                    <div class="space-y-4 sm:space-y-6">
                        <div class="aspect-[3/4] rounded-3xl overflow-hidden bg-neutral-200 border border-neutral-200/80 shadow-lg">
                            <img src="{{ asset('images/makanan.png') }}" alt="Catering Setup"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                                onerror="this.src='/image/herobaru.jpg';">
                        </div>
                        <div class="p-5 rounded-2xl bg-white border border-neutral-200/80 shadow-sm">
                            <span class="text-2xl sm:text-3xl font-bold text-[#a4864b]">100%</span>
                            <p class="text-xs sm:text-sm text-neutral-600 font-medium mt-1">Bahan Segar &amp; Halal Pilihan</p>
                        </div>
                    </div>

                    <div class="space-y-4 sm:space-y-6 pt-8 sm:pt-12">
                        <div class="p-5 rounded-2xl bg-[#1a120b] text-white shadow-sm">
                            <span class="text-2xl sm:text-3xl font-bold text-[#f6a11a]">500+</span>
                            <p class="text-xs sm:text-sm text-white/70 font-medium mt-1">Momen Acara Terselenggara</p>
                        </div>
                        <div class="aspect-[3/4] rounded-3xl overflow-hidden bg-neutral-200 border border-neutral-200/80 shadow-lg">
                            <img src="{{ asset('images/makanan2.png') }}" alt="Wedding Banquet"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                                onerror="this.src='/image/herobaru.jpg';">
                        </div>
                    </div>
                </div>

            </div>

            <!-- ========================================================= -->
            <!-- BAGIAN 2: MENGAPA MEMILIH KAMI (4 PILAR KEUNGGULAN KAMI)  -->
            <!-- ========================================================= -->
            <div class="space-y-12 pt-8 border-t border-neutral-200/80">
                
                {{-- Section Title Bagian 2 --}}
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 reveal-on-scroll">
                    <div class="space-y-3 max-w-2xl">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#faf4ea] text-[#a4864b] text-xs font-bold uppercase tracking-wider">
                            <span>02 / STANDAR LAYANAN</span>
                        </div>
                        <h3 class="font-['Playfair_Display',serif] italic text-3xl sm:text-4xl lg:text-5xl font-normal text-neutral-900 leading-tight">
                            Mengapa Mempercayakan Jamuan Anda pada Kami?
                        </h3>
                    </div>
                    <p class="text-neutral-600 text-sm sm:text-base font-light max-w-md">
                        Komitmen kami untuk memberikan pengalaman kuliner terbaik tanpa kerumitan untuk kelancaran momen bahagia Anda.
                    </p>
                </div>

                {{-- 4 Pilar Cards --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    {{-- Pilar 1 --}}
                    <div class="bg-white p-7 rounded-3xl border border-neutral-200/80 hover:border-[#a4864b]/50 transition-all duration-300 space-y-4 reveal-on-scroll">
                        <div class="w-12 h-12 rounded-2xl bg-[#faf4ea] text-[#a4864b] flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h4 class="font-bold text-lg text-neutral-900">Bahan 100% Halal</h4>
                        <p class="text-xs sm:text-sm text-neutral-600 leading-relaxed font-light">
                            Seleksi bahan baku bermutu tinggi dengan kepastian halal, kesegaran terjamin, dan proses higienis bersertifikasi.
                        </p>
                    </div>

                    {{-- Pilar 2 --}}
                    <div class="bg-white p-7 rounded-3xl border border-neutral-200/80 hover:border-[#a4864b]/50 transition-all duration-300 space-y-4 reveal-on-scroll delay-100">
                        <div class="w-12 h-12 rounded-2xl bg-[#faf4ea] text-[#a4864b] flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h4 class="font-bold text-lg text-neutral-900">Resep Asli Rempah</h4>
                        <p class="text-xs sm:text-sm text-neutral-600 leading-relaxed font-light">
                            Racikan bumbu tradisional khas Nusantara yang melimpah, menghasilkan aroma harum dan cita rasa gurih meresap.
                        </p>
                    </div>

                    {{-- Pilar 3 --}}
                    <div class="bg-white p-7 rounded-3xl border border-neutral-200/80 hover:border-[#a4864b]/50 transition-all duration-300 space-y-4 reveal-on-scroll delay-200">
                        <div class="w-12 h-12 rounded-2xl bg-[#faf4ea] text-[#a4864b] flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </div>
                        <h4 class="font-bold text-lg text-neutral-900">Penataan Elegan</h4>
                        <p class="text-xs sm:text-sm text-neutral-600 leading-relaxed font-light">
                            Penyajian prasmanan dan tumpeng ditata mewah dan estetik layaknya perhelatan pesta pernikahan profesional.
                        </p>
                    </div>

                    {{-- Pilar 4 --}}
                    <div class="bg-white p-7 rounded-3xl border border-neutral-200/80 hover:border-[#a4864b]/50 transition-all duration-300 space-y-4 reveal-on-scroll delay-300">
                        <div class="w-12 h-12 rounded-2xl bg-[#faf4ea] text-[#a4864b] flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="font-bold text-lg text-neutral-900">Tepat Waktu Bergaransi</h4>
                        <p class="text-xs sm:text-sm text-neutral-600 leading-relaxed font-light">
                            Armada pengantaran sigap memastikan sajian tiba dalam kondisi hangat, rapi, dan tepat waktu di lokasi acara.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 🍲 5. SECTION PAKET KAMI (CURATED MENU DENGAN SHOW 4 + DROP-IN CASCADE)   -->
    <!-- ========================================================================= -->
    <section id="paket" class="scroll-mt-24 py-28 lg:py-36 bg-white relative"
        x-data="{ 
            activeCategory: 'semua',
            selectedProduct: null,
            isModalOpen: false,
            portion: 1,
            address: '',
            showAll: false,
            
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

        <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 w-full space-y-12">

            {{-- Headline Paket --}}
            <div class="text-center max-w-3xl mx-auto space-y-3 reveal-on-scroll">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#faf4ea] text-[#a4864b] text-xs font-bold uppercase tracking-wider">
                    <span>03 / KATALOG PILIHAN</span>
                </div>
                <h2 class="font-['Playfair_Display',serif] italic font-normal text-4xl sm:text-5xl lg:text-6xl text-neutral-900 leading-tight">
                    Pilihan Paket Menu Spesial
                </h2>
                <p class="text-neutral-600 text-sm sm:text-base font-light max-w-xl mx-auto">
                    Kombinasi hidangan lezat dan lengkap yang dikurasi khusus untuk memenuhi standar jamuan terbaik.
                </p>
            </div>

            {{-- Filter Tabs --}}
            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 pt-2 reveal-on-scroll delay-100">
                @php
                    $filters = [
                        'semua' => 'Semua Paket',
                        'gold' => 'Paket Gold',
                        'silver' => 'Paket Silver',
                        'premium' => 'Paket Premium',
                        'tumpeng' => 'Tumpeng Spesial'
                    ];
                @endphp

                @foreach($filters as $key => $label)
                    <button type="button" 
                        @click="activeCategory = '{{ $key }}'"
                        :class="activeCategory === '{{ $key }}' 
                            ? 'bg-[#1a120b] text-white' 
                            : 'bg-transparent text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100 border border-neutral-200'"
                        class="inline-flex items-center justify-center font-medium text-xs sm:text-sm px-6 py-2.5 rounded-full transition-all duration-200 cursor-pointer">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            {{-- Grid Katalog Produk (Maks 4 Awal + Animasi Terjun ke Bawah Saat 'Lihat Semua') --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 pt-4">
                @forelse($products ?? [] as $index => $product)
                    @php
                        $catSlug = Str::slug($product->package_category ?? '');
                        $tierSlug = Str::slug($product->tier ?? '');
                        $nameSlug = Str::slug($product->name ?? '');
                    @endphp

                    <div 
                        x-show="(showAll || {{ $index }} < 4) && (activeCategory === 'semua' || '{{ $catSlug }}'.includes(activeCategory) || '{{ $tierSlug }}'.includes(activeCategory) || '{{ $nameSlug }}'.includes(activeCategory))"
                        x-transition:enter="transition-all ease-out duration-700 transform"
                        x-transition:enter-start="opacity-0 -translate-y-8 scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        @click="openModal({{ json_encode($product) }})"
                        class="bg-[#fdfbf7] rounded-3xl overflow-hidden border border-neutral-200/80 hover:border-[#a4864b]/60 transition-all duration-300 cursor-pointer group flex flex-col p-4 reveal-on-scroll">
                        
                        <div class="relative aspect-square w-full rounded-2xl overflow-hidden bg-neutral-100">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-neutral-400 text-xs font-medium bg-neutral-100">
                                    Foto Menu
                                </div>
                            @endif
                        </div>

                        <div class="pt-4 px-1 flex flex-col flex-1 justify-between space-y-3">
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-[#a4864b]">
                                    {{ $product->package_category ?? 'Catering' }}
                                </span>
                                <h3 class="font-bold text-neutral-900 text-base leading-snug line-clamp-1 group-hover:text-[#a4864b] transition-colors">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-lg font-bold text-neutral-900">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}<span class="text-xs text-neutral-500 font-normal pl-1">/ pax</span>
                                </p>
                            </div>

                            <div class="pt-2 border-t border-neutral-200/70 flex items-center justify-between text-xs text-neutral-600">
                                <span>Min. {{ $product->min_order ?? '1' }} porsi</span>
                                <span class="text-[#a4864b] font-semibold group-hover:translate-x-1 transition-transform">
                                    Lihat Menu ›
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-neutral-400 bg-neutral-50 rounded-3xl border border-dashed border-neutral-200">
                        Belum ada paket menu yang tersedia.
                    </div>
                @endforelse
            </div>

            {{-- Tombol Toggle "Lihat Semua Paket Menu / Tampilkan Lebih Sedikit" --}}
            @if(count($products ?? []) > 4)
                <div class="text-center pt-6 reveal-on-scroll">
                    <button type="button" @click="showAll = !showAll"
                        class="inline-flex items-center gap-3 bg-[#1a120b] hover:bg-black text-white font-bold text-sm sm:text-base px-9 py-4 rounded-full shadow-lg transition-all duration-300 group cursor-pointer">
                        <span x-text="showAll ? 'Tampilkan Lebih Sedikit ↑' : 'Lihat Semua Menu Lengkapnya ({{ count($products) }}+) ↓'"></span>
                        <svg class="w-4 h-4 text-[#e4c990] transition-transform duration-300"
                            :class="showAll ? 'rotate-180' : 'group-hover:translate-y-0.5'"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
            @endif

        </div>

        <!-- POP-UP MODAL DETAIL PAKET -->
        <div x-show="isModalOpen" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-black/60 backdrop-blur-sm"
            style="display: none;">

            <div class="absolute inset-0" @click="closeModal()"></div>

            <div class="relative w-full max-w-2xl bg-white rounded-3xl overflow-hidden z-10 my-auto border border-neutral-200"
                @click.stop>

                <button @click="closeModal()"
                    class="absolute top-4 right-4 z-20 bg-neutral-100 hover:bg-neutral-200 text-neutral-600 w-8 h-8 rounded-full flex items-center justify-center transition cursor-pointer text-sm font-bold">
                    ✕
                </button>

                <template x-if="selectedProduct">
                    <div class="p-6 sm:p-8 space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl overflow-hidden bg-neutral-100 shrink-0">
                                <img :src="selectedProduct.image ? '/storage/' + selectedProduct.image : '/images/herobaru.jpg'"
                                    :alt="selectedProduct.name" 
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="space-y-1">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#a4864b]" x-text="selectedProduct.package_category || 'Paket Menu'"></span>
                                <h3 class="text-xl sm:text-2xl font-bold text-neutral-900" x-text="selectedProduct.name"></h3>
                                <p class="text-lg font-bold text-neutral-900">
                                    Rp <span x-text="new Intl.NumberFormat('id-ID').format(selectedProduct.price)"></span>
                                    <span class="text-xs font-normal text-neutral-500">/ pax</span>
                                </p>
                            </div>
                        </div>

                        {{-- Menu Detail --}}
                        <div class="space-y-2 text-sm text-neutral-700 bg-neutral-50 p-4 rounded-2xl border border-neutral-200/60">
                            <span class="font-bold text-neutral-900 block text-xs uppercase tracking-wider">Komposisi Menu:</span>
                            <p class="leading-relaxed font-light" x-text="selectedProduct.main_menu || 'Sajian lezat autentik khas Nusantara.'"></p>
                        </div>

                        {{-- Quantity Stepper --}}
                        <div class="flex items-center justify-between border-t border-neutral-200 pt-4">
                            <div>
                                <label class="text-xs font-bold text-neutral-800 block">Jumlah Porsi:</label>
                                <span class="text-[11px] text-neutral-400" x-text="'Min. ' + (selectedProduct.min_order || 1) + ' porsi'"></span>
                            </div>
                            <div class="inline-flex items-center border border-neutral-200 rounded-full bg-white p-1">
                                <button type="button" @click="decrementPortion()"
                                    class="w-7 h-7 rounded-full bg-neutral-100 hover:bg-neutral-200 text-neutral-700 font-bold flex items-center justify-center transition">
                                    -
                                </button>
                                <span class="px-4 font-bold text-sm text-neutral-900" x-text="portion"></span>
                                <button type="button" @click="incrementPortion()"
                                    class="w-7 h-7 rounded-full bg-neutral-100 hover:bg-neutral-200 text-neutral-700 font-bold flex items-center justify-center transition">
                                    +
                                </button>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex items-center justify-between border-t border-neutral-200 pt-4">
                            <div>
                                <span class="text-xs text-neutral-500 block">Estimasi Total:</span>
                                <span class="text-xl font-bold text-neutral-900">
                                    Rp <span x-text="new Intl.NumberFormat('id-ID').format(selectedProduct.price * portion)"></span>
                                </span>
                            </div>
                            <button type="button" @click="addToCart()"
                                class="bg-[#1a120b] hover:bg-black text-white font-medium text-sm px-7 py-3.5 rounded-full transition-all cursor-pointer">
                                + Masukkan Keranjang
                            </button>
                        </div>
                    </div>
                </template>

            </div>
        </div>

    </section>

    <!-- ========================================================================= -->
    <!-- 🖼️ 6. SECTION GALERI (MASONRY PORTFOLIO DENGAN HOVER BLUR TO CLEAR)      -->
    <!-- ========================================================================= -->
    <section id="galeri" class="scroll-mt-24 py-28 lg:py-36 bg-[#fdfbf7] relative"
        x-data="{
            activeTab: 'semua'
        }">
        
        <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 w-full space-y-12">
            
            {{-- Header Galeri (Matching 'Our Portfolio' layout) --}}
            <div class="text-center max-w-3xl mx-auto space-y-3 reveal-on-scroll">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#faf4ea] text-[#a4864b] text-xs font-bold uppercase tracking-wider">
                    <span>04 / DOKUMENTASI &amp; PORTOFOLIO</span>
                </div>
                <h2 class="font-['Playfair_Display',serif] italic font-normal text-5xl sm:text-6xl lg:text-7xl text-neutral-900 leading-tight">
                    Galeri Portofolio Kami
                </h2>
                <p class="text-neutral-600 text-sm sm:text-base lg:text-lg font-light max-w-xl mx-auto">
                    Koleksi dokumentasi penyajian jamuan prasmanan pernikahan, tumpeng megah, dan paket nasi box istimewa kami.
                </p>
            </div>

            {{-- Filter Tabs (Matching Reference Pills) --}}
            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 pt-2 reveal-on-scroll delay-100">
                @php
                    $galleryFilters = [
                        'semua' => 'Semua Foto',
                        'wedding' => 'Prasmanan & Wedding',
                        'nasibox' => 'Paket Nasi Box',
                        'tumpeng' => 'Tumpeng Nusantara',
                        'pasundaan' => 'Menu Pasundaan & Kebuli'
                    ];
                @endphp

                @foreach($galleryFilters as $gKey => $gLabel)
                    <button type="button" 
                        @click="activeTab = '{{ $gKey }}'"
                        :class="activeTab === '{{ $gKey }}' 
                            ? 'bg-[#1a120b] text-white' 
                            : 'bg-white text-neutral-700 hover:text-neutral-900 hover:bg-neutral-100 border border-neutral-200/90'"
                        class="inline-flex items-center justify-center font-medium text-xs sm:text-sm px-6 py-2.5 rounded-full transition-all duration-200 cursor-pointer shadow-sm">
                        {{ $gLabel }}
                    </button>
                @endforeach
            </div>

            {{-- 3-Column Asymmetric Grid (Matching Reference Photo Layout with Blur-to-Clear Effect) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 pt-4">
                
                {{-- ==================== KOLOM 1 ==================== --}}
                <div class="flex flex-col gap-6 lg:gap-8">
                    
                    {{-- Foto 1: Landscape (Prasmanan) --}}
                    <div x-show="activeTab === 'semua' || activeTab === 'wedding'"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="group relative aspect-[4/3] w-full rounded-3xl overflow-hidden bg-neutral-900 border border-neutral-200/80 shadow-md cursor-pointer reveal-on-scroll">
                        <img src="{{ asset('images/prasmananwedding.png') }}" alt="Prasmanan Wedding"
                            class="w-full h-full object-cover filter blur-[2.5px] brightness-[0.88] scale-100 group-hover:filter-none group-hover:blur-0 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500 ease-out"
                            onerror="this.src='/image/herobaru.jpg';">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-6 flex flex-col justify-end">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#e4c990]">Prasmanan &amp; Wedding</span>
                            <h4 class="text-white text-base sm:text-lg font-bold">Penataan Meja Prasmanan Elegan</h4>
                        </div>
                    </div>

                    {{-- Foto 2: Portrait (Nasi Box) --}}
                    <div x-show="activeTab === 'semua' || activeTab === 'nasibox'"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="group relative aspect-[3/4] w-full rounded-3xl overflow-hidden bg-neutral-900 border border-neutral-200/80 shadow-md cursor-pointer reveal-on-scroll delay-100">
                        <img src="{{ asset('images/Box.png') }}" alt="Persiapan Nasi Box"
                            class="w-full h-full object-cover filter blur-[2.5px] brightness-[0.88] scale-100 group-hover:filter-none group-hover:blur-0 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500 ease-out"
                            onerror="this.src='/image/herobaru.jpg';">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-6 flex flex-col justify-end">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#e4c990]">Nasi Box</span>
                            <h4 class="text-white text-base sm:text-lg font-bold">Pengemasan Higienis &amp; Tepat Waktu</h4>
                        </div>
                    </div>

                </div>

                {{-- ==================== KOLOM 2 ==================== --}}
                <div class="flex flex-col gap-6 lg:gap-8">
                    
                    {{-- Foto 3: Portrait (Tumpeng) --}}
                    <div x-show="activeTab === 'semua' || activeTab === 'tumpeng'"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="group relative aspect-[3/4] w-full rounded-3xl overflow-hidden bg-neutral-900 border border-neutral-200/80 shadow-md cursor-pointer reveal-on-scroll">
                        <img src="{{ asset('images/Tumpeng.png') }}" alt="Tumpeng Nusantara"
                            class="w-full h-full object-cover filter blur-[2.5px] brightness-[0.88] scale-100 group-hover:filter-none group-hover:blur-0 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500 ease-out"
                            onerror="this.src='/image/herobaru.jpg';">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-6 flex flex-col justify-end">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#e4c990]">Tumpeng Spesial</span>
                            <h4 class="text-white text-base sm:text-lg font-bold">Tumpeng Komplit Syukuran &amp; Peresmian</h4>
                        </div>
                    </div>

                    {{-- Foto 4: Landscape (Menu Premium) --}}
                    <div x-show="activeTab === 'semua' || activeTab === 'nasibox'"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="group relative aspect-[4/3] w-full rounded-3xl overflow-hidden bg-neutral-900 border border-neutral-200/80 shadow-md cursor-pointer reveal-on-scroll delay-100">
                        <img src="{{ asset('images/PaketPremiumChickenSalted.png') }}" alt="Salted Egg Chicken"
                            class="w-full h-full object-cover filter blur-[2.5px] brightness-[0.88] scale-100 group-hover:filter-none group-hover:blur-0 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500 ease-out"
                            onerror="this.src='/image/herobaru.jpg';">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-6 flex flex-col justify-end">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#e4c990]">Menu Spesial</span>
                            <h4 class="text-white text-base sm:text-lg font-bold">Paket Salted Egg Chicken Renyah</h4>
                        </div>
                    </div>

                </div>

                {{-- ==================== KOLOM 3 ==================== --}}
                <div class="flex flex-col gap-6 lg:gap-8">
                    
                    {{-- Foto 5: Tall Portrait (Pasundaan) --}}
                    <div x-show="activeTab === 'semua' || activeTab === 'pasundaan'"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="group relative aspect-[3/4] sm:aspect-[3/5] w-full rounded-3xl overflow-hidden bg-neutral-900 border border-neutral-200/80 shadow-md cursor-pointer reveal-on-scroll">
                        <img src="{{ asset('images/NasiPasundaanAyamSuir.png') }}" alt="Nasi Pasundaan"
                            class="w-full h-full object-cover filter blur-[2.5px] brightness-[0.88] scale-100 group-hover:filter-none group-hover:blur-0 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500 ease-out"
                            onerror="this.src='/image/herobaru.jpg';">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-6 flex flex-col justify-end">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#e4c990]">Tradisi Nusantara</span>
                            <h4 class="text-white text-base sm:text-lg font-bold">Nasi Pasundaan Ayam Suwir Gurih</h4>
                        </div>
                    </div>

                    {{-- Foto 6: Landscape (Paket Gold) --}}
                    <div x-show="activeTab === 'semua' || activeTab === 'nasibox'"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        class="group relative aspect-[4/3] w-full rounded-3xl overflow-hidden bg-neutral-900 border border-neutral-200/80 shadow-md cursor-pointer reveal-on-scroll delay-100">
                        <img src="{{ asset('images/PaketGoldAyamBakar.png') }}" alt="Ayam Bakar Madu"
                            class="w-full h-full object-cover filter blur-[2.5px] brightness-[0.88] scale-100 group-hover:filter-none group-hover:blur-0 group-hover:brightness-100 group-hover:scale-105 transition-all duration-500 ease-out"
                            onerror="this.src='/image/herobaru.jpg';">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-6 flex flex-col justify-end">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-[#e4c990]">Paket Gold</span>
                            <h4 class="text-white text-base sm:text-lg font-bold">Paket Gold Ayam Bakar Bumbu Meresap</h4>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ========================================================================= -->
    <!-- 💬 7. SECTION TESTIMONI (10 TESTIMONI DENGAN ROTASI HALUS PER 3.5 DETIK)  -->
    <!-- ========================================================================= -->
    <section id="testimoni" class="scroll-mt-24 py-28 lg:py-36 bg-[#faf7f2] relative overflow-hidden"
        x-data="{
            testimonials: [
                { id: 1, name: 'Bpk. Hendra Kurnia', event: 'Gathering Kantor BUMN (120 Pax)', comment: 'Nasi box-nya sangat komplit, rasa rempah Nusantara autentik dan ayam bakarnya empuk meresap. Pengantaran sangat tepat waktu sebelum acara dimulai.' },
                { id: 2, name: 'Ibu Dewi Lestari', event: 'Acara Lamaran & Keluarga Besar', comment: 'Pelayanan sangat profesional dari tahap konsultasi menu hingga selesai acara. Tumpeng mini dan hidangan prasmanan dipuji oleh seluruh keluarga besar.' },
                { id: 3, name: 'Rizky & Dinda', event: 'Resepsi Pernikahan Gedung (500 Pax)', comment: 'Paket prasmanan pernikahan sangat memuaskan. Makanan selalu hangat, dekorasi meja prasmanan tertata mewah, dan porsi aman terkendali hingga akhir acara.' },
                { id: 4, name: 'Siti Aminah', event: 'Syukuran Aqiqah Putra Pertama', comment: 'Tumpeng Komplit Nusantara hiasannya sangat cantik dan rapi. Rasa nasinya pulen gurih, sambal goreng ati dan ayam serundengnya juara!' },
                { id: 5, name: 'dr. Farhan Maulana', event: 'Seminar Kesehatan & Simposium', comment: 'Penyajian nasi box premium sangat higienis, box rapi eksklusif, dan citarasa bumbu ayam teriyaki serta salted egg-nya disukai para dokter dan peserta.' },
                { id: 6, name: 'Ibu Ratna Anggraini', event: 'Arisan & Reuni Keluarga', comment: 'Nasi Pasundaan Ayam Suwir-nya benar-benar mengingatkan pada masakan khas Sunda tempo dulu. Sambalnya mantap dan porsi sangat mengenyangkan.' },
                { id: 7, name: 'Bpk. Agus Prasetyo', event: 'Peresmian Kantor Cabang Bogor', comment: 'Sangat tertolong dengan fleksibilitas tim Catering Nusantara. Pesanan 150 box dalam waktu singkat dikerjakan dengan standar kualitas bintang lima.' },
                { id: 8, name: 'Maya & Dimas', event: 'Intimate Wedding Garden Party', comment: 'Gubukan prasmanan sangat cantik dan staf cateringnya ramah serta cekatan melayani tamu undangan. Pilihan terbaik untuk catering wedding di Bogor!' },
                { id: 9, name: 'Ibu Hj. Nurhayati', event: 'Pengajian Rutin & Tahlilan', comment: 'Snack box dan tumpeng mini sangat lezat. Tamu-tamu banyak yang menanyakan kontak catering ini karena rasanya pas di lidah semua kalangan.' },
                { id: 10, name: 'Kevin Sanjaya', event: 'Community Gathering & Exhibition', comment: 'Kebuli dan nasi bakar nusantaranya gurih aromatik rempah asli. Pengemasan rapi dan pelayanan fast response via WhatsApp. Sangat recommended!' }
            ],
            currentIndex: 0,
            intervalTimer: null,
            isPaused: false,

            init() { this.startAutoScroll(); },
            startAutoScroll() {
                this.stopAutoScroll();
                this.intervalTimer = setInterval(() => { 
                    if (!this.isPaused) this.nextTestimonial(); 
                }, 3500); // ⚡ Kecepatan berganti teks per 3,5 detik
            },
            stopAutoScroll() { if (this.intervalTimer) clearInterval(this.intervalTimer); },
            nextTestimonial() { this.currentIndex = (this.currentIndex + 1) % this.testimonials.length; },
            prevTestimonial() { this.currentIndex = (this.currentIndex - 1 + this.testimonials.length) % this.testimonials.length; },
            goTo(index) { this.currentIndex = index; }
        }">

        <div class="max-w-4xl mx-auto px-6 sm:px-10 lg:px-16 w-full space-y-12 relative z-10">

            {{-- Header Testimoni --}}
            <div class="text-center space-y-3 reveal-on-scroll">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white text-[#a4864b] text-xs font-bold uppercase tracking-wider border border-neutral-200/80">
                    <span>05 / KATA MEREKA</span>
                </div>
                <h2 class="font-['Playfair_Display',serif] italic font-normal text-4xl sm:text-5xl lg:text-6xl text-neutral-900 leading-tight">
                    Kepercayaan &amp; Kepuasan Tamu
                </h2>
                <p class="text-neutral-600 text-sm sm:text-base font-light max-w-xl mx-auto">
                    Ulasan tulus dari para pelanggan yang telah mempercayakan momen bahagianya bersama Catering Nusantara.
                </p>
            </div>

            {{-- Card Testimoni --}}
            <div class="w-full flex flex-col reveal-on-scroll delay-100" @mouseenter="isPaused = true" @mouseleave="isPaused = false">
                <div class="relative w-full bg-white rounded-3xl p-8 sm:p-14 border border-neutral-200/80 overflow-hidden flex flex-col justify-between min-h-[310px] shadow-sm">

                    <div class="absolute top-6 right-8 text-[#a4864b]/10 select-none pointer-events-none">
                        <svg class="w-20 h-20 fill-current" viewBox="0 0 32 32">
                            <path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14H8c0-2.2 1.8-4 4-4V8h-2zm14 0c-3.3 0-6 2.7-6 6v10h10V14h-6c0-2.2 1.8-4 4-4V8h-2z" />
                        </svg>
                    </div>

                    <div class="relative z-10 flex-1 flex flex-col justify-center my-4">
                        <template x-for="(testi, index) in testimonials" :key="testi.id">
                            <div x-show="currentIndex === index"
                                x-transition:enter="transition ease-out duration-500 transform"
                                x-transition:enter-start="opacity-0 translate-y-3"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-300 transform absolute inset-0"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-3"
                                class="space-y-6">

                                <blockquote class="font-['Playfair_Display',serif] italic text-xl sm:text-2xl text-neutral-800 leading-relaxed">
                                    &ldquo;<span x-text="testi.comment"></span>&rdquo;
                                </blockquote>

                                <div class="pt-4 border-t border-neutral-100 flex items-center justify-between">
                                    <div>
                                        <h4 class="font-bold text-neutral-900 text-base sm:text-lg" x-text="testi.name"></h4>
                                        <p class="text-[#a4864b] text-xs sm:text-sm font-medium mt-0.5" x-text="testi.event"></p>
                                    </div>
                                    <span class="text-xs font-semibold text-neutral-400" x-text="(index + 1) + ' / ' + testimonials.length"></span>
                                </div>

                            </div>
                        </template>
                    </div>

                    {{-- Controls --}}
                    <div class="flex items-center justify-between pt-6 border-t border-neutral-100 z-10">
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <template x-for="(testi, index) in testimonials" :key="'dot-' + testi.id">
                                <button type="button" @click="goTo(index)"
                                    class="h-2 rounded-full transition-all duration-300 cursor-pointer"
                                    :class="currentIndex === index ? 'w-6 bg-[#a4864b]' : 'w-2 bg-neutral-200'"></button>
                            </template>
                        </div>

                        <div class="flex items-center gap-2">
                            <button type="button" @click="prevTestimonial()"
                                class="w-9 h-9 rounded-full bg-neutral-50 hover:bg-[#a4864b] text-neutral-600 hover:text-white border border-neutral-200 flex items-center justify-center transition-all cursor-pointer">
                                ‹
                            </button>
                            <button type="button" @click="nextTestimonial()"
                                class="w-9 h-9 rounded-full bg-neutral-50 hover:bg-[#a4864b] text-neutral-600 hover:text-white border border-neutral-200 flex items-center justify-center transition-all cursor-pointer">
                                ›
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 📋 8. SECTION CARA PEMESANAN (EXPANDED FULL SCREEN & ROUNDED BOTTOM)      -->
    <!-- ========================================================================= -->
    <section id="cara_pemesanan" 
        class="scroll-mt-24 min-h-[90vh] py-28 lg:py-40 bg-white rounded-b-2xl sm:rounded-b-3xl lg:rounded-b-[44px] shadow-2xl relative z-20 overflow-hidden flex flex-col justify-between">
        
        <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 w-full space-y-16 sm:space-y-20 my-auto">
            
            {{-- Header Alur Pemesanan --}}
            <div class="text-center max-w-3xl mx-auto space-y-4 reveal-on-scroll">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#faf4ea] text-[#a4864b] text-xs font-bold uppercase tracking-wider">
                    <span>06 / ALUR PEMESANAN MUDAH</span>
                </div>
                <h2 class="font-['Playfair_Display',serif] italic font-normal text-4xl sm:text-5xl lg:text-6xl text-neutral-900 leading-tight">
                    Tiga Langkah Praktis Memesan Jamuan Anda
                </h2>
                <p class="text-neutral-600 text-base sm:text-lg font-light max-w-2xl mx-auto">
                    Proses pemesanan yang simpel, cepat, dan transparan untuk memastikan jamuan acara Anda tersaji sempurna tanpa rasa khawatir.
                </p>
            </div>

            {{-- 3-Step Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                
                {{-- Step 1 --}}
                <div class="p-8 sm:p-10 rounded-3xl bg-[#fdfbf7] border border-neutral-200/80 hover:border-[#a4864b]/60 transition-all duration-300 space-y-5 reveal-on-scroll shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="w-12 h-12 rounded-2xl bg-[#1a120b] text-white font-bold text-base flex items-center justify-center shadow-md">
                            01
                        </span>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#a4864b]">Langkah 1</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-bold text-2xl text-neutral-900">Pilih Paket Menu</h3>
                        <p class="text-sm sm:text-base text-neutral-600 leading-relaxed font-light">
                            Tentukan paket hidangan favorit dari katalog kami (Prasmanan, Nasi Box, atau Tumpeng) dan masukkan ke keranjang belanja.
                        </p>
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="p-8 sm:p-10 rounded-3xl bg-[#fdfbf7] border border-neutral-200/80 hover:border-[#a4864b]/60 transition-all duration-300 space-y-5 reveal-on-scroll delay-100 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="w-12 h-12 rounded-2xl bg-[#a4864b] text-white font-bold text-base flex items-center justify-center shadow-md">
                            02
                        </span>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#a4864b]">Langkah 2</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-bold text-2xl text-neutral-900">Konsultasi WhatsApp</h3>
                        <p class="text-sm sm:text-base text-neutral-600 leading-relaxed font-light">
                            Klik tombol pesan untuk mengirimkan rincian pesanan langsung ke admin via WhatsApp untuk konfirmasi tanggal, porsi, dan alamat.
                        </p>
                    </div>
                </div>

                {{-- Step 3 --}}
                <div class="p-8 sm:p-10 rounded-3xl bg-[#fdfbf7] border border-neutral-200/80 hover:border-[#a4864b]/60 transition-all duration-300 space-y-5 reveal-on-scroll delay-200 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="w-12 h-12 rounded-2xl bg-[#1a120b] text-white font-bold text-base flex items-center justify-center shadow-md">
                            03
                        </span>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#a4864b]">Langkah 3</span>
                    </div>
                    <div class="space-y-2">
                        <h3 class="font-bold text-2xl text-neutral-900">Konfirmasi &amp; Nikmati</h3>
                        <p class="text-sm sm:text-base text-neutral-600 leading-relaxed font-light">
                            Lakukan pembayaran DP dan tim koki serta armada kurir kami akan memastikan hidangan tiba hangat &amp; tertata rapi tepat waktu.
                        </p>
                    </div>
                </div>

            </div>

            {{-- 🌟 Jaminan & Ajakan Section Tambahan (Membuat Halaman Penuh & Mengesankan) --}}
            <div class="p-8 sm:p-12 rounded-3xl bg-[#faf7f2] border border-neutral-200/90 flex flex-col lg:flex-row items-center justify-between gap-8 reveal-on-scroll delay-300 shadow-sm">
                
                <div class="space-y-3 text-center lg:text-left max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-0.5 rounded-full bg-white text-[#a4864b] text-[11px] font-bold uppercase tracking-wider border border-neutral-200">
                        ✦ JAMINAN LAYANAN CATERING NUSANTARA ✦
                    </div>
                    <h3 class="font-['Playfair_Display',serif] italic text-2xl sm:text-3xl lg:text-4xl font-normal text-neutral-900 leading-snug">
                        Punya Konsep Acara Khusus atau Butuh Menu Kustom?
                    </h3>
                    <p class="text-sm sm:text-base text-neutral-600 font-light leading-relaxed">
                        Kami menyediakan layanan konsultasi gratis, penyesuaian anggaran (*budget flexibility*), serta sesi tester menu untuk acara pernikahan dan pemesanan skala besar.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 shrink-0 w-full lg:w-auto">
                    <a href="https://wa.me/628561155113?text=Halo%20Catering%20Nusantara,%20saya%20ingin%20konsultasi%20menu%20dan%20memesan%20catering%20untuk%20acara."
                        target="_blank"
                        class="w-full sm:w-auto text-center bg-[#1a120b] hover:bg-black text-white font-bold text-sm sm:text-base px-9 py-4 rounded-full shadow-lg transition-all duration-200">
                        Konsultasi Acara Sekarang
                    </a>
                </div>

            </div>

        </div>

    </section>

    <!-- ========================================== -->
    <!-- 🏢 9. FOOTER (CLEAN & SENADA)              -->
    <!-- ========================================== -->
    <footer class="bg-[#0d0805] text-white pt-24 pb-12 border-t border-neutral-800 relative z-10">
        <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 w-full space-y-16">

            {{-- Pre-footer Minimalist CTA Bar (Button Transparan dengan Border Putih) --}}
            <div class="p-8 sm:p-10 rounded-3xl bg-[#1c140e] border border-white/10 flex flex-col lg:flex-row items-center justify-between gap-6">
                <div class="space-y-1 text-center lg:text-left">
                    <h3 class="font-['Playfair_Display',serif] italic text-2xl sm:text-3xl font-normal text-white">
                        Siap Mewujudkan Acara Impian Anda?
                    </h3>
                    <p class="text-sm text-white/70 font-light">
                        Konsultasikan menu pernikahan, kantor, atau syukuran bersama tim kami sekarang.
                    </p>
                </div>
                <a href="https://wa.me/628561155113?text=Halo%20Catering%20Nusantara,%20saya%20ingin%20berkonsultasi%20mengenai%20pemesanan%20catering."
                    target="_blank"
                    class="bg-transparent hover:bg-white/10 text-white font-semibold text-sm px-8 py-3.5 rounded-full border border-white/60 hover:border-white transition-all duration-200 shrink-0">
                    Hubungi via WhatsApp
                </a>
            </div>

            {{-- Main 4-Column Footer Content --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 pb-12 border-b border-white/10">

                {{-- Kolom 1: Brand Info --}}
                <div class="lg:col-span-5 space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto object-contain" />
                        <span class="font-['Perandory','Playfair_Display',serif] text-lg font-bold tracking-wider text-white">
                            CATERING NUSANTARA
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-white/70 leading-relaxed font-light max-w-md">
                        Penyedia jasa boga dan catering pernikahan dengan cita rasa autentik khas Nusantara. Melayani area Bogor, Jakarta, dan sekitarnya.
                    </p>
                    <div class="pt-2 text-xs text-white/60 space-y-1">
                        <p><span class="text-[#a4864b] font-medium">Pemilik / PIC:</span> Eva Rudianti</p>
                        <p><span class="text-[#a4864b] font-medium">Tahun Berdiri:</span> 2024</p>
                    </div>
                </div>

                {{-- Kolom 2: Navigasi --}}
                <div class="lg:col-span-3 space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-widest text-[#a4864b]">Navigasi</h4>
                    <ul class="space-y-2 text-xs sm:text-sm text-white/70 font-light">
                        <li><a href="#beranda" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="#tentang-kami" class="hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#paket" class="hover:text-white transition-colors">Paket Menu</a></li>
                        <li><a href="#galeri" class="hover:text-white transition-colors">Galeri Portofolio</a></li>
                        <li><a href="#testimoni" class="hover:text-white transition-colors">Testimoni Pelanggan</a></li>
                    </ul>
                </div>

                {{-- Kolom 3: Kontak & Lokasi --}}
                <div class="lg:col-span-4 space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-widest text-[#a4864b]">Kontak &amp; Alamat</h4>
                    <div class="space-y-2 text-xs sm:text-sm text-white/70 font-light">
                        <p>Jln. Kapten Yusuf Gang Purnama, Tamansari, Bogor</p>
                        <p>WhatsApp: <a href="https://wa.me/628561155113" class="text-white hover:underline">08561155113</a></p>
                        <p>Email: <a href="mailto:Waroengpecelayam99@gmail.com" class="text-white hover:underline">Waroengpecelayam99@gmail.com</a></p>
                        <p>Instagram: <a href="https://instagram.com/cateringnusantara_bogor" target="_blank" class="text-white hover:underline">@cateringnusantara_bogor</a></p>
                    </div>
                </div>

            </div>

            {{-- Bottom Bar --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-white/50">
                <p>&copy; 2024 - {{ date('Y') }} Catering Nusantara. All rights reserved.</p>
                <a href="#beranda" class="hover:text-white transition-colors">Kembali ke Atas ↑</a>
            </div>

        </div>
    </footer>

    <!-- ========================================== -->
    <!-- 🛒 10. MODAL BESAR KERANJANG BELANJA       -->
    <!-- ========================================== -->

    <!-- FLOATING CART BUTTON (BOTTOM RIGHT) -->
    <div x-show="$store.cart && $store.cart.totalCount > 0" x-cloak
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="translate-y-10 opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        class="fixed bottom-6 right-6 z-40">
        <button @click="$store.cart.toggle()"
            class="bg-[#1a120b] hover:bg-black text-white font-medium px-5 py-3 rounded-full flex items-center gap-3 transition-all duration-200 border border-neutral-700 cursor-pointer">
            <div class="relative">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span x-text="$store.cart ? $store.cart.totalCount : 0"
                    class="absolute -top-2 -right-2 bg-[#a4864b] text-white text-[9px] font-bold h-4 min-w-[16px] px-1 rounded-full flex items-center justify-center">
                </span>
            </div>
            <div class="text-left text-xs leading-tight hidden sm:block">
                <span class="text-white/70 block text-[10px]">Keranjang</span>
                <span class="font-bold">Rp <span x-text="$store.cart ? $store.cart.formatPrice($store.cart.totalPrice) : 0"></span></span>
            </div>
        </button>
    </div>

    <!-- TOAST NOTIFICATION -->
    <div x-show="$store.cart && $store.cart.showToastNotification" x-cloak
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="-translate-y-5 opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-5 opacity-0"
        class="fixed top-20 right-6 z-50 max-w-sm bg-neutral-900 text-white px-5 py-3 rounded-2xl flex items-center gap-3 border border-neutral-700">
        <div class="w-6 h-6 rounded-full bg-[#a4864b] text-white flex items-center justify-center shrink-0 text-xs font-bold">
            ✓
        </div>
        <p class="text-xs font-medium" x-text="$store.cart ? $store.cart.toastMessage : ''"></p>
    </div>

    <!-- MODAL POPUP KERANJANG -->
    <div x-show="$store.cart && $store.cart.isOpen" x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 overflow-y-auto">

        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" @click="$store.cart.close()"></div>

        <div class="relative w-full max-w-3xl max-h-[85vh] bg-white rounded-3xl overflow-hidden flex flex-col z-10 border border-neutral-200 my-auto"
            @click.stop>

            {{-- Header Modal --}}
            <div class="p-6 border-b border-neutral-100 flex items-center justify-between bg-[#fdfbf7]">
                <div>
                    <h3 class="font-bold text-neutral-900 text-xl">Keranjang Pesanan</h3>
                    <p class="text-xs text-neutral-500 mt-0.5">
                        <span class="font-bold text-[#a4864b]" x-text="$store.cart ? $store.cart.totalItems : 0"></span> menu •
                        <span class="font-bold text-neutral-800" x-text="$store.cart ? $store.cart.totalCount : 0"></span> porsi total
                    </p>
                </div>
                <button @click="$store.cart.close()"
                    class="w-8 h-8 rounded-full bg-neutral-100 hover:bg-neutral-200 text-neutral-500 flex items-center justify-center font-bold text-sm transition cursor-pointer">
                    ✕
                </button>
            </div>

            {{-- Body List Items --}}
            <div class="p-6 flex-1 overflow-y-auto space-y-4">
                <template x-if="!$store.cart || $store.cart.items.length === 0">
                    <div class="text-center py-12 space-y-3">
                        <p class="text-sm text-neutral-500 font-light">Keranjang belanja Anda masih kosong.</p>
                        <a href="#paket" @click="$store.cart.close()"
                            class="inline-block bg-[#1a120b] text-white text-xs font-medium px-6 py-2.5 rounded-full">
                            Pilih Menu Sekarang
                        </a>
                    </div>
                </template>

                <template x-if="$store.cart && $store.cart.items.length > 0">
                    <div class="space-y-4">
                        <template x-for="item in $store.cart.items" :key="item.id">
                            <div class="bg-[#fdfbf7] rounded-2xl p-4 border border-neutral-200/80 flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-14 h-14 rounded-xl overflow-hidden bg-neutral-200 shrink-0">
                                        <img :src="item.image ? '/storage/' + item.image : '/images/herobaru.jpg'"
                                            :alt="item.name" class="w-full h-full object-cover">
                                    </div>
                                    <div class="min-w-0">
                                        <h5 class="font-bold text-neutral-900 text-sm truncate" x-text="item.name"></h5>
                                        <p class="text-xs text-neutral-500">
                                            Rp <span x-text="$store.cart.formatPrice(item.price)"></span> / pax
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3">
                                    <div class="flex items-center gap-1 bg-white px-2.5 py-1 rounded-full border border-neutral-200">
                                        <button @click="$store.cart.updateQty(item.id, -1)" class="w-6 h-6 rounded-full bg-neutral-100 hover:bg-neutral-200 text-xs font-bold">-</button>
                                        <span class="px-2 font-bold text-xs" x-text="item.qty"></span>
                                        <button @click="$store.cart.updateQty(item.id, 1)" class="w-6 h-6 rounded-full bg-neutral-100 hover:bg-neutral-200 text-xs font-bold">+</button>
                                    </div>
                                    <div class="text-right min-w-[90px]">
                                        <span class="font-bold text-neutral-900 text-sm">
                                            Rp <span x-text="$store.cart.formatPrice(item.price * item.qty)"></span>
                                        </span>
                                    </div>
                                    <button @click="$store.cart.removeItem(item.id)" class="text-neutral-400 hover:text-red-500 text-xs">✕</button>
                                </div>
                            </div>
                        </template>

                        {{-- Catatan --}}
                        <div class="pt-2">
                            <label class="text-xs font-bold text-neutral-800 block mb-1">Catatan Tambahan (Tanggal/Alamat Acara):</label>
                            <textarea x-model="$store.cart.customerNote"
                                placeholder="Contoh: Acara tanggal 15 Oktober, kirim ke Tamansari jam 10.00 WIB..."
                                rows="2"
                                class="w-full text-xs rounded-xl border border-neutral-200 p-3 text-neutral-800 bg-[#fdfbf7] outline-none"></textarea>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Footer Checkout --}}
            <template x-if="$store.cart && $store.cart.items.length > 0">
                <div class="p-6 border-t border-neutral-100 bg-[#fdfbf7] flex items-center justify-between gap-4">
                    <div>
                        <span class="text-[11px] text-neutral-500 block">Total Pembayaran:</span>
                        <div class="text-xl font-bold text-neutral-900">
                            Rp <span x-text="$store.cart.formatPrice($store.cart.totalPrice)"></span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button @click="$store.cart.clearCart()" class="text-xs text-neutral-400 hover:text-red-500">Kosongkan</button>
                        <a :href="$store.cart.checkoutWhatsAppUrl" target="_blank"
                            class="bg-[#a4864b] hover:bg-[#8f723c] text-white font-medium text-sm py-3 px-6 rounded-full transition-all">
                            Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </template>

        </div>
    </div>

    <!-- ========================================== -->
    <!-- 📜 JAVASCRIPT: INTRO, SCROLL, & NAVBAR     -->
    <!-- ========================================== -->
    <script>
        // 1. Preloader Intro Animation
        document.addEventListener('DOMContentLoaded', () => {
            const preloader = document.getElementById('site-preloader');
            if (preloader) {
                setTimeout(() => {
                    preloader.style.opacity = '0';
                    preloader.style.transform = 'translateY(-20px)';
                    preloader.style.pointerEvents = 'none';
                    setTimeout(() => {
                        preloader.remove();
                    }, 700);
                }, 1000);
            }
        });

        // 2. Animate on Scroll (Reveal on Scroll Observer)
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.reveal-on-scroll');
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            obs.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

                reveals.forEach(el => observer.observe(el));
            } else {
                reveals.forEach(el => el.classList.add('is-visible'));
            }
        });

        // 3. Compact Island / Pill Navbar on Scroll
        document.addEventListener('DOMContentLoaded', () => {
            const header = document.getElementById('site-header');
            const inner = document.getElementById('header-inner');
            const brandTitle = document.getElementById('nav-brand-title');
            const brandSub = document.getElementById('nav-brand-sub');
            const navItems = document.querySelectorAll('.nav-item');
            const cartBtn = document.getElementById('nav-cart-btn');
            const hero = document.getElementById('beranda');

            function updateNavbar() {
                if (!header || !inner || !hero) return;
                const heroThreshold = hero.offsetHeight - 120;
                const isScrolled = window.scrollY > heroThreshold;

                if (isScrolled) {
                    header.classList.remove('py-5', 'sm:py-6');
                    header.classList.add('py-3');
                    inner.classList.add(
                        'max-w-4xl', 'bg-white/95', 'backdrop-blur-md', 'rounded-full', 
                        'px-6', 'py-2.5', 'border', 'border-neutral-200/90', 'shadow-lg'
                    );
                    if (brandTitle) {
                        brandTitle.classList.remove('text-white');
                        brandTitle.classList.add('text-neutral-900', 'text-base');
                    }
                    if (brandSub) brandSub.classList.add('hidden');
                    navItems.forEach(item => {
                        item.classList.remove('text-white/90', 'hover:text-white');
                        item.classList.add('text-neutral-600', 'hover:text-neutral-900');
                    });
                    if (cartBtn) {
                        cartBtn.classList.remove('text-white', 'hover:bg-white/15', 'border-white/20');
                        cartBtn.classList.add('text-neutral-800', 'hover:bg-neutral-100', 'border-transparent');
                    }
                } else {
                    header.classList.add('py-5', 'sm:py-6');
                    header.classList.remove('py-3');
                    inner.classList.remove(
                        'max-w-4xl', 'bg-white/95', 'backdrop-blur-md', 'rounded-full', 
                        'px-6', 'py-2.5', 'border', 'border-neutral-200/90', 'shadow-lg'
                    );
                    if (brandTitle) {
                        brandTitle.classList.add('text-white');
                        brandTitle.classList.remove('text-neutral-900', 'text-base');
                    }
                    if (brandSub) brandSub.classList.remove('hidden');
                    navItems.forEach(item => {
                        item.classList.add('text-white/90', 'hover:text-white');
                        item.classList.remove('text-neutral-600', 'hover:text-neutral-900');
                    });
                    if (cartBtn) {
                        cartBtn.classList.add('text-white', 'hover:bg-white/15', 'border-white/20');
                        cartBtn.classList.remove('text-neutral-800', 'hover:bg-neutral-100', 'border-transparent');
                    }
                }
            }

            window.addEventListener('scroll', updateNavbar, { passive: true });
            updateNavbar();
        });

        // 4. Cart Store Setup
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
                    this.showToast('"' + product.name + '" ditambahkan ke keranjang');
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
                    if (confirm('Kosongkan keranjang belanja?')) {
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

                    let text = 'Halo *Catering Nusantara*, saya ingin memesan paket menu berikut:\n\n';
                    text += '📋 *RINCIAN PESANAN:*\n';
                    text += '--------------------------------\n';

                    this.items.forEach((item, index) => {
                        const subtotal = Number(item.price) * Number(item.qty);
                        text += `${index + 1}. *${item.name}*\n`;
                        if (item.package_category) text += `   • Kategori: ${item.package_category}\n`;
                        text += `   • Jumlah: ${item.qty} porsi\n`;
                        text += `   • Harga: Rp ${this.formatPrice(item.price)} / pax\n`;
                        text += `   • Subtotal: Rp ${this.formatPrice(subtotal)}\n\n`;
                    });

                    text += '--------------------------------\n';
                    text += `📦 *Total Menu:* ${this.totalItems} menu (${this.totalCount} porsi)\n`;
                    text += `💰 *TOTAL ESTIMASI: Rp ${this.formatPrice(this.totalPrice)}*\n`;

                    if (this.customerNote && this.customerNote.trim() !== '') {
                        text += `\n📝 *Catatan Khusus:*\n${this.customerNote.trim()}\n`;
                    }

                    text += '\nMohon informasi ketersediaan tanggal dan konfirmasi pesanan. Terima kasih! 🙏';

                    return `https://wa.me/${phone}?text=${encodeURIComponent(text)}`;
                },

                showToast(msg) {
                    this.toastMessage = msg;
                    this.showToastNotification = true;
                    if (this.toastTimeout) clearTimeout(this.toastTimeout);
                    this.toastTimeout = setTimeout(() => {
                        this.showToastNotification = false;
                    }, 2800);
                }
            });
        }

        document.addEventListener('alpine:init', initCateringCart);
        if (window.Alpine) {
            initCateringCart();
        }
    </script>

    @auth
        {{-- Floating Pill Kembali ke Dashboard Admin --}}
        <div class="fixed bottom-6 left-6 z-50">
            <a href="{{ route('admin.dashboard') }}" 
                class="bg-[#1a120b]/95 hover:bg-black text-white px-4 py-2.5 rounded-full text-xs font-bold shadow-2xl flex items-center gap-2.5 border border-[#a4864b]/60 backdrop-blur-md transition-all hover:scale-105 group">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-neutral-300">Admin Aktif:</span>
                <span class="text-[#e4c990] font-bold">Kembali ke Dashboard →</span>
            </a>
        </div>
    @endauth

</body>
</html>