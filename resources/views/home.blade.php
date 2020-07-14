@guest
{{route('auth.login')}}
@else
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        Welcome
        
@endsection
@endguest