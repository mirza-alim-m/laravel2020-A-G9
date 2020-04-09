<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $cari = $request->nim or $request->cari;
        $filter = $request->name or $request->filter;

        $buku = Buku::paginate(10);

        if ($cari = $request->get('cari')) {
            $buku = Buku::where('category', 'like', "%" . $cari . "%")
                ->orWhere('judul', 'like', "%" . $cari . "%")
                ->orWhere('penerbit', 'like', "%" . $cari . "%")
                ->orWhere('penulis', 'like', "%" . $cari . "%")
                ->paginate(10);
            return view('buku.index', ['buku' => $buku]);
        } elseif ($filter = $request->get('filter')) {
            $buku = Buku::where('category', 'like', "%" . $filter . "%")->paginate(10);
            return view('buku.index', ['buku' => $buku]);
            // return view('buku.index', compact('buku'));
        }
        return view('buku.index', ['buku' => $buku]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
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
            'category' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'jumlah' => 'required',
            'penulis' => 'required',
        ]);
        $buku = Buku::create($validasi);

        return redirect('buku')->with('success', 'Selamat data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'category' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'jumlah' => 'required',
            'penulis' => 'required',
        ]);
        Buku::whereId($id)->update($validasi);

        return redirect('buku')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect('/buku')->with('success', 'Data berhasil dihapus!');
    }
}
