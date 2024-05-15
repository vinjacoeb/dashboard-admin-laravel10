<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', [
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
        'nama_kategori' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        ])->validate();

        $kategori = new Kategori($validatedData);
        $kategori->save();

        return redirect(route('daftarKategori'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id); 
        return view('kategori.edit', [
        'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = validator($request->all(), [
        'nama_kategori' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        ])->validate();

        $kategori = Kategori::findOrFail($id); 

        $kategori->update([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi'     => $request->deskripsi
        ]);

        return redirect(route('daftarKategori'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect(route('daftarKategori'))->with('success', 'Data Berhasil Di hapus');
    }
}
