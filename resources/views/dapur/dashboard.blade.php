<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight" style="color: #ffffff;">
                Dashboard Dapur
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
                <p class="text-lg" style="color: #949ea2;">Ringkasan permintaan bahan baku yang telah Anda ajukan.</p>
            </div>
            
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">
                <!-- Total Permintaan Card -->
                <div class="overflow-hidden shadow-2xl rounded-2xl transform hover:scale-105 transition-all duration-300" 
                     style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #c8a6a1; box-shadow: 0 20px 40px rgba(200, 166, 161, 0.2);">
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold" style="color: #040348;">Total Permintaan</h3>
                            <div class="text-4xl">📋</div>
                        </div>
                        <p class="text-sm mb-6" style="color: #949ea2;">Jumlah semua permintaan bahan baku yang pernah Anda ajukan.</p>
                        <p class="text-5xl font-bold tracking-tight mb-4" style="color: #c8a6a1;">{{ $totalPermintaan }}</p>
                        <div class="flex flex-col space-y-2">
                            <a href="{{ route('dapur.permintaan.create') }}" 
                               class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                               style="background: linear-gradient(145deg, #c8a6a1 0%, #b89691 100%); box-shadow: 0 4px 15px rgba(200, 166, 161, 0.3);">
                                Buat Permintaan Baru
                            </a>
                            <a href="{{ route('dapur.permintaan.history') }}" 
                               class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                               style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 4px 15px rgba(255, 187, 49, 0.3);">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Riwayat Permintaan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Permintaan Disetujui Card -->
                <div class="overflow-hidden shadow-2xl rounded-2xl transform hover:scale-105 transition-all duration-300" 
                     style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #22c55e; box-shadow: 0 20px 40px rgba(34, 197, 94, 0.2);">
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold" style="color: #040348;">Permintaan Disetujui</h3>
                            <div class="text-4xl">✅</div>
                        </div>
                        <p class="text-sm mb-6" style="color: #949ea2;">Jumlah permintaan yang telah disetujui oleh petugas gudang.</p>
                        <p class="text-5xl font-bold tracking-tight mb-4" style="color: #22c55e;">{{ $permintaanDisetujui }}</p>
                    </div>
                </div>

                <!-- Permintaan Ditolak Card -->
                <div class="overflow-hidden shadow-2xl rounded-2xl transform hover:scale-105 transition-all duration-300" 
                     style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ef4444; box-shadow: 0 20px 40px rgba(239, 68, 68, 0.2);">
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold" style="color: #040348;">Permintaan Ditolak</h3>
                            <div class="text-4xl">❌</div>
                        </div>
                        <p class="text-sm mb-6" style="color: #949ea2;">Jumlah permintaan yang ditolak karena berbagai alasan.</p>
                        <p class="text-5xl font-bold tracking-tight mb-4" style="color: #ef4444;">{{ $permintaanDitolak }}</p>
                    </div>
                </div>

                <!-- Request History Card -->
                <div class="overflow-hidden shadow-2xl rounded-2xl transform hover:scale-105 transition-all duration-300" 
                     style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #3b82f6; box-shadow: 0 20px 40px rgba(59, 130, 246, 0.2);">
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold" style="color: #040348;">Riwayat Permintaan</h3>
                            <div class="text-4xl">📊</div>
                        </div>
                        <p class="text-sm mb-6" style="color: #949ea2;">Lihat semua permintaan yang telah Anda ajukan dengan detail lengkap.</p>
                        <a href="{{ route('dapur.permintaan.history') }}" 
                           class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                           style="background: linear-gradient(145deg, #3b82f6 0%, #2563eb 100%); box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Lihat Riwayat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>