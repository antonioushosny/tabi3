<?php $__env->startSection('style'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jquery-spinner/css/bootstrap-spinner.css')); ?>">

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
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><i class="zmdi zmdi-home"></i><?php echo e(__('admin.dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('advertisements')); ?>"><i class="zmdi zmdi-accounts-add"></i> <?php echo e(__('admin.advertisements')); ?></a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);"><?php echo e(__('admin.show_advertisement')); ?></a></li>
                    
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong><?php echo e(trans('admin.'.$title)); ?></strong> <?php echo e(trans('admin.show_advertisement')); ?>  </h2>
                    </div>
                    <div class="body ">
                        <div class="row">
                            <div class="col-md-2 col-6 p-2 "><?php echo e(trans('admin.user')); ?></div>
                            <div class="col-md-4 col-6 p-2 ">    
                                <?php if($data->user): ?>
                                 <?php echo e($data->user->name); ?> 
                                <?php endif; ?>
                            </div>

                            <div class="col-md-2 col-6 p-2 "> <?php echo e(trans('admin.title')); ?> </div>
                            <div class="col-md-4 col-6  p-2"> <?php echo e($data->title); ?> </div>

                            <div class="col-md-2 col-6  p-2">  <?php echo e(trans('admin.cost')); ?></div>
                            <div class="col-md-4 col-6  p-2">  <?php echo e($data->cost); ?> </div>

                            <div class="col-md-2 col-6  p-2">  <?php echo e(trans('admin.cost_advertising')); ?></div>
                            <div class="col-md-4 col-6  p-2"><?php echo e($data->cost_advertising); ?></div>
                            
                            <div class="col-md-2 col-6  p-2">   <?php echo e(trans('admin.cost_benefits')); ?> </div>
                            <div class="col-md-4 col-6  p-2"><?php echo e($data->cost_benefits); ?></div>

                            <div class="col-md-2 col-6  p-2">    <?php echo e(trans('admin.total')); ?> </div>
                            <div class="col-md-4 col-6  p-2"><?php echo e($data->total); ?></div>

                            <div class="col-md-2 col-6  p-2">     <?php echo e(trans('admin.expiry_date')); ?> </div>
                            <div class="col-md-4 col-6  p-2"> <?php echo e($data->expiry_date); ?> </div>

                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.status')); ?>   </div>
                            <div class="col-md-4 col-6  p-2"><?php echo e(trans('admin.'.$data->status)); ?></div>

                            <div class="col-md-2 col-6  p-2">  <?php echo e(trans('admin.allow_messages')); ?>  </div>
                            <div class="col-md-4 col-6  p-2">  <?php echo e(( isset( $data->allow_messages) && $data->allow_messages == '1') ? __('admin.yes') : __('admin.no')); ?> </div>

                            <div class="col-md-2 col-6  p-2">  <?php echo e(trans('admin.allow_call')); ?>  </div>
                            <div class="col-md-4 col-6  p-2">  <?php echo e(( isset( $data->allow_call) && $data->allow_call == '1') ? __('admin.yes') : __('admin.no')); ?> </div>

                            


                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.not_disturb')); ?>   </div>
                            <div class="col-md-4 col-6  p-2"> <?php echo e(( isset( $data->not_disturb) && $data->not_disturb == '1' )? __('admin.yes') : __('admin.no')); ?></div>

                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.numbers')); ?>   </div>
                            <div class="col-md-4 col-6  p-2">
                                    <?php $numbers = json_decode($data->numbers) ; ?> 
                                    <?php $__currentLoopData = $numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php echo e($number); ?> , 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </div>

                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.star')); ?>   </div>
                            <div class="col-md-4 col-6  p-2"> <?php echo e(( isset( $data->star) && $data->star == '1') ? __('admin.yes') : __('admin.no')); ?></div>

                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.address')); ?>   </div>
                            <div class="col-md-4 col-6  p-2"> <?php echo e($data->address); ?></div>

                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.category')); ?>   </div>
                            <div class="col-md-4 col-6  p-2"> <?php echo e(( isset( $data->category) && $lang=='ar') ? $data->category->title_ar : ''); ?></div>

                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.subcategory')); ?>   </div>
                            <div class="col-md-4 col-6  p-2"> <?php echo e(( isset( $data->subcategory) && $lang=='ar') ? $data->subcategory->title_ar : ''); ?></div>

                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.country')); ?>   </div>
                            <div class="col-md-4 col-6  p-2">  <?php echo e(( isset( $data->country) && $lang=='ar') ? $data->country->title_ar : ''); ?></div>

                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.city')); ?>   </div>
                            <div class="col-md-4 col-6  p-2"> <?php echo e(( isset( $data->city) && $lang=='ar') ? $data->city->title_ar : ''); ?></div>

                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.area')); ?>   </div>
                            <div class="col-md-4 col-6  p-2"> <?php echo e(( isset( $data->area) && $lang=='ar') ? $data->area->title_ar : ''); ?></div>

                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.install')); ?>   </div>
                            <div class="col-md-4 col-6  p-2"> <?php echo e(( isset( $data->install) && $data->install == '1') ? __('admin.yes') : __('admin.no')); ?></div>

                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.disc')); ?>   </div>
                            <div class="col-md-4 col-6  p-2"> <?php echo e($data->disc); ?></div>

                           

                            


                        </div>

                     

                        <div class="row">
                            <div class="col-md-2 col-6  p-2"> <?php echo e(trans('admin.images')); ?>   </div>
                            <div class="col-md-10 col-6  p-2">
                                <?php $images = json_decode($data->images) ; ?> 
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <a href="<?php echo e(asset('img/').'/'. $image); ?>" target="_blank" class="mx-2"> <img src="<?php echo e(asset('img/').'/'. $image); ?>" width="200px" height="200px" >  </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </div>
                        </div>
                        <?php if($data->video): ?>
                        <div class="row">
                            <div class="col-md-3 col-3  p-2"> <?php echo e(trans('admin.video')); ?>   </div>
                            <div class="col-md-9 col-6  p-2">
                                <video>  <source src="<?php echo e(asset('img/').'/'.$data->video); ?>" type="video/mp4"  width="250px" hieght="250px"></video> 
                            </div>
                        </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
  
    </div>
 
 

</section>
  
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('script'); ?>
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tabi3\resources\views/advertisements/show.blade.php ENDPATH**/ ?>