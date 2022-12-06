

<?php $__env->startSection('content'); ?>

<h4 class="mt-5">Search Data</h4>

<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success mt-3" role="alert">
        <?php echo e($message); ?>

    </div>
<?php endif; ?>

<div>
    <div class="mx-auto pull-right">
        <div class="">
            <form action="<?php echo e(route('admin.search')); ?>" method="GET" role="search">
                <div class="input-group">
                    <input type="text" class="form-control mr-2" name="term" placeholder="Search for Game" id="term">
                    <span class="input-group-btn mr-5 mt-1">
                        <button class="btn btn-info" type="submit" title="Search Data">
                            Search
                        </button>
                    </span>
                    <a href="<?php echo e(route('admin.search')); ?>" class=" mt-1">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                Reset
                            </button>
                        </span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Tahun Release</th>
        <th>Platform</th>
        <th>Publisher</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($data->name); ?></td>
                <td><?php echo e($data->release_year); ?></td>
                <td><?php echo e($data->platform_name); ?></td>
                <td><?php echo e($data->publisher_name); ?></td>
            </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </tbody> 
</table> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\applications\ta_sbd_nina\resources\views/admin/search.blade.php ENDPATH**/ ?>