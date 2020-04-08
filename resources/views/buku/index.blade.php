@extends('buku.layout')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<p>Cari Data Buku :</p>
<form action="{{ route('buku.index') }}" method="GET" class="form-inline">

    <input type="text" name="cari" class="form-control mr-sm-12 mt-2 mr-2" autocomplete="off" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
    <select id="inputct" class="form-control mr-sm-12 mt-2 mr-2" name="filter">
        <option value="" selected="{{ old('filter') }}"> -- Semua --</option>
            @foreach(App\Category::get() as $bk)
        <option value='{{ $bk->name }}'>{{ $bk->name }}</option>
            @endforeach
    </select>
    <button type="submit" class="btn2 mr-sm-2 mt-2"><i class="fas fa-search"></i>Cari</button>
</form>
<div class="float-right">
<a href="{{ route('buku.create')}}" class="btn3 mr-sm-4 fa fa-plus-circle">Tambah Data</a></td><br><br>
</div>

<table class="table table-striped border">
    <thead>
        <tr>
            <td width="10%">Category</td>
            <td width="20%">Judul</td>
            <td width="30%">Penerbit</td>
            <td width="20%">Penulis</td>
            <td width="5%">Jumlah</td>
            <td width="5%" colspan="2">Opsi</td>
        </tr>
    </thead>
    <tbody>
        
        @foreach($buku as $bk)
        <tr>
            <td>{{$bk->category}}</td>
            <td>{{$bk->judul}}</td>
            <td>{{$bk->penerbit}}</td>
            <td>{{$bk->penulis}}</td>
            <td>{{$bk->jumlah}}</td>
            <td><a href="{{ route('buku.edit', $bk->id)}}" class="btn btn-warning fa fa-edit"> Edit</a></td>
            <td>
                <form action="{{ route('buku.destroy', $bk->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger fa fa-trash" type="submit" onclick="return alert('Apakah anda yakin?')"> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $buku->links() }}
@endsection