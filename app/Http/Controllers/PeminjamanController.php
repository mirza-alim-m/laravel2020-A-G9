<?php

namespace App\Http\Controllers;

use Kyslik\ColumnSortable\Sortable;
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
        $cari = $request->cari or $request->cari;
        $filter = $request->filter or $request->filter;

        $peminjaman = Peminjaman::sortable()->paginate(10);
        

        if ($cari = $request->get('cari')) {
            $peminjaman = Peminjaman::when($request->cari, function ($query) use ($request) {
                $query -> where('buku_id', 'like', "%{$request->cari}%")
                    ->orWhere('nim', 'like', "%{$request->cari}%")
                    ->orWhere('nama', 'like', "%{$request->cari}%")
                    ->orWhere('prodi', 'like', "%{$request->cari}%")
                    ->orWhere('tanggal', 'like', "%{$request->cari}%")->sortable()->orderBy('tanggal');
            })->paginate(10);

            $peminjaman->appends($request->only('cari'));

            return view('peminjaman.index', ['peminjaman' => $peminjaman]);
        } elseif ($filter = $request->get('filter')) {
            $peminjaman = Peminjaman::when($request->filter, function ($query) use ($request) {
                $query->where('prodi', 'like', "%{$request->filter}%")->sortable()->orderBy('tanggal');
            })->paginate(10);

            $peminjaman->appends($request->only('filter'));
            return view('peminjaman.index', ['peminjaman' => $peminjaman]);
        }
        return view('peminjaman.index', ['peminjaman' => $peminjaman]);
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
            'buku_id' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'tanggal' => 'required',
        ]);
        $peminjaman = Peminjaman::create($validasi);

        return redirect('peminjaman')->with('success', 'Selamat data berhasil ditambah!');
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
            'buku_id' => 'required',
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
