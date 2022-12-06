

<?php $__env->startSection('content'); ?>

<h4 class="mt-5">Recycle Bin Platform</h4>

<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success mt-3" role="alert">
        <?php echo e($message); ?>

    </div>
<?php endif; ?>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Support</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($data->platform_id); ?></td>
                <td><?php echo e($data->name); ?></td>
                <td><?php echo e($data->support); ?></td>
                <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#restoreModal<?php echo e($data->platform_id); ?>">
                        Restore
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="restoreModal<?php echo e($data->platform_id); ?>" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="restoreModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="<?php echo e(route('admin.restore2', $data->platform_id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin men-restore data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modalper fade" id="hapusPerModal<?php echo e($data->platform_id); ?>" tabindex="-1" aria-labelledby="hapusModalPerLabel" aria-hidden="true">
                        <div class="modalper-dialog">
                            <div class="modalper-content">
                                <div class="modalper-header">
                                    <h5 class="modalper-title" id="hapusModalPerLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modalper" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="<?php echo e(route('admin.restore2', $data->platform_id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="modalper-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modalper-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modalper">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </td> 
            </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </tbody> 
</table> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\applications\ta_sbd_nina\resources\views/admin/recyclebin2.blade.php ENDPATH**/ ?>