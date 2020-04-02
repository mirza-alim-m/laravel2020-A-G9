@extends('category.layout')

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
        <form method="post" action="{{ route('category.store') }}">
            @csrf
            <div class="form-group">
                <label>Kategory</label>
                <input type="text" class="form-control" name="name" />
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>
@endsection