<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\BahanBaku;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBahanBaku = BahanBaku::count();
        $segeraKadaluarsa = BahanBaku::where('status', 'segera_kadaluarsa')->count();
        $permintaanMenunggu = Permintaan::where('status', 'menunggu')->count();

        return view('gudang.dashboard', compact('totalBahanBaku', 'segeraKadaluarsa', 'permintaanMenunggu'));
    }
}