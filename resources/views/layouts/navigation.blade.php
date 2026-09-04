<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white border-b border-neutral-200/90 shadow-xs transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-18">
            
            {{-- Brand Logo & Title --}}
            <div class="flex items-center gap-8">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Catering Nusantara" 
                        class="h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
                        onerror="this.src='/image/logo.png';">
                    <div class="flex flex-col text-left">
                        <span class="font-['Perandory','Playfair_Display',serif] font-bold text-base sm:text-lg tracking-wider text-neutral-900 leading-none">
                            CATERING NUSANTARA
                        </span>
                        <span class="text-[10px] uppercase tracking-[0.2em] text-[#a4864b] font-bold mt-1">
                            Admin Panel
                        </span>
                    </div>
                </a>

                {{-- Desktop Navigation Links --}}
                <div class="hidden md:flex items-center gap-1.5 pl-4 border-l border-neutral-200">
                    {{-- Dashboard --}}
                    <a href="{{ route('admin.dashboard') }}" 
                        class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-2 {{ request()->routeIs('admin.dashboard') ? 'bg-[#1a120b] text-white shadow-xs' : 'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-[#e4c990]' : 'text-neutral-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    {{-- Tambah Menu --}}
                    <a href="{{ route('admin.products.create') }}" 
                        class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-2 {{ request()->routeIs('admin.products.create') ? 'bg-[#1a120b] text-white shadow-xs' : 'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100' }}">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.products.create') ? 'text-[#e4c990]' : 'text-neutral-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Tambah Menu</span>
                    </a>

                    {{-- Kelola Kategori --}}
                    @if(Route::has('admin.categories.index'))
                        <a href="{{ route('admin.categories.index') }}" 
                            class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-2 {{ request()->routeIs('admin.categories.*') ? 'bg-[#1a120b] text-white shadow-xs' : 'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100' }}">
                            <svg class="w-4 h-4 {{ request()->routeIs('admin.categories.*') ? 'text-[#e4c990]' : 'text-neutral-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 7h.01M7 11h.01M7 15h.01M11 7h8M11 11h8M11 15h8M4 5h16a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                            </svg>
                            <span>Kelola Kategori</span>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Right Actions (Preview Web + Profile) --}}
            <div class="hidden sm:flex sm:items-center sm:gap-3">
                
                {{-- Preview Website Button --}}
                <a href="{{ url('/') }}" target="_blank" 
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-neutral-200 hover:border-neutral-400 text-xs font-semibold text-neutral-600 hover:text-neutral-900 bg-[#fdfbf7] hover:bg-white transition-all shadow-2xs">
                    <svg class="w-3.5 h-3.5 text-[#a4864b]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>Lihat Website</span>
                </a>

                {{-- Profile Dropdown --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2.5 px-3 py-1.5 rounded-full border border-neutral-200 hover:border-neutral-300 text-xs font-bold text-neutral-800 bg-white hover:bg-neutral-50 transition cursor-pointer shadow-2xs">
                            <div class="w-7 h-7 rounded-full bg-[#faf4ea] text-[#a4864b] flex items-center justify-center font-bold text-xs">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                            <svg class="w-3.5 h-3.5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-neutral-100">
                            <p class="text-[11px] text-neutral-400">Masuk sebagai</p>
                            <p class="text-xs font-bold text-neutral-900 truncate">{{ Auth::user()->email }}</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-2 text-xs font-medium text-neutral-700 hover:text-neutral-900">
                            <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Edit Profil Saya</span>
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center gap-2 text-xs font-bold text-red-600 hover:text-red-700 hover:bg-red-50">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span>Keluar (Log Out)</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- Hamburger Button (Mobile) --}}
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-xl text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- Mobile Dropdown Menu --}}
    <div x-show="open" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="sm:hidden bg-[#faf7f2] border-t border-neutral-200/90 px-4 pt-3 pb-5 space-y-3 shadow-lg">
        
        <div class="space-y-1.5">
            <a href="{{ route('admin.dashboard') }}" 
                class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-2xl text-xs font-bold transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#1a120b] text-white shadow-xs' : 'text-neutral-700 bg-white hover:bg-neutral-100 border border-neutral-200/60' }}">
                <svg class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-[#e4c990]' : 'text-neutral-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.products.create') }}" 
                class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-2xl text-xs font-bold transition {{ request()->routeIs('admin.products.create') ? 'bg-[#1a120b] text-white shadow-xs' : 'text-neutral-700 bg-white hover:bg-neutral-100 border border-neutral-200/60' }}">
                <svg class="w-4 h-4 {{ request()->routeIs('admin.products.create') ? 'text-[#e4c990]' : 'text-neutral-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Tambah Menu Baru</span>
            </a>

            @if(Route::has('admin.categories.index'))
                <a href="{{ route('admin.categories.index') }}" 
                    class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-2xl text-xs font-bold transition {{ request()->routeIs('admin.categories.*') ? 'bg-[#1a120b] text-white shadow-xs' : 'text-neutral-700 bg-white hover:bg-neutral-100 border border-neutral-200/60' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.categories.*') ? 'text-[#e4c990]' : 'text-neutral-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 7h.01M7 11h.01M7 15h.01M11 7h8M11 11h8M11 15h8M4 5h16a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                    </svg>
                    <span>Kelola Kategori</span>
                </a>
            @endif

            <a href="{{ url('/') }}" target="_blank" 
                class="flex items-center justify-between px-3.5 py-2.5 rounded-2xl text-xs font-bold text-[#a4864b] bg-[#faf4ea] border border-[#a4864b]/20 hover:bg-[#f3ead8] transition">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Lihat Website Customer
                </span>
                <svg class="w-3.5 h-3.5 text-[#a4864b]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
            </a>
        </div>

        <div class="pt-3 border-t border-neutral-200/80">
            <div class="flex items-center gap-3 px-3 py-2 bg-white rounded-2xl border border-neutral-200/60 mb-2">
                <div class="w-8 h-8 rounded-full bg-[#faf4ea] text-[#a4864b] flex items-center justify-center font-bold text-xs shrink-0">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0 flex-1">
                    <div class="font-bold text-xs text-neutral-900 truncate">{{ Auth::user()->name }}</div>
                    <div class="text-[10px] text-neutral-500 truncate">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="space-y-1">
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-3 py-2 rounded-xl text-xs font-semibold text-neutral-700 hover:bg-neutral-200/60 transition">
                    <svg class="w-3.5 h-3.5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>Edit Profil Saya</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2 text-left px-3 py-2 rounded-xl text-xs font-bold text-red-600 hover:bg-red-100/70 transition cursor-pointer">
                        <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Keluar (Log Out)</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>