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
                    <li class="breadcrumb-item"><a href="{{route('sponsors')}}"><i class="zmdi zmdi-accounts-add"></i> {{__('admin.sponsors')}}</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">{{__('admin.add_sponsor')}}</a></li>
                    
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
                        <h2><strong>{{trans('admin.'.$title)}}</strong> {{trans('admin.add_sponsor')}}  </h2>
                        
                    </div>
                    <div class="body">
                        {!! Form::open(['route'=>['storesponsor'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ])!!} 
                            <!-- for id -->
                            <div class= "form-group form-float">
                                {!! Form::hidden('id',!isset($data->id)?null:$data->id ,['class'=>'form-control show-tick']) !!}
                            </div>
                            
                           
                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->title)?'':$data->title }}" class="form-control" placeholder="{{__('admin.placeholder_title')}}" name="title" required>
                                <label id="title-error" class="error" for="title" style="">  </label>
                            </div>

                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->link)?'':$data->link }}" class="form-control" placeholder="{{__('admin.placeholder_link')}}" name="link" required>
                                <label id="link-error" class="error" for="link" style="">  </label>
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
              url: '{{ URL::route("storesponsor") }}',
              data:  new FormData($("#form_validation")[0]),
              processData: false,
              contentType: false,
               
              success: function(data) {
                  if ((data.errors)) {                        
                        if (data.errors.name) {
                            $('#title-error').css('display', 'inline-block');
                            $('#title-error').text(data.errors.title);
                        }
                        if (data.errors.link) {
                            $('#link-error').css('display', 'inline-block');
                            $('#link-error').text(data.errors.link);
                        }
                  } else {
                        window.location.replace("{{route('sponsors')}}");

                     }
            },
          });
        });

</script>
      
   
@endsection
