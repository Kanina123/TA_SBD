<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GAME DATABASE</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">

        <nav class="navbar bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="<?php echo e(route('admin.index')); ?>">DATABASE GAME
              </a>
            </div>
            <div class="container-fluid">
              <a class="navbar-brand" href="<?php echo e(route('admin.index2')); ?>">DATABASE PLATFORM
              </a>
            </div>
            <div class="container-fluid">
              <a class="navbar-brand" href="<?php echo e(route('admin.search')); ?>">SEARCH DATA
              </a>
            </div>
        </nav>

        <form action="/logout" method="post" style="margin-top:15px">
          
          <?php echo csrf_field(); ?>

          
          <button class="btn btn-danger btn-sm" type="submit">Logout</button>
      </form>
        

        <!-- <nav class="navbar bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="<?php echo e(route('admin.index2')); ?>">DATABASE PLATFORM
              </a>
            </div>
        </nav>

        <nav class="navbar bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="<?php echo e(route('admin.search')); ?>">SEARCH DATA
              </a>
            </div>
        </nav> -->

        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html><?php /**PATH E:\Laravel\applications\ta_sbd_nina\resources\views/admin/layout.blade.php ENDPATH**/ ?>