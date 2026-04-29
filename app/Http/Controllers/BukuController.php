<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allbuku   = Buku::all();
        return view('buku.index', compact('allbuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.create', compact('penerbit','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data 
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'file_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        // upload file cover jika ada
        if ($request->hasFile('file_cover')) {
            $validatedData ['cover']= $request->file('file_cover')->store('cover', 'public');

        // hapus path 'public/' dari hasil penyimpanan file
        unset($validatedData['file_cover']);

        }
        // Simpan data ke database
        Buku::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'penerbit', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
         // Validasi data 
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
        ]);

        // Update data ke database
        $buku->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        // Hapus data dari database
        $buku->delete();
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index');
    }
}
