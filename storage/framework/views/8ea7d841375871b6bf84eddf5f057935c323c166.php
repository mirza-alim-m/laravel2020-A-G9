<?php $__env->startSection('content'); ?>
<?php if(session()->get('success')): ?>
<div class="alert alert-success">
    <?php echo e(session()->get('success')); ?>

</div><br />
<?php endif; ?>
<p>Cari Data Buku :</p>
<form action="/buku/cari" method="GET">
    <input type="text" name="cari" placeholder="Cari nama .." value="<?php echo e(old('cari')); ?>">
    <input type="submit" value="CARI">
</form>
<a href="<?php echo e(route('buku.create')); ?>" class="btn btn-primary float-right fa fa-plus-circle"> Tambah</a></td><br><br>
<table class="table table-striped border text-center">
    <thead>
        <tr>
            <td>No</td>
            <td>Judul</td>
            <td>Penerbit</td>
            <td>Penulis</td>
            <td>Jumlah</td>
            <td colspan="2">Kelola Data</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($bk->id); ?></td>
            <td><?php echo e($bk->judul); ?></td>
            <td><?php echo e($bk->penerbit); ?></td>
            <td><?php echo e($bk->penulis); ?></td>
            <td><?php echo e($bk->jumlah); ?></td>
            <td><a href="<?php echo e(route('buku.edit', $bk->id)); ?>" class="btn btn-warning fa fa-edit"> Edit</a></td>
            <td>
                <form action="<?php echo e(route('buku.destroy', $bk->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger fa fa-trash" type="submit" onclick="return alert('Apakah anda yakin?')"> Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('buku.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\laravel_pert3\resources\views/buku/index.blade.php ENDPATH**/ ?>