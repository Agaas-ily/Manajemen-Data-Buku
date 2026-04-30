<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allbuku = Buku::all();
        return view('buku.index', compact('allbuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.create', compact('penerbit', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'judul'        => 'required|max:255',
            'pengarang'    => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id'  => 'required',
            'penerbit_id'  => 'required',
            'file_cover'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload file cover jika ada
        if ($request->hasFile('file_cover')) {
            $validatedData['cover'] = $request->file('file_cover')->store('cover', 'public');
        }

        // Hapus key file_cover dari validated data
        unset($validatedData['file_cover']);

        // Simpan data ke database
        Buku::create($validatedData);

        // Redirect ke halaman index
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
            'judul'        => 'required|max:255',
            'pengarang'    => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id'  => 'required',
            'penerbit_id'  => 'required',
            'file_cover'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload file cover jika ada
        if ($request->hasFile('file_cover')) {
            $validatedData['cover'] = $request->file('file_cover')->store('cover', 'public');

            // Hapus file cover lama jika ada
            if ($request->input('cover_lama')) {
                Storage::delete('public/' . $request->input('cover_lama'));
            }
        }

        // Hapus key file_cover dari validated data
        unset($validatedData['file_cover']);

        // Update data ke database
        $buku->update($validatedData);

        // Redirect ke halaman index
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        // Hapus file cover jika ada
        if ($buku->cover && Storage::exists('public/' . $buku->cover)) {
            Storage::delete('public/' . $buku->cover);
        }

        // Hapus data dari database
        $buku->delete();

        // Redirect ke halaman index
        return redirect()->route('buku.index');
    }
}