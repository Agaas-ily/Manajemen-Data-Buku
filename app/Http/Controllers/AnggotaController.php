<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allanggota = Anggota::all();
        return view('anggota.index', compact('allanggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        Anggota::create($request->all());

        toast('Anggota berhasil ditambahkan','success');
        return redirect()->route('anggota.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        return view('anggota.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        $anggota->update($request->all());

        toast('Anggota berhasil diperbarui','success');
        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        toast('Anggota berhasil dihapus','success');
        return redirect()->route('anggota.index');
    }
}
