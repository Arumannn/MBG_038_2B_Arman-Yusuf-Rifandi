<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight" style="color: #ffffff;">
            {{ __('Dashboard') }}
        </h2>
            <div class="flex items-center space-x-4">
                <div class="text-yellow-200 text-sm">
                    Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Welcome Card -->
                <div class="col-span-full">
                    <div class="overflow-hidden shadow-2xl rounded-2xl" 
                         style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ffbb31; box-shadow: 0 20px 40px rgba(4, 3, 72, 0.1);">
                        <div class="p-8">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-2xl font-bold mb-2" style="color: #040348;">
                                        {{ __("Selamat Datang!") }}
                                    </h3>
                                    <p class="text-lg" style="color: #949ea2;">
                                        Anda telah berhasil masuk ke sistem. Pilih menu di atas untuk memulai.
                                    </p>
                                </div>
                                <div class="text-6xl opacity-20" style="color: #ffbb31;">
                                    🎉
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Role-based Cards -->
                @if(Auth::user()->role == 'gudang')
                    <div class="overflow-hidden shadow-2xl rounded-2xl transform hover:scale-105 transition-all duration-300" 
                         style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #c8a6a1; box-shadow: 0 20px 40px rgba(200, 166, 161, 0.2);">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-xl font-bold" style="color: #040348;">Bahan Baku</h4>
                                <div class="text-3xl">📦</div>
                            </div>
                            <p class="text-sm mb-4" style="color: #949ea2;">
                                Kelola stok bahan baku dan inventori gudang
                            </p>
                            <a href="{{ route('gudang.bahanbaku.index') }}" 
                               class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                               style="background: linear-gradient(145deg, #c8a6a1 0%, #b89691 100%); box-shadow: 0 4px 15px rgba(200, 166, 161, 0.3);">
                                Kelola Bahan Baku
                            </a>
                        </div>
                    </div>

                    <div class="overflow-hidden shadow-2xl rounded-2xl transform hover:scale-105 transition-all duration-300" 
                         style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ffbb31; box-shadow: 0 20px 40px rgba(255, 187, 49, 0.2);">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-xl font-bold" style="color: #040348;">Permintaan</h4>
                                <div class="text-3xl">📋</div>
                            </div>
                            <p class="text-sm mb-4" style="color: #949ea2;">
                                Lihat dan kelola permintaan dari dapur
                            </p>
                            <a href="{{ route('gudang.permintaan.index') }}" 
                               class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                               style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 4px 15px rgba(255, 187, 49, 0.3);">
                                Lihat Permintaan
                            </a>
                        </div>
                    </div>
                @endif

                @if(Auth::user()->role == 'dapur')
                    <div class="overflow-hidden shadow-2xl rounded-2xl transform hover:scale-105 transition-all duration-300" 
                         style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ffbb31; box-shadow: 0 20px 40px rgba(255, 187, 49, 0.2);">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-xl font-bold" style="color: #040348;">Buat Permintaan</h4>
                                <div class="text-3xl">🍳</div>
                            </div>
                            <p class="text-sm mb-4" style="color: #949ea2;">
                                Buat permintaan bahan baku untuk kebutuhan dapur
                            </p>
                            <a href="{{ route('dapur.permintaan.create') }}" 
                               class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                               style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 4px 15px rgba(255, 187, 49, 0.3);">
                                Buat Permintaan Baru
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Profile Card -->
                <div class="overflow-hidden shadow-2xl rounded-2xl transform hover:scale-105 transition-all duration-300" 
                     style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #cbcdc4; box-shadow: 0 20px 40px rgba(203, 205, 196, 0.2);">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xl font-bold" style="color: #040348;">Profil</h4>
                            <div class="text-3xl">👤</div>
                        </div>
                        <p class="text-sm mb-4" style="color: #949ea2;">
                            Kelola informasi profil dan pengaturan akun
                        </p>
                        <a href="{{ route('profile.edit') }}" 
                           class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                           style="background: linear-gradient(145deg, #cbcdc4 0%, #b8b9b0 100%); box-shadow: 0 4px 15px rgba(203, 205, 196, 0.3);">
                            Edit Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
