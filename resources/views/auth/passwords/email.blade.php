@extends('admin.admin')

@section('content')
<body class="bg-gradient-primary">
<center><div class="limiter">
    <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <br><img src="{{ asset('images/reset.png') }}" alt="IMG">
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <form class="login100-form validate-form" action="{{ route('password.email') }}" method="POST">
                @csrf
                    <span class="login100-form-title"  style="margin-top: 50px">Lupa kata sandi Anda?</span>
                    <p>Cukup masukkan alamat email Anda di bawah ini,</p><br>
                    <p>Kami akan mengirimkan Anda tautan untuk mereset kata sandi Anda!</p><br>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">Kirim</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</div></center>
</body>

@endsection
