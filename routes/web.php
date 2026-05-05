<?php
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\FBukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AuthManualController;

Route::get('/', [FBukuController::class, 'index'])->name('homepage');
Route::get('/katalog/{buku}', [FBukuController::class, 'detail_buku'])->name('detail-buku');


Route::middleware('auth')->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('kategori', KategoriController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('peminjaman', PeminjamanController::class);
});

//route untuk login dan logout  
Route::get('/login', [AuthManualController::class, 'index'])->name('login');
Route::post('/login', [AuthManualController::class, 'loginProses'])->name('loginProses');
Route::post('/logout', [AuthManualController::class, 'logout'])->name('logoutProses');

//route untuk tes
Route::get('/tes', function () {
    return view('tes');
});