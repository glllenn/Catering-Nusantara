<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-8 bg-[#faf7f2] min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- Header with Kembali Button --}}
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
                            Kelola Kategori Paket Menu
                        </h2>
                        <p class="text-xs text-neutral-500">Atur kategori klasifikasi hidangan (Prasmanan, Nasi Box, Tumpeng, dll).</p>
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

            {{-- Alert Sukses --}}
            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl shadow-xs text-sm font-semibold flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            {{-- Form Tambah Kategori Baru --}}
            <div class="bg-white p-6 rounded-3xl border border-neutral-200/80 shadow-xs space-y-3">
                <div class="flex items-center gap-2 pb-2 border-b border-neutral-100">
                    <span class="w-2 h-2 rounded-full bg-[#a4864b]"></span>
                    <h3 class="text-xs font-bold text-neutral-500 uppercase tracking-wider">Tambah Kategori Baru</h3>
                </div>

                <form action="{{ route('admin.categories.store') }}" method="POST" class="flex flex-col sm:flex-row gap-3 pt-1">
                    @csrf
                    <div class="flex-1 relative">
                        <input type="text" 
                            name="name" 
                            required 
                            placeholder="Contoh: Prasmanan, Nasi Box, Snack Box, Tumpeng" 
                            class="w-full px-4 py-3 rounded-2xl border border-neutral-200 text-sm text-neutral-900 placeholder-neutral-400 focus:outline-none focus:ring-2 focus:ring-[#a4864b] bg-[#fdfbf7]">
                    </div>
                    <button type="submit" 
                        class="bg-[#1a120b] hover:bg-black text-white font-bold px-6 py-3 rounded-2xl text-xs transition shadow-md flex items-center justify-center gap-2 shrink-0 cursor-pointer">
                        <svg class="w-4 h-4 text-[#e4c990]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Simpan Kategori</span>
                    </button>
                </form>
            </div>

            {{-- Tabel Daftar Kategori --}}
            <div class="bg-white rounded-3xl border border-neutral-200/80 shadow-xs overflow-hidden">
                <div class="p-5 border-b border-neutral-100 flex items-center justify-between">
                    <h4 class="font-bold text-sm text-neutral-900">Daftar Kategori Terdaftar</h4>
                    <span class="text-xs text-neutral-400 font-medium">{{ count($categories) }} Kategori</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-neutral-600">
                        <thead class="bg-[#fdfbf7] text-[11px] text-neutral-500 uppercase font-bold border-b border-neutral-100">
                            <tr>
                                <th class="py-3.5 px-6">Nama Kategori</th>
                                <th class="py-3.5 px-6">Slug URL</th>
                                <th class="py-3.5 px-6 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-100 font-medium">
                            @forelse($categories as $cat)
                                <tr class="hover:bg-neutral-50/60 transition">
                                    <td class="py-4 px-6 font-bold text-neutral-900 flex items-center gap-2.5">
                                        <div class="w-7 h-7 rounded-xl bg-[#faf4ea] text-[#a4864b] flex items-center justify-center font-bold text-xs">
                                            {{ strtoupper(substr($cat->name, 0, 1)) }}
                                        </div>
                                        <span>{{ $cat->name }}</span>
                                    </td>
                                    <td class="py-4 px-6 font-mono text-neutral-400">{{ $cat->slug }}</td>
                                    <td class="py-4 px-6 text-right">
                                        <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori {{ $cat->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold text-red-600 bg-red-50 hover:bg-red-100 transition cursor-pointer">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-12 text-center text-neutral-400">
                                        Belum ada kategori menu yang terdaftar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>