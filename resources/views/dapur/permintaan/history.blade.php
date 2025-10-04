<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight" style="color: #ffffff;">
                {{ __('Riwayat Permintaan') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="text-yellow-200 text-sm">
                    Lihat semua permintaan yang telah diajukan
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-2xl rounded-2xl" 
                 style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ffbb31; box-shadow: 0 20px 40px rgba(255, 187, 49, 0.1);">
                <div class="p-8">
                    @if(session('success'))
                        <div class="mb-6 p-4 rounded-xl border-l-4" 
                             style="background: linear-gradient(145deg, #dcfce7 0%, #bbf7d0 100%); border-color: #22c55e; border-left-color: #22c55e;">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5" style="color: #22c55e;" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium" style="color: #166534;">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Filter and Search Section --}}
                    <div class="mb-8 p-6 rounded-xl" style="background: linear-gradient(145deg, #f8f9fa 0%, #e9ecef 100%); border: 1px solid #c8a6a1;">
                        <h3 class="text-lg font-semibold mb-4" style="color: #040348;">Filter & Pencarian</h3>
                        <form method="GET" action="{{ route('dapur.permintaan.history') }}" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            {{-- Search Input --}}
                            <div>
                                <label for="search" class="block text-sm font-medium mb-2" style="color: #040348;">Cari Menu/ID</label>
                                <input type="text" 
                                       name="search" 
                                       id="search" 
                                       value="{{ request('search') }}"
                                       placeholder="Cari menu atau ID permintaan..."
                                       class="w-full px-3 py-2 rounded-lg border-2 transition-all duration-300 focus:ring-2 focus:ring-opacity-50"
                                       style="border-color: #c8a6a1; background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); color: #040348; focus:border-color: #ffbb31; focus:ring-color: #ffbb31;">
                            </div>

                            {{-- Status Filter --}}
                            <div>
                                <label for="status" class="block text-sm font-medium mb-2" style="color: #040348;">Status</label>
                                <select name="status" 
                                        id="status"
                                        class="w-full px-3 py-2 rounded-lg border-2 transition-all duration-300 focus:ring-2 focus:ring-opacity-50"
                                        style="border-color: #c8a6a1; background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); color: #040348; focus:border-color: #ffbb31; focus:ring-color: #ffbb31;">
                                    <option value="">Semua Status</option>
                                    <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>

                            {{-- Date From --}}
                            <div>
                                <label for="date_from" class="block text-sm font-medium mb-2" style="color: #040348;">Dari Tanggal</label>
                                <input type="date" 
                                       name="date_from" 
                                       id="date_from" 
                                       value="{{ request('date_from') }}"
                                       class="w-full px-3 py-2 rounded-lg border-2 transition-all duration-300 focus:ring-2 focus:ring-opacity-50"
                                       style="border-color: #c8a6a1; background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); color: #040348; focus:border-color: #ffbb31; focus:ring-color: #ffbb31;">
                            </div>

                            {{-- Date To --}}
                            <div>
                                <label for="date_to" class="block text-sm font-medium mb-2" style="color: #040348;">Sampai Tanggal</label>
                                <input type="date" 
                                       name="date_to" 
                                       id="date_to" 
                                       value="{{ request('date_to') }}"
                                       class="w-full px-3 py-2 rounded-lg border-2 transition-all duration-300 focus:ring-2 focus:ring-opacity-50"
                                       style="border-color: #c8a6a1; background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); color: #040348; focus:border-color: #ffbb31; focus:ring-color: #ffbb31;">
                            </div>

                            {{-- Filter Buttons --}}
                            <div class="md:col-span-2 lg:col-span-4 flex justify-end space-x-4">
                                <button type="submit" 
                                        class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                        style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 4px 15px rgba(255, 187, 49, 0.3);">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Filter
                                </button>
                                <a href="{{ route('dapur.permintaan.history') }}" 
                                   class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                   style="background: linear-gradient(145deg, #6b7280 0%, #4b5563 100%); box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                    </svg>
                                    Reset
                                </a>
                            </div>
                        </form>
                    </div>

                    {{-- Results Table --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y" style="border-color: #c8a6a1;">
                            <thead style="background: linear-gradient(145deg, #f1e9dc 0%, #cbcdc4 100%);">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">ID</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Menu</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Tanggal Masak</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Jumlah Porsi</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Status</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Dibuat</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Detail</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y" style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);">
                                @forelse($permintaans as $permintaan)
                                    <tr class="hover:bg-opacity-50 transition-all duration-300" style="background: linear-gradient(145deg, rgba(255, 187, 49, 0.02) 0%, rgba(255, 187, 49, 0.05) 100%);">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" style="color: #040348;">#{{ $permintaan->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm" style="color: #949ea2;">{{ $permintaan->menu_makan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold" style="color: #c8a6a1;">{{ \Carbon\Carbon::parse($permintaan->tgl_masak)->format('d M Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm" style="color: #040348;">{{ $permintaan->jumlah_porsi }} porsi</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if($permintaan->status == 'menunggu') text-yellow-800 @endif
                                                @if($permintaan->status == 'disetujui') text-green-800 @endif
                                                @if($permintaan->status == 'ditolak') text-red-800 @endif
                                            " 
                                            style="@if($permintaan->status == 'menunggu') background: linear-gradient(145deg, #fef3c7 0%, #fde68a 100%); border: 1px solid #f59e0b; @endif
                                                   @if($permintaan->status == 'disetujui') background: linear-gradient(145deg, #dcfce7 0%, #bbf7d0 100%); border: 1px solid #22c55e; @endif
                                                   @if($permintaan->status == 'ditolak') background: linear-gradient(145deg, #fef2f2 0%, #fecaca 100%); border: 1px solid #ef4444; @endif">
                                                {{ ucfirst($permintaan->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm" style="color: #949ea2;">{{ \Carbon\Carbon::parse($permintaan->created_at)->format('d M Y H:i') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button onclick="toggleDetails({{ $permintaan->id }})" 
                                                    class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                                    style="background: linear-gradient(145deg, #3b82f6 0%, #2563eb 100%); box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Lihat Detail
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    {{-- Detail Row (Hidden by default) --}}
                                    <tr id="details-{{ $permintaan->id }}" class="hidden">
                                        <td colspan="7" class="px-6 py-4" style="background: linear-gradient(145deg, #f8f9fa 0%, #e9ecef 100%);">
                                            <div class="border-l-4 pl-4" style="border-color: #ffbb31;">
                                                <h4 class="font-semibold mb-2" style="color: #040348;">Detail Bahan Baku:</h4>
                                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                                    @foreach($permintaan->details as $detail)
                                                        <div class="p-3 rounded-lg" style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 1px solid #c8a6a1;">
                                                            <p class="font-medium" style="color: #040348;">{{ $detail->bahanBaku->nama }}</p>
                                                            <p class="text-sm" style="color: #949ea2;">{{ $detail->jumlah_diminta }} {{ $detail->bahanBaku->satuan }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-12 text-center">
                                            <div class="text-center">
                                                <div class="text-6xl mb-4" style="color: #c8a6a1;">📋</div>
                                                <h3 class="text-lg font-semibold mb-2" style="color: #040348;">Tidak ada permintaan</h3>
                                                <p class="text-sm mb-4" style="color: #949ea2;">Belum ada permintaan bahan baku yang diajukan</p>
                                                <a href="{{ route('dapur.permintaan.create') }}" 
                                                   class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                                   style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 4px 15px rgba(255, 187, 49, 0.3);">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                    Buat Permintaan Baru
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    @if($permintaans->hasPages())
                        <div class="mt-8">
                            {{ $permintaans->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDetails(permintaanId) {
            const detailsRow = document.getElementById('details-' + permintaanId);
            if (detailsRow.classList.contains('hidden')) {
                detailsRow.classList.remove('hidden');
            } else {
                detailsRow.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
