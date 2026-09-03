<section>
    <header class="space-y-1">
        <h3 class="text-base font-bold text-neutral-900">
            Perbarui Kata Sandi
        </h3>
        <p class="text-xs text-neutral-500">
            Pastikan akun Anda menggunakan kata sandi yang kuat dan aman untuk menjaga data katering.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                Kata Sandi Saat Ini
            </label>
            <input id="update_password_current_password" 
                name="current_password" 
                type="password" 
                autocomplete="current-password" 
                placeholder="••••••••"
                class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
        </div>

        <div>
            <label for="update_password_password" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                Kata Sandi Baru
            </label>
            <input id="update_password_password" 
                name="password" 
                type="password" 
                autocomplete="new-password" 
                placeholder="Minimal 8 karakter"
                class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-neutral-700 mb-1.5">
                Konfirmasi Kata Sandi Baru
            </label>
            <input id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                autocomplete="new-password" 
                placeholder="Ketik ulang kata sandi baru"
                class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" 
                class="bg-[#1a120b] hover:bg-black text-white font-bold py-3 px-6 rounded-2xl text-xs transition shadow-md flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4 text-[#e4c990]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <span>Simpan Kata Sandi Baru</span>
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" 
                   x-show="show" 
                   x-transition 
                   x-init="setTimeout(() => show = false, 2500)" 
                   class="text-xs font-bold text-emerald-600 flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Kata sandi berhasil diperbarui!</span>
                </p>
            @endif
        </div>
    </form>
</section>

