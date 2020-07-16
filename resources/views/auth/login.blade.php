<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Perpustakaan</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="background-color: #d7dbdd">
  <!-- Form login -->
  <div class="bodyatas pb-2">
    <center>
      <h1><i class="fas fa-book" style="color: blue"> Perpustakaan</i></h1>
    </center>
  </div>

  <div class="bodytgh">
    <div class="center">
      @error('email')
      <div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Gagal!</strong> Email atau Password salah.</div>
      @enderror
      @error('password')
      <div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong></i> Gagal!</strong> Email atau Password salah.</div>
      @enderror

      <form action="{{route('login')}}" method="post">
        @csrf

        <div class="input-group col-md-12 mb-2" align="center">
          <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required autocomplete="email" autofocus>
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
          </div>
        </div>

        <div class="input-group col-md-12 mb-2" align="center">
          <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
          </div>
        </div>

        <div class="form-group col-md-12" align="left">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} required>
            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
          </div>
        </div>

        <div class="input-group col-md-12 mb-2" align="center">
          <button type="submit" class="btn btn-success">Login <i class="fas fa-key"></i></button>
        </div>
        <div class="form-group row">
          <div class="col-md-6 offset-md-4" align= "center">
            <a href="{{ url('/auth/google') }}" class="btn btn-success" align="center"><i class="fab fa-github"></i> Google</a>
          </div>
        </div>
        <div class="form-check mt-3">
          <center><button><a href="{{route('register')}}">Created an account</a></button>
            @if (Route::has('password.request'))
            <button><a href="{{route('password.request')}}">Lupa Password</a></button></center>
          @endif
        </div>
      </form>
    </div>
  </div>
  <script src="lte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="lte/dist/js/adminlte.min.js"></script>
</body>

</html>