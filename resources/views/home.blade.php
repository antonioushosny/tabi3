@extends('layouts.index')

 @section('content')

    <section class="content-header">
        <h1>
        {{trans('admin.dashboard')}}
        <small> {{trans('admin.Control_panel')}}</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>{{trans('admin.home')}}</a></li>
        </ol>

        
    </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                    <div class="inner">
                            <h3 class="count">{{$users}}</h3>
                        <p>{{trans('admin.users')}}</p>
                    </div>
                    <div class="icon">
                        {{--  <i class="ion ion-person-stalker"></i>  --}}
                        <i class="ion ion-person-stalker "></i>
                        
                    </div>
                    <a href="{{ route('users') }}" class="small-box-footer">{{trans('admin.More_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-green">
                    <div class="inner">
                            <h3 class="count">{{$categories}}</h3>

                        <p>{{trans('admin.categories')}}</p>
                    </div>
                    <div class="icon ">
                        <i class="ion ion-navicon-round "></i>
                    </div>
                    <a href="{{ route('categories') }}" class="small-box-footer">{{trans('admin.More_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-red">
                    <div class="inner">
                        <h3 class="count">{{$subcategories}}</h3>

                        <p>{{trans('admin.subcategories')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-navicon-round"></i>
                    </div>
                    <a href="{{ route('subcategories') }}" class="small-box-footer">{{trans('admin.More_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                    <div class="inner">
                        <h3 class="count">{{$deals}}</h3>

                        <p>{{trans('admin.deals')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('deals') }}" class="small-box-footer">{{trans('admin.More_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                    <div class="inner">
                        <h3 class="count">{{$nowdeals}}</h3>

                        <p>{{trans('admin.nowdeals')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('nowdeals') }}" class="small-box-footer">{{trans('admin.More_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                    <div class="inner">
                        <h3 class="count">{{$lastdeals}}</h3>

                        <p>{{trans('admin.last_deals')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('last_deals') }}" class="small-box-footer">{{trans('admin.More_info')}}<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div> 
            
        </section>

  

@endsection 

@section('script')

@endsection
