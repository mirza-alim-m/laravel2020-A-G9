@extends('admin.admin')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif

<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Buku</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
              <li class="breadcrumb-item active"><i class="fab fa-buffer"></i> Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

<p>Cari Data Category :</p>

<form action="{{ route('category.index') }}" method="GET" class="form-inline">

    <input type="text" name="cari" class="form-control mr-sm-12 mt-2 mr-2" autocomplete="off" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
    <select id="inputct" class="form-control mr-sm-12 mt-2 mr-2" name="filter">
        <option value="" selected="{{ old('filter') }}"> -- Semua --</option>
        @foreach(App\Category::get() as $bk)
        <option value='{{ $bk->name }}'>{{ $bk->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn2 mr-sm-2 mt-2"><i class="fas fa-search"></i></button>

</form>

<div class="float-right">
    <a href="{{ route('category.create')}}" class="btn3 mr-sm-4"><i class="fas fa-plus-circle"> Tambah Data</i></a></td><br><br>
</div>

<table class="table table-striped border">
    <thead>
        <tr>
            <td width="5%">No</td>
            <td width="90%">Category</td>
            <td width="5%" colspan="2">Opsi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @foreach($category as $bk)
        <?php $no++; ?>
        <tr>
            <td>{{$no}}</td>
            <td>{{$bk->name}}</td>
            <td><a href="" class="btn btn-info fas fa-eye" data-toggle="modal" data-target="#myModal-{{ $bk->id }}"> View</a></td>
            <td><a href="{{ route('category.edit', $bk->id)}}" class="btn btn-warning fa fa-edit"> Edit</a></td>
            <td>
                <form action="{{ route('category.destroy', $bk->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger fa fa-trash-alt" type="submit" onclick="return alert('Apakah anda yakin?')"> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $category->links() }}

@foreach($category as $data)
<div id="myModal-{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h4 class="modal-title">Data Category</h4>
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
                                        <td>{{ $data->name }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </form>
                <!-- footer modal -->
                <!-- <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
				</div> -->
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection