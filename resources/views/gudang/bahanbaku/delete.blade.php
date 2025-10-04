<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight" style="color: #ffffff;">
                {{ __('Konfirmasi Hapus Bahan Baku') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="text-yellow-200 text-sm">
                    Konfirmasi penghapusan data
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-2xl rounded-2xl" 
                 style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ef4444; box-shadow: 0 20px 40px rgba(239, 68, 68, 0.1);">
                <div class="p-8">
                    <h3 class="text-2xl font-bold mb-6" style="color: #040348;">
                        Konfirmasi Penghapusan Data
                    </h3>

                    {{-- Detail bahan baku --}}
                    <div class="mb-8 p-6 rounded-xl" style="background: linear-gradient(145deg, #f8f9fa 0%, #e9ecef 100%); border: 1px solid #c8a6a1;">
                        <h4 class="text-lg font-semibold mb-4" style="color: #040348;">Detail Bahan Baku</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <p><strong style="color: #040348;">Nama:</strong> <span style="color: #949ea2;">{{ $bahanBaku->nama }}</span></p>
                            <p><strong style="color: #040348;">Kategori:</strong> <span style="color: #949ea2;">{{ $bahanBaku->kategori }}</span></p>
                            <p><strong style="color: #040348;">Jumlah:</strong> <span style="color: #949ea2;">{{ $bahanBaku->jumlah }} {{ $bahanBaku->satuan }}</span></p>
                            <p><strong style="color: #040348;">Status Saat Ini:</strong> 
                                <span class="px-2 py-1 rounded-full text-sm font-semibold
                                    @if($bahanBaku->status == 'kadaluarsa') text-red-800 @endif
                                    @if($bahanBaku->status == 'segera_kadaluarsa') text-yellow-800 @endif
                                    @if($bahanBaku->status == 'Habis') text-gray-800 @endif
                                    @if($bahanBaku->status == 'Tersedia') text-green-800 @endif
                                " 
                                style="@if($bahanBaku->status == 'kadaluarsa') background: linear-gradient(145deg, #fef2f2 0%, #fecaca 100%); border: 1px solid #ef4444; @endif
                                       @if($bahanBaku->status == 'segera_kadaluarsa') background: linear-gradient(145deg, #fef3c7 0%, #fde68a 100%); border: 1px solid #f59e0b; @endif
                                       @if($bahanBaku->status == 'Habis') background: linear-gradient(145deg, #f3f4f6 0%, #e5e7eb 100%); border: 1px solid #6b7280; @endif
                                       @if($bahanBaku->status == 'Tersedia') background: linear-gradient(145deg, #dcfce7 0%, #bbf7d0 100%); border: 1px solid #22c55e; @endif">
                                    {{ $bahanBaku->status }}
                                </span>
                            </p>
                        </div>
                    </div>

                    {{-- Logika status --}}
                    @if ($bahanBaku->status !== 'kadaluarsa')
                        <div class="p-6 rounded-xl border-l-4 mb-8" 
                             style="background: linear-gradient(145deg, #fef3c7 0%, #fde68a 100%); border-color: #f59e0b; border-left-color: #f59e0b;">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6" style="color: #f59e0b;" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium" style="color: #92400e;">
                                        Perhatian
                                    </h3>
                                    <div class="mt-2 text-sm" style="color: #92400e;">
                                        <p>Bahan baku ini tidak dapat dihapus karena statusnya <em>{{ $bahanBaku->status }}</em>. 
                                        Hanya bahan baku dengan status <strong>kadaluarsa</strong> yang bisa dihapus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('gudang.bahanbaku.index') }}" 
                               class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                               style="background: linear-gradient(145deg, #6b7280 0%, #4b5563 100%); box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali
                            </a>
                        </div>
                    @else
                        <div class="p-6 rounded-xl border-l-4 mb-8" 
                             style="background: linear-gradient(145deg, #dcfce7 0%, #bbf7d0 100%); border-color: #22c55e; border-left-color: #22c55e;">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6" style="color: #22c55e;" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium" style="color: #166534;">
                                        Info
                                    </h3>
                                    <div class="mt-2 text-sm" style="color: #166534;">
                                        <p>Bahan baku ini berstatus <strong>kadaluarsa</strong> dan dapat dihapus dari sistem.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Form konfirmasi hapus --}}
                        <form action="{{ route('gudang.bahanbaku.destroy', $bahanBaku->id) }}" 
                              method="POST" class="flex justify-end space-x-4">
                            @csrf
                            @method('DELETE')

                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                    style="background: linear-gradient(145deg, #ef4444 0%, #dc2626 100%); box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Ya, Hapus Data
                            </button>

                            <a href="{{ route('gudang.bahanbaku.index') }}" 
                               class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                               style="background: linear-gradient(145deg, #6b7280 0%, #4b5563 100%); box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Batal
                            </a>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
