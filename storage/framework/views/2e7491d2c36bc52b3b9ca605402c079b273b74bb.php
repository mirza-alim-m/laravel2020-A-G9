<?php $__env->startSection('content'); ?>
<div class="card uper">
    <div class="card-header">
        Form Tambah Data
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
        <form method="post" action="<?php echo e(route('buku.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" name="judul" />
    </div>
    <div class="form-group">
        <label>Penerbit</label>
        <input type="text" class="form-control" name="penerbit" />
    </div>
    <div class="form-group">
        <label>Penulis</label>
        <input type="text" class="form-control" name="penulis" />
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input type="text" class="form-control" name="jumlah" />
    </div>
    <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('buku.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_pert3\resources\views/buku/create.blade.php ENDPATH**/ ?>