<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
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

        // $collection = App\Member::orderBy('nama')->get();

        $member = Member::paginate(10);

        if($cari = $request->get('cari')){
            $member = Member::where('nim','like',"%".$cari."%")
            ->orWhere('nama','like',"%".$cari."%")
            ->orWhere('prodi','like',"%".$cari."%")
            ->paginate(10);
            return view('member.index',['member' => $member]);
            
        }elseif($filter = $request->get('filter')){
            $member = Member::where('prodi','like',"%".$filter."%")->paginate(10);
            return view('member.index',['member' => $member]);
            // return view('member.index', compact('member'));
        }
        return view('member.index',['member' => $member]);
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
        $validasi = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'prodi' => 'required',
        ]);
        $member = Member::create($validasi);

        return redirect('/member')->with('success', 'Selamat data berhasil ditambah!');
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
        $validasi = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'prodi' => 'required',
        ]);
        Member::whereId($id)->update($validasi);

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
        $member->delete();

        return redirect('/member')->with('success', 'Data berhasil dihapus!');
    }
}
