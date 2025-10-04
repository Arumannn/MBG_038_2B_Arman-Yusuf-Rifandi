<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard Gudang
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <h2 class="text-center text-lg font-semibold leading-8 text-gray-200">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-center mt-2 text-sm text-gray-400">Berikut adalah ringkasan aktivitas di gudang saat ini.</p>
            
            <div class="mt-10 grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                
                <div class="rounded-2xl bg-brand-blue-gray p-8 text-white">
                    <h3 class="text-base font-semibold">Total Jenis Bahan</h3>
                    <p class="mt-2 text-sm text-gray-300">Jumlah semua jenis bahan baku yang tersimpan.</p>
                    <p class="mt-6 text-5xl font-bold tracking-tight">{{ $totalBahanBaku }}</p>
                </div>

                <div class="rounded-2xl bg-brand-yellow p-8 text-brand-blue-dark">
                    <h3 class="text-base font-semibold">Permintaan Menunggu</h3>
                    <p class="mt-2 text-sm text-brand-blue-dark/80">Jumlah permintaan yang memerlukan persetujuan Anda.</p>
                    <p class="mt-6 text-5xl font-bold tracking-tight">{{ $permintaanMenunggu }}</p>
                    <a href="{{ route('gudang.permintaan.index') }}" class="mt-4 inline-block text-sm font-semibold hover:underline">Lihat Detail &rarr;</a>
                </div>

                <div class="rounded-2xl bg-brand-brown-dark p-8 text-white">
                    <h3 class="text-base font-semibold">Segera Kadaluarsa</h3>
                    <p class="mt-2 text-sm text-gray-300">Bahan yang akan kadaluarsa dalam 3 hari atau kurang.</p>
                    <p class="mt-6 text-5xl font-bold tracking-tight">{{ $segeraKadaluarsa }}</p>
                    <a href="{{ route('gudang.bahanbaku.index') }}" class="mt-4 inline-block text-sm font-semibold hover:underline">Periksa Stok &rarr;</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>