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
                    <h2>Daftar Mahasiswa</h2>
                </div>
                <div class="card-body">

                    <?php
                    $kelas = ['6A', '6B', '6C', '6D', "SEMUA"];
                    ?>

                    <form action="<?php echo e(route('daftarsiswa.index')); ?>" class="row mb-4">
                        <div class="col-md-8">
                            <select name="kelas" class="form-control">
                                <option value="" disabled selected>Pilih Kelas</option>
                                <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($k == "SEMUA" ? "" : $k); ?>"><?php echo e($k); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-success" value="Cari">
                        </div>
                        <div class="col-md-2">
                            <a href="<?php echo e(route('daftarsiswa.create')); ?>" class="btn btn-primary float-right">Tambah</a>
                        </div>
                    </form>

                    <?php if($message = Session::get('message')): ?>
                    <div class="alert alert-success">
                        <span><?php echo e($message); ?></span>
                    </div>
                    <?php endif; ?>


                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th width="30%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $dataMhs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dmhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($dmhs['nim']); ?> </td>
                                <td><?php echo e($dmhs['nama']); ?> </td>
                                <td><?php echo e($dmhs['kelas']); ?> </td>
                                <td>
                                    <form action="<?php echo e(route('daftarsiswa.destroy',$dmhs['nim'])); ?>" method="POST">
                                        <a href="<?php echo e(route('daftarsiswa.show',$dmhs['nim'])); ?>" class="btn btn-secondary">Detail</a>
                                        <a href="<?php echo e(route('daftarsiswa.edit',$dmhs['nim'])); ?>" class="btn btn-warning">Edit</a>

                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>

                                    </form>
                                </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td colspan="3"> Tidak ada Data</td>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script>
        function action() {
            var kelas = document.getElementById('kelas').value;
            window.location = "<?php echo e(url('daftarsiswa')); ?>/" + kelas;
        }
    </script>
</body>

</html><?php /**PATH D:\xamp\htdocs\laravel_pert3\resources\views/daftarsiswa.blade.php ENDPATH**/ ?>