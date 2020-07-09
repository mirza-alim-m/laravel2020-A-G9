@extends('admin.admin')

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

        <form action="{{ route('buku.update',$buku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="inputct">Category Buku</label>
                <select id="inputct" class="form-control" name="category_id" required=>
                    <option value="{{ $buku->category_id}}"> {{ $buku->category->name}}</option>
                    @foreach(App\Category::get() as $bk)
                    <option value='{{ $bk->id }}'>{{ $bk->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="{{ $buku->judul }}" />
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" class="form-control" name="penerbit" value="{{ $buku->penerbit }}" />
            </div>
            <div class="form-group">
                <label>Penulis</label>
                <input type="text" class="form-control" name="penulis" value="{{ $buku->penulis}}" />
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" name="jumlah" value="{{ $buku->jumlah}}" />
            </div>
            <div class="form-group">
                <label>Ubah Foto</label>
                <input type="file" class="form-control-file" name="foto"/>
            </div>
            <div class="form-group">
                <label>Ubah Document</label>
                <input type="file" class="form-control-file" name="pdf"/>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

    </form>
</div>
</div>
@endsection