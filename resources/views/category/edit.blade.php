@extends('category.layout')

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

        <form action="{{ route('category.update',$category->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
<<<<<<< HEAD
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $category->nama }}" />
=======
<<<<<<< HEAD
                <label>Category</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}" />
=======
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $category->nama }}" />
>>>>>>> 12491eccbfbc24c6a1652936ca903222846d29fa
>>>>>>> af78a5c6907573ca70774858b09b62e0df2ddbfb
            </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection