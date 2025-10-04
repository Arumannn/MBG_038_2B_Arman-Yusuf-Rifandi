<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-white leading-tight" style="color: #ffffff;">
                {{ __('Data Bahan Baku') }}
            </h2>
            <div class="flex items-center space-x-4">
                <a href="{{ route('gudang.bahanbaku.create') }}" 
                   class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-semibold text-white transition-all duration-300 transform hover:scale-105"
                   style="background: linear-gradient(145deg, #ffbb31 0%, #e6a52a 100%); box-shadow: 0 4px 15px rgba(255, 187, 49, 0.3);">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Bahan Baku
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-2xl rounded-2xl" 
                 style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%); border: 2px solid #ffbb31; box-shadow: 0 20px 40px rgba(4, 3, 72, 0.1);">
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

                    @if(session('error'))
                        <div class="mb-6 p-4 rounded-xl border-l-4" 
                             style="background: linear-gradient(145deg, #fef2f2 0%, #fecaca 100%); border-color: #ef4444; border-left-color: #ef4444;">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5" style="color: #ef4444;" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium" style="color: #991b1b;">{{ session('error') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y" style="border-color: #c8a6a1;">
                            <thead style="background: linear-gradient(145deg, #f1e9dc 0%, #cbcdc4 100%);">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Nama</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Kategori</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Jumlah</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Tgl Kadaluarsa</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Status</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider" style="color: #040348;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y" style="background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);">
                                @forelse ($bahanBakus as $bahan)
                                    <tr class="hover:bg-opacity-50 transition-all duration-300" style="background: linear-gradient(145deg, rgba(255, 187, 49, 0.02) 0%, rgba(255, 187, 49, 0.05) 100%);">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" style="color: #040348;">{{ $bahan->nama }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm" style="color: #949ea2;">{{ $bahan->kategori }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold" style="color: #c8a6a1;">{{ $bahan->jumlah }} {{ $bahan->satuan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm" style="color: #949ea2;">{{ \Carbon\Carbon::parse($bahan->tanggal_kadaluarsa)->format('d-m-Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if($bahan->status == 'Tersedia') text-green-800 @endif
                                                @if($bahan->status == 'segera_kadaluarsa') text-yellow-800 @endif
                                                @if($bahan->status == 'kadaluarsa') text-red-800 @endif
                                                @if($bahan->status == 'Habis') text-gray-800 @endif
                                            " 
                                            style="@if($bahan->status == 'Tersedia') background: linear-gradient(145deg, #dcfce7 0%, #bbf7d0 100%); border: 1px solid #22c55e; @endif
                                                   @if($bahan->status == 'segera_kadaluarsa') background: linear-gradient(145deg, #fef3c7 0%, #fde68a 100%); border: 1px solid #f59e0b; @endif
                                                   @if($bahan->status == 'kadaluarsa') background: linear-gradient(145deg, #fef2f2 0%, #fecaca 100%); border: 1px solid #ef4444; @endif
                                                   @if($bahan->status == 'Habis') background: linear-gradient(145deg, #f3f4f6 0%, #e5e7eb 100%); border: 1px solid #6b7280; @endif">
                                                {{ $bahan->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-3">
                                                <a href="{{ route('gudang.bahanbaku.edit', $bahan->id) }}" 
                                                   class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                                   style="background: linear-gradient(145deg, #3b82f6 0%, #2563eb 100%); box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);">
                                                    Edit
                                                </a>
                                                <a href="{{ route('gudang.bahanbaku.delete.show', $bahan->id) }}" 
                                                   class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold text-white transition-all duration-300 transform hover:scale-105"
                                                   style="background: linear-gradient(145deg, #ef4444 0%, #dc2626 100%); box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);">
                                                    Hapus
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center">
                                            <div class="text-center">
                                                <div class="text-6xl mb-4" style="color: #c8a6a1;">📦</div>
                                                <h3 class="text-lg font-semibold mb-2" style="color: #040348;">Tidak ada data bahan baku</h3>
                                                <p class="text-sm" style="color: #949ea2;">Mulai dengan menambahkan bahan baku pertama Anda</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>