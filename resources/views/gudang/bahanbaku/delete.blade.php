<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Konfirmasi Hapus Bahan Baku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <h3 class="text-lg font-bold text-red-600 mb-4">
                        Konfirmasi Penghapusan Data
                    </h3>

                    {{-- Detail bahan baku --}}
                    <div class="mb-4">
                        <p><strong>Nama:</strong> {{ $bahanBaku->nama }}</p>
                        <p><strong>Kategori:</strong> {{ $bahanBaku->kategori }}</p>
                        <p><strong>Jumlah:</strong> {{ $bahanBaku->jumlah }} {{ $bahanBaku->satuan }}</p>
                        <p><strong>Status Saat Ini:</strong> 
                            <span class="
                                @if($bahanBaku->status == 'kadaluarsa') text-red-600 
                                @elseif($bahanBaku->status == 'segera_kadaluarsa') text-yellow-600
                                @elseif($bahanBaku->status == 'Habis') text-gray-600
                                @else text-green-600
                                @endif
                                font-semibold">
                                {{ $bahanBaku->status }}
                            </span>
                        </p>
                    </div>

                    {{-- Logika status --}}
                    @if ($bahanBaku->status !== 'kadaluarsa')
                        <div class="p-4 bg-yellow-100 text-yellow-800 border border-yellow-300 rounded-md">
                            <strong>Perhatian:</strong> 
                            Bahan baku ini tidak dapat dihapus karena statusnya <em>{{ $bahanBaku->status }}</em>. 
                            Hanya bahan baku dengan status <strong>kadaluarsa</strong> yang bisa dihapus.
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('gudang.bahanbaku.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                                Kembali
                            </a>
                        </div>
                    @else
                        <div class="p-4 bg-green-100 text-green-800 border border-green-300 rounded-md">
                            <strong>Info:</strong> 
                            Bahan baku ini berstatus <strong>kadaluarsa</strong> dan dapat dihapus dari sistem.
                        </div>

                        {{-- Form konfirmasi hapus --}}
                        <form action="{{ route('gudang.bahanbaku.destroy', $bahanBaku->id) }}" 
                              method="POST" class="mt-6 flex items-center space-x-4">
                            @csrf
                            @method('DELETE')

                            <button type="submit" 
                                    class="px-4 py-2 bg-red-600 text-white rounded-md font-semibold hover:bg-red-500">
                                Ya, Hapus Data
                            </button>

                            <a href="{{ route('gudang.bahanbaku.index') }}" 
                               class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md font-semibold hover:bg-gray-300">
                                Batal
                            </a>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
