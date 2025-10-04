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
}