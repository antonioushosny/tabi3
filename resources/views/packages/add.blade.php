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
                    <li class="breadcrumb-item"><a href="{{route('packages')}}"><i class="zmdi zmdi-accounts-add"></i> {{__('admin.packages')}}</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">{{__('admin.add_package')}}</a></li>
                    
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
                        <h2><strong>{{trans('admin.'.$title)}}</strong> {{trans('admin.add_package')}}  </h2>
                        
                    </div>
                    <div class="body">
                        {!! Form::open(['route'=>['storepackage'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ])!!} 
                            <!-- for id -->
                            <div class= "form-group form-float">
                                {!! Form::hidden('id',!isset($data->id)?null:$data->id ,['class'=>'form-control show-tick']) !!}
                            </div>
                            
                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->title_ar)?'':$data->title_ar }}" class="form-control" placeholder="{{__('admin.placeholder_title_ar')}}" name="title_ar" required>
                                <label id="title_ar-error" class="error" for="title_ar" style="">  </label>
                            </div>
                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->title_en)?'':$data->title_en }}" class="form-control" placeholder="{{__('admin.placeholder_title_en')}}" name="title_en" required>
                                <label id="title_en-error" class="error" for="title_en" style="">  </label>
                            </div>
                            <div class= "form-group form-float">
                                {!! Form::select('type',['daily'=> trans('admin.daily'),'weekly'=> trans('admin.weekly'),'monthly'=> trans('admin.monthly'),'annual'=> trans('admin.annual')]
                                    ,!isset($data->type)?null:$data->type,['class'=>'form-control show-tick' ,'placeholder' =>trans('admin.choose_type'),'required']) !!}
                                    <label id="type-error" class="error" for="type" style="">  </label>
                            </div>

                            <div class= "form-group form-float">
                                {!! Form::select('page',['home'=> trans('admin.home'),'offic'=> trans('admin.offic'),'box'=> trans('admin.box'),'comanies'=> trans('admin.comanies'),'informations'=> trans('admin.informations')]
                                    ,!isset($data->page)?null:$data->page,['class'=>'form-control show-tick' ,'placeholder' =>trans('admin.choose_page'),'required']) !!}
                                    <label id="page-error" class="error" for="page" style="">  </label>
                            </div>

                            <div class="form-group form-float">
                                <input type="text" value="{{ !isset($data->cost)?'':$data->cost }}" class="form-control" placeholder="{{__('admin.placeholder_cost')}}" name="cost" onkeypress="isNumber(event); " required>
                                <label id="cost-error" class="error" for="cost" style="">  </label>
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
              url: '{{ URL::route("storepackage") }}',
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
                  } else {
                        window.location.replace("{{route('packages')}}");

                     }
            },
          });
        });

</script>
    
@endsection
