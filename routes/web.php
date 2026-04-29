<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kategori', App\Http\Controllers\KategoriController::class) ->middleware('auth');
Route::resource('penerbit', App\Http\Controllers\PenerbitController::class) ->middleware('auth');
Route::resource('buku', App\Http\Controllers\BukuController::class) ->middleware('auth');

//route untuk login dan logout  
Route::get('/login', [App\Http\Controllers\AuthManualController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthManualController::class, 'loginProses'])->name('loginProses');
Route::post('/logout', [App\Http\Controllers\AuthManualController::class, 'logout'])->name('logoutProses');
