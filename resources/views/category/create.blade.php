@extends('admin.admin')
<!-- form input data Category -->
@section('content')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Buku</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('category.index') }}"><i class="fab fa-buffer"></i> Category</a></li>
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

<<<<<<< HEAD
        <form method="post" action="{{ route('category.store') }}">
            @csrf
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="name" autocomplete="off" required />
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
=======
    <form method="post" action="{{ route('category.store') }}">
      @csrf
      <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" name="name" autocomplete="off" required />
      </div>
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
  </div>
>>>>>>> 1c9364c050d1e0ffaae44dd30c34cb304603c07c
</div>
@endsection