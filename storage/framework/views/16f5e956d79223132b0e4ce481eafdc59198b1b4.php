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
                                        <a href="<?php echo e(route('delegates')); ?>"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($delegates); ?>" data-speed="2000" data-fresh-interval="700"><?php echo e($delegates); ?></h2></a>
                                        <p class="text-muted "><?php echo e(trans('admin.delegates')); ?></p>
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

                        <div class="row clearfix">
                            <?php if(Auth::user()->role == 'admin'): ?>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="<?php echo e(route('users')); ?>">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($iosusers); ?>" data-speed="1000" data-fresh-interval="700"><?php echo e($iosusers); ?></h2></a>
                                        <p class="text-muted"><?php echo e(trans('admin.iosusers')); ?></p>
                                        <span id="linecustom4">1,4,2,6,5,2,3,8,5,2</span>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="<?php echo e(route('users')); ?>"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($androidusers); ?>" data-speed="2000" data-fresh-interval="700"><?php echo e($androidusers); ?></h2></a>
                                        <p class="text-muted "><?php echo e(trans('admin.androidusers')); ?></p>
                                        <span id="linecustom5">2,9,5,5,8,5,4,2,6</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="<?php echo e(route('advertisements')); ?>"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($installAds); ?>" data-speed="2000" data-fresh-interval="700"><?php echo e($installAds); ?></h2></a>
                                        <p class="text-muted"><?php echo e(trans('admin.installAds')); ?></p>
                                        <span id="linecustom6">1,5,3,6,6,3,6,8,4,2</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="<?php echo e(route('advertisements')); ?>"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($starAds); ?>" data-speed="2000" data-fresh-interval="700"><?php echo e($starAds); ?></h2></a>
                                        <p class="text-muted"><?php echo e(trans('admin.starAds')); ?></p>
                                        <span id="linecustom7">1,5,3,6,6,3,6,8,4,2</span>
                                    </div>
                                </div>
                                
                            <?php else: ?> 
                               
                            
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
  
                        <div class="body">
                            <?php echo Form::open(['route'=>['storeFreeAds'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ]); ?> 

                                <div class="row">
                                    <div class="col-md-2"><?php echo e(__('admin.numberFreeAds')); ?></div>
                                    <div class="col-md-10">
                                        <!-- for cost -->
                                        <div class="form-group form-float">
                                            <input type="number" value="<?php echo e(!isset($free_ads->disc_ar)?null:$free_ads->disc_ar); ?>"  class="form-control" step="1" min="0" placeholder="<?php echo e(__('admin.numberFreeAds')); ?>" name="desc_ar" required>
                                            <label id="desc_ar-error" class="error" for="desc_ar" style="">  </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- for type -->
                                <div class= "form-group form-float">
                                    <?php echo Form::hidden('type','free_ads',['class'=>'form-control show-tick']); ?>

                                    <label id="type-error" class="error" for="type" style="">  </label>
                                </div>

                                <!-- for id -->
                                <div class= "form-group form-float">
                                    <?php echo Form::hidden('id',!isset($free_ads->id)?null:$free_ads->id ,['class'=>'form-control show-tick']); ?>

                                </div>
                               
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit"><?php echo e(__('admin.save')); ?></button>
                            </form>
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

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/home.blade.php ENDPATH**/ ?>