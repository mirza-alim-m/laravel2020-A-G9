@extends('buku.layout')

@section('content')
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
        <form method="post" action="{{ route('buku.store') }}">
            @csrf
            <div class="form-group">
            <label for="inputct">Category Buku</label>
            <select id="inputct" class="form-control" name="category" required>
                <option value=""> -- Select One --</option>
            @foreach(App\Category::get() as $bk)
                <option value='{{ $bk->name }}'>{{ $bk->name }}</option>
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
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>
@endsection