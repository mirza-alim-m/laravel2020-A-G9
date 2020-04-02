@extends('peminjaman.layout')

@section('content')
<div class="card uper">
    <div class="card-header">
        Form Edit Data
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

        <form action="{{ route('peminjaman.update',$peminjaman->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
            <label for="inputct">Category Buku</label>
            <select id="inputct" class="form-control" name="judul" required>
                <option value="{{ $peminjaman->judul}}"> {{ $peminjaman->judul}}</option>
            @foreach(App\Peminjaman::get() as $bk)
                <option value='{{ $bk->judul }}'>{{ $bk->judul }}</option>
            @endforeach
            </select>
            </div>

            <div class="form-group">
                <label>NIM Peminjam</label>
                <input type="text" class="form-control" name="nim" value="{{ $peminjaman->nim }}" />
            </div>
            <div class="form-group">
                <label>Nama Peminjam</label>
                <input type="text" class="form-control" name="nama" value="{{ $peminjaman->nama }}" autocomplete="off" required/>
            </div>
            <div class="form-group">
                <label for="inputprodi">Prodi</label>
                <select id="inputprodi" class="form-control" name="prodi" required>
                    <option value="{{ $peminjaman->prodi}}">{{ $peminjaman->prodi}}</option>
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
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="text" class="form-control" name="tanggal" value="{{$peminjaman->tanggal}}" autocomplete="off" required/>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

    </form>
</div>
</div>
@endsection