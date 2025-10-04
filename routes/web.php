<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Gudang\DashboardController as GudangDashboardController;
use App\Http\Controllers\Dapur\DashboardController as DapurDashboardController;
use App\Http\Controllers\Gudang\BahanBakuController as BahanBakuController;




Route::get('/', function () {
    // $user = Auth::user(); 
    // dd($user->role); 

    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    // dd($user->role); 
    if ($user->role === 'gudang'){
        return redirect()->route('gudang.dashboard');
    }else{
        return redirect()->route('dapur.dashboard');
    }
        
    return view('/');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Grup Rute Khusus GUDANG
    Route::middleware('role:gudang')->prefix('gudang')->name('gudang.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Gudang\DashboardController::class, 'index'])->name('dashboard');


        
        Route::get('/permintaan', [\App\Http\Controllers\Gudang\PermintaanController::class, 'index'])->name('permintaan.index');
        Route::get('/permintaan/{permintaan}', [\App\Http\Controllers\Gudang\PermintaanController::class, 'show'])->name('permintaan.show');
        Route::post('/permintaan/{permintaan}/approve', [\App\Http\Controllers\Gudang\PermintaanController::class, 'approve'])->name('permintaan.approve');
        Route::post('/permintaan/{permintaan}/reject', [\App\Http\Controllers\Gudang\PermintaanController::class, 'reject'])->name('permintaan.reject');
        
        
        Route::get('/bahan-baku', [BahanBakuController::class, 'index'])->name('bahanbaku.index');
        Route::get('/bahan-baku/create', [BahanBakuController::class, 'create'])->name('bahanbaku.create');
        Route::post('/bahan-baku', [BahanBakuController::class, 'store'])->name('bahanbaku.store');
    
         Route::get('/bahan-baku/{bahanBaku}/edit', [BahanBakuController::class, 'edit'])->name('bahanbaku.edit');
        Route::put('/bahan-baku/{bahanBaku}', [BahanBakuController::class, 'update'])->name('bahanbaku.update');
        Route::get('/bahan-baku/{bahanBaku}/delete', [BahanBakuController::class, 'showDeleteConfirmation'])->name('bahanbaku.delete.show');
        Route::delete('/bahan-baku/{bahanBaku}', [BahanBakuController::class, 'destroy'])->name('bahanbaku.destroy');
    
    });

    
        

    // Grup Rute Khusus DAPUR
    Route::middleware('role:dapur')->prefix('dapur')->name('dapur.')->group(function () {
         Route::get('/dashboard', [\App\Http\Controllers\Dapur\DashboardController::class, 'index'])->name('dashboard');

        
        Route::get('/permintaan/create', [\App\Http\Controllers\Dapur\PermintaanController::class, 'create'])->name('permintaan.create');
        Route::post('/permintaan', [\App\Http\Controllers\Dapur\PermintaanController::class, 'store'])->name('permintaan.store');
        Route::get('/permintaan/history', [\App\Http\Controllers\Dapur\PermintaanController::class, 'history'])->name('permintaan.history');
    });



});

require __DIR__.'/auth.php';