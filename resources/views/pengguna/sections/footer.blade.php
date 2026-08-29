<!-- ========================================== -->
<!-- 🏢 SECTION FOOTER & KONTAK RESMI           -->
<!-- ========================================== -->
<footer class="bg-[#120c08] text-white relative overflow-hidden pt-20 pb-10 border-t border-white/10">
    
    {{-- Background Gradient Accent Ornaments --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#f6a11a]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-10 w-96 h-96 bg-orange-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-[1280px] mx-auto px-6 md:px-12 w-full relative z-10">

        {{-- 1. PRE-FOOTER CTA CARD --}}
        <div class="bg-gradient-to-r from-[#1c130c] via-[#24190f] to-[#1c130c] rounded-[32px] p-8 sm:p-12 border border-white/10 shadow-2xl mb-16 flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="space-y-3 text-center lg:text-left max-w-2xl">
                <div class="inline-flex items-center gap-2 bg-[#f6a11a]/15 text-[#f6a11a] px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                    <span>✨</span>
                    <span>Momen Spesial Dimulai Dari Sini</span>
                </div>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight leading-snug">
                    Siap Mewujudkan Acara Impian Anda Bersama Kami?
                </h3>
                <p class="text-white/70 text-sm sm:text-base leading-relaxed">
                    Konsultasikan menu catering pernikahan, kantor, syukuran, atau tumpeng Anda secara gratis. Kami siap memberikan penawaran dan pelayanan terbaik!
                </p>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-4 shrink-0">
                <a href="https://wa.me/628561155113?text=Halo%20Catering%20Nusantara,%20saya%20ingin%20berkonsultasi%20mengenai%20pemesanan%20catering." 
                    target="_blank"
                    class="bg-[#f6a11a] hover:bg-[#e09015] text-white font-extrabold text-sm sm:text-base px-8 py-4 rounded-full shadow-lg shadow-orange-500/25 transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95 flex items-center gap-2.5">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 pb-16 border-b border-white/10">

            {{-- KOLOM 1: IDENTITAS BRAND & OWNER (lg:col-span-4) --}}
            <div class="lg:col-span-4 space-y-6">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Catering Nusantara Logo" 
                        class="h-16 w-auto object-contain"
                        onerror="this.onerror=null; this.src='/image/logo.png';" />
                </div>

                <p class="text-white/70 text-sm leading-relaxed">
                    Catering Nusantara menyajikan hidangan bercita rasa autentik khas Nusantara dengan bahan segar pilihan. Melayani berbagai kebutuhan acara pernikahan, instansi, hingga syukuran keluarga di wilayah Bogor dan sekitarnya.
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
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>

                    <a href="https://wa.me/628561155113" target="_blank"
                        title="WhatsApp 08561155113"
                        class="w-10 h-10 rounded-full bg-white/5 hover:bg-[#25D366] text-white/80 hover:text-white border border-white/10 flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                    </a>

                    <a href="mailto:Waroengpecelayam99@gmail.com"
                        title="Email Waroengpecelayam99@gmail.com"
                        class="w-10 h-10 rounded-full bg-white/5 hover:bg-[#f6a11a] text-white/80 hover:text-white border border-white/10 flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <svg class="w-5 h-5 fill-none stroke-currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
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
                        <a href="#tentang-kami" class="hover:text-[#f6a11a] transition-colors flex items-center gap-2">
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
                        <div class="w-8 h-8 rounded-lg bg-orange-500/10 text-[#f6a11a] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs text-white/50 block font-semibold">Alamat Usaha:</span>
                            <span class="leading-relaxed">Jln. Kapten Yusuf Gang Purnama, Tamansari, Bogor, Jawa Barat</span>
                        </div>
                    </div>

                    {{-- WhatsApp / Telepon --}}
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs text-white/50 block font-semibold">WhatsApp / Telepon:</span>
                            <a href="https://wa.me/628561155113" target="_blank" class="font-bold text-[#f6a11a] hover:underline">
                                08561155113
                            </a>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-orange-500/10 text-[#f6a11a] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 fill-none stroke-currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs text-white/50 block font-semibold">Email:</span>
                            <a href="mailto:Waroengpecelayam99@gmail.com" class="hover:text-[#f6a11a] transition-colors break-all">
                                Waroengpecelayam99@gmail.com
                            </a>
                        </div>
                    </div>

                    {{-- Instagram --}}
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-pink-500/10 text-pink-400 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs text-white/50 block font-semibold">Instagram:</span>
                        <a href="https://instagram.com/cateringnusantara_bogor" target="_blank" class="hover:text-[#f6a11a] transition-colors font-medium">
                            @cateringnusantara_bogor
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- 3. BOTTOM COPYRIGHT BAR --}}
    <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-white/50 text-center sm:text-left">
        <p>
            &copy; 2024 - {{ date('Y') }} <span class="text-white font-bold">Catering Nusantara</span>. All rights reserved. 
            <span class="block sm:inline sm:ml-1">Owner: Eva Rudianti.</span>
        </p>
        <div class="flex items-center gap-6">
            <a href="#beranda" class="hover:text-[#f6a11a] transition">Kembali ke Atas ↑</a>
        </div>
    </div>

</div>
</footer>