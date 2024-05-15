<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $artikels = Artikel::all();
    return view('artikel.index', [
    'artikels' => $artikels
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = \App\Models\Kategori::all();
        return view('artikel.create', [
        'kategoris' => $kategoris
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'id_kategori' => 'required|integer',
            'gambar'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul'     => 'required|min:5',
            'deskripsi'   => 'required|min:10'
        ]);

        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/artikels', $gambar->hashName());

        //create artikel
        Artikel::create([
            'id_kategori' => $request->id_kategori,
            'gambar'     => $gambar->hashName(),
            'judul'     => $request->judul,
            'deskripsi'   => $request->deskripsi
        ]);

        //redirect to index
        return redirect(route('daftarArtikel'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoris = \App\Models\Kategori::all();
        $artikel= Artikel::findOrFail($id); 
        return view('artikel.edit', [
            'artikel' => $artikel,
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validasi form
        $this->validate($request, [
            'id_kategori' => 'required|integer',
            'gambar'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'judul'     => 'required|min:5',
            'deskripsi'   => 'required|min:10'
        ]);

        //untuk mengambil ID Artikel
        $artikel = Artikel::findOrFail($id);

        //Cek apabila gambar akan di upload
        if ($request->hasFile('gambar')) {

            //upload gambar baru
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/artikels', $gambar->hashName());

            //hapus gambar lama
            Storage::delete('public/artikels/' . $artikel->gambar);

            //update artikel dengan gambar baru
            $artikel->update([
                'id_kategori' => $request->id_kategori,
                'gambar'     => $gambar->hashName(),
                'judul'     => $request->judul,
                'deskripsi'   => $request->deskripsi
            ]);
        } else {

            //update artikel tanpa gambar
            $artikel->update([
                'id_kategori' => $request->id_kategori,
                'judul'     => $request->judul,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        //mengarahkan ke halaman index artikel
        return redirect(route('daftarArtikel'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $artikel = Artikel::findOrFail($id);

    Storage::delete('public/artikels/'. $artikel->gambar);

    $artikel->delete();
    return redirect(route('daftarArtikel'))->with('success', 'Data Berhasil Di hapus');
}
}
