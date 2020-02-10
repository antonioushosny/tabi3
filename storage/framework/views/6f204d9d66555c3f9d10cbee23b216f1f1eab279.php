<?php $__env->startSection('style'); ?>

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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('settings',$type)); ?>"><i class="zmdi zmdi-accounts-add"></i> <?php echo e(__('admin.settings')); ?></a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);"><?php echo e(!isset($data->title_en)?__('admin.add_setting'):__('admin.edit_setting')); ?> </a></li>
                    
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
                            <h2><strong><?php echo e(trans('admin.'.$title)); ?></strong> <?php echo e(trans('admin.add_setting')); ?>  </h2>
                            
                        </div>
                        <div class="body">
                            <?php echo Form::open(['route'=>['storesetting'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ]); ?> 

                                <div class="row">
                                    <div class="col-md-1"><?php echo e(__('admin.title_ar')); ?></div>
                                    <div class="col-md-5">
                                        <!-- for title_ar -->
                                        <div class="form-group form-float">
                                            <input type="text" value="<?php echo e(!isset($data->title_ar)?'':$data->title_ar); ?>" class="form-control" placeholder="<?php echo e(__('admin.placeholder_title_ar')); ?>" name="title_ar" required>
                                            <label id="name-ar-error" class="error" for="title_ar" style="">  </label>
                                        </div>
                                    </div>
                                    <div class="col-md-1"><?php echo e(__('admin.title_en')); ?></div>
                                    <div class="col-md-5">
                                        <!-- for title_en -->
                                        <div class="form-group form-float">
                                            <input type="text" value="<?php echo e(!isset($data->title_en)?null:$data->title_en); ?>"  class="form-control" placeholder="<?php echo e(__('admin.placeholder_title_en')); ?>" name="title_en" required>
                                            <label id="name-en-error" class="error" for="title_en" style="">  </label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2> <strong><?php echo e(__('admin.desc_ar')); ?></strong>  </h2>
                                                <ul class="header-dropdown">
                                                    
                                                </ul>
                                            </div>
                                            <div class="body">
                                                <textarea id="ckeditor" name="desc_ar" placeholder="<?php echo e(__('admin.placeholder_desc_ar')); ?>">
                                                    <?php echo e(!isset($data->disc_ar)?' ':$data->disc_ar); ?>

                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2> <strong><?php echo e(__('admin.desc_en')); ?></strong>  </h2>
                                                <ul class="header-dropdown">
                                                   
                                                </ul>
                                            </div>
                                            <div class="body">
                                                <textarea id="ckeditor2" name="desc_en" placeholder="<?php echo e(__('admin.disc_ar')); ?>">
                                                    <?php echo e(!isset($data->disc_en)?' ':$data->disc_en); ?>

                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- for type -->
                                <div class= "form-group form-float">
                                    <?php echo Form::hidden('type',$type,['class'=>'form-control show-tick']); ?>

                                    <label id="type-error" class="error" for="type" style="">  </label>
                                </div>

                                <!-- for id -->
                                <div class= "form-group form-float">
                                    <?php echo Form::hidden('id',!isset($data->id)?null:$data->id ,['class'=>'form-control show-tick']); ?>

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


<script src="<?php echo e(asset('assets/plugins/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/forms/editors.js')); ?>"></script>


<script>

    //this for add new record
    $("#form_validation").submit(function(e){
           
           $('.add').disabled =true;
          e.preventDefault();
          var form = $(this);
        //    openModal();
          $.ajax({
              type: 'POST',
              url: '<?php echo e(URL::route("storesetting")); ?>',
              data:  new FormData($("#form_validation")[0]),
              processData: false,
              contentType: false,
               
              success: function(data) {
                  if ((data.errors)) {                        
                        if (data.errors.title_ar) {
                            $('#title_ar-error').css('display', 'inline-block');
                            $('#title_ar-error').text(data.errors.title_ar);
                        }
                        if (data.errors.title_en) {
                            $('#title_en-error').css('display', 'inline-block');
                            $('#title_en-error').text(data.errors.title_en);
                        }
                        if (data.errors.desc_en) {
                            $('#desc_en-error').css('display', 'inline-block');
                            $('#desc_en-error').text(data.errors.desc_en);
                        }
                        if (data.errors.desc_ar) {
                            $('#desc_ar-error').css('display', 'inline-block');
                            $('#desc_ar-error').text(data.errors.desc_ar);
                        }
                  } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo e(URL::route("storesetting")); ?>',
                        data:  new FormData($("#form_validation")[0]),
                        processData: false,
                        contentType: false,
                         
                        success: function(data) {
                            if ((data.errors)) {                        
                                  if (data.errors.title_ar) {
                                      $('#title_ar-error').css('display', 'inline-block');
                                      $('#title_ar-error').text(data.errors.title_ar);
                                  }
                                  if (data.errors.title_en) {
                                      $('#title_en-error').css('display', 'inline-block');
                                      $('#title_en-error').text(data.errors.title_en);
                                  }
                                  if (data.errors.desc_en) {
                                      $('#desc_en-error').css('display', 'inline-block');
                                      $('#desc_en-error').text(data.errors.desc_en);
                                  }
                                  if (data.errors.desc_ar) {
                                      $('#desc_ar-error').css('display', 'inline-block');
                                      $('#desc_ar-error').text(data.errors.desc_ar);
                                  }
                            } else {
                                  location.reload();
          
                               }
                      },
                    });

                     }
            },
          });
        });

</script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/settings/add.blade.php ENDPATH**/ ?>