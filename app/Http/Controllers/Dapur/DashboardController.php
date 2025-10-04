<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalPermintaan = Permintaan::where('pemohon_id', $userId)->count();
        $permintaanDisetujui = Permintaan::where('pemohon_id', $userId)->where('status', 'disetujui')->count();
        $permintaanDitolak = Permintaan::where('pemohon_id', $userId)->where('status', 'ditolak')->count();

        return view('dapur.dashboard', compact('totalPermintaan', 'permintaanDisetujui', 'permintaanDitolak'));
    }
}