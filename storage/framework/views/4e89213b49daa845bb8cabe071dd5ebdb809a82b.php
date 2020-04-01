<?php $__env->startSection('content'); ?>
<div class="card uper">
    <div class="card-header">
        Form Edit Data
    </div>
    <div class="card-body">
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div><br />
        <?php endif; ?>

        <form action="<?php echo e(route('buku.update',$buku->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?php echo e($buku->judul); ?>" />
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" class="form-control" name="penerbit" value="<?php echo e($buku->penerbit); ?>" />
            </div>
            <div class="form-group">
                <label>Penulis</label>
                <input type="text" class="form-control" name="penulis" value="<?php echo e($buku->penulis); ?>" />
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" name="jumlah" value="<?php echo e($buku->jumlah); ?>" />
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>

    </form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('buku.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\laravel_pert3\resources\views/buku/edit.blade.php ENDPATH**/ ?>