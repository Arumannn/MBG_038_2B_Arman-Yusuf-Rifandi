<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Konfirmasi Hapus Bahan Baku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold text-red-600 mb-2">Anda Yakin Ingin Menghapus Data Ini?</h3>
                    <p><strong>Nama:</strong> {{ $bahanBaku->nama }}</p>
                    <p><strong>Kategori:</strong> {{ $bahanBaku->kategori }}</p>
                    <p><strong>Jumlah:</strong> {{ $bahanBaku->jumlah }} {{ $bahanBaku->satuan }}</p>
                    <p><strong>Status Saat Ini:</strong> {{ $bahanBaku->status }}</p>

                    @if ($bahanBaku->status !== 'Kadaluarsa')
                        <div class="mt-4 p-4 bg-yellow-100 text-yellow-800 border border-yellow-300 rounded-md">
                            <strong>Perhatian:</strong> Sesuai aturan, hanya bahan baku dengan status 'Kadaluarsa' yang dapat dihapus. Aksi ini akan dibatalkan.
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('gudang.bahanbaku.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Kembali
                            </a>
                        </div>
                    @else
                         <div class="mt-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-md">
                            <strong>Info:</strong> Bahan baku ini berstatus 'Kadaluarsa' dan dapat dihapus.
                        </div>
                        <form action="{{ route('gudang.bahanbaku.destroy', $bahanBaku->id) }}" method="POST" class="mt-6">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500">
                                Ya, Hapus Data
                            </button>
                            <a href="{{ route('gudang.bahanbaku.index') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">
                                Batal
                            </a>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>