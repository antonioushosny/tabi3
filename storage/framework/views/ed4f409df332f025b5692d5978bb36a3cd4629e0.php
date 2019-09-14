<?php $__env->startSection('style'); ?>
    <style> 
        .hidden{
            display:none ;
        }
    </style>
<?php $__env->stopSection(); ?>
 <?php $__env->startSection('content'); ?>
<!-- Main Content -->
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2><?php echo e(__('admin.dashboard')); ?>

                <small><?php echo e(__('admin.Welcome to beitk')); ?></small>
                </h2>
            </div>            
                <?php if($lang =='ar'): ?>
                <div class="col-lg-7 col-md-7 col-sm-12 text-left">
                <ul class="breadcrumb float-md-left" style=" padding: 0.6rem; direction: ltr; ">
                <?php else: ?> 
                <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                <?php endif; ?>
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="zmdi zmdi-home"></i> <?php echo e(__('admin.dashboard')); ?></a></li>
                    <!-- <li class="breadcrumb-item active"><?php echo e(__('admin.dashboard')); ?></li> -->
                </ul>
            </div>
        </div>
    </div>

     
    <div class="container-fluid">
        <!-- for statics -->
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <?php if(Auth::user()->role == 'admin'): ?>
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="<?php echo e(route('users')); ?>">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($users); ?>" data-speed="1000" data-fresh-interval="700"><?php echo e($users); ?></h2></a>
                                        <p class="text-muted"><?php echo e(trans('admin.users')); ?></p>
                                        <span id="linecustom1">1,4,2,6,5,2,3,8,5,2</span>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="<?php echo e(route('companies')); ?>"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($companies); ?>" data-speed="2000" data-fresh-interval="700"><?php echo e($companies); ?></h2></a>
                                        <p class="text-muted "><?php echo e(trans('admin.companies')); ?></p>
                                        <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="<?php echo e(route('departments')); ?>"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($departments); ?>" data-speed="2000" data-fresh-interval="700"><?php echo e($departments); ?></h2></a>
                                        <p class="text-muted"><?php echo e(trans('admin.departments')); ?></p>
                                        <span id="linecustom3">1,5,3,6,6,3,6,8,4,2</span>
                                    </div>
                                </div>
                                
                            <?php else: ?> 
                               
                            
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       
    </div>

   
</section>
  
<?php $__env->stopSection(); ?> 


<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/bundles/morrisscripts.bundle.js')); ?>"></script><!-- Morris Plugin Js -->
<script src="<?php echo e(asset('assets/bundles/jvectormap.bundle.js')); ?>"></script> <!-- JVectorMap Plugin Js -->
<script src="<?php echo e(asset('assets/bundles/knob.bundle.js')); ?>"></script> <!-- Jquery Knob, Count To, Sparkline Js -->
<script src="<?php echo e(asset('assets/js/pages/index.js')); ?>"></script>


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tabi3\resources\views/home.blade.php ENDPATH**/ ?>