<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight" style="color: #ffffff;">
                {{ __('Detail Permintaan #') . $permintaan->id }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="text-yellow-200 text-sm">
                    Detail permintaan bahan baku
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-2xl rounded-2xl" 
                 style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ffbb31; box-shadow: 0 20px 40px rgba(255, 187, 49, 0.1);">
                <div class="p-8">
                    {{-- Tombol Kembali --}}
                    <div class="mb-8">
                        <a href="{{ route('gudang.permintaan.index') }}" 
                           class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                           style="background: linear-gradient(145deg, #6b7280 0%, #4b5563 100%); box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Daftar
                        </a>
                    </div>

                    {{-- Informasi Utama Permintaan --}}
                    <div class="mb-8 p-6 rounded-xl" style="background: linear-gradient(145deg, #f8f9fa 0%, #e9ecef 100%); border: 1px solid #c8a6a1;">
                        <h3 class="text-2xl font-bold mb-6" style="color: #040348;">Ringkasan Permintaan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="mb-2"><strong style="color: #040348;">ID Permintaan:</strong> <span style="color: #949ea2;">#{{ $permintaan->id }}</span></p>
                                <p class="mb-2"><strong style="color: #040348;">Pemohon:</strong> <span style="color: #949ea2;">{{ $permintaan->pemohon->name ?? 'N/A' }}</span></p>
                            </div>
                            <div>
                                <p class="mb-2"><strong style="color: #040348;">Tanggal Masak:</strong> <span style="color: #c8a6a1; font-weight: 600;">{{ \Carbon\Carbon::parse($permintaan->tgl_masak)->format('d M Y') }}</span></p>
                                <p class="mb-2"><strong style="color: #040348;">Menu:</strong> <span style="color: #949ea2;">{{ $permintaan->menu_makan }}</span></p>
                            </div>
                            <div class="md:col-span-2">
                                <p class="mb-2"><strong style="color: #040348;">Status Saat Ini:</strong></p>
                                <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full
                                    @if($permintaan->status == 'menunggu') text-yellow-800 @endif
                                    @if($permintaan->status == 'disetujui') text-green-800 @endif
                                    @if($permintaan->status == 'ditolak') text-red-800 @endif
                                " 
                                style="@if($permintaan->status == 'menunggu') background: linear-gradient(145deg, #fef3c7 0%, #fde68a 100%); border: 1px solid #f59e0b; @endif
                                       @if($permintaan->status == 'disetujui') background: linear-gradient(145deg, #dcfce7 0%, #bbf7d0 100%); border: 1px solid #22c55e; @endif
                                       @if($permintaan->status == 'ditolak') background: linear-gradient(145deg, #fef2f2 0%, #fecaca 100%); border: 1px solid #ef4444; @endif">
                                    {{ ucfirst($permintaan->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Area Tombol Aksi (jika status masih 'menunggu') --}}
                    @if($permintaan->status == 'menunggu')
                        <div class="p-6 rounded-xl" style="background: linear-gradient(145deg, #f0f9ff 0%, #e0f2fe 100%); border: 1px solid #0ea5e9;">
                            <h3 class="text-lg font-semibold mb-4" style="color: #040348;">Aksi Persetujuan</h3>
                            <div class="flex items-center space-x-4">
                                {{-- Tombol untuk memicu modal persetujuan --}}
                                <x-primary-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-permintaan-approval')"
                                    class="bg-green-600 hover:bg-green-700 rounded-xl px-6 py-3 font-semibold transition-all duration-300 transform hover:scale-105"
                                    style="background: linear-gradient(145deg, #22c55e 0%, #16a34a 100%); box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);"
                                >{{ __('Setujui') }}</x-primary-button>

                                {{-- Tombol untuk memicu modal penolakan --}}
                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-permintaan-rejection')"
                                    class="rounded-xl px-6 py-3 font-semibold transition-all duration-300 transform hover:scale-105"
                                    style="background: linear-gradient(145deg, #ef4444 0%, #dc2626 100%); box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);"
                                >{{ __('Tolak') }}</x-danger-button>
                            </div>
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