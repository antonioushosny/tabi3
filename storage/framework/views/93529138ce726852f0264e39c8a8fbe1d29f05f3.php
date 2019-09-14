<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: <?php echo e(__('admin.project_name')); ?> ::</title>
    <!-- Favicon-->
    <!-- <link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/x-icon"> -->
    <link rel="shortcut icon" href="<?php echo e(asset('images/Logo.PNG')); ?>" >
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/authentication.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/color_skins.css')); ?>">
</head>

<body class="theme-purple authentication sidebar-collapse">

<div class="page-header">
    

    <?php echo $__env->yieldContent('content'); ?> 
    <footer class="footer">
        <div class="container">
          
            <div class="copyright">
                
                <script>
                    // document.write(new Date().getFullYear())
                </script>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="<?php echo e(asset('assets/bundles/libscripts.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/bundles/vendorscripts.bundle.js')); ?>"></script> <!-- Lib Scripts Plugin Js -->

<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
//=============================================================================
$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>
</body>
</html><?php /**PATH E:\xampp7\htdocs\tabi3\resources\views/layouts/auth.blade.php ENDPATH**/ ?>