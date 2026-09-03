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
                            Pengaturan Profil Admin
                        </h2>
                        <p class="text-xs text-neutral-500">Kelola informasi kredensial login dan keamanan akun pengelola.</p>
                    </div>
                </div>

                <a href="{{ route('admin.dashboard') }}" 
                    class="inline-flex items-center gap-2 bg-white hover:bg-neutral-50 border border-neutral-200 text-neutral-700 font-bold py-2.5 px-4 rounded-2xl text-xs transition shadow-2xs">
                    <svg class="w-4 h-4 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali ke Dashboard</span>
                </a>
            </div>

            {{-- Admin Overview Card --}}
            <div class="bg-white rounded-3xl p-6 border border-neutral-200/80 shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-[#1a120b] text-[#e4c990] flex items-center justify-center font-bold text-xl shrink-0 shadow-xs">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="space-y-0.5">
                        <div class="flex items-center gap-2">
                            <h3 class="font-bold text-base text-neutral-900">{{ Auth::user()->name }}</h3>
                            <span class="bg-[#faf4ea] text-[#a4864b] text-[10px] font-bold px-2 py-0.5 rounded-full border border-neutral-200">
                                Administrator
                            </span>
                        </div>
                        <p class="text-xs text-neutral-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-2 text-xs text-neutral-500 bg-[#fdfbf7] px-3.5 py-2 rounded-2xl border border-neutral-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Sesi Login Aktif</span>
                </div>
            </div>

            {{-- 1. Update Profile Info --}}
            <div class="p-6 sm:p-8 bg-white rounded-3xl border border-neutral-200/80 shadow-xs">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- 2. Update Password --}}
            <div class="p-6 sm:p-8 bg-white rounded-3xl border border-neutral-200/80 shadow-xs">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- 3. Delete Account (Optional Danger Zone) --}}
            <div class="p-6 sm:p-8 bg-white rounded-3xl border border-red-100 shadow-xs">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

