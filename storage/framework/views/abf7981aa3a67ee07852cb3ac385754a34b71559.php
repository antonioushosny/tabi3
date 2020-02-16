<!DOCTYPE html>

<?php
  $lang = session('lang');
  App::setLocale($lang);
  $lang = App::getlocale();
  if($lang == null){
      $lang ='ar';
  }
  $locale = $lang ;
   
  if($locale == 'ar'){
    $dir = 'rtl';
  }else{
    $dir = 'ltr';
  }
   
  $nav = $dir == 'ltr' ? 'ml-auto' : 'mr-auto';
  $dropdown = $dir == 'ltr' ? 'dropdown-menu-right' : 'dropdown-menu-left';

?>
<html dir="<?php echo e($dir); ?>" lang="<?php echo e($locale); ?>" class="<?php echo e($dir == 'rtl' ? 'fa-dir-flip' : ''); ?>">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo e(asset('images/logo.png')); ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="NamaaIT Mobile apps development and Web Solutions company enable you to meet your customers needs anytime, any place">
    <meta name="author" content="NamaaIT Developers">
    <meta name="keyword" content="Admin, Control Panel">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo e(__('lang.siteTitle')); ?> | <?php echo e(__('lang.adminPanel')); ?></title>

    <link rel="icon" href="<?php echo e(asset('img/logo-symbol.png')); ?>" type="image/png" sizes="16x16">
    
    <!-- Icons-->
    <link href="<?php echo e(asset('admin/vendors/@coreui/icons/css/coreui-icons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/vendors/flag-icon-css/css/flag-icon.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/vendors/simple-line-icons/css/simple-line-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/vendors/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- Styles for File Input Plugin-->
    <link href="<?php echo e(asset('admin/css/file-input/fileinput.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/file-input/fileinput-rtl.css')); ?>" rel="stylesheet">

    
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>

    

    <!-- Main styles for this application-->
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/vendors/pace-progress/css/pace.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/tajawal-font.css')); ?>" rel="stylesheet">
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
<body class="app header-fixed sidebar-hidden aside-menu-fixed">
    <?php echo $__env->make('admin.layouts.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="app-body">
       <?php echo $__env->make('admin.layouts.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('main'); ?>
    </div>
    <?php echo $__env->make('admin.layouts.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo e(asset('admin/vendors/jquery/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/popper.js/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/pace-progress/js/pace.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/@coreui/coreui/js/coreui.min.js')); ?>"></script>
    
    <script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
    <script src="<?php echo e(asset('admin/vendors/select2/js/select2.min.js')); ?>"></script>
    <!-- Custom scripts required by this view -->
    
    <!-- JS for File Input Plugin-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('admin/js/file-input/fileinput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/file-input/themes/theme.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/file-input/ar.js')); ?>"></script>

    
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>

    <script src="<?php echo e(asset('admin/js/custom.js')); ?>"></script>
    <?php echo $__env->make('admin.layouts.includes.ckeditor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <?php echo $__env->yieldContent('script'); ?>

</body>
</html>
<?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>