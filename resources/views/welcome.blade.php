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
    <header class="fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-md transition-all">
        <div class="max-w-[1280px] mx-auto px-6 md:px-12 h-28 flex items-center justify-between">
            
            {{-- Logo Gunungan Wayang Canva (Diperbesar) --}}
            <a href="#beranda" class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Gunungan Nusantara" class="h-16 md:h-24 w-auto object-contain transition-transform duration-300 hover:scale-105"
                    onerror="this.onerror=null; this.src='/image/logo.png';" />
            </a>

            {{-- Menu Navigasi Utama --}}
            <nav class="hidden md:flex items-center gap-12 text-lg font-semibold text-gray-800">
                <a href="#beranda" class="relative py-1 text-gray-900 font-bold group">
                    Beranda
                    <span class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-8 h-[3px] bg-canva-orange rounded-full"></span>
                </a>
                <a href="#tentang-kami" class="hover:text-canva-orange transition">Tentang Kami</a>
                <a href="#paket" class="hover:text-canva-orange transition">Paket</a>
                <a href="#galeri" class="hover:text-canva-orange transition">Galeri</a>
                <a href="#testimoni" class="hover:text-canva-orange transition">Testimoni</a>
            </nav>

            {{-- Akses Login Admin (Tampilan Minimalis) --}}
            <div class="flex items-center">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold bg-gray-900 text-white px-5 py-2.5 rounded-full hover:bg-black transition shadow-sm">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-semibold text-gray-400 hover:text-canva-orange transition">
                        Admin Log In
                    </a>
                @endauth
            </div>

        </div>
    </header>


    <!-- ========================================== -->
    <!-- 2. BERANDA / HERO SECTION                  -->
    <!-- ========================================== -->
    <section id="beranda" class="min-h-screen pt-28 pb-16 flex items-center justify-center relative overflow-hidden bg-white">

        {{-- Bulatan / Dot Oranye Background Canva --}}
        <div class="absolute top-[34%] left-[45%] w-4 h-4 bg-canva-orange rounded-full z-0 opacity-90"></div>
        <div class="absolute top-[42%] left-[43%] w-7 h-7 bg-canva-orange rounded-full z-0 opacity-95"></div>
        <div class="absolute top-[32%] left-[50%] w-3 h-3 bg-canva-orange rounded-full z-0 opacity-80"></div>

        <div class="max-w-[1280px] mx-auto px-6 md:px-12 w-full grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">

            <!-- KOLOM KIRI: TEKS HEADLINE & TOMBOL -->
            <div class="lg:col-span-6 space-y-8 text-center lg:text-left">
                <h1 class="text-6xl sm:text-7xl lg:text-[80px] font-extrabold text-black tracking-tight leading-[1.05]">
                    Catering <br />
                    Nusantara
                </h1>

                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-10 pt-4">
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
    <!-- 3. SECTION TENTANG KAMI (Presisi Canva)    -->
    <!-- ========================================== -->
    <section id="tentang-kami" class="py-24 bg-white relative overflow-hidden">
        
        <div class="max-w-[1280px] mx-auto px-6 md:px-12 w-full grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

            <!-- KOLOM KIRI: GAMBAR TUMPENG TAMPAH & BADGE MELAYANG -->
            <div class="lg:col-span-6 relative flex justify-center items-center">
                <div class="relative w-full max-w-[500px] lg:max-w-[580px]">

                    <!-- GAMBAR TUMPENG TAMPAH -->
                    <img src="{{ asset('images/about-tumpeng.png') }}"
                        alt="Tentang Catering Nusantara"
                        class="w-full h-auto object-contain drop-shadow-2xl mx-auto relative z-10"
                        onerror="this.onerror=null; this.src='/image/tempeng-removebg-preview.png';" />

                    <!-- BADGE 1 (Kiri Atas): Cita rasa autentik -->
                    <div class="absolute top-[12%] left-[-15px] sm:left-[-30px] z-20 bg-white border border-orange-100 shadow-xl rounded-full py-2.5 px-5 flex items-center gap-3 min-w-[180px]">
                        <div class="w-8 h-8 rounded-full bg-orange-50 text-canva-orange flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M17 8C8 10 59 16.17 3.83 12 1.17 12 0 13.17 0 14.5C0 15.83 1.17 17 2.5 17C3.83 17 5 15.83 5 14.5C5 13.17 3.83 12 2.5 12H17V8Z"/></svg>
                        </div>
                        <span class="text-xs font-bold text-canva-orange leading-tight">Cita rasa<br>autentik</span>
                    </div>

                    <!-- BADGE 2 (Kanan Atas): Pengiriman tepat waktu -->
                    <div class="absolute top-[28%] right-[-15px] sm:right-[-30px] z-20 bg-white border border-orange-100 shadow-xl rounded-full py-2.5 px-5 flex items-center gap-3 min-w-[190px]">
                        <div class="w-8 h-8 rounded-full bg-orange-50 text-canva-orange flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/></svg>
                        </div>
                        <span class="text-xs font-bold text-canva-orange leading-tight">Pengiriman<br>tepat waktu</span>
                    </div>

                    <!-- BADGE 3 (Kiri Bawah): Higienis & Berkualitas -->
                    <div class="absolute bottom-[10%] left-[-15px] sm:left-[-30px] z-20 bg-white border border-orange-100 shadow-xl rounded-full py-2.5 px-5 flex items-center gap-3 min-w-[195px]">
                        <div class="w-8 h-8 rounded-full bg-orange-50 text-canva-orange flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                        </div>
                        <span class="text-xs font-bold text-canva-orange leading-tight">Higienis &<br>Berkualitas</span>
                    </div>

                    <!-- ORNAMEN DOT ORANYE BACKGROUND -->
                    <div class="absolute top-10 left-10 w-3 h-3 bg-canva-orange rounded-full opacity-80 z-0"></div>
                    <div class="absolute bottom-5 left-1/4 w-4 h-4 bg-canva-orange rounded-full opacity-90 z-0"></div>
                    <div class="absolute top-24 right-20 w-3 h-3 bg-canva-orange rounded-full opacity-70 z-0"></div>

                </div>
            </div>

            <!-- KOLOM KANAN: TEKS DETAIL ABOUT US -->
            <div class="lg:col-span-6 space-y-6 text-left">
                
                {{-- Label Sub-Heading dengan Line Underline --}}
                <div class="inline-flex items-center gap-2">
                    <span class="text-xs uppercase tracking-widest font-bold text-canva-orange">TENTANG KAMI</span>
                    <span class="w-8 h-[2px] bg-canva-orange rounded-full"></span>
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

                {{-- 3 Poin Keunggulan (List dengan Ikon Soft Orange) --}}
                <div class="space-y-5 pt-2">
                    
                    {{-- Poin 1 --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-orange-50 text-canva-orange flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 3c-4.97 0-9 4.03-9 9 0 2.12.74 4.07 1.97 5.61L4.35 19.4c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.9-1.9C9.2 19.54 10.55 20 12 20c4.97 0 9-4.03 9-9s-4.03-9-9-9z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Bahan Berkualitas</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Kami hanya menggunakan bahan pilihan agar setiap hidangan tetap segar dan lezat.</p>
                        </div>
                    </div>

                    {{-- Poin 2 --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-orange-50 text-canva-orange flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">Koki Berpengalaman</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Diracik oleh tim profesional yang berpengalaman dalam berbagai jenis acara.</p>
                        </div>
                    </div>

                    {{-- Poin 3 --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-orange-50 text-canva-orange flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
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
                        class="inline-flex items-center gap-3 bg-canva-orange hover:bg-[#e09015] text-white font-semibold text-sm px-7 py-3 rounded-full shadow-canva-orange transition-all transform hover:-translate-y-0.5">
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

</body>
</html>