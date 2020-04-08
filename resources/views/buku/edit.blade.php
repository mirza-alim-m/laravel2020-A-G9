@extends('buku.layout')

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

        <form action="{{ route('buku.update',$buku->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
            <label for="inputct">Category Buku</label>
            <select id="inputct" class="form-control" name="category" required>
                <option value="{{ $buku->category}}"> {{ $buku->category}}</option>
            @foreach(App\Category::get() as $bk)
                <option value='{{ $bk->name }}'>{{ $bk->name }}</option>
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
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

    </form>
</div>
</div>
@endsection