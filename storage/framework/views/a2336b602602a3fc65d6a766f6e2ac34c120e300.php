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
        <form method="post" action="<?php echo e(route('peminjaman.store')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <!-- <div class="form-group">
                <label>Nama Buku</label>
                <input type="text" class="form-control" name="nama_buku" autocomplete="off" onkeypress="return hanyaAngka(event)" required/>
            </div> -->
            <div class="form-group">
            <label for="inputjk">Nama Buku</label>
            <select id="inputjk" class="form-control" name="nama_buku" required>
            <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($buku->judul); ?>"><?php echo e($buku->judul); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>
            <div class="form-group">
                <label>NIM Peminjam</label>
                <input type="text" class="form-control" name="nim_peminjam" autocomplete="off" required/>
            </div>
            <div class="form-group">
                <label>Nama Peminjam</label>
                <input type="text" class="form-control" name="nama_peminjam" autocomplete="off" required/>
            </div>
            <div class="form-group">
                <label for="inputprodi">Prodi</label>
                <select id="inputprodi" class="form-control" name="prodi" required>
                    <option disabled = "disabled">Pilih</option>
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
            <div class="form-group">
                <label>Tanggal</label>
                <input type="text" class="form-control" name="tanggal" value="<?php echo e(Carbon\Carbon::now()->toDateTimeString()); ?>" autocomplete="off" required/>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<script>
	function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}	
</script>
<?php echo $__env->make('peminjaman.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_pert3\resources\views/peminjaman/create.blade.php ENDPATH**/ ?>