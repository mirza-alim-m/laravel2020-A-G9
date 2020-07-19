@extends('admin.admin')

@section('content')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Peminjaman</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('peminjaman.index') }}"><i class="fas fa-book-open"></i> Peminjaman</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-edit"></i> Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<div class="card uper">
    <div class="card-header">
        Form Tambah Data
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
        <form enctype="multipart/form-data" method="post" action="{{ route('peminjaman.store') }}">
            @csrf
            <!-- <div class="form-group">
                <label>Nama Buku</label>
                <input type="text" class="form-control" name="nama_buku" autocomplete="off" onkeypress="return hanyaAngka(event)" required/>
            </div> -->
            <div class="form-group">
                <label for="inputjk">Nama Buku</label>
                <select id="inputjk" class="form-control" name="buku_id" required>
                    <option value=""> -- Select One --</option>
                    @foreach(App\Buku::get() as $bk)
                    <option value='{{ $bk->id }}'>{{ $bk->judul}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>NIM Peminjam</label>
                <input type="text" class="form-control" name="nim" autocomplete="off" required />
            </div>
            <div class="form-group">
                <label>Nama Peminjam</label>
                <input type="text" class="form-control" name="nama" autocomplete="off" required />
            </div>
            <div class="form-group">
                <label for="inputprodi">Prodi</label>
                <select id="inputprodi" class="form-control" name="prodi" required>
                    <option disabled="disabled">Pilih</option>
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
                <input type="text" class="form-control" name="tanggal" value="{{Carbon\Carbon::now()->toDateTimeString()}}" autocomplete="off" required />
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control-file" name="foto"/>
            </div>
            <div class="form-group">
                <label>Berkas Document</label>
                <input type="file" class="form-control-file @error('pdf') is-invalid @enderror" name="pdf"/>
                @error('pdf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>
@endsection

<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>