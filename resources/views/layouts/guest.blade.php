<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Catering Nusantara') }} — Portal Masuk Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">
        <link href="https://api.fontshare.com/v2/css?f[]=perandory@400,500,600,700&display=swap" rel="stylesheet">

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-['Plus_Jakarta_Sans',sans-serif] bg-[#faf7f2] text-neutral-800 antialiased selection:bg-[#a4864b] selection:text-white min-h-screen flex flex-col justify-between">
        
        {{-- Top Minimal Nav / Brand Link --}}
        <div class="w-full max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5 text-xs font-semibold text-neutral-600 hover:text-neutral-900 transition-colors group">
                <svg class="w-4 h-4 text-[#a4864b] transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Kembali ke Website Utama</span>
            </a>

            <div class="text-[11px] font-bold text-[#a4864b] uppercase tracking-widest bg-white/80 border border-neutral-200/80 px-3.5 py-1 rounded-full shadow-xs">
                Portal Admin
            </div>
        </div>

        {{-- Main Login Card Area --}}
        <main class="flex-1 flex flex-col justify-center items-center px-4 sm:px-6 py-8">
            <div class="w-full max-w-md">
                
                {{-- Logo & Brand Center Header --}}
                <div class="text-center mb-8 space-y-2">
                    <a href="{{ url('/') }}" class="inline-block group">
                        <img src="{{ asset('images/logo.png') }}" alt="Catering Nusantara" 
                            class="h-16 w-auto mx-auto object-contain transition-transform duration-300 group-hover:scale-105"
                            onerror="this.src='/image/logo.png';" />
                    </a>
                    <div class="space-y-0.5">
                        <h1 class="font-['Perandory','Playfair_Display',serif] text-2xl font-bold tracking-wider text-neutral-900">
                            CATERING NUSANTARA
                        </h1>
                        <p class="text-xs text-neutral-500 font-medium">
                            Masuk untuk Mengelola Menu, Pesanan &amp; Kategori
                        </p>
                    </div>
                </div>

                {{-- Slot Login Form Card --}}
                <div class="bg-white rounded-3xl p-7 sm:p-9 border border-neutral-200/90 shadow-xl shadow-neutral-200/40">
                    {{ $slot }}
                </div>

            </div>
        </main>

        {{-- Minimal Footer --}}
        <footer class="py-6 text-center text-xs text-neutral-400">
            &copy; {{ date('Y') }} Catering Nusantara. Hak Cipta Dilindungi.
        </footer>

    </body>
</html>

