<?php $__env->startSection('style'); ?>
<style>
    .btn.btn-simple, .navbar .navbar-nav>a.btn.btn-simple {
        color: #171515;
        border-color: #8c99e0 !important ;
    }
    /* .btn:hover, .btn:focus, .btn:active, .btn.active, .btn:active:focus, .btn:active:hover, .btn.active:focus, .btn.active:hover, .show>.btn.dropdown-toggle, .show>.btn.dropdown-toggle:focus, .show>.btn.dropdown-toggle:hover, .navbar .navbar-nav>a.btn:hover, .navbar .navbar-nav>a.btn:focus, .navbar .navbar-nav>a.btn:active, .navbar .navbar-nav>a.btn.active, .navbar .navbar-nav>a.btn:active:focus, .navbar .navbar-nav>a.btn:active:hover, .navbar .navbar-nav>a.btn.active:focus, .navbar .navbar-nav>a.btn.active:hover, .show>.navbar .navbar-nav>a.btn.dropdown-toggle, .show>.navbar .navbar-nav>a.btn.dropdown-toggle:focus, .show>.navbar .navbar-nav>a.btn.dropdown-toggle:hover {
        background-color: #ffffff !important ;
        color: #fff;
    } */
    
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
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><i class="zmdi zmdi-home"></i><?php echo e(__('admin.dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('areas')); ?>"><i class="zmdi zmdi-accounts-add"></i> <?php echo e(__('admin.areas')); ?></a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);"><?php echo e(__('admin.add_area')); ?></a></li>
                    
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
                        <h2><strong><?php echo e(trans('admin.'.$title)); ?></strong> <?php echo e(trans('admin.add_area')); ?>  </h2>
                        
                    </div>
                    <div class="body row">
                        <div class="col-lg-6">
                            <?php echo Form::open(['route'=>['storearea'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ]); ?> 
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="<?php echo e(__('admin.placeholder_title_ar')); ?>" name="title_ar" required>
                                    <label id="name-ar-error" class="error" for="title_ar" style="">  </label>
                                </div>
                                <div class="form-group form-float">
                                    <input type="text" class="form-control" placeholder="<?php echo e(__('admin.placeholder_title_en')); ?>" name="title_en" required>
                                    <label id="name-en-error" class="error" for="title_en" style="">  </label>
                                </div>
                                <div class= "form-group form-float"> 
                                    <?php echo Form::select('city_id',$cities
                                        ,'',['class'=>'form-control show-tick' ,'placeholder' =>trans('admin.choose_city'),'required']); ?>

                                        <label id="city-id-error" class="error" for="city_id" style="">  </label>
                                </div>
                            
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="status" id="active" class="with-gap" value="active" checked="">
                                        <label for="active"><?php echo e(__('admin.active')); ?></label>
                                    </div>                                
                                    <div class="radio inlineblock">
                                        <input type="radio" name="status" id="not_active" class="with-gap" value="not_active" >
                                        <label for="not_active"><?php echo e(__('admin.not_active')); ?></label>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit"><?php echo e(__('admin.add')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
    </div>

</section>
  
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('script'); ?>


<script>
    //this for add new record
    $("#form_validation").submit(function(e){
           
           $('.add').disabled =true;
           $(':input[type="submit"]').prop('disabled', true);
          e.preventDefault();
          var form = $(this);
        //    openModal();
          $.ajax({
              type: 'POST',
              url: '<?php echo e(URL::route("storearea")); ?>',
              data:  new FormData($("#form_validation")[0]),
              processData: false,
              contentType: false,
               
              success: function(data) {
                  if ((data.errors)) {   
                    $(':input[type="submit"]').prop('disabled', false);                     
                        if (data.errors.title_ar) {
                            $('#name-ar-error').css('display', 'inline-block');
                            $('#name-ar-error').text(data.errors.title_ar);
                        }
                        if (data.errors.title_en) {
                            $('#name-en-error').css('display', 'inline-block');
                            $('#name-en-error').text(data.errors.title_en);
                        }
                        if (data.errors.city_id) {
                            $('#city-id-error').css('display', 'inline-block');
                            $('#city-id-error').text(data.errors.city_id);
                        }
                        
                  } else {
                        window.location.replace("<?php echo e(route('areas')); ?>");

                     }
            },
          });
        });

</script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp7\htdocs\tabi3\resources\views/areas/add.blade.php ENDPATH**/ ?>