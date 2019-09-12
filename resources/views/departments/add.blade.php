@extends('layouts.index')
@section('style')

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
                    <li class="breadcrumb-item"><a href="{{route('departments')}}"><i class="zmdi zmdi-accounts-add"></i> {{__('admin.departments')}}</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">{{__('admin.add_department')}}</a></li>
                    
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
                        <h2><strong>{{trans('admin.'.$title)}}</strong> {{trans('admin.add_department')}}  </h2>
                        
                    </div>
                    <div class="body">
                        {!! Form::open(['route'=>['storedepartment'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ])!!} 
                            <!-- for id -->
                            <div class= "form-group form-float">
                                {!! Form::hidden('id',!isset($data->id)?null:$data->id ,['class'=>'form-control show-tick']) !!}
                            </div>
                            <div class= "form-group form-float"> 
                                {!! Form::select('category_id',$categories
                                    ,'',['class'=>'form-control show-tick' ,'placeholder' =>trans('admin.choose_category'),'required']) !!}
                                    <label id="category_id-error" class="error" for="category_id" style="">  </label>
                            </div>
                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->title_ar)?'':$data->title_ar }}" class="form-control" placeholder="{{__('admin.placeholder_title_ar')}}" name="title_ar" required>
                                <label id="title_ar-error" class="error" for="title_ar" style="">  </label>
                            </div>
                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->title_en)?'':$data->title_en }}" class="form-control" placeholder="{{__('admin.placeholder_title_en')}}" name="title_en" required>
                                <label id="title_en-error" class="error" for="title_en" style="">  </label>
                            </div>
                            <!-- for image  -->
                            <div class="form-group form-float row"  >
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


<script>
    //this for add new record
    $("#form_validation").submit(function(e){
           {{--  $('#addModal').modal('hide');  --}}
           $('.add').disabled =true;
          e.preventDefault();
          var form = $(this);
        //    openModal();
          $.ajax({
              type: 'POST',
              url: '{{ URL::route("storedepartment") }}',
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
                        window.location.replace("{{route('departments')}}");

                     }
            },
          });
        });

</script>
    
@endsection
