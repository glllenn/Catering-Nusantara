<section class="space-y-4">
    <header class="space-y-1">
        <h3 class="text-base font-bold text-red-700">
            Hapus Akun Pengelola
        </h3>
        <p class="text-xs text-neutral-500">
            Setelah akun Anda dihapus, semua data dan akses ke sistem akan ditutup secara permanen.
        </p>
    </header>

    <div>
        <button
            type="button"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="bg-red-50 hover:bg-red-100 text-red-700 font-bold py-2.5 px-5 rounded-2xl text-xs transition inline-flex items-center gap-2 cursor-pointer"
        >
            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
            <span>Hapus Akun Ini</span>
        </button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-4">
            @csrf
            @method('delete')

            <h3 class="text-lg font-bold text-neutral-900">
                Apakah Anda yakin ingin menghapus akun ini?
            </h3>

            <p class="text-xs text-neutral-500 leading-relaxed">
                Tindakan ini tidak dapat dibatalkan. Masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda benar-benar ingin menghapus akun secara permanen.
            </p>

            <div class="mt-4">
                <label for="password" class="sr-only">Kata Sandi</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 focus:outline-none focus:ring-2 focus:ring-red-500 bg-[#fdfbf7]"
                    placeholder="Masukkan kata sandi untuk konfirmasi"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-1" />
            </div>

            <div class="mt-6 flex justify-end gap-3 pt-4 border-t border-neutral-100">
                <button type="button" x-on:click="$dispatch('close')" 
                    class="px-5 py-2.5 rounded-2xl border border-neutral-200 text-neutral-600 hover:text-neutral-900 hover:bg-neutral-50 font-bold text-xs transition cursor-pointer">
                    Batal
                </button>

                <button type="submit" 
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 px-6 rounded-2xl text-xs transition shadow-md flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    <span>Ya, Hapus Akun</span>
                </button>
            </div>
        </form>
    </x-modal>
</section>

