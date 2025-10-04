<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight" style="color: #ffffff;">
                {{ __('Tambah Bahan Baku Baru') }}
            </h2>
            <div class="flex items-center space-x-4">
                <a href="{{ route('gudang.bahanbaku.index') }}" 
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

                    <form action="{{ route('gudang.bahanbaku.store') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menyimpan data ini?');" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="nama" :value="__('Nama Bahan')" />
                                <x-text-input id="nama" class="block mt-2 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="kategori" :value="__('Kategori')" />
                                <x-text-input id="kategori" class="block mt-2 w-full" type="text" name="kategori" :value="old('kategori')" required />
                                <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="jumlah" :value="__('Jumlah')" />
                                <x-text-input id="jumlah" class="block mt-2 w-full" type="number" name="jumlah" :value="old('jumlah')" required min="0" />
                                <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="satuan" :value="__('Satuan')" />
                                <x-text-input id="satuan" class="block mt-2 w-full" type="text" name="satuan" :value="old('satuan')" required />
                                <x-input-error :messages="$errors->get('satuan')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="tanggal_masuk" :value="__('Tanggal Masuk')" />
                                <x-text-input id="tanggal_masuk" class="block mt-2 w-full" type="date" name="tanggal_masuk" :value="old('tanggal_masuk')" required />
                                <x-input-error :messages="$errors->get('tanggal_masuk')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="tanggal_kadaluarsa" :value="__('Tanggal Kadaluarsa')" />
                                <x-text-input id="tanggal_kadaluarsa" class="block mt-2 w-full" type="date" name="tanggal_kadaluarsa" :value="old('tanggal_kadaluarsa')" required />
                                <x-input-error :messages="$errors->get('tanggal_kadaluarsa')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-6">
                            <a href="{{ route('gudang.bahanbaku.index') }}" 
                               class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105"
                               style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #6b7280; color: #6b7280; box-shadow: 0 4px 15px rgba(107, 114, 128, 0.1);">
                                Batal
                            </a>
                            <x-primary-button class="px-8 py-3 text-lg">
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>