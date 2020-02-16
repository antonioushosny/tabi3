<?php $__env->startSection('styleww'); ?>
    <style> 
        .hidden{
            display:none ;
        }
    </style>
<?php $__env->stopSection(); ?>
 <?php $__env->startSection('main'); ?>
<!-- Main Content -->

    <div class="container-fluid pt-3">
        <!-- for statics -->
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="">
                    <div class="body">
                        <div class="row ">
                            <?php if(Auth::user()->role == 'admin'): ?>
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-primary ">
                                        <a href="<?php echo e(route('users')); ?>">
                                        <h2 class="number count-to m-t-0 m-b-5 text-white" ><?php echo e($users); ?></h2></a>
                                        <p class="text-muted"><?php echo e(trans('admin.users')); ?></p>
                                         
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-secondary">
                                        <a href="<?php echo e(route('delegates')); ?>"><h2 class="number count-to m-t-0 m-b-5"  ><?php echo e($delegates); ?></h2></a>
                                        <p class="text-muted "><?php echo e(trans('admin.delegates')); ?></p>
                                     </div>
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-success">
                                        <a href="<?php echo e(route('departments')); ?>"><h2 class="number count-to m-t-0 m-b-5" ><?php echo e($departments); ?></h2></a>
                                        <p class="text-muted"><?php echo e(trans('admin.departments')); ?></p>
                                     </div>
                                </div>
                                
                            <?php else: ?> 
                               
                            
                            <?php endif; ?>
                        </div>

                        <div class="row  mt-3">
                            <?php if(Auth::user()->role == 'admin'): ?>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-danger">
                                        <a href="<?php echo e(route('users')); ?>">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($iosusers); ?>" data-speed="1000" data-fresh-interval="700"><?php echo e($iosusers); ?></h2></a>
                                        <p class="text-muted"><?php echo e(trans('admin.iosusers')); ?></p>
                                         
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-warning">
                                        <a href="<?php echo e(route('users')); ?>"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($androidusers); ?>" data-speed="2000" data-fresh-interval="700"><?php echo e($androidusers); ?></h2></a>
                                        <p class="text-muted "><?php echo e(trans('admin.androidusers')); ?></p>
                                     </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-info">
                                        <a href="<?php echo e(route('advertisements')); ?>"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($installAds); ?>" data-speed="2000" data-fresh-interval="700"><?php echo e($installAds); ?></h2></a>
                                        <p class="text-muted"><?php echo e(trans('admin.installAds')); ?></p>
                                     </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-light">
                                        <a href="<?php echo e(route('advertisements')); ?>"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="<?php echo e($starAds); ?>" data-speed="2000" data-fresh-interval="700"><?php echo e($starAds); ?></h2></a>
                                        <p class="text-muted"><?php echo e(trans('admin.starAds')); ?></p>
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
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class=" ">
  
                        <div class="body">
                            <?php echo Form::open(['route'=>['storeFreeAds'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ]); ?> 

                                <div class="row text-center align-items-center">
                                    <div class="col-md-2"><?php echo e(__('admin.numberFreeAds')); ?></div>
                                    <div class="col-md-4">
                                        <!-- for cost -->
                                        <input type="number" value="<?php echo e(!isset($free_ads->disc_ar)?null:$free_ads->disc_ar); ?>"  class="form-control" step="1" min="0" placeholder="<?php echo e(__('admin.numberFreeAds')); ?>" name="desc_ar" required>                   
                                    </div>
                                    <label id="desc_ar-error" class="error" for="desc_ar" style="">  </label>

                                    <?php echo Form::hidden('type','free_ads',['class'=>'form-control show-tick']); ?>

                                    
                                    <?php echo Form::hidden('id',!isset($free_ads->id)?null:$free_ads->id ,['class'=>'form-control show-tick']); ?>

                                       
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">  

                                    <div class="col-md-2">  
                                        <button class="btn btn-raised btn-primary btn-round waves-effect  " type="submit"><?php echo e(__('admin.save')); ?></button>
                                    </div>
                                       
                                  
                                </div>
                               
                               
                            </form>
                        </div>
                </div>
            </div>
        </div>
       
    </div>

   
 
  
<?php $__env->stopSection(); ?> 


<?php $__env->startSection('scriptww'); ?>
<script src="<?php echo e(asset('assets/bundles/morrisscripts.bundle.js')); ?>"></script><!-- Morris Plugin Js -->
<script src="<?php echo e(asset('assets/bundles/jvectormap.bundle.js')); ?>"></script> <!-- JVectorMap Plugin Js -->
<script src="<?php echo e(asset('assets/bundles/knob.bundle.js')); ?>"></script> <!-- Jquery Knob, Count To, Sparkline Js -->
<script src="<?php echo e(asset('assets/js/pages/index.js')); ?>"></script>


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/home.blade.php ENDPATH**/ ?>