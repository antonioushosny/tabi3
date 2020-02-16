@extends('admin.layouts.master')
@section('styleww')
    <style> 
        .hidden{
            display:none ;
        }
    </style>
@endsection
 @section('main')
<!-- Main Content -->

    <div class="container-fluid pt-3">
        <!-- for statics -->
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="">
                    <div class="body">
                        <div class="row ">
                            @if(Auth::user()->role == 'admin')
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-primary ">
                                        <a href="{{ route('users') }}">
                                        <h2 class="number count-to m-t-0 m-b-5 text-white" >{{$users}}</h2></a>
                                        <p class="text-muted">{{trans('admin.users')}}</p>
                                         
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-secondary">
                                        <a href="{{ route('delegates') }}"><h2 class="number count-to m-t-0 m-b-5"  >{{$delegates}}</h2></a>
                                        <p class="text-muted ">{{trans('admin.delegates')}}</p>
                                     </div>
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-success">
                                        <a href="{{ route('departments') }}"><h2 class="number count-to m-t-0 m-b-5" >{{$departments}}</h2></a>
                                        <p class="text-muted">{{trans('admin.departments')}}</p>
                                     </div>
                                </div>
                                
                            @else 
                               
                            
                            @endif
                        </div>

                        <div class="row  mt-3">
                            @if(Auth::user()->role == 'admin')
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-danger">
                                        <a href="{{ route('users') }}">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$iosusers}}" data-speed="1000" data-fresh-interval="700">{{$iosusers}}</h2></a>
                                        <p class="text-muted">{{trans('admin.iosusers')}}</p>
                                         
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-warning">
                                        <a href="{{ route('users') }}"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$androidusers}}" data-speed="2000" data-fresh-interval="700">{{$androidusers}}</h2></a>
                                        <p class="text-muted ">{{trans('admin.androidusers')}}</p>
                                     </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-info">
                                        <a href="{{ route('advertisements') }}"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$installAds}}" data-speed="2000" data-fresh-interval="700">{{$installAds}}</h2></a>
                                        <p class="text-muted">{{trans('admin.installAds')}}</p>
                                     </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="card-header badge-light">
                                        <a href="{{ route('advertisements') }}"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$starAds}}" data-speed="2000" data-fresh-interval="700">{{$starAds}}</h2></a>
                                        <p class="text-muted">{{trans('admin.starAds')}}</p>
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
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class=" ">
  
                        <div class="body">
                            {!! Form::open(['route'=>['storeFreeAds'],'method'=>'post','autocomplete'=>'off', 'id'=>'form_validation', 'enctype'=>'multipart/form-data' ])!!} 

                                <div class="row text-center align-items-center">
                                    <div class="col-md-2">{{ __('admin.numberFreeAds') }}</div>
                                    <div class="col-md-4">
                                        <!-- for cost -->
                                        <input type="number" value="{{ !isset($free_ads->disc_ar)?null:$free_ads->disc_ar }}"  class="form-control" step="1" min="0" placeholder="{{__('admin.numberFreeAds')}}" name="desc_ar" required>                   
                                    </div>
                                    <label id="desc_ar-error" class="error" for="desc_ar" style="">  </label>

                                    {!! Form::hidden('type','free_ads',['class'=>'form-control show-tick']) !!}
                                    
                                    {!! Form::hidden('id',!isset($free_ads->id)?null:$free_ads->id ,['class'=>'form-control show-tick']) !!}
                                       
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">  

                                    <div class="col-md-2">  
                                        <button class="btn btn-raised btn-primary btn-round waves-effect  " type="submit">{{__('admin.save')}}</button>
                                    </div>
                                       
                                  
                                </div>
                               
                               
                            </form>
                        </div>
                </div>
            </div>
        </div>
       
    </div>

   
 
  
@endsection 


@section('scriptww')
<script src="{{ asset('assets/bundles/morrisscripts.bundle.js') }}"></script><!-- Morris Plugin Js -->
<script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('assets/bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob, Count To, Sparkline Js -->
<script src="{{ asset('assets/js/pages/index.js') }}"></script>


</script>
@endsection
