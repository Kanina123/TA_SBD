<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <style>
        
    </style>
</head>



<?php $__env->startSection('style'); ?>
    <style>
        .wrapper{ 
            width: 360px; 
            padding: 20px; 
            margin: 0;
            position: absolute;
            border-radius: 30px;
            background: white;
            border-style: solid;
            border-color:black;
            color: black;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    
    <main class="wrapper">
        <div class="text-center wrapper">
            <h2 class="mb-3 fw-bold">Login</h2>
            <p>Masukkan username dan password untuk login.</p>

            
            <?php if(session()->has('gagalLogin')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('gagalLogin')); ?>

                </div>
            <?php endif; ?> 

            <form action="/login" method="post">
                
                <?php echo csrf_field(); ?>

                
                <div class="form-group mb-2">
                    <label for="username">Username:</label><br>
                    <input class="col-lg-10" type="text" name="username" id="username" placeholder="Username" value="<?php echo e(old('username')); ?>" autofocus required>
                </div>
                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="form-group">
                    <label for="password">Password:</label><br>
                    <input class="col-lg-10" type="password" name="password" id="password" placeholder="Password" required>
                </div>
                
                
                <div class="form-group">
                    <button class="btn btn-primary mt-3" type="submit">Login</button>
                </div>
            </form>
            <a href="<?php echo e(route('login.adduser')); ?>" type="button" class="btn btn-success rounded-3">Tambah User</a>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\applications\ta_sbd_nina\resources\views/login/index.blade.php ENDPATH**/ ?>