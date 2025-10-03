<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Stok Bahan Baku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-2">Detail Bahan Baku</h3>
                    <p><strong>Nama:</strong> {{ $bahanBaku->nama }}</p>
                    <p><strong>Kategori:</strong> {{ $bahanBaku->kategori }}</p>
                    <p class="mb-4"><strong>Satuan:</strong> {{ $bahanBaku->satuan }}</p>
                    
                    @if ($errors->any())
                        <div class="mb-4 text-sm text-red-600">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('gudang.bahanbaku.update', $bahanBaku->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="jumlah" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Stok Baru</label>
                            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $bahanBaku->jumlah) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required min="0">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Update Stok
                            </button>
                             <a href="{{ route('gudang.bahanbaku.index') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>