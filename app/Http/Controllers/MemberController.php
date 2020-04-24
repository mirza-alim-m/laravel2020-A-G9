<?php

namespace App\Http\Controllers;

use Kyslik\ColumnSortable\Sortable;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Storage;


class MemberController extends Controller
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

        // $collection = App\Member::orderBy('nama')->get();

        $member = Member::sortable()->orderBy('nim')->paginate(10);

        if ($cari = $request->get('cari')) {
            $member = Member::when($request->cari,function($query) use($request){
                $query -> where('nim','like',"%{$request->cari}%")
                ->orWhere('nama','like',"%{$request->cari}%")
                ->orWhere('jk','like',"%{$request->cari}%")
                ->orWhere('prodi','like',"%{$request->cari}%")->sortable()->orderBy('nim');
            })->paginate(10);
            
            $member->appends($request->only('cari'));
            
            return view('member.index',['member' => $member]);

        } elseif ($filter = $request->get('filter')) {
            $member = Member::when($request->filter,function($query) use($request){
                $query -> where('prodi','like',"%{$request->filter}%")->sortable()->orderBy('nim');
            })->paginate(10);
    
            $member->appends($request->only('filter'));
            
            return view('member.index',['member' => $member]);
            
        }
        return view('member.index', ['member' => $member]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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
            'nim' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'prodi' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png,gif',
            'pdf' => 'mimes:pdf'

            ]);
        //mengambil request gambar dengan nama asli
        $image = $request->file('foto')->getClientOriginalName(); // baru, 'gambar' adalah name dari inputan
        $foto = $request->file('foto')->storeAs('member',$image);

        $pdf = $request->file('pdf')->getClientOriginalName(); // baru, 'gambar' adalah name dari inputan
        $doc = $request->file('pdf')->storeAs('document',$pdf);

        //mengambil request gambar dengan nama asli
        $member = Member::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'prodi' => $request->prodi,
            'foto' => $foto,
            'pdf' => $doc
            ]);

        return redirect('member')->with('success', 'Selamat data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'prodi' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,gif',// baru 'gambar' adalah name dari input foto crud
            'pdf' => 'mimes:pdf',
        ]);

        $member = Member::findOrfail($id);
        $foto = $member->foto;
        $pdf = $member->pdf;
        
         //update dan save gambar ke folder storage creators
         if ($request->foto) {
            Storage::delete($member->foto);
            //mengambil request gambar dengan nama asli
            $image = $request->file('foto')->getClientOriginalName();
            $foto = $request->file('foto')->storeAs('member', $image);
         } //baru
         if ($request->pdf) {
            Storage::delete($member->pdf);
            //mengambil request gambar dengan nama asli
            $pdf = $request->file('pdf')->getClientOriginalName(); // baru, 'pdf' adalah name dari inputan
            $doc = $request->file('pdf')->storeAs('document',$pdf);
         } //baru
         $member->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'prodi' => $request->prodi,
            'foto' => $foto,
            'pdf' => $pdf,
            ]);

        return redirect('member')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        if ($member->foto) {
            Storage::delete($member->foto);
        }
        if ($member->pdf) {
            Storage::delete($member->pdf);
        }
        $member->delete();

        return redirect('/member')->with('success', 'Data berhasil dihapus!');
    }
}
