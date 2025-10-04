<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard Dapur
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <h2 class="text-center text-lg font-semibold leading-8 text-gray-200">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-center mt-2 text-sm text-gray-400">Ringkasan permintaan bahan baku yang telah Anda ajukan.</p>
            
            <div class="mt-10 grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                
                <div class="rounded-2xl bg-brand-blue-gray p-8 text-white">
                    <h3 class="text-base font-semibold">Total Permintaan</h3>
                    <p class="mt-2 text-sm text-gray-300">Jumlah semua permintaan bahan baku yang pernah Anda ajukan.</p>
                    <p class="mt-6 text-5xl font-bold tracking-tight">{{ $totalPermintaan }}</p>
                </div>

                <div class="rounded-2xl bg-brand-light-brown p-8 text-white">
                    <h3 class="text-base font-semibold">Permintaan Disetujui</h3>
                    <p class="mt-2 text-sm text-gray-200">Jumlah permintaan yang telah disetujui oleh petugas gudang.</p>
                    <p class="mt-6 text-5xl font-bold tracking-tight">{{ $permintaanDisetujui }}</p>
                </div>

                <div class="rounded-2xl bg-brand-brown-dark p-8 text-white">
                    <h3 class="text-base font-semibold">Permintaan Ditolak</h3>
                    <p class="mt-2 text-sm text-gray-300">Jumlah permintaan yang ditolak karena berbagai alasan.</p>
                    <p class="mt-6 text-5xl font-bold tracking-tight">{{ $permintaanDitolak }}</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>