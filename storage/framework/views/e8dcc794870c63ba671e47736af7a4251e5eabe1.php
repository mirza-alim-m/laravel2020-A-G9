<!DOCTYPE html>
<html>

<head>
<nav class="navbar navbar-expand-lg">	
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigasi" aria-controls="navigasi" aria-expanded="false"aria-label="Toggle navigation"><i class="fas fa-align-justify"></i></button>
        <div class="collapse navbar-collapse" id="navigasi">  
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a href="<?php echo e(route('buku.index')); ?>" class="nav-link">Data Buku<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('member.index')); ?>" class="nav-link">Data Keanggotaan</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="text-h1">
        <center><p>Data Buku</p></center>
    </div>

        <title>Data Perpustakaan</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="stylesheet" href="<?php echo e(asset('bootstrap.min.css')); ?>">
</head>

<body>
    <!-- <center><h1>Data Penjualan Laptop</h1></center>   -->
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\laravel_pert3\resources\views/buku/layout.blade.php ENDPATH**/ ?>