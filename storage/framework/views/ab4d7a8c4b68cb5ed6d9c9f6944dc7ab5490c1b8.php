<!DOCTYPE html>
<html>

<head>
    <div class="jumbotron">
        <center>
            <h1>Data Buku Perpustakaan</h1>
        </center><br>
        <center>
            <div class="btn-group">
                <a href="<?php echo e(route('buku.create')); ?>" type="button" class="btn btn-primary ">Tambah data</a>
                <a href="<?php echo e(route('buku.index')); ?>" type="button" class="btn btn-info">Tampil data</a>
                <button disabled="disable" type="button" class="btn btn-info">About</button>
            </div>
        </center>
        <title>Form Data</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo e(asset('bootstrap.min.css')); ?>">
</head>

<body>
    <!-- <center><h1>Data Penjualan Laptop</h1></center>   -->
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>

</html><?php /**PATH D:\xamp\htdocs\laravel_pert3\resources\views/buku/layout.blade.php ENDPATH**/ ?>