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

                        <div class="row clearfix">
                            @if(Auth::user()->role == 'admin')
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="{{ route('users') }}">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$iosusers}}" data-speed="1000" data-fresh-interval="700">{{$iosusers}}</h2></a>
                                        <p class="text-muted">{{trans('admin.iosusers')}}</p>
                                        <span id="linecustom4">1,4,2,6,5,2,3,8,5,2</span>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="{{ route('users') }}"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$androidusers}}" data-speed="2000" data-fresh-interval="700">{{$androidusers}}</h2></a>
                                        <p class="text-muted ">{{trans('admin.androidusers')}}</p>
                                        <span id="linecustom5">2,9,5,5,8,5,4,2,6</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="{{ route('advertisements') }}"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$installAds}}" data-speed="2000" data-fresh-interval="700">{{$installAds}}</h2></a>
                                        <p class="text-muted">{{trans('admin.installAds')}}</p>
                                        <span id="linecustom6">1,5,3,6,6,3,6,8,4,2</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="{{ route('advertisements') }}"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$starAds}}" data-speed="2000" data-fresh-interval="700">{{$starAds}}</h2></a>
                                        <p class="text-muted">{{trans('admin.starAds')}}</p>
                                        <span id="linecustom7">1,5,3,6,6,3,6,8,4,2</span>
                                    </div>
                                </div>
                                
                            @else 
                               
                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

  <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
  
                        <div class="body">
                            {!! Form::open(['route'=>['storeFreeAds'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ])!!} 

                                <div class="row">
                                    <div class="col-md-2">{{ __('admin.numberFreeAds') }}</div>
                                    <div class="col-md-10">
                                        <!-- for cost -->
                                        <div class="form-group form-float">
                                            <input type="number" value="{{ !isset($free_ads->disc_ar)?null:$free_ads->disc_ar }}"  class="form-control" step="1" min="0" placeholder="{{__('admin.numberFreeAds')}}" name="desc_ar" required>
                                            <label id="desc_ar-error" class="error" for="desc_ar" style="">  </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- for type -->
                                <div class= "form-group form-float">
                                    {!! Form::hidden('type','free_ads',['class'=>'form-control show-tick']) !!}
                                    <label id="type-error" class="error" for="type" style="">  </label>
                                </div>

                                <!-- for id -->
                                <div class= "form-group form-float">
                                    {!! Form::hidden('id',!isset($free_ads->id)?null:$free_ads->id ,['class'=>'form-control show-tick']) !!}
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
<script src="{{ asset('assets/bundles/morrisscripts.bundle.js') }}"></script><!-- Morris Plugin Js -->
<script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('assets/bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob, Count To, Sparkline Js -->
<script src="{{ asset('assets/js/pages/index.js') }}"></script>


</script>
@endsection
