<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Permintaan #') . $permintaan->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">

                    {{-- Tombol Kembali --}}
                    <a href="{{ route('gudang.permintaan.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600">
                        &laquo; Kembali ke Daftar
                    </a>

                    {{-- Informasi Utama Permintaan --}}
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">Ringkasan Permintaan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <p><strong>ID Permintaan:</strong> {{ $permintaan->id }}</p>
                            <p><strong>Pemohon:</strong> {{ $permintaan->pemohon->name ?? 'N/A' }}</p>
                            <p><strong>Tanggal Masak:</strong> {{ \Carbon\Carbon::parse($permintaan->tgl_masak)->format('d M Y') }}</p>
                            <p><strong>Menu:</strong> {{ $permintaan->menu_makan }}</p>
                            <div class="md:col-span-2">
                                <p><strong>Status Saat Ini:</strong>
                                    <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full 
                                        @if($permintaan->status == 'menunggu') bg-yellow-100 text-yellow-800
                                        @elseif($permintaan->status == 'disetujui') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($permintaan->status) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Area Tombol Aksi (jika status masih 'menunggu') --}}
                    @if($permintaan->status == 'menunggu')
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-4 flex items-center space-x-4">
                            <h3 class="font-semibold">Aksi Persetujuan:</h3>
                            {{-- Tombol untuk memicu modal persetujuan --}}
                            <x-primary-button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-permintaan-approval')"
                                class="bg-green-600 hover:bg-green-700"
                            >{{ __('Setujui') }}</x-primary-button>

                            {{-- Tombol untuk memicu modal penolakan --}}
                            <x-danger-button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-permintaan-rejection')"
                            >{{ __('Tolak') }}</x-danger-button>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- Modal Konfirmasi untuk Menyetujui --}}
    <x-modal name="confirm-permintaan-approval" focusable>
            <form method="post" action="{{ route('gudang.permintaan.approve', $permintaan->id) }}" class="p-6">

            @csrf
            
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Konfirmasi Persetujuan
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Anda yakin ingin menyetujui permintaan ini? Stok bahan baku akan otomatis dikurangi.
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-primary-button class="ms-3 bg-green-600 hover:bg-green-500">
                    {{ __('Ya, Setujui') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

    {{-- Modal Konfirmasi untuk Menolak --}}
    <x-modal name="confirm-permintaan-rejection" focusable>
            <form method="post" action="{{ route('gudang.permintaan.reject', $permintaan->id) }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Konfirmasi Penolakan
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Anda yakin ingin menolak permintaan bahan baku ini?
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Ya, Tolak') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</x-app-layout>