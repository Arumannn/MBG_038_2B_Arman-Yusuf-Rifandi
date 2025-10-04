<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Bahan Baku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('gudang.bahanbaku.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mb-4">
                        Tambah Bahan Baku
                    </a>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    {{-- Menampilkan pesan error jika ada --}}
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kategori</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jumlah</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tgl kadaluarsa</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    {{-- highlight-start --}}
                                    {{-- 1. TAMBAHKAN HEADER TABEL UNTUK AKSI --}}
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                                    {{-- highlight-end --}}
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                                @forelse ($bahanBakus as $bahan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $bahan->nama }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $bahan->kategori }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $bahan->jumlah }} {{ $bahan->satuan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($bahan->tanggal_kadaluarsa)->format('d-m-Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{-- PERBAIKAN LOGIKA PEWARNAAN STATUS --}}
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($bahan->status == 'Tersedia') bg-green-100 text-green-800 @endif
                                                @if($bahan->status == 'segera_kadaluarsa') bg-yellow-100 text-yellow-800 @endif
                                                @if($bahan->status == 'kadaluarsa') bg-red-100 text-red-800 @endif
                                                @if($bahan->status == 'Habis') bg-gray-100 text-gray-800 @endif
                                            ">
                                                {{ $bahan->status }}
                                            </span>
                                        </td>
                                        {{-- highlight-start --}}
                                        {{-- 2. TAMBAHKAN SEL TABEL DENGAN TOMBOL EDIT & HAPUS --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('gudang.bahanbaku.edit', $bahan->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <a href="{{ route('gudang.bahanbaku.delete.show', $bahan->id) }}" class="ml-4 text-red-600 hover:text-red-900">Hapus</a>
                                        </td>
                                        {{-- highlight-end --}}
                                    </tr>
                                @empty
                                    <tr>
                                        {{-- 3. SESUAIKAN COLSPAN KARENA KOLOM BERTAMBAH --}}
                                        <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center">Tidak ada data bahan baku.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>