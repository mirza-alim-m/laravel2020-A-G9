<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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

        $category = Category::paginate(10);

        if($cari = $request->get('cari')){
            $category = Category::when($request->cari,function($query) use($request){
                $query -> where('name','like',"%{$request->cari}%")->orderBy('name');
            })->paginate(10);
            
            $category->appends($request->only('cari'));
            return view('category.index',['category' => $category]);

        }elseif($filter = $request->get('filter')){
            $category = Category::when($request->filter,function($query) use($request){
                $query -> where('name','like',"%{$request->filter}%")->orderBy('name');
            })->paginate(10);

            $category->appends($request->only('filter'));
            return view('category.index',['category' => $category]);
        }
        return view('category.index',['category' => $category]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name' => 'required'
        ]);
        $category = Category::create($validasi);

        return redirect('/category')->with('success', 'Selamat data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'name' => 'required'
        ]);
        Category::whereId($id)->update($validasi);

        return redirect('category')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/category')->with('success', 'Data berhasil dihapus!');
    }
}
