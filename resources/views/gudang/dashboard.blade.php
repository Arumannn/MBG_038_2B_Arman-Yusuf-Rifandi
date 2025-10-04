<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight" style="color: #ffffff;">
                Dashboard Gudang
            </h2>
            <div class="flex items-center space-x-4">
                <div class="text-yellow-200 text-sm">
                    Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl font-bold mb-4" style="color: #040348;">Selamat Datang, {{ Auth::user()->name }}!</h2>
                <p class="text-lg" style="color: #949ea2;">Berikut adalah ringkasan aktivitas di gudang saat ini.</p>
            </div>
            
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Total Bahan Baku Card -->
                <div class="overflow-hidden shadow-2xl rounded-2xl transform hover:scale-105 transition-all duration-300" 
                     style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #c8a6a1; box-shadow: 0 20px 40px rgba(200, 166, 161, 0.2);">
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold" style="color: #040348;">Total Jenis Bahan</h3>
                            <div class="text-4xl">📦</div>
                        </div>
                        <p class="text-sm mb-6" style="color: #949ea2;">Jumlah semua jenis bahan baku yang tersimpan.</p>
                        <p class="text-5xl font-bold tracking-tight mb-4" style="color: #c8a6a1;">{{ $totalBahanBaku }}</p>
                        <a href="{{ route('gudang.bahanbaku.index') }}" 
                           class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                           style="background: linear-gradient(145deg, #c8a6a1 0%, #b89691 100%); box-shadow: 0 4px 15px rgba(200, 166, 161, 0.3);">
                            Kelola Bahan Baku
                        </a>
                    </div>
                </div>

                <!-- Permintaan Menunggu Card -->
                <div class="overflow-hidden shadow-2xl rounded-2xl transform hover:scale-105 transition-all duration-300" 
                     style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ffbb31; box-shadow: 0 20px 40px rgba(255, 187, 49, 0.2);">
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold" style="color: #040348;">Permintaan Menunggu</h3>
                            <div class="text-4xl">⏳</div>
                        </div>
                        <p class="text-sm mb-6" style="color: #949ea2;">Jumlah permintaan yang memerlukan persetujuan Anda.</p>
                        <p class="text-5xl font-bold tracking-tight mb-4" style="color: #ffbb31;">{{ $permintaanMenunggu }}</p>
                        <a href="{{ route('gudang.permintaan.index') }}" 
                           class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                           style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 4px 15px rgba(255, 187, 49, 0.3);">
                            Lihat Detail →
                        </a>
                    </div>
                </div>

                <!-- Segera Kadaluarsa Card -->
                <div class="overflow-hidden shadow-2xl rounded-2xl transform hover:scale-105 transition-all duration-300" 
                     style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #dc2626; box-shadow: 0 20px 40px rgba(220, 38, 38, 0.2);">
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold" style="color: #040348;">Segera Kadaluarsa</h3>
                            <div class="text-4xl">⚠️</div>
                        </div>
                        <p class="text-sm mb-6" style="color: #949ea2;">Bahan yang akan kadaluarsa dalam 3 hari atau kurang.</p>
                        <p class="text-5xl font-bold tracking-tight mb-4" style="color: #dc2626;">{{ $segeraKadaluarsa }}</p>
                        <a href="{{ route('gudang.bahanbaku.index') }}" 
                           class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                           style="background: linear-gradient(145deg, #dc2626 0%, #b91c1c 100%); box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);">
                            Periksa Stok →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>