@extends('member.layout')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif

<p>Cari Data Anggota :</p>

<form action="{{ route('member.index') }}" method="GET" class="form-inline">

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
<a href="{{ route('member.create')}}" class="btn3 mr-sm-4 fa fa-plus-circle">Tambah Data</a></td><br><br>
</div>
<table class="table table-striped border">
    <thead>
        <tr>
            <td width="10%">NIM</td>
            <td width="35%">Nama</td>
            <td width="10%">Jenis Kelamin</td>
            <td width="15%">Prodi</td>
            <td width="5%" colspan="2">Opsi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($member as $bk)
        
        <tr>
            <td>{{$bk->nim}}</td>
            <td>{{$bk->nama}}</td>
            <td>{{$bk->jk}}</td>
            <td>{{$bk->prodi}}</td>
            <td><a href="{{ route('member.edit', $bk->id)}}" class="btn btn-warning fa fa-edit"> Edit</a></td>
            <td>
                <form action="{{ route('member.destroy', $bk->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger fa fa-trash" type="submit" onclick="return alert('Apakah anda yakin?')"> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    <!-- Halaman : {{ $member->currentPage() }} <br/>
	Jumlah Data : {{ $member->total() }} <br/>
	Data Per Halaman : {{ $member->perPage() }} <br/> -->

{{ $member->links() }}
@endsection