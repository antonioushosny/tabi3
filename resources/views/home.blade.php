@extends('layouts.index')
@section('style')
    <style> 
        .hidden{
            display:none ;
        }
    </style>
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
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="zmdi zmdi-home"></i> {{__('admin.dashboard')}}</a></li>
                    <!-- <li class="breadcrumb-item active">{{__('admin.dashboard')}}</li> -->
                </ul>
            </div>
        </div>
    </div>

     
    <div class="container-fluid">
        <!-- for statics -->
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            @if(Auth::user()->role == 'admin')
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="{{ route('users') }}">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$users}}" data-speed="1000" data-fresh-interval="700">{{$users}}</h2></a>
                                        <p class="text-muted">{{trans('admin.users')}}</p>
                                        <span id="linecustom1">1,4,2,6,5,2,3,8,5,2</span>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="{{ route('delegates') }}"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$delegates}}" data-speed="2000" data-fresh-interval="700">{{$delegates}}</h2></a>
                                        <p class="text-muted ">{{trans('admin.delegates')}}</p>
                                        <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="{{ route('departments') }}"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$departments}}" data-speed="2000" data-fresh-interval="700">{{$departments}}</h2></a>
                                        <p class="text-muted">{{trans('admin.departments')}}</p>
                                        <span id="linecustom3">1,5,3,6,6,3,6,8,4,2</span>
                                    </div>
                                </div>
                                
                            @else 
                               
                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       
    </div>

   
</section>
  
@endsection 


@section('script')
<script src="{{ asset('assets/bundles/morrisscripts.bundle.js') }}"></script><!-- Morris Plugin Js -->
<script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('assets/bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob, Count To, Sparkline Js -->
<script src="{{ asset('assets/js/pages/index.js') }}"></script>


</script>
@endsection
