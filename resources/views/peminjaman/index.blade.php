@extends('peminjaman.layout')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<p>Cari Data Peminjam :</p>
<form action="{{ route('peminjaman.index') }}" method="GET" class="form-inline">

    <input type="text" name="cari" class="form-control mr-sm-12 mt-2 mr-2" autocomplete="off" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
    <select id="inputct" class="form-control mr-sm-12 mt-2 mr-2" name="filter">
        <option value="" selected="{{ old('filter') }}">Semua</option>
        <option value="D3 Kebidanan">D3 Kebidanan</option>
        <option value="D3 Farmasi">D3 Farmasi</option>
        <option value="D3 Akuntansi">D3 Akuntansi</option>
        <option value="D3 Teknik Komputer">D3 Teknik Komputer</option>
        <option value="D3 Teknik Elektronika">D3 Teknik Elektronika</option>
        <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
        <option value="D3 Perhotelan">D3 Perhotelan</option>
        <option value="D3 Desain Komunikasi Visual">D3 Desain Komunikasi Visual</option>
        <option value="D4 Teknik Informatika">D4 Teknik Informatika</option>
        <option value="D4 Akuntansi Sektor Publik">D4 Akuntansi Sektor Publik</option>

    </select>
    <button type="submit" class="btn2 mr-sm-2 mt-2"><i class="fas fa-search"></i>Cari</button>
</form>
<div class="float-right">
    <a href="{{ route('peminjaman.create')}}" class="btn3 mr-sm-4 fa fa-plus-circle">Tambah Data</a></td><br><br>
</div>

<table class="table table-striped border">
    <thead>
        <tr>
            <td width="20%">@sortablelink('buku_id','Nama Buku')</td>
            <td width="10%">@sortablelink('nim')</td>
            <td width="25%">@sortablelink('nama','Nama Peminjam')</td>
            <td width="15%">@sortablelink('prodi')</td>
            <td width="15%">@sortablelink('tanggal')</td>
            <td width="5%" colspan="2">Opsi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($peminjaman as $bk)
        <tr>
            <td>{{$bk->buku->judul}}</td>
            <td>{{$bk->nim}}</td>
            <td>{{$bk->nama}}</td>
            <td>{{$bk->prodi}}</td>
            <td>{{$bk->tanggal}}</td>
            <td><a href="" class="btn btn-info" data-toggle="modal" data-target="#myModal-{{ $bk->id }}">View</a></td>
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
<!-- {!! $peminjaman->appends(\Request::except('page'))->render() !!} -->
{{ $peminjaman->links() }}

@foreach($peminjaman as $data)
<div id="myModal-{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h4 class="modal-title">Data Peminjaman</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- body modal -->

            <div class="modal-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Buku</th>
                                        <td>{{ $data->buku->judul }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIM</th>
                                        <td>{{ $data->nim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $data->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Prodi</th>
                                        <td>{{ $data->prodi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td>{{ $data->tanggal }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection