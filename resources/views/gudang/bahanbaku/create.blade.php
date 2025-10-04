<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Bahan Baku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="mb-4">
                            <ul class="list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('gudang.bahanbaku.store') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menyimpan data ini?');">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Bahan</label>
                                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            </div>
                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                                <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            </div>
                            <div>
                                <label for="jumlah" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required min="0">
                            </div>
                            <div>
                                <label for="satuan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Satuan</label>
                                <input type="text" name="satuan" id="satuan" value="{{ old('satuan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            </div>
                            <div>
                                <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            </div>
                            <div>
                                <label for="tanggal_kadaluarsa" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal kadaluarsa</label>
                                <input type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Simpan
                            </button>
                             <a href="{{ route('gudang.bahanbaku.index') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>