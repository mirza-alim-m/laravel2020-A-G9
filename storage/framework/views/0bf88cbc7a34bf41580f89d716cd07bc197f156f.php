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

        <form action="<?php echo e(route('member.update',$member->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label>NIM</label>
                <input type="text" class="form-control" name="nim" value="<?php echo e($member->nim); ?>" readonly/>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo e($member->nama); ?>" />
            </div>
            <div class="form-group">
            <label for="inputjk">Jenis Kelamin</label>
            <select id="inputjk" class="form-control" name="jk" required>
                <option value="<?php echo e($member->jk); ?>"><?php echo e($member->jk); ?></option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            </div>
            <div class="form-group">
                <label for="inputprodi">Prodi</label>
                <select id="inputprodi" class="form-control" name="prodi" required>
                    <option value="<?php echo e($member->prodi); ?>"><?php echo e($member->prodi); ?></option>
                    <option value="D3 Kebidanan">D3 Kebidanan</option>
                    <option value="D3 Farmasi">D3 Farmasi</option>
                    <option value="D3 Akuntansi">D3 Akuntansi</option>
                    <option value="D3 Teknik Komputer">D3 Teknik Komputer</option>
                    <option value="D3 Teknik Elektronika">D3 Teknik Elektronika</option>
                    <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
                    <option value="D3 Perhotelan">D3 Perhotelan</option>
                    <option value="D3 Desain Komunikasi Visual">D3 Desain Komunikasi Visual</option>
                    <option value="D4 Teknik Informatika">D4 Teknik Informatika</option>
                    <option value="D4 Akuntansi Sektor Publik">D4 Akuntansi Sektor Publik</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

    </form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('member.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_pert3\resources\views/member/edit.blade.php ENDPATH**/ ?>