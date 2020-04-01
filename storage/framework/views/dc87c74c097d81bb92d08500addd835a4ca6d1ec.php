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
                    <h2>Edit Mahasiswa</h2>
                </div>
                <div class="card-body">

                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <?php $__currentLoopData = $dataMhs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="<?php echo e(route('daftarsiswa.update', $item['nim'])); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>


                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama:</strong>
                                    <input type="text" value="<?php echo e($item['nama']); ?>" name="nama" class="form-control" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nim:</strong>
                                    <input type="number" value="<?php echo e($item['nim']); ?>" class="form-control" name="nim" placeholder="Nim">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Kelas:</strong>
                                    <input type="text" value="<?php echo e($item['kelas']); ?>" class="form-control" name="kelas" placeholder="Kelas">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH D:\xamp\htdocs\laravel_pert3\resources\views/data-edit.blade.php ENDPATH**/ ?>