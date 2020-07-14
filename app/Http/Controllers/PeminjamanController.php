<?php

namespace App\Http\Controllers;

use Kyslik\ColumnSortable\Sortable;
use App\Peminjaman;
use App\Buku;
use Illuminate\Http\Request;
use Storage;

class PeminjamanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }
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
        $this->validate($request, [
            'buku_id' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png,gif',
            'pdf' => 'mimes:pdf,doc,docx,ppt,pptx'
        ]);
        $image = $request->file('foto')->getClientOriginalName(); // baru, 'gambar' adalah name dari inputan
        $foto = $request->file('foto')->storeAs('peminjaman',$image);

        $pdf = $request->file('pdf')->getClientOriginalName(); // baru, 'gambar' adalah name dari inputan
        $doc = $request->file('pdf')->storeAs('document/peminjaman',$pdf);

        $peminjaman = Peminjaman::create([
            'buku_id' => $request->buku_id,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'tanggal' => $request->tanggal,
            'foto' => $foto,
            'pdf' => $doc
            ]);            
            
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
    //
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'buku_id' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png,gif',
            'pdf' => 'mimes:pdf,doc,docx,ppt,pptx'
        ]);
        $peminjaman = Peminjaman::findOrfail($id);
        $foto = $peminjaman->foto;
        $pdf = $peminjaman->pdf;
        if ($request->foto) {
            Storage::delete($peminjaman->foto);
            //mengambil request gambar dengan nama asli
            $image = $request->file('foto')->getClientOriginalName();
            $foto = $request->file('foto')->storeAs('peminjaman', $image);
        } //baru
        if ($request->pdf) {
            Storage::delete($peminjaman->pdf);
            //mengambil request gambar dengan nama asli
            $pdf = $request->file('pdf')->getClientOriginalName(); // baru, 'pdf' adalah name dari inputan
            $doc = $request->file('pdf')->storeAs('document/peminjaman',$pdf);
        } //baru
        $peminjaman->update([
            'buku_id' => $request->buku_id,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'tanggal' => $request->tanggal,
            'foto' => $foto,
            'pdf' => $doc
            ]);

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
        $peminjaman = Peminjaman::findOrfail($id);
        if ($request->foto) {
            Storage::delete($peminjaman->foto);
        }
        if ($request->pdf) {
            Storage::delete($peminjaman->pdf);
        }
        $peminjaman->delete();

        return redirect('/peminjaman')->with('success', 'Data berhasil dihapus!');
    }
}
