@extends('layouts.index')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert/sweetalert.csss') }}"/>

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
                    <li class="breadcrumb-item "><a href="javascript:void(0);">{{__('admin.Messages')}}</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
    
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          @section('script')
                <script>
                    toastr.success('{{ Session::get('alert-' . $msg) }}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
                </script>
            @endsection
          <!-- <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p> -->
          @endif
        @endforeach
    </div>
   
     
    <div class="container-fluid">
        
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
               
                    <div class="header">
                        <h2><strong>{{trans('admin.'.$title)}}</strong> {{trans('admin.send_messages')}}  </h2>
                        
                    </div>
                    <div class="body"> 
                         {!! Form::open(['route'=>['send_messages'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation' ])!!}
                         
                            {{-- for title  --}}
                            <div class="form-group form-float">
                                <input type="text" class="form-control" placeholder="{{__('admin.placeholder_title')}}" name="title"  id="title_field" required>
                                <label id="title-error" class="error" for="title" style="">  </label>
                            </div>

                            <div class="form-group form-float">
                                 
                                {!! Form::textarea('message','',['class'=>'form-control','rows'=>'2','id' => 'message_field','placeholder' => trans('admin.placeholder_message'),'required=>'required]) !!}
                                <label id="message-error" class="error" for="message" style="">  </label>
                            </div>

                            
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="sendforall_field" class="with-gap" value="all" checked>
                                    <label for="for">{{__('admin.sendforall')}}</label>
                                </div>                                
                                <div class="radio inlineblock">
                                    <input type="radio" name="for" id="send_field" class="with-gap" value="not_all" >
                                    <label for="for">{{__('admin.send_spec')}}</label>
                                </div>
                            </div>
                          
                            <div class= "form-group form-float  clients hidden">
                                {!! Form::select('ids[]',$clients
                                    ,'',['class'=>'form-control show-tick' ,'placeholder' =>trans('admin.choose'),'multiple'=>true]) !!}
                                    <label id="client-error" class="error" for="ids[]" style="">  </label>
                            </div> 

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">{{__('admin.send')}}</button>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
    </div>

</section>
  
@endsection 

@section('script')
<script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script> <!-- SweetAlert Plugin Js --> 

<script src="{{ asset('assets/js/pages/ui/dialogs.js') }}"></script>

<script>

    jQuery(document).ready(function($){

            
        $('#send_field').on('ifChecked', function(event) {
            $('.clients').removeClass('hidden'); 
        });
        $('#send_field').on('ifUnchecked', function(event) {
            $('.clients').addClass('hidden');
        });
        
    });
    //this for add new record
    $("#form_validation").submit(function(e){
           {{--  $('#addModal').modal('hide');  --}}
           {{-- $('.btn').disabled =true; --}}
           $(".btn").attr("disabled", true);
          e.preventDefault();
          var form = $(this);
        //    openModal();
          $.ajax({
              type: 'POST',
              url: '{{ URL::route("send_messages") }}',
              data:  new FormData($("#form_validation")[0]),
              processData: false,
              contentType: false,
               
              success: function(data) {
                  if ((data.errors)) {  
                    swal("Here's a message!");                    
                        if (data.errors.title) {
                            $('#title-error').css('display', 'inline-block');
                            $('#title-error').text(data.errors.title);
                        }
                        if (data.errors.message) {
                            $('#message-error').css('display', 'inline-block');
                            $('#message-error').text(data.errors.message);
                        }
                        if (data.errors.ids) {
                            $('#client-error').css('display', 'inline-block');
                            $('#client-error').text(data.errors.ids);
                        }
                  } else {
                    location.reload();
                    {{-- swal("Here's a message!"); --}}


                     }
            },
          });
        });

</script>
    
@endsection
