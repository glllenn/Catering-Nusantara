<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Catering Nusantara') }} — Admin Dashboard</title>

        <!-- Google Fonts & Fontshare -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">
        <link href="https://api.fontshare.com/v2/css?f[]=perandory@400,500,600,700&display=swap" rel="stylesheet">

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-['Plus_Jakarta_Sans',sans-serif] bg-[#faf7f2] text-neutral-800 antialiased selection:bg-[#a4864b] selection:text-white min-h-screen flex flex-col justify-between">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading (Optional) -->
            @isset($header)
                @if(trim($header) !== '')
                    <header class="bg-white border-b border-neutral-200/80 shadow-xs">
                        <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>

            <!-- Admin Minimal Footer -->
            <footer class="py-6 border-t border-neutral-200/70 bg-white text-center text-xs text-neutral-500">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-2">
                    <p>&copy; {{ date('Y') }} <strong>Catering Nusantara</strong> — Panel Administrasi &amp; Pengelolaan</p>
                    <a href="{{ url('/') }}" target="_blank" class="text-[#a4864b] hover:text-[#8f723c] font-semibold transition-colors flex items-center gap-1">
                        <span>Buka Website Customer</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                </div>
            </footer>
        </div>
    </body>
</html>

