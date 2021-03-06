@extends('admin.admin')
<!-- form input data Buku -->
@section('content')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Buku</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('buku.index') }}"><i class="fas fa-book"></i> Buku</a></li>
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
        <form enctype="multipart/form-data" method="post" action="{{ route('buku.store') }}">
            @csrf
            <div class="form-group">
                <label for="inputct">Category Buku</label>
                <select id="inputct" class="form-control" name="category_id" required>
                    <option value=""> -- Select One --</option>
                    @foreach(App\Category::get() as $bk)
                    <option value='{{ $bk->id }}'>{{ $bk->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" name="judul" />
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" class="form-control" name="penerbit" />
            </div>
            <div class="form-group">
                <label>Penulis</label>
                <input type="text" class="form-control" name="penulis" />
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" name="jumlah" />
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control-file" name="foto" />
            </div>
            <div class="form-group">
                <label>Berkas PDF</label>
                <input type="file" class="form-control-file @error('pdf') is-invalid @enderror" name="pdf" />
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