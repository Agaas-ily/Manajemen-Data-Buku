<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPeminjaman = Peminjaman::all();
        return view('peminjaman.index', compact('allPeminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggota = \App\Models\Anggota::all();
        $bukus = \App\Models\Buku::all();
        return view('peminjaman.create', compact('anggota', 'bukus'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valData = $request->validate([
            'tanggal_pinjam' => 'required|date',
            'anggota_id' => 'required',
            'buku_ids' => 'required|array',
            'buku_ids.*' => 'exists:bukus,id',

        ]);
        $peminjaman = Peminjaman::create([
            'anggota_id' => $request->anggota_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status' => 'dipinjam',
           
        ]);
        $peminjaman->bukus()->attach($request->buku_ids);
        toast('Peminjaman berhasil ditambahkan','success');
        return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        $peminjaman->with('anggota', 'bukus')->findOrFail($peminjaman->id);
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'tanggal_kembali' => 'required|date']);
        $peminjaman->update([
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'dikembalikan',
        ]);
        toast('Peminjaman berhasil diperbarui','success');
        return redirect()->route('peminjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->bukus()->detach();
        $peminjaman->delete();
        toast('Peminjaman berhasil dihapus','success');
        return redirect()->route('peminjaman.index');
    }
}
