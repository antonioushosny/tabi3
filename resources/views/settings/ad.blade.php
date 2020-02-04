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
                    <li class="breadcrumb-item"><a href="{{route('settings',$type)}}"><i class="zmdi zmdi-accounts-add"></i> {{__('admin.settings')}}</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">{{ !isset($data->title_en)?__('admin.add_setting'):__('admin.edit_setting') }} </a></li>
                    
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
                            <h2><strong>{{trans('admin.'.$title)}}</strong> {{trans('admin.add_setting')}}  </h2>
                            
                        </div>
                        <div class="body">
                            {!! Form::open(['route'=>['storesetting'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ])!!} 

                                <div class="row">
                                    <div class="col-md-2">{{ __('admin.title_ar') }}</div>
                                    <div class="col-md-10">
                                        <!-- for title_ar -->
                                        <div class="form-group form-float">
                                            <input type="text" value="{{ !isset($data->title_ar)?'':$data->title_ar }}" class="form-control" placeholder="{{__('admin.placeholder_title_ar')}}" name="title_ar" required>
                                            <label id="title_ar-error" class="error" for="title_ar" style="">  </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">{{ __('admin.title_en') }}</div>
                                    <div class="col-md-10">
                                        <!-- for title_en -->
                                        <div class="form-group form-float">
                                            <input type="text" value="{{ !isset($data->title_en)?null:$data->title_en }}"  class="form-control" placeholder="{{__('admin.placeholder_title_en')}}" name="title_en" required>
                                            <label id="title_en-error" class="error" for="title_en" style="">  </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">{{ __('admin.cost') }}</div>
                                    <div class="col-md-10">
                                        <!-- for cost -->
                                        <div class="form-group form-float">
                                            <input type="number" value="{{ !isset($data->disc_ar)?null:$data->disc_ar }}"  class="form-control" step="0.1" placeholder="{{__('admin.placeholder_cost')}}" name="desc_ar" required>
                                            <label id="desc_ar-error" class="error" for="desc_ar" style="">  </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- for type -->
                                <div class= "form-group form-float">
                                    {!! Form::hidden('type',$type,['class'=>'form-control show-tick']) !!}
                                    <label id="type-error" class="error" for="type" style="">  </label>
                                </div>

                                <!-- for id -->
                                <div class= "form-group form-float">
                                    {!! Form::hidden('id',!isset($data->id)?null:$data->id ,['class'=>'form-control show-tick']) !!}
                                </div>
                               
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">{{__('admin.save')}}</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
  
    </div>

</section>
  
@endsection 

@section('script')


<script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/editors.js') }}"></script>


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
              url: '{{ URL::route("storesetting") }}',
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
                        if (data.errors.desc_ar) {
                            $('#desc_ar-error').css('display', 'inline-block');
                            $('#desc_ar-error').text(data.errors.desc_ar);
                        }
                        
                  } else {
                    location.reload();

                }
            },
          });
        });

</script>
    
@endsection
