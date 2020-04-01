<?php $__env->startSection('content'); ?>
<?php if(session()->get('success')): ?>
<div class="alert alert-success">
    <?php echo e(session()->get('success')); ?>

</div><br />
<?php endif; ?>

<p>Cari Data Anggota :</p>

<form action="<?php echo e(route('member.index')); ?>" method="GET" class="row mb-4">
    <div class="col-md-2">
        <input type="text" name="cari" class="form-control" placeholder="Cari nama ..">
    </div>
    <button type="submit" class="btn2 mr-sm-2"><i class="fas fa-search"></i>Cari</button>
</form>
<div class="float-right">
<a href="<?php echo e(route('member.create')); ?>" class="btn3 mr-sm-4 fa fa-plus-circle">Tambah Data</a></td><br><br>
</div>
<table class="table table-striped border">
    <thead>
        <tr>
            <td width="5%">No</td>
            <td width="10%">NIM</td>
            <td width="35%">Nama</td>
            <td width="10%">Jenis Kelamin</td>
            <td width="15%">Prodi</td>
            <td width="5%" colspan="2">Opsi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0;?>
        <?php $__currentLoopData = $member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $no++ ;?>
        <tr>
            <td><?php echo e($no); ?></td>
            <td><?php echo e($bk->nim); ?></td>
            <td><?php echo e($bk->nama); ?></td>
            <td><?php echo e($bk->jk); ?></td>
            <td><?php echo e($bk->prodi); ?></td>
            <td><a href="<?php echo e(route('member.edit', $bk->id)); ?>" class="btn btn-warning fa fa-edit"> Edit</a></td>
            <td>
                <form action="<?php echo e(route('member.destroy', $bk->id)); ?>" method="post">
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
<?php echo $__env->make('member.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_pert3\resources\views/member/index.blade.php ENDPATH**/ ?>