<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Penerbit;

class FBukuController extends Controller
{
    public function index()
    {

        $query = Buku::query();
        if (request()->has('kategori') && request('kategori') != '') {
            $query->where('kategori_id', request('kategori'));
        }
        if (request()->has('penerbit')  && request('penerbit') != ''){
            $query->where('penerbit_id', request('penerbit'));
        }
        if (request()->has('search')) {
            $query->where(function($query) {
                $query->where('judul', 'like', '%' . request('search') . '%')
                        ->orWhere('pengarang', 'like', '%' . request('search') . '%');
                    });
            
        }

        $buku = $query->paginate(12);
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
         return view('frontend.index', compact('buku', 'kategori', 'penerbit'));
    }

    public function detail_buku(Buku $buku)
    {
        return view('frontend.detail_buku', compact('buku'));
    } 
}
