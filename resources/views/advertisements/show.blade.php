@extends('layouts.index')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-spinner/css/bootstrap-spinner.css') }}">

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
                    <li class="breadcrumb-item"><a href="{{route('advertisements')}}"><i class="zmdi zmdi-accounts-add"></i> {{__('admin.advertisements')}}</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0);">{{__('admin.show_advertisement')}}</a></li>
                    
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
                        <h2><strong>{{trans('admin.'.$title)}}</strong> {{trans('admin.show_advertisement')}}  </h2>
                    </div>
                    <div class="body ">
                        <div class="row">
                            <div class="col-md-2 col-6 p-2 ">{{ trans('admin.user') }}</div>
                            <div class="col-md-4 col-6 p-2 ">    
                                @if($data->user)
                                 {{ $data->user->name }} 
                                @endif
                            </div>

                            <div class="col-md-2 col-6 p-2 "> {{trans('admin.title')}} </div>
                            <div class="col-md-4 col-6  p-2"> {{ $data->title }} </div>

                            <div class="col-md-2 col-6  p-2">  {{ trans('admin.cost') }}</div>
                            <div class="col-md-4 col-6  p-2">  {{ $data->cost }} </div>

                            <div class="col-md-2 col-6  p-2">  {{ trans('admin.cost_advertising') }}</div>
                            <div class="col-md-4 col-6  p-2">{{ $data->cost_advertising }}</div>
                            
                            <div class="col-md-2 col-6  p-2">   {{ trans('admin.cost_benefits') }} </div>
                            <div class="col-md-4 col-6  p-2">{{ $data->cost_benefits  }}</div>

                            <div class="col-md-2 col-6  p-2">    {{ trans('admin.total') }} </div>
                            <div class="col-md-4 col-6  p-2">{{ $data->total }}</div>

                            <div class="col-md-2 col-6  p-2">     {{ trans('admin.expiry_date') }} </div>
                            <div class="col-md-4 col-6  p-2"> {{ $data->expiry_date }} </div>

                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.status') }}   </div>
                            <div class="col-md-4 col-6  p-2">{{ trans('admin.'.$data->status)}}</div>

                            <div class="col-md-2 col-6  p-2">  {{ trans('admin.allow_messages') }}  </div>
                            <div class="col-md-4 col-6  p-2">  {{ ( isset( $data->allow_messages) && $data->allow_messages == '1') ? __('admin.yes') : __('admin.no') }} </div>

                            <div class="col-md-2 col-6  p-2">  {{ trans('admin.allow_call') }}  </div>
                            <div class="col-md-4 col-6  p-2">  {{ ( isset( $data->allow_call) && $data->allow_call == '1') ? __('admin.yes') : __('admin.no') }} </div>

                            {{--  <div class="col-md-2 col-6  p-2"> {{ trans('admin.without_number') }}   </div>
                            <div class="col-md-4 col-6  p-2"> {{ $data->without_number == '1' ? __('admin.yes') : __('admin.no') }}</div>  --}}


                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.not_disturb') }}   </div>
                            <div class="col-md-4 col-6  p-2"> {{ ( isset( $data->not_disturb) && $data->not_disturb == '1' )? __('admin.yes') : __('admin.no')}}</div>

                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.numbers') }}   </div>
                            <div class="col-md-4 col-6  p-2">
                                    @php $numbers = json_decode($data->numbers) ; @endphp 
                                    @foreach($numbers as $number)
                                       {{ $number }} , 
                                    @endforeach 
                                    </div>

                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.star') }}   </div>
                            <div class="col-md-4 col-6  p-2"> {{  ( isset( $data->star) && $data->star == '1') ? __('admin.yes') : __('admin.no') }}</div>

                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.address') }}   </div>
                            <div class="col-md-4 col-6  p-2"> {{ $data->address }}</div>

                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.category') }}   </div>
                            <div class="col-md-4 col-6  p-2"> {{ ( isset( $data->category) && $lang=='ar') ? $data->category->title_ar : '' }}</div>

                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.subcategory') }}   </div>
                            <div class="col-md-4 col-6  p-2"> {{ ( isset( $data->subcategory) && $lang=='ar') ? $data->subcategory->title_ar : '' }}</div>

                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.country') }}   </div>
                            <div class="col-md-4 col-6  p-2">  {{ ( isset( $data->country) && $lang=='ar') ? $data->country->title_ar : '' }}</div>

                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.city') }}   </div>
                            <div class="col-md-4 col-6  p-2"> {{ ( isset( $data->city) && $lang=='ar') ? $data->city->title_ar : '' }}</div>

                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.area') }}   </div>
                            <div class="col-md-4 col-6  p-2"> {{  ( isset( $data->area) && $lang=='ar') ? $data->area->title_ar : ''}}</div>

                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.install') }}   </div>
                            <div class="col-md-4 col-6  p-2"> {{  ( isset( $data->install) && $data->install == '1') ? __('admin.yes') : __('admin.no') }}</div>

                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.disc') }}   </div>
                            <div class="col-md-4 col-6  p-2"> {{ $data->disc }}</div>

                           

                            


                        </div>

                     

                        <div class="row">
                            <div class="col-md-2 col-6  p-2"> {{ trans('admin.images') }}   </div>
                            <div class="col-md-10 col-6  p-2">
                                @php $images = json_decode($data->images) ; @endphp 
                                @foreach($images as $image)
                                   <a href="{{  asset('img/').'/'. $image }}" target="_blank" class="mx-2"> <img src="{{  asset('img/').'/'. $image }}" width="200px" height="200px" >  </a>
                                @endforeach 
                                </div>
                        </div>
                        @if($data->video)
                        <div class="row">
                            <div class="col-md-3 col-3  p-2"> {{ trans('admin.video') }}   </div>
                            <div class="col-md-9 col-6  p-2">
                                <video>  <source src="{{  asset('img/').'/'.$data->video }}" type="video/mp4"  width="250px" hieght="250px"></video> 
                            </div>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
  
    </div>
 
 

</section>
  
@endsection 

@section('script')
   
@endsection
