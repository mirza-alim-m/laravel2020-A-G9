<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Daftar</title>
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Google Font: Source Sans Pro -->
      </head>
  <body id="login">

      <div class="center2"><!-- div dengan class center bertujuan untuk membuat posisi tag form yang akan dibuat akan menjadi rata tengah -->
      <div class="pb-2">
        <center><h1><i class="fas fa-book" style="color: blue"> Register</i></h1></center>
      </div>
      @error('name')
                <div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            @error('email')
                <div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>{{ $message }}</strong>
                </div>
             @enderror
            @error('password')
                <div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        
          <form class="fl validate-form" action="{{route('register')}}" method="post">
          @csrf
            <input class="itpw" id="name" type="text" name="name" autocomplete="off" placeholder="Nama Lengkap" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus><br>
            <input class="itpw" id="email" type="text" name="email" autocomplete="off" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus><br>
            <input class="itpw" id="password" type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password"><br>
            <input class="itpw" id="password_confirmation" type="password" name="password_confirmation" placeholder="Password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password"><br>
            <button type="simpan" class="its" name="simpan">Daftar</button>
            <!-- <input class="its" type="simpan" name="simpan" value="Daftar"> -->
          </form>

          <p><a href="{{route('login')}}">Already have an account?</a></p>

      </div>

  </body>
</html>
