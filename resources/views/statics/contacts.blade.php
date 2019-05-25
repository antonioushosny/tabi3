@extends('layouts.index')

 @section('content')
    <section class="content-header">
        <h1>
            {{trans('admin.statics')}}
        <small>{{trans('admin.Control_panel')}}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
          <li class="active"><a href="{{ route('statics',$type) }}">{{trans('admin.statics')}}</a></li>
        </ol>
    </section>
  
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'success'] as $msg)
          @if(Session::has('alert-' . $msg))
          @section('script')
                <script>
                    toastr.success('{{ Session::get('alert-' . $msg) }}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
                </script>
            @endsection
          <!--<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>-->
          @endif
        @endforeach
    </div>

    <!-- Main content -->
     <?php $msg = trans('admin.confirm_delete') ; ?> 
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
                    <div class="panel panel-green">
                    <div class="panel-heading">
                    
                        <section class="content-header" style=" !important;">
                            <div class="row" style="display:flex;">
                                <div class="col-md-8" >
                                    <span style="font-size:2em ;"><i class="fa fa-cog"></i> {{trans('admin.social_accounts')}}</span>

                                </div>
                            </div>
            
                        </section>

                    </div>
                    {!! Form::open(['route'=>['editcontacts'],'method'=>'post','autocomplete'=>'off','role'=>'form','id'=>'changecontacts'])!!}
                    <div class="panel-body">
                        @if($contacts)
                        <div class="row"  style="block;">

                            {{--  for  facebook   --}}
                            <div class= "col-md-6 col-xs-12">
                                <div class="form-group  row" style="display:flex;">
                                    <div class="col-xs-3">
                                        <span style="color: black "> *
                                            {!!Form::label('facebook',trans('admin.facebook')) !!}
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <span style="color: black "> 
                                            {!! Form::text('facebook',$contacts->facebook,['class'=>'form-control','id' => 'facebook_field','placeholder' => trans('admin.placeholder_facebook')]) !!}

                                        </span>
                                        <span style="color: red " class="facebook text-center hidden"></span>
                                    </div>
                                    
                                </div>
                            </div>

                            {{--  for  instagram   --}}
                            <div class= "col-md-6 col-xs-12">
                                <div class="form-group  row" style="display:flex;">
                                    <div class="col-xs-3">
                                        <span style="color: black "> *
                                            {!!Form::label('instagram',trans('admin.instagram')) !!}
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <span style="color: black "> 
                                            {!! Form::text('instagram',$contacts->instagram,['class'=>'form-control','id' => 'instagram_field','placeholder' => trans('admin.placeholder_instagram')]) !!}

                                        </span>
                                        <span style="color: red " class="instagram text-center hidden"></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row"  style="block;">

                            {{--  for  twitter   --}}
                            <div class= "col-md-6 col-xs-12">
                                <div class="form-group  row" style="display:flex;">
                                    <div class="col-xs-3">
                                        <span style="color: black "> *
                                            {!!Form::label('twitter',trans('admin.twitter')) !!}
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <span style="color: black "> 
                                            {!! Form::text('twitter',$contacts->twitter,['class'=>'form-control','id' => 'twitter_field','placeholder' => trans('admin.placeholder_twitter')]) !!}

                                        </span>
                                        <span style="color: red " class="twitter text-center hidden"></span>
                                    </div>
                                    
                                </div>
                            </div>
                            {{--  for  snapchat   --}}
                            <div class= "col-md-6 col-xs-12">
                                <div class="form-group  row" style="display:flex;">
                                    <div class="col-xs-3">
                                        <span style="color: black "> *
                                            {!!Form::label('snapchat',trans('admin.snapchat')) !!}
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <span style="color: black "> 
                                            {!! Form::text('snapchat',$contacts->snapchat,['class'=>'form-control','id' => 'snapchat_field','placeholder' => trans('admin.placeholder_snapchat')]) !!}

                                        </span>
                                        <span style="color: red " class="snapchat text-center hidden"></span>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="row"  style="block;">

                            {{--  for  youtube   --}}
                            <div class= "col-md-6 col-xs-12">
                                <div class="form-group  row" style="display:flex;">
                                    <div class="col-xs-3">
                                        <span style="color: black "> *
                                            {!!Form::label('youtube',trans('admin.youtube')) !!}
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <span style="color: black "> 
                                            {!! Form::text('youtube',$contacts->youtube,['class'=>'form-control','id' => 'youtube_field','placeholder' => trans('admin.placeholder_youtube')]) !!}

                                        </span>
                                        <span style="color: red " class="youtube text-center hidden"></span>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                        @else 
                        <div class="row"  style="block;">

                            {{--  for  facebook   --}}
                            <div class= "col-md-6 col-xs-12">
                                <div class="form-group  row" style="display:flex;">
                                    <div class="col-xs-3">
                                        <span style="color: black "> *
                                            {!!Form::label('facebook',trans('admin.facebook')) !!}
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <span style="color: black "> 
                                            {!! Form::text('facebook','',['class'=>'form-control','id' => 'facebook_field','placeholder' => trans('admin.placeholder_facebook')]) !!}

                                        </span>
                                        <span style="color: red " class="facebook text-center hidden"></span>
                                    </div>
                                    
                                </div>
                            </div>

                            {{--  for  instagram   --}}
                            <div class= "col-md-6 col-xs-12">
                                <div class="form-group  row" style="display:flex;">
                                    <div class="col-xs-3">
                                        <span style="color: black "> *
                                            {!!Form::label('instagram',trans('admin.instagram')) !!}
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <span style="color: black "> 
                                            {!! Form::text('instagram','',['class'=>'form-control','id' => 'instagram_field','placeholder' => trans('admin.placeholder_instagram')]) !!}

                                        </span>
                                        <span style="color: red " class="instagram text-center hidden"></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row"  style="block;">

                            {{--  for  twitter   --}}
                            <div class= "col-md-6 col-xs-12">
                                <div class="form-group  row" style="display:flex;">
                                    <div class="col-xs-3">
                                        <span style="color: black "> *
                                            {!!Form::label('twitter',trans('admin.twitter')) !!}
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <span style="color: black "> 
                                            {!! Form::text('twitter','',['class'=>'form-control','id' => 'twitter_field','placeholder' => trans('admin.placeholder_twitter')]) !!}

                                        </span>
                                        <span style="color: red " class="twitter text-center hidden"></span>
                                    </div>
                                    
                                </div>
                            </div>
                            {{--  for  snapchat   --}}
                            <div class= "col-md-6 col-xs-12">
                                <div class="form-group  row" style="display:flex;">
                                    <div class="col-xs-3">
                                        <span style="color: black "> *
                                            {!!Form::label('snapchat',trans('admin.snapchat')) !!}
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <span style="color: black "> 
                                            {!! Form::text('snapchat','',['class'=>'form-control','id' => 'snapchat_field','placeholder' => trans('admin.placeholder_snapchat')]) !!}

                                        </span>
                                        <span style="color: red " class="snapchat text-center hidden"></span>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="row"  style="block;">
                            <div class= "col-md-6 col-xs-12">
                            </div>
                            {{--  for  youtube   --}}
                            <div class= "col-md-6 col-xs-12">
                                <div class="form-group  row" style="display:flex;">
                                    <div class="col-xs-3">
                                        <span style="color: black "> *
                                            {!!Form::label('youtube',trans('admin.youtube')) !!}
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <span style="color: black "> 
                                            {!! Form::text('youtube','',['class'=>'form-control','id' => 'youtube_field','placeholder' => trans('admin.placeholder_youtube')]) !!}

                                        </span>
                                        <span style="color: red " class="youtube text-center hidden"></span>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>

                        @endif

                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary add" >
                            <span class='glyphicon glyphicon-check'></span> {{trans('admin.save')}}
                        </button>
                
                    </div>
                    {!! Form::close()!!}
                </div>
            </div>
            <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
</form>
        <div id="fade"></div>
        <div id="modal" style="z-index:30000">
            <img id="loader" src="{{asset('images/loading.gif')}}" />
        </div>
      
@endsection 
@section('style')
    <style>
            
    </style>  
  
@endsection

@section('script1')

  <script>
        function openModal() {
            document.getElementById('modal').style.display = 'block';
            document.getElementById('fade').style.display = 'block';
        }
    
        function closeModal() {
            document.getElementById('modal').style.display = 'none';
            document.getElementById('fade').style.display = 'none';
        }
    jQuery(function($){
        $("#changecontacts").submit(function(e){
            e.preventDefault();
            var form = $(this);
            openModal();
            $.ajax({
                type: 'POST',
                url: '{{ URL::route("editcontacts") }}',
                data:  new FormData($("#changecontacts")[0]),
                processData: false,
                  contentType: false,   
                success: function(data) {
                  $('.facebook').addClass('hidden');
                  $('.youtube').addClass('hidden');
                  $('.instagram').addClass('hidden');
                  $('.snapchat').addClass('hidden');
                  $('.twitter').addClass('hidden');

                    if ((data.errors)) {
                        {{-- console.log(data.errors); --}}
                        closeModal()
                       toastr.error('{{trans('admin.Validation_error')}}', '{{trans('admin.Error_Alert')}}', {timeOut: 5000});
            
                        if (data.errors.facebook) {
                            $('.facebook').removeClass('hidden');
                            $('.facebook').text(data.errors.facebook);
                        }
                        if (data.errors.youtube) {
                          $('.youtube').removeClass('hidden');
                          $('.youtube').text(data.errors.youtube);
                        }
                        if (data.errors.instagram) {
                          $('.instagram').removeClass('hidden');
                          $('.instagram').text(data.errors.instagram);
                        }
                        if (data.errors.snapchat) {
                          $('.snapchat').removeClass('hidden');
                          $('.snapchat').text(data.errors.snapchat);
                        }
  
                        if (data.errors.twitter) {
                          $('.twitter').removeClass('hidden');
                          $('.twitter').text(data.errors.twitter);
                        }
 
                        
                    } 
                    else {
                        closeModal();
                     toastr.success('{{trans('admin.successfully_saved')}}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
                         $('#facebook_field').val(data.facebook);
                         $('#youtube_field').val(data.youtube);
                         $('#instagram_field').val(data.instagram);
                         $('#snapchat_field').val(data.snapchat);
                         $('#twitter_field').val(data.twitter);
                    }
                },
            });
        });

    });

      function isNumber(e){
            var key = e.charCode;  
            if( key <48 || key >57 )
            {
				if (key != 0)
				{
                e.preventDefault();   
				}
				          
            }
        }
        
  </script>
@endsection