<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BahanBaku;
use App\Models\Permintaan;
use App\Models\PermintaanDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{
    public function create()
    {
        $bahanBakus = BahanBaku::where('jumlah', '>', 0)
                                ->where('status', '!=', 'Kadaluarsa')
                                ->get();

        return view('dapur.permintaan.create', compact('bahanBakus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_masak' => 'required|date|after_or_equal:today',
            'menu_makan' => 'required|string|max:255',
            'jumlah_porsi' => 'required|integer|min:1',
            'bahan_baku' => 'required|array|min:1',
            'bahan_baku.*.id' => 'required|exists:bahan_baku,id',
            'bahan_baku.*.jumlah' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $permintaan = Permintaan::create([
                'pemohon_id' => Auth::id(),
                'tgl_masak' => $request->tgl_masak,
                'menu_makan' => $request->menu_makan,
                'jumlah_porsi' => $request->jumlah_porsi,
                'status' => 'menunggu',
            ]);

            foreach ($request->bahan_baku as $bahan) {
                PermintaanDetail::create([
                    'permintaan_id' => $permintaan->id,
                    'bahan_id' => $bahan['id'],
                    'jumlah_diminta' => $bahan['jumlah'],
                ]);
            }
        });

        return redirect()->route('dapur.dashboard')->with('success', 'Permintaan bahan baku berhasil diajukan.');
    }

   
}