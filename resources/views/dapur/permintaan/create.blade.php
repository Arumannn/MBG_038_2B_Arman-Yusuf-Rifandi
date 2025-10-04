<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight" style="color: #ffffff;">
                {{ __('Buat Permintaan Bahan Baku') }}
            </h2>
            <div class="flex items-center space-x-4">
                <a href="{{ route('dapur.dashboard') }}" 
                   class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                   style="background: linear-gradient(145deg, #6b7280 0%, #4b5563 100%); box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-2xl rounded-2xl" 
                 style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ffbb31; box-shadow: 0 20px 40px rgba(4, 3, 72, 0.1);">
                <div class="p-8">
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
                                    <h3 class="text-sm font-medium" style="color: #991b1b;">Terdapat kesalahan dalam form:</h3>
                                    <ul class="mt-2 text-sm list-disc list-inside" style="color: #991b1b;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('dapur.permintaan.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <x-input-label for="tgl_masak" :value="__('Tanggal Masak')" />
                                <x-text-input id="tgl_masak" class="block mt-2 w-full" type="date" name="tgl_masak" required />
                                <x-input-error :messages="$errors->get('tgl_masak')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="menu_makan" :value="__('Menu yang Akan Dibuat')" />
                                <x-text-input id="menu_makan" class="block mt-2 w-full" type="text" name="menu_makan" required />
                                <x-input-error :messages="$errors->get('menu_makan')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="jumlah_porsi" :value="__('Jumlah Porsi')" />
                                <x-text-input id="jumlah_porsi" class="block mt-2 w-full" type="number" name="jumlah_porsi" required min="1" />
                                <x-input-error :messages="$errors->get('jumlah_porsi')" class="mt-2" />
                            </div>
                        </div>

                        <div class="border-t pt-8" style="border-color: #c8a6a1;">
                            <h3 class="text-2xl font-bold mb-6" style="color: #040348;">Bahan Baku yang Diminta</h3>
                            <div id="bahan-container" class="space-y-6">
                                <!-- Dynamic content will be added here -->
                            </div>
                            <button type="button" id="add-bahan" 
                                    class="mt-6 inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                    style="background: linear-gradient(145deg, #3b82f6 0%, #2563eb 100%); box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                + Tambah Bahan
                            </button>
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-6">
                            <a href="{{ route('dapur.dashboard') }}" 
                               class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105"
                               style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #6b7280; color: #6b7280; box-shadow: 0 4px 15px rgba(107, 114, 128, 0.1);">
                                Batal
                            </a>
                            <x-primary-button class="px-8 py-3 text-lg">
                                {{ __('Ajukan Permintaan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('bahan-container');
            const addButton = document.getElementById('add-bahan');
            const bahanBakus = @json($bahanBakus);
            let bahanIndex = 0;

            function addBahanRow() {
                const div = document.createElement('div');
                div.classList.add('p-6', 'rounded-2xl', 'border-2', 'transition-all', 'duration-300', 'hover:shadow-lg');
                div.style.cssText = 'background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border-color: #c8a6a1; box-shadow: 0 4px 15px rgba(200, 166, 161, 0.1);';
                div.innerHTML = `
                    <div class="flex items-end space-x-4">
                        <div class="flex-1">
                            <label class="block text-sm font-semibold mb-2" style="color: #040348;">Nama Bahan</label>
                            <select name="bahan_baku[${bahanIndex}][id]" class="block w-full rounded-xl border-2 shadow-sm focus:ring-2 focus:ring-offset-2 transition-all duration-300" 
                                    style="border-color: #c8a6a1; background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); color: #040348; focus:border-color: #ffbb31; focus:ring-color: rgba(255, 187, 49, 0.2); focus:ring-offset-color: #f1e9dc; box-shadow: 0 4px 15px rgba(4, 3, 72, 0.1);" required>
                                <option value="">Pilih Bahan</option>
                                ${bahanBakus.map(bahan => `<option value="${bahan.id}">${bahan.nama} (Stok: ${bahan.jumlah} ${bahan.satuan})</option>`).join('')}
                            </select>
                        </div>
                        <div class="w-1/3">
                            <label class="block text-sm font-semibold mb-2" style="color: #040348;">Jumlah</label>
                            <input type="number" name="bahan_baku[${bahanIndex}][jumlah]" class="block w-full rounded-xl border-2 shadow-sm focus:ring-2 focus:ring-offset-2 transition-all duration-300" 
                                   style="border-color: #c8a6a1; background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); color: #040348; focus:border-color: #ffbb31; focus:ring-color: rgba(255, 187, 49, 0.2); focus:ring-offset-color: #f1e9dc; box-shadow: 0 4px 15px rgba(4, 3, 72, 0.1);" required min="1">
                        </div>
                        <button type="button" class="remove-bahan inline-flex items-center px-4 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                style="background: linear-gradient(145deg, #ef4444 0%, #dc2626 100%); box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                `;
                container.appendChild(div);
                bahanIndex++;
            }

            addButton.addEventListener('click', addBahanRow);

            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-bahan') || e.target.closest('.remove-bahan')) {
                    e.target.closest('.p-6').remove();
                }
            });
            
            // Add one row by default
            addBahanRow();
        });
    </script>
</x-app-layout>