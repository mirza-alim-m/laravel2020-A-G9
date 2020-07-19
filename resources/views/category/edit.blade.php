@extends('admin.admin')

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

        <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
</div>
</div>
@endsection