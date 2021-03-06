@extends('admin.admin')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
<br />
@endif
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Keanggotaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
              <li class="breadcrumb-item active"><i class="fas fa-users"></i> Keanggotaan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      
<p>Cari Data Anggota :</p>

<form action="{{ route('member.index') }}" method="GET" class="form-inline">

    <input type="text" name="cari" class="form-control mr-sm-12 mt-2 mr-2" autocomplete="off" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
    <select id="inputct" class="form-control mr-sm-12 mt-2 mr-2" name="filter">
        <option value="" selected="{{ old('filter') }}">Semua</option>
        <option value="D3 Kebidanan">D3 Kebidanan</option>
        <option value="D3 Farmasi">D3 Farmasi</option>
        <option value="D3 Akuntansi">D3 Akuntansi</option>
        <option value="D3 Teknik Komputer">D3 Teknik Komputer</option>
        <option value="D3 Teknik Elektronika">D3 Teknik Elektronika</option>
        <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
        <option value="D3 Perhotelan">D3 Perhotelan</option>
        <option value="D3 Desain Komunikasi Visual">D3 Desain Komunikasi Visual</option>
        <option value="D4 Teknik Informatika">D4 Teknik Informatika</option>
        <option value="D4 Akuntansi Sektor Publik">D4 Akuntansi Sektor Publik</option>

    </select>
    <button type="submit" class="btn2 mr-sm-2 mt-2"><i class="fas fa-search"></i></button>

</form>
<div class="float-right">
    <a href="{{ route('member.create')}}" class="btn3 mr-sm-4"><i class="fas fa-plus-circle"> Tambah Data</i></a></td><br><br>
</div>
<table class="table table-striped border">
    <thead>
        <tr>
            <td width="10%">@sortablelink('nim')</td>
            <td width="50%">@sortablelink('nama')</td>
            <td width="15%">@sortablelink('jk','Jenis Kelamin')</td>
            <td width="20%">@sortablelink('prodi')</td>
            <td width="5%">Opsi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($member as $bk)

        <tr>
            <td>{{$bk->nim}}</td>
            <td>{{$bk->nama}}</td>
            <td>{{$bk->jk}}</td>
            <td>{{$bk->prodi}}</td>
            <td><a href="" class="btn btn-info fas fa-eye" data-toggle="modal" data-target="#myModal-{{ $bk->id }}"> View</a></td>
            <td><a href="{{ route('member.edit', $bk->id)}}" class="btn btn-warning fa fa-edit"> Edit</a></td>
            <td>
                <form action="{{ route('member.destroy', $bk->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger fa fa-trash-alt" type="submit" onclick="return alert('Apakah anda yakin?')"> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- {!! $member->appends(\Request::except('page'))->render() !!} -->
{{ $member->links() }}

@foreach($member as $data)
<div id="myModal-{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h4 class="modal-title">Data Anggota</h4>
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
                                        <th>NIM</th>
                                        <td>{{ $data->nim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $data->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>{{ $data->jk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Prodi</th>
                                        <td>{{ $data->prodi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Foto Profil</th>
                                        <td>
                                            <img width="25%" src="{{asset('/storage/'.$data->foto)}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Berkas Document</th>
                                        <td>
                                            <a href="{{asset('/storage/'.$data->pdf)}}" target="new" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Download <i class="fas fa-file-download"></i></a>
                                        </td>
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