<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version  v2.1.12
* @link  https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html dir="<?php echo e($dir); ?>" lang="<?php echo e($locale); ?>" class="<?php echo e($dir == 'rtl' ? 'fa-dir-flip' : ''); ?>">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo e(asset('images/logo.png')); ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>tabe3</title>
    <!-- Icons-->
    <link href="<?php echo e(asset('admin/vendors/@coreui/icons/css/coreui-icons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/vendors/flag-icon-css/css/flag-icon.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/vendors/simple-line-icons/css/simple-line-icons.css')); ?>" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/vendors/pace-progress/css/pace.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/custom.css')); ?>" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card text-white bg-white">
              <div class="card-body align-items-center d-flex justify-content-center">
                <div>
                  <img class="login-logo" src="<?php echo e(asset($locale == 'ar' ? 'images/logo.png' : 'images/logo.pngimages/logo.png')); ?>">
                </div>
              </div> 
            </div>
            <div class="card p-4">
              <div class="card-body">
                <h1><?php echo e(__('lang.login')); ?></h1>

                <?php echo $__env->make('admin.layouts.includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form action="<?php echo e(route('login')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-user-o"></i>
                      </span>
                    </div>
                    <input class="form-control <?php echo e($errors->first('email') ? 'is-invalid' : ''); ?>" name="email" type="text"
                     placeholder="<?php echo e(__('lang.email')); ?>" value="<?php echo e(old('email')); ?>">
                    <?php if($errors->first('email')): ?>
                      <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-lock"></i>
                      </span>
                    </div>
                    <input class="form-control <?php echo e($errors->first('password') ? 'is-invalid' : ''); ?>" type="password" name="password"
                     placeholder="<?php echo e(__('lang.password')); ?>">
                    <?php if($errors->first('password')): ?>
                      <div class="invalid-feedback"><?php echo e($errors->first('password')); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit"><?php echo e(__('lang.login')); ?></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo e(asset('admin/vendors/jquery/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/popper.js/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/pace-progress/js/pace.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/@coreui/coreui/js/coreui.min.js')); ?>"></script>
  </body>
</html>
<?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/admin/sections/auth/login.blade.php ENDPATH**/ ?>