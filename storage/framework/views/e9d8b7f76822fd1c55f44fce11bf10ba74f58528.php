<?php $__env->startSection('style'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jquery-spinner/css/bootstrap-spinner.css')); ?>">

<?php if($lang == 'ar'): ?>
    <style>

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1.6px solid #aaa;
            border-radius: 13px;
            max-width: 97%;
            /* border: 1px solid; */
        }
    </style>
    <?php endif; ?>
    <style>
        .addproduct-uploadeimages  .dropzone {
            z-index: 1;
            box-sizing: border-box;
            display: table;
            table-layout: fixed;
            width: 100%;
            height: 200px;
            top: 86px;
            left: 100px;
            background-color: #e6e6e6;
             text-align: center;
            overflow: hidden;
        }
        .addproduct-uploadeimages  .dropzone.is-dragover {
            border-color: #666;
            background: #eee;
        }
        .addproduct-uploadeimages  .dropzone .content {
            display: table-cell;
            vertical-align: middle;
        }
        .addproduct-uploadeimages  .dropzone .uploadd {
            margin: 6px 0 0 2px;
        }
        .addproduct-uploadeimages  .dropzone .filename {
            display: block;
            color: #676767;
            font-size: 14px;
            line-height: 18px;
        }
        .addproduct-uploadeimages  .dropzone .input {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
        }
        .addproduct-uploadeimages  .dropzone .content .uploadd{
            font: Bold 60px/72px Lato;
            color: #000942;
        }
          
        .addproduct-uploadeimages  .dropzone .content .add-image{
            font: Bold 16px/19px Lato;
            color: #000942;
        }
        
        .addproduct-uploadeimages  .dropzone .content .filename{
            
            word-wrap: anywhere;
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
                    <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><i class="zmdi zmdi-home"></i><?php echo e(__('admin.dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('advertisingAdvertisements')); ?>"><i class="zmdi zmdi-accounts-add"></i> <?php echo e(trans('admin.'.$title)); ?></a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);"><?php echo e(__('admin.add_advertisement')); ?></a></li>
                    
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
                        <h2><strong><?php echo e(trans('admin.'.$title)); ?></strong> <?php echo e(trans('admin.add_advertisement')); ?>  </h2>
                    </div>
                    <div class="body ">
                        <?php echo Form::open(['route'=>['storeadvertisingAdvertisement'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ]); ?> 
                            <!-- for id -->
                            <div class= "form-group form-float">
                                <?php echo Form::hidden('id',!isset($data->id)?null:$data->id ,['class'=>'form-control show-tick']); ?>

                            </div>
                        <div class="row">
                            <div class= "form-group form-float col-md-6 d-none">
                                <?php echo Form::select('user_id',$users ,!isset($data->user_id)?null:$data->user_id,['class'=>'form-control show-tick select2' ,'placeholder' =>trans('admin.choose_user'),!isset($data->id)?'':'disabled','required']); ?>

                               
                                    <label id="user_id-error" class="error" for="user_id" style="">  </label>
                            </div>
                           
                            <div class= "form-group form-float col-md-6">
                                <?php echo Form::select('category_id',$categories,!isset($data->category_id)?null:$data->category_id,['class'=>'form-control show-tick select2' ,'id'=>'category_id','placeholder' =>trans('admin.choose_category'),'required']); ?>

                                <label id="category_id-error" class="error" for="category_id" style="">  </label>
                            </div>

                            <div class= "form-group form-float col-md-6">
                                <?php echo Form::select('country_id',$countries,!isset($data->country_id)?null:$data->country_id,['class'=>'form-control show-tick select2' ,'id'=>'country_id','placeholder' =>trans('admin.choose_country'),'required' ]); ?>

                                <label id="country_id-error" class="error" for="country_id" style="">  </label>
                            </div>

                            <div class="form-group form-float col-md-6">
                                <input type="text" value="<?php echo e(!isset($data->title)?'':$data->title); ?>" class="form-control" placeholder="<?php echo e(__('admin.placeholder_title')); ?>" name="title"  >
                                <label id="title-error" class="error" for="title" style="">  </label>
                            </div>

                            <div class="form-group form-float col-md-6">
                                <input type="date" value="<?php echo e(!isset($data->expiry_date)?'':$data->expiry_date); ?>" class="form-control" placeholder="<?php echo e(__('admin.placeholder_expiry_date')); ?>" name="expiry_date" >
                                <label id="expiry_date-error" class="error" for="expiry_date" style="">  </label>
                            </div>

                           
                        </div>

                        
                        
                        <div class="col-md-12 order-md-1">
                        <label for="Category" class="addproduct-label"> <?php echo e(__('admin.images')); ?> </label>
                        </div>
                        <div class="col-md-12 order-md-1">
                            <div class="row">
                            
                                <div class="col-md-3 mb-3 addproduct-uploadeimages">
                                    
                                    <div class="dropzone">
                                        <div class="content">
                                            <img src="<?php echo e(isset($images) && sizeof($images) > 0 ? asset('img/'.$images[0]): ''); ?>" class="uploadd " id="imagediv1" width="190px" style="max-height: 155px;">
                                            <span class="uploadd upload1"> <i class="fa fa-plus"></i></span>
                                            <p class="add-image"> <?php echo e(__('admin.add_image')); ?>   </p>
                                            
                                            <input type="file" class="input"  name="images[]" id="productimage1" accept="image/*">
                                        </div>
                                    </div>
                
                                </div>
                
                                <div class="col-md-3 mb-3 addproduct-uploadeimages">
                                    <div class="dropzone">
                                        <div class="content">
                                            <img src="<?php echo e(isset($images) && sizeof($images) > 1 ? asset('img/'.$images[1]): ''); ?>" class="uploadd " id="imagediv2" width="190px" style="max-height: 155px;">
                                            <span class="uploadd upload2"> <i class="fa fa-plus"></i></span>
                                            <p class="add-image"> <?php echo e(__('admin.add_image')); ?></p>
                                            
                                            <input type="file" class="input"  name="images[]" id="productimage2" accept="image/*">
                                        </div>
                                    </div>
                
                                </div>
                
                                <div class="col-md-3 mb-3 addproduct-uploadeimages">
                                    <div class="dropzone">
                                        <div class="content">
                                            <img src="<?php echo e(isset($images) && sizeof($images) > 2 ? asset('img/'.$images[2]): ''); ?>" class="uploadd " id="imagediv3" width="190px" style="max-height: 155px;">
                                            <span class="uploadd upload3"> <i class="fa fa-plus"></i></span>
                                            <p class="add-image"><?php echo e(__('admin.add_image')); ?></p>
                                            
                                            <input type="file" class="input"  name="images[]" id="productimage3" accept="image/*">
                                        </div>
                                    </div>
                
                                </div>
                
                                <div class="col-md-3 mb-3 addproduct-uploadeimages" >
                                    <div class="dropzone">
                                        <div class="content">
                                            <img src="<?php echo e(isset($images) && sizeof($images) > 3 ? asset('img/'.$images[3]): ''); ?>" class="uploadd " id="imagediv4" width="190px" style="max-height: 155px;">
                                            <span class="uploadd upload4"> <i class="fa fa-plus"></i></span>
                                            <p class="add-image"> <?php echo e(__('admin.add_image')); ?></p>
                                            
                                            <input type="file" class="input" name="images[]" id="productimage4" accept="image/*">
                                        </div>
                                    </div>
                
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-spinner/js/jquery.spinner.js')); ?>"></script> <!-- Jquery Spinner Plugin Js --> 
<script type="text/javascript">

    $("#productimage4").change(function (){

        // fileName = $(this)[0].files[0].name;
        // $('.filename4').html(fileName);
        
        var reader = new FileReader();
        
        reader.onload = function (e) {
            
            $('#imagediv4').attr('src', e.target.result);
            
        }

        reader.readAsDataURL($(this)[0].files[0]);

         
    });

    $("#productimage3").change(function (){

        // fileName = $(this)[0].files[0].name;
        // $('.filename3').html(fileName);
        
        var reader = new FileReader();
        
        reader.onload = function (e) {
            
            $('#imagediv3').attr('src', e.target.result);
            
        }

        reader.readAsDataURL($(this)[0].files[0]);
    });
    $("#productimage2").change(function (){

        // fileName = $(this)[0].files[0].name;
        // $('.filename2').html(fileName);
        $('.dropzone .upload2').hide();
        var reader = new FileReader();
        
        reader.onload = function (e) {
            
            $('#imagediv2').attr('src', e.target.result);
            
        }

        reader.readAsDataURL($(this)[0].files[0]);
    });
    $("#productimage1").change(function (){

        // fileName = $(this)[0].files[0].name
        // $('.filename1').html(fileName);
        $('.dropzone .upload1').hide();
        var reader = new FileReader();
        
        reader.onload = function (e) {
            
            $('#imagediv1').attr('src', e.target.result);
            
        }

        reader.readAsDataURL($(this)[0].files[0]);
    });
     
</script>


<script>
    
        var droppedFiles = false;
        var fileName = '';
        var $dropzone = $('.dropzone');
        var $button = $('.upload-btn');
        var uploading = false;
        var $syncing = $('.syncing');
        var $done = $('.done');
        var $bar = $('.bar');
        var timeOut;
        
        $dropzone.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
        })
            .on('dragover dragenter', function() {
            $dropzone.addClass('is-dragover');
        })
            .on('dragleave dragend drop', function() {
            $dropzone.removeClass('is-dragover');
        })
            .on('drop', function(e) {
            droppedFiles = e.originalEvent.dataTransfer.files;
            fileName = droppedFiles[0]['name'];
            $('.filename').html(fileName);
            $('.dropzone .upload').hide();
        });
        
        $button.bind('click', function() {
            startUpload();
        });
        
        $("input:file").change(function (){
            fileName = $(this)[0].files[0].name;
            $('.filename').html(fileName);
            $('.dropzone .upload').hide();
        });
        
        function startUpload() {
            if (!uploading && fileName != '' ) {
                uploading = true;
                $button.html('Uploading...');
                $dropzone.fadeOut();
                $syncing.addClass('active');
                $done.addClass('active');
                $bar.addClass('active');
                timeoutID = window.setTimeout(showDone, 3200);
            }
        }
        
        function showDone() {
            $button.html('Done');
        }

    //this for add new record
    $("#form_validation").submit(function(e){
           
           $('.add').disabled =true;
          e.preventDefault();
          var form = $(this);
        //    openModal();
          $.ajax({
              type: 'POST',
              url: '<?php echo e(URL::route("storeadvertisingAdvertisement")); ?>',
              data:  new FormData($("#form_validation")[0]),
              processData: false,
              contentType: false,
               
              success: function(data) {
                  if ((data.errors)) {                        
                        if (data.errors.image) {
                            $('#image-error').css('display', 'inline-block');
                            $('#image-error').text(data.errors.image);
                        }
                        if (data.errors.user_id) {
                            $('#user_id-error').css('display', 'inline-block');
                            $('#user_id-error').text(data.errors.user_id);
                        }
                        if (data.errors.country_id) {
                            $('#country_id-error').css('display', 'inline-block');
                            $('#country_id-error').text(data.errors.country_id);
                        }
                        if (data.errors.expiry_date) {
                            $('#expiry_date-error').css('display', 'inline-block');
                            $('#expiry_date-error').text(data.errors.expiry_date);
                        }
                        if (data.errors.title) {
                            $('#title-error').css('display', 'inline-block');
                            $('#title-error').text(data.errors.title);
                        }
                        if (data.errors.category_id) {
                            $('#category_id-error').css('display', 'inline-block');
                            $('#category_id-error').text(data.errors.category_id);
                        }
                        if (data.errors.number) {
                            $('#number-error').css('display', 'inline-block');
                            $('#number-error').text(data.errors.number);
                        }
                        if (data.errors.total) {
                            $('#total-error').css('display', 'inline-block');
                            $('#total-error').text(data.errors.total);
                        }
                        if (data.errors.status) {
                            $('#status-error').css('display', 'inline-block');
                            $('#status-error').text(data.errors.status);
                        }
 
                  } else {
                      
                        window.location.replace("<?php echo e(route('advertisingAdvertisements')); ?>");

                     }
            },
          });
    });

    $('.select2').select2();
    number = $('#number').val();
    id = $('#package_id').val();
    if(id !=''){
        $.ajax({
            type: 'GET',
            url: "<?php echo url('/')?>/packagedetail/"+id,
            success: data => {
                
                if(!data.detail){
                    alert("<?php echo e(trans('admin.notfounddetail')); ?>");
                }
                $('#page').val(data.detail.page);
                $('#type').val(data.detail.type);
                $('#cost').val(data.detail.cost);
                if(number > 0){
                    $('#total').val(data.detail.cost * number);
                }else{
                    $('#total').val(data.detail.cost);
                }
            }
        })
    }

    $('#package_id').on('change', e => {
        $('#page').val('');
        $('#type').val('');
        $('#cost').val('');
        $('#total').val('');
        number = $('#number').val();
        id = $('#package_id').val();
        if(id !=''){
            $.ajax({
                type: 'GET',
                url: "<?php echo url('/')?>/packagedetail/"+id,
                success: data => {
                    
                    if(!data.detail){
                        alert("<?php echo e(trans('admin.notfounddetail')); ?>");
                    }
                    $('#page').val(data.detail.page);
                    $('#type').val(data.detail.type);
                    $('#cost').val(data.detail.cost);
                    if(number > 0){
                        $('#total').val(data.detail.cost * number);
                    }else{
                        $('#total').val(data.detail.cost);
                    }
                }
            })
        }
        
    });

    $('#number').on('change', e => {
        number = $('#number').val();
        console.log(number)
        cost =  $('#cost').val();
        if(number > 0){
            $('#total').val(cost * number);
        }else{
            $('#number').val('1');
            $('#total').val(cost);
        }
        $('#page').val('');
        $('#type').val('');
        $('#cost').val('');
        number = $('#number').val();
        id = $('#package_id').val();
        if(id !=''){
            $.ajax({
                type: 'GET',
                url: "<?php echo url('/')?>/packagedetail/"+id,
                success: data => {
                    console.log(data)
                    if(!data.detail){
                        alert("<?php echo e(trans('admin.notfounddetail')); ?>");
                    }
                    $('#page').val(data.detail.page);
                    $('#type').val(data.detail.type);
                    $('#cost').val(data.detail.cost);
                    if(number > 0){
                        $('#total').val(data.detail.cost * number);
                    }else{
                        $('#total').val(data.detail.cost);
                    }
                }
            })
        }
        
    });
</script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tabi3\resources\views/advertisingAdvertisements/add.blade.php ENDPATH**/ ?>