@extends('peminjaman.layout')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<p>Cari Data Peminjam :</p>
<form action="{{ route('peminjaman.index') }}" method="GET" class="row mb-4">
<div class="col-md-2">
        <input type="text" name="cari" class="form-control" placeholder="Cari nama .." value="{{ old('cari') }}">
    </div>
    <button type="submit" class="btn2 mr-sm-2"><i class="fas fa-search"></i>Cari</button>
</form>
<div class="float-right">
<a href="{{ route('peminjaman.create')}}" class="btn3 mr-sm-4 fa fa-plus-circle">Tambah Data</a></td><br><br>
</div>

<table class="table table-striped border">
    <thead>
        <tr>
            <td width="5%">No</td>
            <td width="10%">Nama Buku</td>
            <td width="10%">NIM</td>
            <td width="30%">Nama Peminjam</td>
            <td width="15%">Prodi</td>
            <td width="15%">Tanggal</td>
            <td width="5%" colspan="2">Opsi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0;?>
        @foreach($peminjaman as $bk)
        <?php $no++ ;?>
        <tr>
            <td>{{$no}}</td>
            <td>{{$bk->nama_buku}}</td>
            <td>{{$bk->nim_peminjam}}</td>
            <td>{{$bk->nama_peminjam}}</td>
            <td>{{$bk->prodi}}</td>
            <td>{{$bk->tanggal}}</td>
            <td><a href="{{ route('peminjaman.edit', $bk->id)}}" class="btn btn-warning fa fa-edit"> Edit</a></td>
            <td>
                <form action="{{ route('peminjaman.destroy', $bk->id)}}" method="post">
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