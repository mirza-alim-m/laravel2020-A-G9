<!DOCTYPE html>
<html>

<head>
    <nav class="navbar navbar-expand-lg">	
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigasi" aria-controls="navigasi" aria-expanded="false"aria-label="Toggle navigation"><i class="fas fa-align-justify"></i></button>
        <div class="collapse navbar-collapse" id="navigasi">  
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a href="{{ route('buku.index')}}" class="nav-link">Data Buku<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('member.index')}}" class="nav-link">Data Keanggotaan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('peminjaman.index')}}" class="nav-link">Data Peminjaman</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.index')}}" class="nav-link">Data Category</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="text-h1">
        <center><p>Data Keanggotaan Perpustakaan</p></center>
    </div>
        <title>Data Perpustakaan</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
</head>

<body>
    <div class="container">
        @yield('content')
    </div>

</body>

</html>