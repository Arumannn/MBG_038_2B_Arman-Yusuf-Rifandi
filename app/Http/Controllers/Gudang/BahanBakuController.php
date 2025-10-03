<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BahanBaku;
use Carbon\Carbon;

class BahanBakuController extends Controller
{
    /**
     * Menampilkan daftar semua bahan baku.
     */
    public function index()
{
    $bahanBakus = BahanBaku::all();

    $hariIni = Carbon::now()->startOfDay();

    foreach ($bahanBakus as $bahan) {
        $tanggalKadaluarsa = Carbon::parse($bahan->tanggal_kadaluarsa)->startOfDay();
        $selisihHari = $hariIni->diffInDays($tanggalKadaluarsa, false);

        if ($selisihHari < 0) {
            $bahan->status = 'Kadaluarsa';
        } elseif ($bahan->jumlah == 0) {
            $bahan->status = 'Habis';
        } elseif ($selisihHari <= 3) {
            $bahan->status = 'Segera Kadaluarsa';
        } else {
            $bahan->status = 'Tersedia';
        }
    }

    return view('gudang.bahanbaku.index', compact('bahanBakus'));
}

    /**
     * Menampilkan form untuk membuat bahan baku baru.
     */
    public function create()
    {
        return view('gudang.bahanbaku.create');
    }

    /**
     * Menyimpan bahan baku baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:120',
            'kategori' => 'required|string|max:60',
            'jumlah' => 'required|integer|min:0',
            'satuan' => 'required|string|max:20',
            'tanggal_masuk' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date|after_or_equal:tanggal_masuk',
        ]);

        BahanBaku::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
        ]);

        return redirect()->route('gudang.bahanbaku.index')->with('success', 'Bahan baku berhasil ditambahkan.');
    }

    public function edit(BahanBaku $bahanBaku)
    {
        return view('gudang.bahanbaku.edit', compact('bahanBaku'));
    }


    public function update(Request $request, BahanBaku $bahanBaku)
    {
        // Validasi: menolak jika nilai stok < 0
        $request->validate([
            'jumlah' => 'required|integer|min:0',
        ]);

        $bahanBaku->update([
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('gudang.bahanbaku.index')->with('success', 'Stok bahan baku berhasil diperbarui.');
    }

    /**
     * Menampilkan halaman konfirmasi penghapusan.
     */
    public function showDeleteConfirmation(BahanBaku $bahanBaku)
    {
        return view('gudang.bahanbaku.delete', compact('bahanBaku'));
    }

    /**
     * Menghapus data bahan baku dari database.
     */
    public function destroy(BahanBaku $bahanBaku)
    {
        // Aturan: Hanya boleh menghapus jika status 'Kadaluarsa'
        if ($bahanBaku->status !== 'Kadaluarsa') {
            return redirect()->route('gudang.bahanbaku.index')->with('error', 'Hanya bahan baku dengan status Kadaluarsa yang dapat dihapus.');
        }

        $bahanBaku->delete();

        return redirect()->route('gudang.bahanbaku.index')->with('success', 'Bahan baku berhasil dihapus.');
    }
}