<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'jmlKategori' => Kategori::count(),
            'jmlPenerbit' => Penerbit::count(),
            'jmlBuku' => Buku::count(),
            'jmlAnggota' => Anggota::count(),
            'jmlPeminjaman' => Peminjaman::count(),
        ];
    $kategoriLabels = Kategori::pluck('nama_kategori'); 
    $kategoriData = Kategori::withCount('buku')->pluck('buku_count');

    return view('admin.dashboard', compact('data', 'kategoriLabels', 'kategoriData'));
    }
}
