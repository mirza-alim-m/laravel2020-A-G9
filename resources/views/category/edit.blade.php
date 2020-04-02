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
                <label>Category</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}" />
            </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection