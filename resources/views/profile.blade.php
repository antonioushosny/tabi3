@extends('layouts.index')

 @section('content')
    <section class="content-header">
        <h1>
                {{trans('admin.dashboard')}}
            <small>{{trans('admin.Control_panel')}}</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
            <li class="active"><a href="{{ route('admins') }}">{{trans('admin.admins')}}</a></li>
        <li class="active">{{trans('admin.profile')}}</li>

        </ol>
    </section>
        
        @if ($errors->any())
                
            @foreach ($errors->all() as $error)
                {{--  <li>{{ $error }}</li>  --}}
            @section('script')
            <script>
                toastr.error('{{ $error }}', '{{trans('admin.Validation_error')}}', {timeOut: 5000});
            </script>
            @endsection
            @endforeach
                    

        @endif
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
        </div
    <section>
       
        <div class="jumbotron" style=" margin-bottom: 0px !important; " >
            <div class="container">
                {{--  <h1 style="text-align:center">{{trans('admin.wellcome')}}{{ Auth::user()->name }}</h1>       --}}

                <div class="container">        

                    <div class="row">
                        
                        <div class ="col-md-8">
                            <table class="table table-hover table-striped">
                                <tr>
        
                                    {{--  <form action="{{ route('editprofile') }}" method="POST" autocomplete ="off" >  --}}

                                {!! Form::open(['route'=>['editprofile'],'method'=>'post','autocomplete'=>'off','role'=>'form','files'=>'true'])!!}
                                        <th>{{trans('admin.name')}}</th>
                                        <div class="form-group">
                                        <th><input type="text" class="form-control"  name="name" value="{{$admin->name}}">
                                            <input type="hidden" name="id" value="{{$admin->id}}"></th>
                                        </div>  
                                    
                                </tr>
                                <tr>
        
                                    <th>{{trans('admin.email')}}</th>
                                    <div class="form-group">
                                    <th><input type="email" class="form-control"  name="email" value="{{$admin->email}}">
                                        </th>
                                    </div>
        
                                </tr>
                                <tr>
                    
                                    <th>{{trans('admin.password')}}</th>
                                    <div class="form-group">
                                    <th><input type="password"  class="form-control"  name="password" value="">
                                        </th>
                                    </div>
                                    
                                </tr>
                                <tr>
            
                                    <th>{{trans('admin.mobile')}}</th>
                                    <div class="form-group">
                                    <th><input type="text" class="form-control"  name="mobile" value="{{$admin->mobile}}">
                                        </th>
                                    </div>

                                </tr>
                                <tr>
            
                                    <th>{{trans('admin.image')}}</th>
                                    <div class="form-group">
                                        <th>
                                            <div class= "col-md-12 col-xs-12">
                                                <div class="form-group  row" style="display:flex;">
                                                <div class="col-xs-12">
                                                    <div class="form-group  row" style="display:flex;">
                                                        <div style="position:relative; ">
                                                            <a class='btn btn-primary' href='javascript:;' >
                                                                {{trans('admin.Choose_File')}}
                        
                                                                {!! Form::file('image',['class'=>'form-control','id' => 'image_field', 'accept'=>'image/x-png,image/gif,image/jpeg' ,'style'=>'position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;','size'=> '40' ,'onchange' => 'readURL(this,"changeimage");' ]) !!}
                                                            </a>
                                                            &nbsp;
                                                            <div class='label label-primary' id="upload-file-info" ></div>
                                                            <span style="color: red " class="image text-center hidden"></span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                        @if($admin->image)
            
                                                        <img id="changeimage" src="{{asset('img/').'/'.$admin->image }}"  width="100%" height="100%" alt=" {{trans('admin.image')}}" />
                                                        @else 
                                
                                                        <img id="changeimage" src="{{asset('images/default.png') }}" width="100%" height="100%" alt=" {{trans('admin.image')}}" />
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>   
                                        </th>
                                    </div>
                                </tr>
                               
 
                            </table>
                            {{--  <input type="file" name="image" id="">  --}}
                            <button class="submit btn btn-success">{{trans('admin.edit')}}</button>
                            {!! Form::close()!!}
                         </div>
                        <div class="col-md-4">
                                <div class="card bg-info" >
                                    <div class="card-header" style="
                                    padding: 1px;
                                    background-color: #e8bfbf;
                                "><h3 style="text-align:center">{{trans('admin.profile')}}</h3> </div>
                                    @if($admin->image != null || $admin->image !='')
                                        <img class="card-img-top" src="{{ asset('img/') }}/{{$admin->image}}" alt="Card image" width="100%" height="150px">
                                    @else

                                    <img class="card-img-top" src="{{ asset('images/nasebk.jpeg') }}" alt="Card image" width="80%" height="100px">
                                    @endif
                                    <div class="card-body " style="padding: 39px 13px 86px 3px;
                                    ">
                                        <h4 class="card-title">{{trans('admin.name')}}: {{$admin->name}}</h4>
                                        <p class="card-text">{{trans('admin.email')}}: {{$admin->email}}</p>
                                        <p class="card-text">{{trans('admin.mobile')}}: {{$admin->mobile}}</p>
                                        {{--  <a href="#" class="btn btn-primary">See Profile</a>  --}}
                                    </div>
                                </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
   
  
@endsection 
