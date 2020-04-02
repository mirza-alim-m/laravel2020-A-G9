@extends('buku.layout')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<p>Cari Data Buku :</p>
<form action="{{ route('buku.index') }}" method="GET" class="row mb-4">
<div class="col-md-2">
        <input type="text" name="cari" class="form-control" placeholder="Cari nama .." value="{{ old('cari') }}">
    </div>
    <button type="submit" class="btn2 mr-sm-2"><i class="fas fa-search"></i>Cari</button>
</form>
<div class="float-right">
<a href="{{ route('buku.create')}}" class="btn3 mr-sm-4 fa fa-plus-circle">Tambah Data</a></td><br><br>
</div>

<table class="table table-striped border">
    <thead>
        <tr>
            <td width="5%">No</td>
            <td width="10%">Category</td>
            <td width="20%">Judul</td>
            <td width="30%">Penerbit</td>
            <td width="20%">Penulis</td>
            <td width="5%">Jumlah</td>
            <td width="5%" colspan="2">Opsi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0;?>
        @foreach($buku as $bk)
        <?php $no++ ;?>
        <tr>
            <td>{{$no}}</td>
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
@endsection