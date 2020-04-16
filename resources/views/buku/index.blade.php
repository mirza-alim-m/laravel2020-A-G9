@extends('buku.layout')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<p>Cari Data Buku :</p>
<form action="{{ route('buku.index') }}" method="GET" class="form-inline">

    <input type="text" name="cari" class="form-control mr-sm-12 mt-2 mr-2" autocomplete="off" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
    <select id="inputct" class="form-control mr-sm-12 mt-2 mr-2" name="filter">
        <option value="" selected="{{ old('filter') }}"> -- Semua --</option>
            @foreach(App\Category::get() as $bk)
        <option value='{{ $bk->name }}'>{{ $bk->name }}</option>
            @endforeach
    </select>
    <button type="submit" class="btn2 mr-sm-2 mt-2"><i class="fas fa-search"></i>Cari</button>
</form>
<div class="float-right">
<a href="{{ route('buku.create')}}" class="btn3 mr-sm-4 fa fa-plus-circle">Tambah Data</a></td><br><br>
</div>

<table class="table table-striped border">
    <thead>
        <tr>
            <td width="10%">@sortablelink('category')</td>
            <td width="40%">@sortablelink('judul')</td>
            <td width="20%">@sortablelink('penerbit')</td>
            <td width="20%">@sortablelink('penulis')</td>
            <td width="5%">Jumlah</td>
            <td width="5%">Opsi</td>
        </tr>
    </thead>
    <tbody>
    @if($buku->count())
        @foreach($buku as $bk)
        <tr>
            <td>{{$bk->category}}</td>
            <td>{{$bk->judul}}</td>
            <td>{{$bk->penerbit}}</td>
            <td>{{$bk->penulis}}</td>
            <td>{{$bk->jumlah}}</td>
            <td><a href="" class="btn btn-info" data-toggle="modal" data-target="#myModal-{{ $bk->id }}">View</a></td>
            <td><a href="{{ route('buku.edit', $bk->id)}}" class="btn btn-warning fa fa-edit"> Edit</a></td>
            <td>
                <form action="{{ route('buku.destroy', $bk->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger fa fa-trash" type="submit" onclick="return alert('Apakah anda yakin?')"> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<!-- {!! $buku->appends(\Request::except('page'))->render() !!} -->
{{ $buku->links() }}

@foreach($buku as $data)
<div id="myModal-{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <!-- konten modal-->
	    <div class="modal-content">
			<!-- heading modal -->
            <div class="modal-header">
				<h4 class="modal-title">Data Peminjaman</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- body modal -->
                
			<div class="modal-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ $data->category }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Buku</th>
                                        <td>{{ $data->judul }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penerbit</th>
                                        <td>{{ $data->penerbit }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penulis</th>
                                        <td>{{ $data->penulis }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td>{{ $data->jumlah }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
		</div>
    </div>
</div>
@endforeach

@endsection