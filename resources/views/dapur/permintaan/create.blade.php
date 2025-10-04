<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Permintaan Bahan Baku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('dapur.permintaan.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="tgl_masak" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Masak</label>
                                <input type="date" name="tgl_masak" id="tgl_masak" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            </div>
                            <div>
                                <label for="menu_makan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Menu yang Akan Dibuat</label>
                                <input type="text" name="menu_makan" id="menu_makan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            </div>
                             <div>
                                <label for="jumlah_porsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Porsi</label>
                                <input type="number" name="jumlah_porsi" id="jumlah_porsi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required min="1">
                            </div>

                            <hr class="my-6 border-gray-300 dark:border-gray-600">

                            <h3 class="text-lg font-medium">Bahan Baku yang Diminta</h3>
                            <div id="bahan-container" class="space-y-4">
                                </div>
                            <button type="button" id="add-bahan" class="mt-2 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500">
                                + Tambah Bahan
                            </button>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Ajukan Permintaan
                            </button>
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
                div.classList.add('flex', 'space-x-4', 'items-end');
                div.innerHTML = `
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Bahan</label>
                        <select name="bahan_baku[${bahanIndex}][id]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                            <option value="">Pilih Bahan</option>
                            ${bahanBakus.map(bahan => `<option value="${bahan.id}">${bahan.nama} (Stok: ${bahan.jumlah} ${bahan.satuan})</option>`).join('')}
                        </select>
                    </div>
                    <div class="w-1/4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah</label>
                        <input type="number" name="bahan_baku[${bahanIndex}][jumlah]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required min="1">
                    </div>
                    <button type="button" class="remove-bahan inline-flex items-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500">X</button>
                `;
                container.appendChild(div);
                bahanIndex++;
            }

            addButton.addEventListener('click', addBahanRow);

            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-bahan')) {
                    e.target.closest('.flex').remove();
                }
            });
            
            // Add one row by default
            addBahanRow();
        });
    </script>
</x-app-layout>