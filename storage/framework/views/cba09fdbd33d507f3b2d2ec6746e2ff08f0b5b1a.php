<?php $__env->startSection('content'); ?>
<?php if(session()->get('success')): ?>
<div class="alert alert-success">
    <?php echo e(session()->get('success')); ?>

</div><br />
<?php endif; ?>
<p>Cari Data Buku :</p>
<form action="/buku/cari" method="GET" class="row mb-4">
<div class="col-md-2">
        <input type="text" name="cari" class="form-control" placeholder="Cari nama .." value="<?php echo e(old('cari')); ?>">
    </div>
    <button type="submit" class="btn2 mr-sm-2"><i class="fas fa-search"></i>Cari</button>
</form>
<div class="float-right">
<a href="<?php echo e(route('buku.create')); ?>" class="btn3 mr-sm-4 fa fa-plus-circle">Tambah Data</a></td><br><br>
</div>

<table class="table table-striped border">
    <thead>
        <tr>
            <td width="5%">No</td>
            <td width="10%">Category</td>
            <td width="20%">Judul</td>
            <td width="30%">Penerbit</td>
            <td width="20%">Penulis</td>
            <td width="5%">Jumlah</td>
            <td width="5%" colspan="2">Opsi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0;?>
        <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $no++ ;?>
        <tr>
            <td><?php echo e($no); ?></td>
            <td><?php echo e($bk->category); ?></td>
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
<?php echo $__env->make('buku.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_pert3\resources\views/buku/index.blade.php ENDPATH**/ ?>