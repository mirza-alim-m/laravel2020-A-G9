<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</head>

<body>
    <div class="container">
        <div class="col-lg-10 mx-auto">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h2>Detail Mahasiswa</h2>
                </div>
                <div class="card-body">

                    <table class="table">
                        <?php $__empty_1 = true; $__currentLoopData = $dataMhs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th style="border:0">Nama</th>
                            <td style="border:0">:</td>
                            <td style="border:0"><?php echo e($d['nama']); ?></td>
                        </tr>
                        <tr>
                            <th style="border:0">Nim</th>
                            <td style="border:0">:</td>
                            <td style="border:0"><?php echo e($d['nim']); ?></td>
                        </tr>
                        <tr>
                            <th style="border:0">Kelas</th>
                            <td style="border:0">:</td>
                            <td style="border:0"><?php echo e($d['kelas']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <td colspan="3">Tidak dapat menampilkan detail data</td>
                        <?php endif; ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH D:\xamp\htdocs\laravel_pert3\resources\views/data-detail.blade.php ENDPATH**/ ?>