<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Tabi3 Project.">

    <title>:: <?php echo e(__('admin.project_name')); ?> ::</title>
    <!-- Favicon-->
    <!-- <link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/x-icon"> -->
    <link rel="shortcut icon" href="<?php echo e(asset('images/logo.png')); ?>" >
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/authentication.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/color_skins.css')); ?>">
    
    <?php echo $__env->yieldContent('style'); ?>
    <style>
        ::-webkit-input-placeholder { /* Edge */
            color: #a19ca3;
            
            text-align: left;
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: #a19ca3;
        
        text-align: left;  
        }

        ::placeholder {
        color: #a19ca3;
        
        text-align: left; 
        }
    </style>  
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
</html><?php /**PATH D:\xampp\htdocs\tabi3\resources\views/layouts/auth.blade.php ENDPATH**/ ?>