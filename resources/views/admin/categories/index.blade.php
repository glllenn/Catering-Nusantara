<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Kategori Menu') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50/50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="bg-orange-50 border-l-4 border-orange-500 text-orange-800 p-4 rounded-xl font-semibold text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Tambah --}}
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                <h3 class="font-bold text-gray-900 text-lg mb-4">Tambah Kategori Baru</h3>
                <form action="{{ route('admin.categories.store') }}" method="POST" class="flex gap-4">
                    @csrf
                    <input type="text" name="name" required placeholder="Contoh: Prasmanan, Nasi Box, Tumpeng" class="flex-1 rounded-xl border-gray-200 focus:border-orange-500 focus:ring-orange-500 text-sm">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-5 py-2.5 rounded-xl text-sm transition">
                        Simpan
                    </button>
                </form>
            </div>

            {{-- Tabel Daftar Kategori --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-orange-50/60 text-xs text-orange-900 uppercase font-bold">
                        <tr>
                            <th class="p-4">Nama Kategori</th>
                            <th class="p-4">Slug</th>
                            <th class="p-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($categories as $cat)
                            <tr>
                                <td class="p-4 font-bold text-gray-800">{{ $cat->name }}</td>
                                <td class="p-4 text-gray-400">{{ $cat->slug }}</td>
                                <td class="p-4 text-right flex justify-end gap-2">
                                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 font-bold hover:underline text-xs">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-4 text-center text-gray-400">Belum ada kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>