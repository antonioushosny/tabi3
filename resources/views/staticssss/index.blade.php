@extends('layouts.index')

 @section('content')
    <section class="content-header">
        <h1>
            {{trans('admin.statics')}}
        <small>{{trans('admin.Control_panel')}}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
          <li class="active"><a href="{{ route('statics') }}">{{trans('admin.statics')}}</a></li>
        </ol>
    </section>

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
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
            <ul class="nav nav-tabs" >
                <li class="active"><a data-toggle="tab" href="#about_us">{{trans('admin.about_us')}} </a></li>
                <li><a data-toggle="tab" href="#social_accounts">{{trans('admin.social_accounts')}} </a></li>

                <li><a data-toggle="tab" href="#volunteerism">{{trans('admin.volunteerism')}} </a></li>
                {{--  <li><a data-toggle="tab" href="#policy">{{trans('admin.policy')}} </a></li>  --}}
                
            </ul>
            <div class="tab-content" style= " padding: 1em; padding-top: 4em;">
                <div id="about_us" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-xs-12">
                        <div class="box">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                
                                    <section class="content-header" style=" !important;">
                                        <div class="row" style="display:flex;">
                                            <div class="col-md-8" >
                                                <span style="font-size:2em ;"><i class="fa fa-cog"></i> {{trans('admin.about_us')}}</span>

                                            </div>
                                        </div>
                        
                                    </section>

                                </div>
                                {!! Form::open(['route'=>['changestatics'],'method'=>'post','autocomplete'=>'off','role'=>'form','id'=>'changeabout'])!!}
                                <div class="panel-body">
                                    @if($about)
                                    {!! Form::hidden('id',$about->id,['class'=>'form-control foridedit','id' => 'id_field']) !!}
                                    @else
                                    {!! Form::hidden('id','',['class'=>'form-control foridedit','id' => 'id_field']) !!}
                                    @endif
                                    {!! Form::hidden('type','about',['class'=>'form-control foraboutedit','id' => 'type_field']) !!}
                                    <div class="row"  style="block;">

                                        {{--  for  title_ar   --}}
                                        <div class= "col-md-6 col-xs-12">
                                            <div class="form-group  row" style="display:flex;">
                                                <div class="col-xs-3">
                                                    <span style="color: black "> *
                                                        {!!Form::label('title_ar',trans('admin.title_ar')) !!}
                                                    </span>
                                                </div>
                                                <div class="col-xs-9">
                                                    <span style="color: black "> 
                                                        @if($about)
                                                        {!! Form::text('title_ar',$about->title_ar,['class'=>'form-control','id' => 'title_ar_field','placeholder' => trans('admin.placeholder_title_ar')]) !!}
                                                        @else
                                                        {!! Form::text('title_ar','',['class'=>'form-control','id' => 'title_ar_field','placeholder' => trans('admin.placeholder_title_ar')]) !!}
                                                        @endif

                                                    </span>
                                                    <span style="color: red " class="title_ar text-center hidden"></span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        {{--  for title_en  --}}
                                        <div class= "col-md-6 col-xs-12">
                                            <div class="form-group  row" style="display:flex;">
                                                <div class="col-xs-3">
                                                    <span style="color: black "> *
                                                        {!!Form::label('title_en',trans('admin.title_en')) !!}
                                                    </span>
                                                </div>
                                                <div class="col-xs-9">
                                                    <span style="color: black "> 
                                                        @if($about)
                                                        {!! Form::text('title_en',$about->title_en,['class'=>'form-control','id' => 'title_en_field','placeholder' => trans('admin.placeholder_title_en')]) !!}
                                                        @else 
                                                        {!! Form::text('title_en','',['class'=>'form-control','id' => 'title_en_field','placeholder' => trans('admin.placeholder_title_en')]) !!}
                                                        @endif
                                                    </span>
                                                    <span style="color: red " class="title_en text-center hidden"></span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"  style="block;">
                                        {{--  for disc_ar   --}}
                                        <div class= "col-md-6 col-xs-12">
                                            <div class="form-group  row" style="display:flex;">
                                                <div class="col-xs-3">
                                                    <span style="color: black "> *
                                                        {!!Form::label('disc_ar',trans('admin.disc_ar')) !!}
                                                    </span>
                                                </div>
                                                <div class="col-xs-9">
                                                    <span style="color: black "> 
                                                        @if($about)
                                                        {!! Form::textarea('disc_ar',$about->disc_ar,['class'=>'form-control','id' => 'disc_ar_field','rows'=>7,'placeholder' => trans('admin.placeholder_disc_ar')]) !!}
                                                        @else 
                                                        {!! Form::textarea('disc_ar','',['class'=>'form-control','id' => 'disc_ar_field','rows'=>7,'placeholder' => trans('admin.placeholder_disc_ar')]) !!}
                                                        @endif
                                                    </span>
                                                    <span style="color: red " class="disc_ar text-center hidden"></span>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        {{--  for disc_en  --}}
                                        <div class= "col-md-6 col-xs-12">
                                            <div class="form-group  row" style="display:flex;">
                                                <div class="col-xs-3">
                                                    <span style="color: black "> *
                                                        {!!Form::label('disc_en',trans('admin.disc_en')) !!}
                                                    </span>
                                                </div>
                                                <div class="col-xs-9">
                                                    <span style="color: black "> 
                                                        @if($about)
                                                        {!! Form::textarea('disc_en',$about->disc_en,['class'=>'form-control','id' => 'disc_en_field','rows'=>7,'placeholder' => trans('admin.placeholder_disc_en')]) !!}
                                                        @else 
                                                        {!! Form::textarea('disc_en','',['class'=>'form-control','id' => 'disc_en_field','rows'=>7,'placeholder' => trans('admin.placeholder_disc_en')]) !!}
                                                        @endif
                                                    </span>
                                                    <span style="color: red " class="disc_en text-center hidden"></span>
                                                </div>
                                                
                                            </div>
                                        </div>   
                                    </div>
                                    
                                    <div class="row"  style="block;">   
                                        <div class= "col-md-6 col-xs-12">
                                        </div>        
                                        {{--  for image  --}}
                                        <div class= "col-md-6 col-xs-12">
                                            <div class="form-group  row" style="display:flex;">
                                            <div class="col-xs-3">
                                                <span style="color: black "> *
                                                    {!! Form::label('image',trans('admin.image')) !!}
                                                </span>
                                            </div>
                                            <div class="col-xs-5">
                                                <div class="form-group  row" style="display:flex;">
                                                    <div style="position:relative; ">
                                                        <a class='btn btn-primary' href='javascript:;' >
                                                            {{trans('admin.Choose_File')}}
                    
                                                            {!! Form::file('image',['class'=>'form-control','id' => 'image_field', 'accept'=>'image/x-png,image/gif,image/jpeg' ,'style'=>'position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;','size'=> '40' ,'onchange' =>'readURL(this,"changeimage");' ]) !!}
                                                        </a>
                                                        &nbsp;
                                                        <div class='label label-primary' id="upload-file-info" ></div>
                                                        <span style="color: red " class="image text-center hidden"></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                @if($about)
                                                <?php $image = asset('img/') .'/'. $about->image ; ?>
                                                <img id="changeimage" src={{ $image }} width="100%" height="100%" alt=" {{trans('admin.image')}}" />
                                                @else 
                                                <img id="changeimage" src="#" width="100%" height="100%" alt=" {{trans('admin.image')}}" />
                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                    </div>

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
                    <!-- /.row -->
                </div>

                <div id="social_accounts" class="tab-pane fade in ">
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
                                {!! Form::open(['route'=>['changestatics'],'method'=>'post','autocomplete'=>'off','role'=>'form','id'=>'changecontacts'])!!}
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
                    <!-- /.row -->
                </div>

                <div id="volunteerism" class="tab-pane fade in ">
                    <div class="row">
                        <div class="col-xs-12">
                        <div class="box">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                
                                    <section class="content-header" style=" !important;">
                                        <div class="row" style="display:flex;">
                                            <div class="col-md-8" >
                                                <span style="font-size:2em ;"><i class="fa fa-cog"></i> {{trans('admin.volunteerism')}}</span>

                                            </div>
                                        </div>
                        
                                    </section>

                                </div>
                                {!! Form::open(['route'=>['changestatics'],'method'=>'post','autocomplete'=>'off','role'=>'form','id'=>'changevolunteerism'])!!}
                                <div class="panel-body">
                                    @if($volunteerism)
                                    {!! Form::hidden('id',$volunteerism->id,['class'=>'form-control foridedit','id' => 'id_field']) !!}
                                    @else
                                    {!! Form::hidden('id','',['class'=>'form-control foridedit','id' => 'id_field2']) !!}
                                    @endif
                                    {!! Form::hidden('type','volunteerism',['class'=>'form-control foraboutedit','id' => 'type_field2']) !!}
                                    <div class="row"  style="block;">

                                        {{--  for  title_ar   --}}
                                        <div class= "col-md-6 col-xs-12">
                                            <div class="form-group  row" style="display:flex;">
                                                <div class="col-xs-3">
                                                    <span style="color: black "> *
                                                        {!!Form::label('title_ar',trans('admin.title_ar')) !!}
                                                    </span>
                                                </div>
                                                <div class="col-xs-9">
                                                    <span style="color: black "> 
                                                        @if($volunteerism)
                                                        {!! Form::text('title_ar',$volunteerism->title_ar,['class'=>'form-control','id' => 'title_ar_field','placeholder' => trans('admin.placeholder_title_ar')]) !!}
                                                        @else
                                                        {!! Form::text('title_ar','',['class'=>'form-control','id' => 'title_ar_field2','placeholder' => trans('admin.placeholder_title_ar')]) !!}
                                                        @endif

                                                    </span>
                                                    <span style="color: red " class="title_ar2 text-center hidden"></span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        {{--  for title_en  --}}
                                        <div class= "col-md-6 col-xs-12">
                                            <div class="form-group  row" style="display:flex;">
                                                <div class="col-xs-3">
                                                    <span style="color: black "> *
                                                        {!!Form::label('title_en',trans('admin.title_en')) !!}
                                                    </span>
                                                </div>
                                                <div class="col-xs-9">
                                                    <span style="color: black "> 
                                                        @if($volunteerism)
                                                        {!! Form::text('title_en',$volunteerism->title_en,['class'=>'form-control','id' => 'title_en_field2','placeholder' => trans('admin.placeholder_title_en')]) !!}
                                                        @else 
                                                        {!! Form::text('title_en','',['class'=>'form-control','id' => 'title_en_field2','placeholder' => trans('admin.placeholder_title_en')]) !!}
                                                        @endif
                                                    </span>
                                                    <span style="color: red " class="title_en2 text-center hidden"></span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"  style="block;">
                                        {{--  for disc_ar   --}}
                                        <div class= "col-md-6 col-xs-12">
                                            <div class="form-group  row" style="display:flex;">
                                                <div class="col-xs-3">
                                                    <span style="color: black "> *
                                                        {!!Form::label('disc_ar',trans('admin.disc_ar')) !!}
                                                    </span>
                                                </div>
                                                <div class="col-xs-9">
                                                    <span style="color: black "> 
                                                        @if($volunteerism)
                                                        {!! Form::textarea('disc_ar',$volunteerism->disc_ar,['class'=>'form-control','id' => 'disc_ar_field2','rows'=>7,'placeholder' => trans('admin.placeholder_disc_ar')]) !!}
                                                        @else 
                                                        {!! Form::textarea('disc_ar','',['class'=>'form-control','id' => 'disc_ar_field2','rows'=>7,'placeholder' => trans('admin.placeholder_disc_ar')]) !!}
                                                        @endif
                                                    </span>
                                                    <span style="color: red " class="disc_ar2 text-center hidden"></span>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        {{--  for disc_en  --}}
                                        <div class= "col-md-6 col-xs-12">
                                            <div class="form-group  row" style="display:flex;">
                                                <div class="col-xs-3">
                                                    <span style="color: black "> *
                                                        {!!Form::label('disc_en',trans('admin.disc_en')) !!}
                                                    </span>
                                                </div>
                                                <div class="col-xs-9">
                                                    <span style="color: black "> 
                                                        @if($volunteerism)
                                                        {!! Form::textarea('disc_en',$volunteerism->disc_en,['class'=>'form-control','id' => 'disc_en_field2','rows'=>7,'placeholder' => trans('admin.placeholder_disc_en')]) !!}
                                                        @else 
                                                        {!! Form::textarea('disc_en','',['class'=>'form-control','id' => 'disc_en_field2','rows'=>7,'placeholder' => trans('admin.placeholder_disc_en')]) !!}
                                                        @endif
                                                    </span>
                                                    <span style="color: red " class="disc_en2 text-center hidden"></span>
                                                </div>
                                                
                                            </div>
                                        </div>   
                                    </div>
                                    
                                    <div class="row"  style="block;">   
                                        <div class= "col-md-6 col-xs-12">
                                        </div>        
                                        {{--  for image  --}}
                                        <div class= "col-md-6 col-xs-12">
                                            <div class="form-group  row" style="display:flex;">
                                            <div class="col-xs-3">
                                                <span style="color: black "> *
                                                    {!! Form::label('image',trans('admin.image')) !!}
                                                </span>
                                            </div>
                                            <div class="col-xs-5">
                                                <div class="form-group  row" style="display:flex;">
                                                    <div style="position:relative; ">
                                                        <a class='btn btn-primary' href='javascript:;' >
                                                            {{trans('admin.Choose_File')}}
                    
                                                            {!! Form::file('image',['class'=>'form-control','id' => 'image_field', 'accept'=>'image/x-png,image/gif,image/jpeg' ,'style'=>'position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;','size'=> '40' ,'onchange' => 'readURL(this,"changeimage1");' ]) !!}
                                                        </a>
                                                        &nbsp;
                                                        <div class='label label-primary' id="upload-file-info2" ></div>
                                                        <span style="color: red " class="image text-center hidden"></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                    @if($volunteerism)
                                                    <?php $image = asset('img/') .'/'. $volunteerism->image ; ?>
                                                    <img id="changeimage1" src={{ $image }} width="100%" height="100%" alt=" {{trans('admin.image')}}" />
                                                    @else 
                                                    <img id="changeimage1" src="#" width="100%" height="100%" alt=" {{trans('admin.image')}}" />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                    <!-- /.row -->
                </div>

                <div id="policy" class="tab-pane fade in ">
                        <div class="row">
                            <div class="col-xs-12">
                            <div class="box">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                    
                                        <section class="content-header" style=" !important;">
                                            <div class="row" style="display:flex;">
                                                <div class="col-md-8" >
                                                    <span style="font-size:2em ;"><i class="fa fa-cog"></i> {{trans('admin.policy')}}</span>
        
                                                </div>
                                            </div>
                            
                                        </section>
        
                                    </div>
                                    {!! Form::open(['route'=>['changestatics'],'method'=>'post','autocomplete'=>'off','role'=>'form','id'=>'changepolicy'])!!}
                                    <div class="panel-body">
                                        @if($policy)
                                        {!! Form::hidden('id',$policy->id,['class'=>'form-control foridedit','id' => 'id_field1']) !!}
                                        @else
                                        {!! Form::hidden('id','',['class'=>'form-control foridedit','id' => 'id_field1']) !!}
                                        @endif
                                        {!! Form::hidden('type','policy',['class'=>'form-control foraboutedit','id' => 'type_field1']) !!}
                                        <div class="row"  style="block;">

                                            {{--  for  title_ar   --}}
                                            <div class= "col-md-6 col-xs-12">
                                                <div class="form-group  row" style="display:flex;">
                                                    <div class="col-xs-3">
                                                        <span style="color: black "> *
                                                            {!!Form::label('title_ar',trans('admin.title_ar')) !!}
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-9">
                                                        <span style="color: black "> 
                                                            @if($policy)
                                                            {!! Form::text('title_ar',$policy->title_ar,['class'=>'form-control','id' => 'title_ar_field1','placeholder' => trans('admin.placeholder_title_ar')]) !!}
                                                            @else
                                                            {!! Form::text('title_ar','',['class'=>'form-control','id' => 'title_ar_field1','placeholder' => trans('admin.placeholder_title_ar')]) !!}
                                                            @endif

                                                        </span>
                                                        <span style="color: red " class="title_ar1 text-center hidden"></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            {{--  for title_en  --}}
                                            <div class= "col-md-6 col-xs-12">
                                                <div class="form-group  row" style="display:flex;">
                                                    <div class="col-xs-3">
                                                        <span style="color: black "> *
                                                            {!!Form::label('title_en',trans('admin.title_en')) !!}
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-9">
                                                        <span style="color: black "> 
                                                            @if($policy)
                                                            {!! Form::text('title_en',$policy->title_en,['class'=>'form-control','id' => 'title_en_field1','placeholder' => trans('admin.placeholder_title_en')]) !!}
                                                            @else 
                                                            {!! Form::text('title_en','',['class'=>'form-control','id' => 'title_en_field1','placeholder' => trans('admin.placeholder_title_en')]) !!}
                                                            @endif
                                                        </span>
                                                        <span style="color: red " class="title_en1 text-center hidden"></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row"  style="block;">
                                            {{--  for disc_ar   --}}
                                            <div class= "col-md-6 col-xs-12">
                                                <div class="form-group  row" style="display:flex;">
                                                    <div class="col-xs-3">
                                                        <span style="color: black "> *
                                                            {!!Form::label('disc_ar',trans('admin.disc_ar')) !!}
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-9">
                                                        <span style="color: black "> 
                                                            @if($policy)
                                                            {!! Form::textarea('disc_ar',$policy->disc_ar,['class'=>'form-control','id' => 'disc_ar_field1','rows'=>7,'placeholder' => trans('admin.placeholder_disc_ar')]) !!}
                                                            @else 
                                                            {!! Form::textarea('disc_ar','',['class'=>'form-control','id' => 'disc_ar_field1','rows'=>7,'placeholder' => trans('admin.placeholder_disc_ar')]) !!}
                                                            @endif
                                                        </span>
                                                        <span style="color: red " class="disc_ar1 text-center hidden"></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            {{--  for disc_en  --}}
                                            <div class= "col-md-6 col-xs-12">
                                                <div class="form-group  row" style="display:flex;">
                                                    <div class="col-xs-3">
                                                        <span style="color: black "> *
                                                            {!!Form::label('disc_en',trans('admin.disc_en')) !!}
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-9">
                                                        <span style="color: black "> 
                                                            @if($policy)
                                                            {!! Form::textarea('disc_en',$policy->disc_en,['class'=>'form-control','id' => 'disc_en_field1','rows'=>7,'placeholder' => trans('admin.placeholder_disc_en')]) !!}
                                                            @else 
                                                            {!! Form::textarea('disc_en','',['class'=>'form-control','id' => 'disc_en_field1','rows'=>7,'placeholder' => trans('admin.placeholder_disc_en')]) !!}
                                                            @endif
                                                        </span>
                                                        <span style="color: red " class="disc_en1 text-center hidden"></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>   
                                        </div>
                                        
                                        <div class="row"  style="block;">   
                                            <div class= "col-md-6 col-xs-12">
                                            </div>        
                                            {{--  for image  --}}
                                            <div class= "col-md-6 col-xs-12">
                                                <div class="form-group  row" style="display:flex;">
                                                <div class="col-xs-3">
                                                    <span style="color: black "> *
                                                        {!! Form::label('image',trans('admin.image')) !!}
                                                    </span>
                                                </div>
                                                <div class="col-xs-5">
                                                    <div class="form-group  row" style="display:flex;">
                                                        <div style="position:relative; ">
                                                            <a class='btn btn-primary' href='javascript:;' >
                                                                {{trans('admin.Choose_File')}}
                        
                                                                {!! Form::file('image',['class'=>'form-control','id' => 'image_field', 'accept'=>'image/x-png,image/gif,image/jpeg' ,'style'=>'position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;','size'=> '40' ,'onchange' => 'readURL(this,"changeimage2");'  ]) !!}
                                                            </a>
                                                            &nbsp;
                                                            <div class='label label-primary' id="upload-file-info1" ></div>
                                                            <span style="color: red " class="image text-center hidden"></span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                        @if($policy)
                                                        <?php $image = asset('img/') .'/'. $policy->image ; ?>
                                                        <img id="changeimage2" src={{ $image }} width="100%" height="100%" alt=" {{trans('admin.image')}}" />
                                                        @else 
                                                        <img id="changeimage2" src="#" width="100%" height="100%" alt=" {{trans('admin.image')}}" />
                                                        @endif
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

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
                        <!-- /.row -->
                    </div>
            </div>
        </section>

 
@endsection 

@if($lang == 'ar')
@section('style')
<style>
    .nav-tabs {
        margin-right: -42px;
        float: right;
    }
    .nav-tabs>li {
        float: right;   
    }
</style>
@endsection
@endif


@section('script1')

   
  <script>

    jQuery(function($){
        $("#changeabout").submit(function(e){
           e.preventDefault();
           var form = $(this);
   
           $.ajax({
               type: 'POST',
               url: '{{ URL::route("changestatics") }}',
               data:  new FormData($("#changeabout")[0]),
               processData: false,
                 contentType: false,
               
               success: function(data) {
                 $('.title_ar').addClass('hidden');
                 $('.title_en').addClass('hidden');
                 $('.disc_ar').addClass('hidden');
                 $('.disc_en').addClass('hidden');
                 $('.image').addClass('hidden');
                 $('.status').addClass('hidden');
   
                   if ((data.errors)) {
                       console.log(data.errors);
 
                      toastr.error('{{trans('admin.Validation_error')}}', '{{trans('admin.Error_Alert')}}', {timeOut: 5000});
           
                       if (data.errors.title_ar) {
                           $('.title_ar').removeClass('hidden');
                           $('.title_ar').text(data.errors.title_ar);
                       }
                       if (data.errors.title_en) {
                         $('.title_en').removeClass('hidden');
                         $('.title_en').text(data.errors.title_en);
                       }
                       if (data.errors.disc_ar) {
                         $('.disc_ar').removeClass('hidden');
                         $('.disc_ar').text(data.errors.disc_ar);
                       }
                       if (data.errors.disc_en) {
                         $('.disc_en').removeClass('hidden');
                         $('.disc_en').text(data.errors.disc_en);
                       }
 
                       if (data.errors.image) {
                         $('.image').removeClass('hidden');
                         $('.image').text(data.errors.image);
                       }
 
                       if (data.errors.status) {
                         $('.status').removeClass('hidden');
                         $('.status').text(data.errors.status);
                       }

                       
                   } 
                   else {
                    toastr.success('{{trans('admin.successfully_saved')}}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
                        $('#id_field').val(data.id);
                        $('#title_ar_field').val(data.title_ar);
                        $('#title_en_field').val(data.title_en);
                        $('#disc_ar_field').val(data.disc_ar);
                        $('#disc_en_field').val(data.disc_en);
                   }
               },
           });
        });

        $("#changepolicy").submit(function(e){
            e.preventDefault();
            var form = $(this);
    
            $.ajax({
                type: 'POST',
                url: '{{ URL::route("changestatics") }}',
                data:  new FormData($("#changepolicy")[0]),
                processData: false,
                  contentType: false,
                
                success: function(data) {
                  $('.title_ar1').addClass('hidden');
                  $('.title_en1').addClass('hidden');
                  $('.disc_ar1').addClass('hidden');
                  $('.disc_en1').addClass('hidden');
                  $('.image1').addClass('hidden');
                  $('.status1').addClass('hidden');
    
                    if ((data.errors)) {
                        console.log(data.errors);
  
                       toastr.error('{{trans('admin.Validation_error')}}', '{{trans('admin.Error_Alert')}}', {timeOut: 5000});
            
                        if (data.errors.title_ar) {
                            $('.title_ar1').removeClass('hidden');
                            $('.title_ar1').text(data.errors.title_ar);
                        }
                        if (data.errors.title_en) {
                          $('.title_en1').removeClass('hidden');
                          $('.title_en1').text(data.errors.title_en);
                        }
                        if (data.errors.disc_ar) {
                          $('.disc_ar1').removeClass('hidden');
                          $('.disc_ar1').text(data.errors.disc_ar);
                        }
                        if (data.errors.disc_en) {
                          $('.disc_en1').removeClass('hidden');
                          $('.disc_en1').text(data.errors.disc_en);
                        }
  
                        if (data.errors.image) {
                          $('.image1').removeClass('hidden');
                          $('.image1').text(data.errors.image);
                        }
  
                        if (data.errors.status) {
                          $('.status1').removeClass('hidden');
                          $('.status1').text(data.errors.status);
                        }
 
                        
                    } 
                    else {
                     toastr.success('{{trans('admin.successfully_saved')}}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
                         $('#id_field1').val(data.id);
                         $('#title_ar_field1').val(data.title_ar);
                         $('#title_en_field1').val(data.title_en);
                         $('#disc_ar_field1').val(data.disc_ar);
                         $('#disc_en_field1').val(data.disc_en);
                    }
                },
            });
        });

        $("#changevolunteerism").submit(function(e){
            e.preventDefault();
            var form = $(this);
    
            $.ajax({
                type: 'POST',
                url: '{{ URL::route("changestatics") }}',
                data:  new FormData($("#changevolunteerism")[0]),
                processData: false,
                  contentType: false,
                
                success: function(data) {
                  $('.title_ar2').addClass('hidden');
                  $('.title_en2').addClass('hidden');
                  $('.disc_ar2').addClass('hidden');
                  $('.disc_en2').addClass('hidden');
                  $('.image2').addClass('hidden');
                  $('.status2').addClass('hidden');
    
                    if ((data.errors)) {
                        console.log(data.errors);
  
                       toastr.error('{{trans('admin.Validation_error')}}', '{{trans('admin.Error_Alert')}}', {timeOut: 5000});
            
                        if (data.errors.title_ar) {
                            $('.title_ar2').removeClass('hidden');
                            $('.title_ar2').text(data.errors.title_ar);
                        }
                        if (data.errors.title_en) {
                          $('.title_en2').removeClass('hidden');
                          $('.title_en2').text(data.errors.title_en);
                        }
                        if (data.errors.disc_ar) {
                          $('.disc_ar2').removeClass('hidden');
                          $('.disc_ar2').text(data.errors.disc_ar);
                        }
                        if (data.errors.disc_en) {
                          $('.disc_en2').removeClass('hidden');
                          $('.disc_en2').text(data.errors.disc_en);
                        }
  
                        if (data.errors.image) {
                          $('.image2').removeClass('hidden');
                          $('.image2').text(data.errors.image);
                        }
  
                        if (data.errors.status) {
                          $('.status2').removeClass('hidden');
                          $('.status2').text(data.errors.status);
                        }
 
                        
                    } 
                    else {
                     toastr.success('{{trans('admin.successfully_saved')}}', '{{trans('admin.Success_Alert')}}', {timeOut: 5000});
                         $('#id_field2').val(data.id);
                         $('#title_ar_field2').val(data.title_ar);
                         $('#title_en_field2').val(data.title_en);
                         $('#disc_ar_field2').val(data.disc_ar);
                         $('#disc_en_field2').val(data.disc_en);
                    }
                },
            });
        });

        $("#changecontacts").submit(function(e){
            e.preventDefault();
            var form = $(this);
    
            $.ajax({
                type: 'POST',
                url: '{{ URL::route("social_accounts") }}',
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
                        console.log(data.errors);
  
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