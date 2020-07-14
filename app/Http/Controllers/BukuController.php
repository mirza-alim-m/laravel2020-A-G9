<?php

namespace App\Http\Controllers;


use App\Buku;
use App\Category;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Http\Request;
use Storage;


class BukuController extends Controller
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

        $buku = Buku::sortable()->orderBy('judul')->paginate(10);


        if ($cari = $request->get('cari')) {
            $buku = Buku::when($request->cari, function ($query) use ($request) {
                $query->where('category_id', 'like', "%{$request->cari}%")
                    ->orWhere('judul', 'like', "%{$request->cari}%")
                    ->orWhere('penerbit', 'like', "%{$request->cari}%")
                    ->orWhere('penulis', 'like', "%{$request->cari}%")->sortable()->orderBy('judul');
            })->paginate(10);

            $buku->appends($request->only('cari'));

            return view('buku.index', ['buku' => $buku]);

        } elseif ($filter = $request->get('filter')) {
            $buku = Buku::when($request->filter, function ($query) use ($request) {
                $query->where('category_id', 'like', "%%{$request->filter}")->sortable()->orderBy('judul');
            })->paginate(10);

            $buku->appends($request->only('filter'));

            return view('buku.index', ['buku' => $buku]);
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
        $this->validate($request, [
            'category_id' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'jumlah' => 'required',
            'penulis' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png,gif',
            'pdf' => 'mimes:pdf,doc,docx,ppt,pptx'

            ]);
        //mengambil request gambar dengan nama asli
        $image = $request->file('foto')->getClientOriginalName(); // baru, 'gambar' adalah name dari inputan
        $foto = $request->file('foto')->storeAs('buku',$image);

        $pdf = $request->file('pdf')->getClientOriginalName(); // baru, 'gambar' adalah name dari inputan
        $doc = $request->file('pdf')->storeAs('document/buku',$pdf);

        //mengambil request gambar dengan nama asli
        $buku = Buku::create([
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'jumlah' => $request->jumlah,
            'penulis' => $request->penulis,
            'foto' => $foto,
            'pdf' => $doc
            ]);
            


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
        $this->validate($request, [
            'category_id' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'jumlah' => 'required',
            'penulis' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png,gif',
            'pdf' => 'mimes:pdf,doc,docx,ppt,pptx'
        ]);

        $buku = Buku::findOrfail($id);
        $foto = $buku->foto;
        $pdf = $buku->pdf;
        
         //update dan save gambar ke folder storage creators
         if ($request->foto) {
            Storage::delete($buku->foto);
            //mengambil request gambar dengan nama asli
            $image = $request->file('foto')->getClientOriginalName();
            $foto = $request->file('foto')->storeAs('buku', $image);
         } //baru
         if ($request->pdf) {
            Storage::delete($buku->pdf);
            //mengambil request gambar dengan nama asli
            $pdf = $request->file('pdf')->getClientOriginalName(); // baru, 'pdf' adalah name dari inputan
            $doc = $request->file('pdf')->storeAs('document/buku',$pdf);
         } //baru
         $buku->update([
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'jumlah' => $request->jumlah,
            'penulis' => $request->penulis,
            'foto' => $foto,
            'pdf' => $doc
            ]);


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
        if ($buku->foto) {
            Storage::delete($buku->foto);
        }
        if ($buku->pdf) {
            Storage::delete($buku->pdf);
        }
        $buku->delete();

        return redirect('/buku')->with('success', 'Data berhasil dihapus!');
    }
}
