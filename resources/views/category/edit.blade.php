@extends('admin.admin')
<!-- form edit data Category -->
@section('content')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Buku</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('category.index') }}"><i class="fab fa-buffer"></i> Category</a></li>
      <li class="breadcrumb-item active"><i class="fa fa-edit"></i> Edit</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
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

    <form action="{{ route('category.update',$category->id) }}" method="POST">
      @csrf
      @method('PUT')

<<<<<<< HEAD
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}" />
            </div>
            <div class="form-group">
                <label>Ubah Foto</label>
                <input type="file" class="form-control-file" name="foto"/>
            </div>
            <div class="form-group">
                <label>Ubah Berkas Document</label>
                <input type="file" class="form-control-file" name="pdf"/>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
=======
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="name" value="{{ $category->name }}" />
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
  </form>
>>>>>>> 1c9364c050d1e0ffaae44dd30c34cb304603c07c
</div>
</div>
@endsection