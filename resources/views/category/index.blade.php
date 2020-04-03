@extends('category.layout')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<<<<<<< HEAD

<p>Cari Data Anggota :</p>

=======
<<<<<<< HEAD
<p>Cari Data Category :</p>
=======

<p>Cari Data Anggota :</p>

>>>>>>> 12491eccbfbc24c6a1652936ca903222846d29fa
>>>>>>> af78a5c6907573ca70774858b09b62e0df2ddbfb
<form action="{{ route('category.index') }}" method="GET" class="row mb-4">
<div class="col-md-2">
        <input type="text" name="cari" class="form-control" placeholder="Cari nama .." value="{{ old('cari') }}">
    </div>
    <button type="submit" class="btn2 mr-sm-2"><i class="fas fa-search"></i>Cari</button>
</form>
<div class="float-right">
<a href="{{ route('category.create')}}" class="btn3 mr-sm-4 fa fa-plus-circle">Tambah Data</a></td><br><br>
</div>

<table class="table table-striped border">
    <thead>
        <tr>
            <td width="5%">No</td>
            <td width="10%">Category</td>
            <td width="5%" colspan="2">Opsi</td>
        </tr>
    </thead>
    <tbody>
<<<<<<< HEAD
        <?php $no = 0; ?>
        @foreach($category as $bk)
        <?php $no++; ?>
=======
<<<<<<< HEAD
        <?php $no = 0;?>
        @foreach($category as $bk)
        <?php $no++ ;?>
=======
        <?php $no = 0; ?>
        @foreach($category as $bk)
        <?php $no++; ?>
>>>>>>> 12491eccbfbc24c6a1652936ca903222846d29fa
>>>>>>> af78a5c6907573ca70774858b09b62e0df2ddbfb
        <tr>
            <td>{{$no}}</td>
            <td>{{$bk->name}}</td>
            <td><a href="{{ route('category.edit', $bk->id)}}" class="btn btn-warning fa fa-edit"> Edit</a></td>
            <td>
                <form action="{{ route('category.destroy', $bk->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger fa fa-trash" type="submit" onclick="return alert('Apakah anda yakin?')"> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection