@extends('admin.admin')

@section('content')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ganti Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-edit"></i> Ganti Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
<div class="card uper">
    <div class="card-header">
        Form Ganti Password
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

        <form action="{{ route('change.password') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Password Lama</label>
                <input type="password" id="password" class="form-control" name="current_password" autocomplete="current-password" placeholder="Masukkan Password Lama"/>
            </div>

            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" id="new_password" class="form-control" name="new_password" autocomplete="current-password" placeholder="Masukkan Password Baru"/>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <input type="password" id="new_confirm_password" class="form-control" name="new_confirm_password" autocomplete="current-password" placeholder="Confirm Password Baru"/>
            </div>
            
            <button type="submit" class="btn btn-primary">Ubah Password</button>

    </form>
</div>
</div>
@endsection