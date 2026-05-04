<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allpenerbit   = Penerbit::all();
        return view('penerbit.index', compact('allpenerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        toast('Penerbit berhasil ditambahkan','success');
        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data 
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|string|max:100',
        ]);

        // Simpan data ke database
        Penerbit::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penerbit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $penerbit)
    {
        return view('penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerbit $penerbit)
    {
        return view('penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerbit $penerbit)
    {
         // Validasi data 
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|string|max:100',
        ]);

        // Update data ke database
        $penerbit->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        toast('Penerbit berhasil diperbarui','success');
        return redirect()->route('penerbit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerbit $penerbit)
    {
        // Hapus data dari database
        $penerbit->delete();
        toast('Penerbit berhasil dihapus','success');
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penerbit.index');
    }
}
