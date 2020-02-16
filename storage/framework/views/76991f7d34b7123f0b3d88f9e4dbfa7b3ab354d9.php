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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('subcategories')); ?>"><i class="zmdi zmdi-accounts-add"></i> <?php echo e(__('admin.subcategories')); ?></a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);"><?php echo e(__('admin.add_subcategorie')); ?></a></li>
                    
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
                        <h2><strong><?php echo e(trans('admin.'.$title)); ?></strong> <?php echo e(trans('admin.add_subcategorie')); ?>  </h2>
                        
                    </div>
                    <div class="body">
                        <?php echo Form::open(['route'=>['storesubcategorie'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ]); ?> 
                            <!-- for id -->
                            <div class= "form-group form-float">
                                <?php echo Form::hidden('id',!isset($data->id)?null:$data->id ,['class'=>'form-control show-tick']); ?>

                            </div>
                            <div class= "form-group form-float"> 
                                <?php echo Form::select('category_id',$categories
                                    ,  !isset($data->parent_id)?'':$data->parent_id ,['class'=>'form-control show-tick' ,'placeholder' =>trans('admin.choose_category'),'required']); ?>

                                    <label id="category_id-error" class="error" for="category_id" style="">  </label>
                            </div>
                            <div class="form-group form-float">
                                <input type="text" value="<?php echo e(!isset($data->title_ar)?'':$data->title_ar); ?>" class="form-control" placeholder="<?php echo e(__('admin.placeholder_title_ar')); ?>" name="title_ar" required>
                                <label id="title_ar-error" class="error" for="title_ar" style="">  </label>
                            </div>
                            <div class="form-group form-float">
                                <input type="text" value="<?php echo e(!isset($data->title_en)?'':$data->title_en); ?>" class="form-control" placeholder="<?php echo e(__('admin.placeholder_title_en')); ?>" name="title_en" required>
                                <label id="title_en-error" class="error" for="title_en" style="">  </label>
                            </div>
                            <!-- for image  -->
                            <div class="form-group form-float row"  >
                                
                                <div class= "col-md-2 col-xs-3">
                                    <div class="form-group form-float  " >
                                        <div style="position:relative; ">
                                            <a class='btn btn-primary' href='javascript:;' >
                                                <?php echo e(trans('admin.Choose_Image')); ?>

        
                                                <?php echo Form::file('image',['class'=>'form-control','id' => 'image_field', 'accept'=>'image/x-png,image/gif,image/jpeg' ,'style'=>'position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;','size'=> '40' ,'onchange' => 'readURL(this,"changeimage");' ]); ?>

                                            </a>
                                            &nbsp;
                                            <div class='label label-primary' id="upload-file-info" ></div>
                                            <span style="color: red " class="image text-center hidden"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                <?php if(isset($data->id)): ?>
                                    <img id="changeimage" src="<?php echo e(asset('img/'.$data->image)); ?>" width="100px" height="100px" alt=" <?php echo e(trans('admin.image')); ?>" />
                                <?php else: ?> 
                                    <img id="changeimage" src="<?php echo e(asset('images/default.png')); ?>" width="100px" height="100px" alt=" <?php echo e(trans('admin.image')); ?>" />
                                <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="active" class="with-gap" value="active" checked>
                                    <label for="active"><?php echo e(__('admin.active')); ?></label>
                                </div>                                
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="not_active" class="with-gap" value="not_active" <?php echo ( isset($data->status) && $data->status == 'not_active') ? "checked=''" : ""; ?>>
                                    <label for="not_active"><?php echo e(__('admin.not_active')); ?></label>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <?php if(isset($data->id)): ?>
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit"><?php echo e(__('admin.edit')); ?></button>
                            <?php else: ?>
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit"><?php echo e(__('admin.add')); ?></button>
                            <?php endif; ?>
                        </form>
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
          e.preventDefault();
          var form = $(this);
        //    openModal();
          $.ajax({
              type: 'POST',
              url: '<?php echo e(URL::route("storesubcategorie")); ?>',
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
                        if (data.errors.category_id) {
                            $('#category_id-error').css('display', 'inline-block');
                            $('#category_id-error').text(data.errors.category_id);
                        }
                        
                  } else {
                        window.location.replace("<?php echo e(route('subcategories')); ?>");

                     }
            },
          });
        });

</script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\tabi3\resources\views/subcategories/add.blade.php ENDPATH**/ ?>