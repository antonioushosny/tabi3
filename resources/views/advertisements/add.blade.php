@extends('layouts.index')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-spinner/css/bootstrap-spinner.css') }}">

@if($lang == 'ar')
    <style>

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1.6px solid #aaa;
            border-radius: 13px;
            max-width: 97%;
            /* border: 1px solid; */
        }
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
@endif
@endsection
 @section('content')
<!-- Main Content -->
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>{{__('admin.dashboard')}}
                <small>{{__('admin.Welcome to beitk')}}</small>
                </h2>
            </div>            
                @if($lang =='ar')
                <div class="col-lg-7 col-md-7 col-sm-12 text-left">
                <ul class="breadcrumb float-md-left" style=" padding: 0.6rem; direction: ltr; ">
                @else 
                <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                @endif
                    <li class="breadcrumb-item active"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i>{{__('admin.dashboard')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('advertisements')}}"><i class="zmdi zmdi-accounts-add"></i> {{__('admin.advertisements')}}</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">{{__('admin.add_advertisement')}}</a></li>
                    
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
                        <h2><strong>{{trans('admin.'.$title)}}</strong> {{trans('admin.add_advertisement')}}  </h2>
                    </div>
                    <div class="body ">
                        {!! Form::open(['route'=>['storeadvertisement'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ])!!} 
                            <!-- for id -->
                            <div class= "form-group form-float">
                                {!! Form::hidden('id',!isset($data->id)?null:$data->id ,['class'=>'form-control show-tick']) !!}
                            </div>
                        <div class="row">
                            <div class= "form-group form-float col-md-6">
                                {!! Form::select('user_id',$users ,!isset($data->user_id)?null:$data->user_id,['class'=>'form-control show-tick select2' ,'placeholder' =>trans('admin.choose_user'),!isset($data->id)?'':'disabled','required']) !!}
                               
                                    <label id="user_id-error" class="error" for="user_id" style="">  </label>
                            </div>
                           
                            <div class= "form-group form-float col-md-6">
                                {!! Form::select('category_id',$categories,!isset($data->category_id)?null:$data->category_id,['class'=>'form-control show-tick select2' ,'id'=>'category_id','placeholder' =>trans('admin.choose_category'),'required',!isset($data->id)?'':'disabled']) !!}
                                <label id="category_id-error" class="error" for="category_id" style="">  </label>
                            </div>

                            <div class="form-group form-float col-md-6">
                                <input type="text" value="{{ !isset($data->page)?'':$data->page }}" class="form-control" placeholder="{{__('admin.placeholder_page')}}" id='page' name="page" readonly required>
                                <label id="page-error" class="error" for="page" style="">  </label>
                            </div>

                            <div class="form-group form-float col-md-6">
                                <input type="type" value="{{ !isset($data->type)?'':$data->type }}" class="form-control" placeholder="{{__('admin.placeholder_type')}}" id='type' name="type" readonly required>
                                <label id="type-error" class="error" for="type" style="">  </label>
                            </div>

                            <div class="form-group form-float col-md-6">
                                <input type="text" value="{{ !isset($data->cost)?'':$data->cost }}" class="form-control" placeholder="{{__('admin.placeholder_cost')}}" id='cost' name="cost" readonly required>
                                <label id="cost-error" class="error" for="cost" style="">  </label>
                            </div>

                            <div class="form-group form-float col-md-6">
                                <input type="text" value="{{ !isset($data->number)?'1':$data->number }}" class="form-control" placeholder="{{__('admin.placeholder_number')}}" name="number"  id="number" onkeypress="isNumber(event); " {{ !isset($data->id)?' ': 'readonly'}}  required>
                                <label id="number-error" class="error" for="number" style="">  </label>
                            </div>

                            <div class="form-group form-float col-md-6">
                                <input type="text" value="{{ !isset($data->total)?'':$data->total }}" class="form-control" placeholder="{{__('admin.placeholder_total')}}" id='total' name="total" readonly required>
                                <label id="total-error" class="error" for="total" style="">  </label>
                            </div>

                            <div class="form-group form-float col-md-6">
                                <input type="text" value="{{ !isset($data->title)?'':$data->title }}" class="form-control" placeholder="{{__('admin.placeholder_title')}}" name="title"  >
                                <label id="title-error" class="error" for="title" style="">  </label>
                            </div>

                            <div class="form-group form-float col-md-6">
                                <input type="text" value="{{ !isset($data->link)?'':$data->link }}" class="form-control" placeholder="{{__('admin.placeholder_link')}}" name="link" >
                                <label id="link-error" class="error" for="link" style="">  </label>
                            </div>

                            <!-- for image  -->
                            <div class="form-group form-float row col-md-6"  >
                                {{--  for image  --}}
                                <div class= "col-md-2 col-xs-3">
                                    <div class="form-group form-float  " >
                                        <div style="position:relative; ">
                                            <a class='btn btn-primary' href='javascript:;' >
                                                {{trans('admin.Choose_Image')}}
        
                                                {!! Form::file('image',['class'=>'form-control','id' => 'image_field', 'accept'=>'image/x-png,image/gif,image/jpeg' ,'style'=>'position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;','size'=> '40' ,'onchange' => 'readURL(this,"changeimage");' ]) !!}
                                            </a>
                                            &nbsp;
                                            <div class='label label-primary' id="upload-file-info" ></div>
                                            <span style="color: red " class="image text-center hidden"></span>
                                            <label id="image-error" class="error" for="image" style="">  </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                @if(isset($data->id))
                                    <img id="changeimage" src="{{asset('img/'.$data->image)}}" width="100px" height="100px" alt=" {{trans('admin.image')}}" />
                                @else 
                                    <img id="changeimage" src="{{asset('images/default.png')}}" width="100px" height="100px" alt=" {{trans('admin.image')}}" />
                                @endif
                                </div>
                            </div>
                        </div>

                        
			{{-- start product images   --}}
			<div class="col-md-12 order-md-1">
                <label for="Category" class="addproduct-label"> {{ __('lang.products_images') }} </label>
                </div>
                <div class="col-md-12 order-md-1">
                    <div class="row">
                    
                      <div class="col-md-3 mb-3 addproduct-uploadeimages">
                      
                        <div class="dropzone">
                            <div class="content">
                                <img src="" class="uploadd " id="imagediv1" width="190px">
                                <span class="uploadd upload1"> <i class="fa fa-plus"></i></span>
                                <p class="add-image"> {{ __('lang.add_image') }}   </p>
                                {{--  <span class="filename filename1"></span>  --}}
                                <input type="file" class="input"  name="products_images[]" id="productimage1" accept="image/*">
                            </div>
                        </div>
     
                      </div>
    
                      <div class="col-md-3 mb-3 addproduct-uploadeimages">
                        <div class="dropzone">
                            <div class="content">
                                <img src="" class="uploadd " id="imagediv2" width="190px">
                                <span class="uploadd upload2"> <i class="fa fa-plus"></i></span>
                                <p class="add-image"> {{ __('lang.add_image') }}</p>
                                {{--  <span class="filename filename2"></span>  --}}
                                <input type="file" class="input"  name="products_images[]" id="productimage2" accept="image/*">
                            </div>
                        </div>
     
                      </div>
    
                      <div class="col-md-3 mb-3 addproduct-uploadeimages">
                         <div class="dropzone">
                            <div class="content">
                                <img src="" class="uploadd " id="imagediv3" width="190px">
                                <span class="uploadd upload3"> <i class="fa fa-plus"></i></span>
                                <p class="add-image">{{ __('lang.add_image') }}</p>
                                {{--  <span class="filename filename3"></span>  --}}
                                <input type="file" class="input"  name="products_images[]" id="productimage3" accept="image/*">
                            </div>
                        </div>
     
                      </div>
    
                      <div class="col-md-3 mb-3 addproduct-uploadeimages" >
                         <div class="dropzone">
                            <div class="content">
                                <img src="" class="uploadd " id="imagediv4" width="190px">
                                <span class="uploadd upload4"> <i class="fa fa-plus"></i></span>
                                <p class="add-image"> {{ __('lang.add_image') }}</p>
                                {{--  <span class="filename filename4"></span>  --}}
                                <input type="file" class="input" name="products_images[]" id="productimage4" accept="image/*">
                            </div>
                        </div>
     
                      </div>
    

                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="active" class="with-gap" value="active" checked>
                                    <label for="active">{{__('admin.active')}}</label>
                                </div>                                
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="not_active" class="with-gap" value="not_active" <?php echo ( isset($data->status) && $data->status == 'not_active') ? "checked=''" : ""; ?>>
                                    <label for="not_active">{{__('admin.not_active')}}</label>
                                </div>
                            </div>
                   
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         
                            @if(isset($data->id))
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">{{__('admin.edit')}}</button>
                            @else
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">{{__('admin.add')}}</button>
                            @endif
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
    </div>

</section>
  
@endsection 

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script src="{{asset('assets/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script> <!-- Jquery Spinner Plugin Js --> 
<script type="text/javascript">

    $("#productimage4").change(function (){

        // fileName = $(this)[0].files[0].name;
        // $('.filename4').html(fileName);
        {{--  $('.dropzone .upload4').hide();  --}}
        var reader = new FileReader();
        
        reader.onload = function (e) {
            {{--  console.log(e.target.result)  --}}
            $('#imagediv4').attr('src', e.target.result);
            {{--  $('#imagediv4').removeClass('hidden');  --}}
        }

        reader.readAsDataURL($(this)[0].files[0]);

         
    });

    $("#productimage3").change(function (){

        // fileName = $(this)[0].files[0].name;
        // $('.filename3').html(fileName);
        {{--  $('.dropzone .upload3').hide();  --}}
        var reader = new FileReader();
        
        reader.onload = function (e) {
            {{--  console.log(e.target.result)  --}}
            $('#imagediv3').attr('src', e.target.result);
            {{--  $('#imagediv3').removeClass('hidden');  --}}
        }

        reader.readAsDataURL($(this)[0].files[0]);
    });
    $("#productimage2").change(function (){

        // fileName = $(this)[0].files[0].name;
        // $('.filename2').html(fileName);
        $('.dropzone .upload2').hide();
        var reader = new FileReader();
        
        reader.onload = function (e) {
            {{--  console.log(e.target.result)  --}}
            $('#imagediv2').attr('src', e.target.result);
            {{--  $('#imagediv2').removeClass('hidden');  --}}
        }

        reader.readAsDataURL($(this)[0].files[0]);
    });
    $("#productimage1").change(function (){

        // fileName = $(this)[0].files[0].name
        // $('.filename1').html(fileName);
        $('.dropzone .upload1').hide();
        var reader = new FileReader();
        
        reader.onload = function (e) {
            {{--  console.log(e.target.result)  --}}
            $('#imagediv1').attr('src', e.target.result);
            {{--  $('#imagediv1').removeClass('hidden');  --}}
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
           {{--  $('#addModal').modal('hide');  --}}
           $('.add').disabled =true;
          e.preventDefault();
          var form = $(this);
        //    openModal();
          $.ajax({
              type: 'POST',
              url: '{{ URL::route("storeadvertisement") }}',
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
                        if (data.errors.user_id) {
                            $('#package_id-error').css('display', 'inline-block');
                            $('#package_id-error').text(data.errors.package_id);
                        }
                        if (data.errors.type) {
                            $('#type-error').css('display', 'inline-block');
                            $('#type-error').text(data.errors.type);
                        }
                        if (data.errors.page) {
                            $('#page-error').css('display', 'inline-block');
                            $('#page-error').text(data.errors.page);
                        }
                        if (data.errors.cost) {
                            $('#cost-error').css('display', 'inline-block');
                            $('#cost-error').text(data.errors.cost);
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
                        window.location.replace("{{route('advertisements')}}");

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
                {{-- console.log(data) --}}
                if(!data.detail){
                    alert("{{trans('admin.notfounddetail')}}");
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
                    {{-- console.log(data) --}}
                    if(!data.detail){
                        alert("{{trans('admin.notfounddetail')}}");
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
                        alert("{{trans('admin.notfounddetail')}}");
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
    
@endsection
