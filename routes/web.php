<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Gudang\DashboardController as GudangDashboardController;
use App\Http\Controllers\Dapur\DashboardController as DapurDashboardController;



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
        Route::get('/dashboard', function () {
            return view('gudang.dashboard');
        })->name('dashboard');
    });

    // Grup Rute Khusus DAPUR
    Route::middleware('role:dapur')->prefix('dapur')->name('dapur.')->group(function () {
        Route::get('/dashboard', function () {
            return view('dapur.dashboard');
        })->name('dashboard');
    });
});

require __DIR__.'/auth.php';