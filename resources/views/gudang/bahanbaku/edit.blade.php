<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight" style="color: #ffffff;">
                {{ __('Update Stok Bahan Baku') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="text-yellow-200 text-sm">
                    Perbarui stok bahan baku
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-2xl rounded-2xl" 
                 style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #c8a6a1; box-shadow: 0 20px 40px rgba(200, 166, 161, 0.1);">
                <div class="p-8">
                    <h3 class="text-2xl font-bold mb-6" style="color: #040348;">Detail Bahan Baku</h3>
                    
                    {{-- Detail bahan baku --}}
                    <div class="mb-8 p-6 rounded-xl" style="background: linear-gradient(145deg, #f8f9fa 0%, #e9ecef 100%); border: 1px solid #c8a6a1;">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <p><strong style="color: #040348;">Nama:</strong> <span style="color: #949ea2;">{{ $bahanBaku->nama }}</span></p>
                            <p><strong style="color: #040348;">Kategori:</strong> <span style="color: #949ea2;">{{ $bahanBaku->kategori }}</span></p>
                            <p><strong style="color: #040348;">Satuan:</strong> <span style="color: #949ea2;">{{ $bahanBaku->satuan }}</span></p>
                        </div>
                    </div>
                    
                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-xl border-l-4" 
                             style="background: linear-gradient(145deg, #fef2f2 0%, #fecaca 100%); border-color: #ef4444; border-left-color: #ef4444;">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5" style="color: #ef4444;" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium" style="color: #991b1b;">{{ $errors->first() }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('gudang.bahanbaku.update', $bahanBaku->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-8">
                            <label for="jumlah" class="block text-lg font-semibold mb-3" style="color: #040348;">Jumlah Stok Baru</label>
                            <div class="relative">
                                <input type="number" 
                                       name="jumlah" 
                                       id="jumlah" 
                                       value="{{ old('jumlah', $bahanBaku->jumlah) }}" 
                                       class="block w-full px-4 py-3 text-lg rounded-xl border-2 transition-all duration-300 focus:ring-2 focus:ring-opacity-50" 
                                       style="border-color: #c8a6a1; background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); color: #040348; focus:border-color: #ffbb31; focus:ring-color: #ffbb31;" 
                                       required min="0" 
                                       placeholder="Masukkan jumlah stok baru">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-sm font-medium" style="color: #c8a6a1;">{{ $bahanBaku->satuan }}</span>
                                </div>
                            </div>
                            <p class="mt-2 text-sm" style="color: #949ea2;">Stok saat ini: <strong>{{ $bahanBaku->jumlah }} {{ $bahanBaku->satuan }}</strong></p>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                    style="background: linear-gradient(145deg, #c8a6a1 0%, #b89691 100%); box-shadow: 0 4px 15px rgba(200, 166, 161, 0.3);">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Update Stok
                            </button>
                            <a href="{{ route('gudang.bahanbaku.index') }}" 
                               class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                               style="background: linear-gradient(145deg, #6b7280 0%, #4b5563 100%); box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>