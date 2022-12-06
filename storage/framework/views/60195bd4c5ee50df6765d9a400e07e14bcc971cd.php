

<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <li><?php echo e($error); ?></li>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data Platform</h5>

		<form method="post" action="<?php echo e(route('admin.update2', $data->platform_id)); ?>">
			<?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="platform_id" class="form-label">ID Platform</label>
                <input type="text" class="form-control" id="platform_id" name="platform_id" value="<?php echo e($data->platform_id); ?>">
            </div>
			<div class="mb-3">
                <label for="name" class="form-label">Nama Platform</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($data->name); ?>">
            </div>
            <div class="mb-3">
                <label for="support" class="form-label">Support? (YES/NO)</label>
                <input type="text" class="form-control" id="support" name="support" value="<?php echo e($data->support); ?>">
            </div>
            <div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\applications\ta_sbd_nina\resources\views/admin/edit2.blade.php ENDPATH**/ ?>