<x-guest-layout>
    <div class="mb-5 text-xs text-neutral-500 leading-relaxed">
        Lupa kata sandi admin Anda? Masukkan alamat email yang terdaftar, kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div class="space-y-1.5">
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-neutral-700">
                Alamat Email Admin
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
                <input id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    placeholder="admin@cateringnusantara.com"
                    class="block w-full pl-11 pr-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="pt-2 flex flex-col gap-3">
            <button type="submit" 
                class="w-full bg-[#1a120b] hover:bg-black text-white font-bold py-3.5 px-6 rounded-2xl text-sm transition shadow-md flex items-center justify-center gap-2 cursor-pointer">
                <span>Kirim Tautan Reset Password</span>
                <svg class="w-4 h-4 text-[#e4c990]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>

            <a href="{{ route('login') }}" class="text-center text-xs font-semibold text-neutral-500 hover:text-neutral-900 transition">
                ← Kembali ke Halaman Login
            </a>
        </div>
    </form>
</x-guest-layout>

