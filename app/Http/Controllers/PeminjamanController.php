<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use App\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index', compact('peminjaman'));

        $buku = Buku::all();
        return view('peminjaman.index', compact('peminjaman'));

        $peminjaman = Buku::find($id)->peminjaman;
        echo $peminjaman->judul;
        echo $peminjaman->nim;
        echo $peminjaman->nama;
        echo $peminjaman->prodi;
        echo $peminjaman->tanggal;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjaman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'tanggal' => 'required',
        ]);
        $peminjaman = Peminjaman::create($validasi);

        return redirect('/peminjaman')->with('success', 'Selamat data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        return view('peminjaman.edit', compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'judul' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'tanggal' => 'required',
        ]);
        Peminjaman::whereId($id)->update($validasi);

        return redirect('peminjaman')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect('/peminjaman')->with('success', 'Data berhasil dihapus!');
    }
}
