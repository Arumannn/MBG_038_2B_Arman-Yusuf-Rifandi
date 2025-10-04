<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\Permintaan;
use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{
    /**
     * Menampilkan daftar semua permintaan bahan.
     */
    public function index()
    {
        $permintaans = Permintaan::with('pemohon', 'details.bahanBaku')
                                 ->latest()
                                 ->get();
                                 
        return view('gudang.permintaan.index', compact('permintaans'));
    }
     public function show(Permintaan $permintaan)
    {
        $permintaan->load('pemohon', 'details.bahanBaku');

        return view('gudang.permintaan.show', compact('permintaan'));
    }

     public function approve(Permintaan $permintaan)
    {
        DB::beginTransaction();

        try {
            // Cek setiap bahan yang diminta
            foreach ($permintaan->details as $detail) {
                $bahanBaku = $detail->bahanBaku;

                // Periksa apakah stok mencukupi
                if ($bahanBaku->jumlah < $detail->jumlah_diminta) {
                    DB::rollBack();
                    return redirect()->route('gudang.permintaan.show', $permintaan->id)
                                     ->with('error', 'Gagal! Stok untuk ' . $bahanBaku->nama . ' tidak mencukupi.');
                }

                // Kurangi stok
                $bahanBaku->jumlah -= $detail->jumlah_diminta;
                $bahanBaku->save();
            }

            // Jika semua bahan berhasil diproses, ubah status permintaan
            $permintaan->status = 'disetujui';
            $permintaan->save();

            // Konfirmasi semua perubahan ke database
            DB::commit();

            return redirect()->route('gudang.permintaan.index')
                             ->with('success', 'Permintaan #' . $permintaan->id . ' berhasil disetujui.');

        } catch (\Exception $e) {
            // Jika terjadi error lain, batalkan semua proses
            DB::rollBack();
            return redirect()->route('gudang.permintaan.show', $permintaan->id)
                             ->with('error', 'Terjadi kesalahan saat memproses permintaan.');
        }
    }

    /**
     * Menolak permintaan.
     */
    public function reject(Permintaan $permintaan)
    {
        $permintaan->status = 'ditolak';
        $permintaan->save();

        return redirect()->route('gudang.permintaan.index')
                         ->with('success', 'Permintaan #' . $permintaan->id . ' telah ditolak.');
    }
}