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
                <small>{{__('admin.Welcome to Khazan')}}</small>
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
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="{{ route('users') }}">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$users}}" data-speed="1000" data-fresh-interval="700">{{$users}}</h2></a>
                                        <p class="text-muted">{{trans('admin.users')}}</p>
                                        <span id="linecustom1">1,4,2,6,5,2,3,8,5,2</span>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="{{ route('providers') }}"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$providers}}" data-speed="2000" data-fresh-interval="700">{{$providers}}</h2></a>
                                        <p class="text-muted ">{{trans('admin.providers')}}</p>
                                        <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="{{ route('centers') }}"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$centers}}" data-speed="2000" data-fresh-interval="700">{{$centers}}</h2></a>
                                        <p class="text-muted">{{trans('admin.centers')}}</p>
                                        <span id="linecustom3">1,5,3,6,6,3,6,8,4,2</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                    <div class="body">
                                        <a href="{{ route('drivers') }}"><h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$drivers}}" data-speed="1000" data-fresh-interval="700">{{$drivers}}</h2></a>
                                        <p class="text-muted">{{trans('admin.drivers')}}</p>
                                        <span id="linecustom4">1,4,2,6,5,2,3,8,5,2</span>
                                    
                                    </div>
                                </div>
                            @else 
                                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                    <div class="body">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$sales}}" data-speed="2000" data-fresh-interval="700">{{$sales}}</h2>
                                        <p class="text-muted">{{trans('admin.sales')}}</p>
                                        <span id="linecustom1">1,5,3,6,6,3,6,8,4,2</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                    <div class="body">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$orders}}" data-speed="1000" data-fresh-interval="700">{{$orders}}</h2>
                                        <p class="text-muted">{{trans('admin.orders')}}</p>
                                        <span id="linecustom2">1,4,2,6,5,2,3,8,5,2</span>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                    <div class="body">
                                        <h2 class="number count-to m-t-0 m-b-5" data-from="0" data-to="{{$drivers}}" data-speed="1000" data-fresh-interval="700">{{$drivers}}</h2>
                                        <p class="text-muted">{{trans('admin.drivers')}}</p>
                                        <span id="linecustom3">1,4,2,6,5,2,3,8,5,2</span>
                                    
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- for statics map -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Sales</strong> Report</h2>
                        <ul class="header-dropdown">

                        </ul>
                    </div>
                    <div class="body">
                        <div class="row text-center">
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">{{__('admin.SAR')}} {{$this_day}} <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted"> {{__('admin.Today_Sales')}}</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">{{__('admin.SAR')}} {{$this_week}}  <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted">{{__('admin.This_Week_Sales')}}</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">{{__('admin.SAR')}} {{$this_month}} <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted">{{__('admin.This_Month_Sales')}}</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">{{__('admin.SAR')}} {{$this_year}} <i class="zmdi zmdi-trending-up col-green"></i></h4>
                                <p class="text-muted">{{__('admin.This_Year_Sales')}}</p>
                            </div>
                        </div>
                        <div id="area_charts" class="graph"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Line</strong> Chart</h2>
                        <ul class="header-dropdown">
                            
                        </ul>
                    </div>
                    <div class="body">
                        <canvas id="line_chart" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Bar</strong> Chart</h2>
                        <ul class="header-dropdown">
                           
                        </ul>
                    </div>
                    <div class="body">
                        <canvas id="bar_chart" height="150"></canvas>
                    </div>
                </div>
            </div>            
        </div>
        
        <div class="row clearfix hidden">
            <div class="col-lg-8 col-md-12">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <ul class="row profile_state list-unstyled">
                                <li class="col-lg-3 col-md-3 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-eye col-amber"></i>
                                        <h4>15,453</h4>
                                        <span>Post View</span>
                                    </div>
                                </li>
                                <li class="col-lg-3 col-md-3 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-thumb-up col-blue"></i>
                                        <h4>921</h4>
                                        <span>Likes</span>
                                    </div>
                                </li>
                                <li class="col-lg-3 col-md-3 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-comment-text col-red"></i>
                                        <h4>215</h4>
                                        <span>Comments</span>
                                    </div>
                                </li>
                                <li class="col-lg-3 col-md-3 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-account text-success"></i>
                                        <h4>22,055</h4>
                                        <span>Profile Views</span>
                                    </div>
                                </li>                      
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="card tasks_report">
                            <div class="header">
                                <h2><strong>Total</strong> Revenue</h2>                        
                                <ul class="header-dropdown">
                                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                                            <li><a href="javascript:void(0);">2017 Year</a></li>
                                            <li><a href="javascript:void(0);">2016 Year</a></li>
                                            <li><a href="javascript:void(0);">2015 Year</a></li>
                                        </ul>
                                    </li>
                                    <li class="remove">
                                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body text-center">
                                <h4 class="margin-0">Total Sale</h4>
                                <h6 class="m-b-20">2,45,124</h6>
                                <input type="text" class="knob dial1" value="66" data-width="100" data-height="100" data-thickness="0.1" data-fgColor="#212121" readonly>
                                <h6 class="m-t-20">Satisfaction Rate</h6>
                                <small class="displayblock">47% Average <i class="zmdi zmdi-trending-up"></i></small>
                                <div class="sparkline m-t-20" data-type="bar" data-width="97%" data-height="35px" data-bar-Width="2" data-bar-Spacing="8" data-bar-Color="#212121">3,2,6,5,9,8,7,8,4,5,1,2,9,5,1,3,5,7,4,6</div>
                            </div>
                        </div>                    
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="card top-report">
                            <div class="body">
                                <h3 class="m-t-0">1,600 <i class="zmdi zmdi-trending-up float-right"></i></h3>
                                <p class="text-muted">New Feedbacks</p>
                                <div class="progress">
                                    <div class="progress-bar l-blush" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                </div>
                                <small>Change 15%</small>
                            </div>
                        </div>
                        <div class="card top-report">
                            <div class="body">
                                <h3 class="m-t-0 m-b-25">50.5 Gb <i class="zmdi zmdi-trending-up float-right"></i></h3>
                                <p class="text-muted">Traffic this month</p>
                                <div class="progress">
                                    <div class="progress-bar l-turquoise" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                </div>
                                <small>Change 5%</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card weather2">
                    <div class="city-selected body l-khaki">
                        <div class="row">
                            <div class="col-12">
                                <div class="city"><span>City:</span> New York</div>
                                <div class="night">Day - 12:07 PM</div>
                            </div>
                            <div class="info col-7">
                                <div class="temp"><h2>34°</h2></div>									
                            </div>
                            <div class="icon col-5">
                                <img src="assets/images/weather/summer.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped m-b-0">
                        <tbody>
                            <tr>
                            <td>Wind</td>
                            <td class="font-medium">ESE 17 mph</td>
                        </tr>
                        <tr>
                            <td>Humidity</td>
                            <td class="font-medium">72%</td>
                        </tr>
                        <tr>
                            <td>Pressure</td>
                            <td class="font-medium">25.56 in</td>
                        </tr>
                        <tr>
                            <td>Cloud Cover</td>
                            <td class="font-medium">80%</td>
                        </tr>
                        <tr>
                            <td>Ceiling</td>
                            <td class="font-medium">25280 ft</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item text-center active">
                                <div class="col-12">
                                    <ul class="row days-list list-unstyled">
                                        <li class="day col-4">
                                            <p>Monday</p>
                                            <img src="assets/images/weather/rain.svg" alt="">
                                        </li>
                                        <li class="day col-4">
                                            <p>Tuesday</p>
                                            <img src="assets/images/weather/cloudy.svg" alt="">
                                        </li>
                                        <li class="day col-4">
                                            <p>Wednesday</p>
                                            <img src="assets/images/weather/wind.svg" alt="">
                                        </li>
                                    </ul>
                                </div>                                
                            </div>
                            <div class="carousel-item text-center">
                                <div class="col-12">
                                    <ul class="row days-list list-unstyled">
                                        <li class="day col-4">
                                            <p>Thursday</p>
                                            <img src="assets/images/weather/sky.svg" alt="">
                                        </li>
                                        <li class="day col-4">
                                            <p>Friday</p>
                                            <img src="assets/images/weather/cloudy.svg" alt="">
                                        </li>
                                        <li class="day col-4">
                                            <p>Saturday</p>
                                            <img src="assets/images/weather/summer.svg" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>							
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row clearfix hidden">
            <div class="col-lg-8 col-md-12">
                <div class="card visitors-map">
                    <div class="header">
                        <h2><strong>Visitors</strong> Statistics</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>                        
                    </div>
                    <div class="body">
                        <div id="world-map-markers" style="height: 245px;" class="m-b-10"></div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="progress-container">
                                    <span class="progress-badge">visitor from america</span>
                                    <div class="progress">
                                        <div class="progress-bar l-turquoise" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                                            <span class="progress-value">86%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-container m-t-20">
                                    <span class="progress-badge">visitor from Canada</span>
                                    <div class="progress">
                                        <div class="progress-bar l-coral" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                                            <span class="progress-value">86%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-container m-t-20">
                                    <span class="progress-badge">visitor from Germany</span>
                                    <div class="progress">
                                        <div class="progress-bar l-blue" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width: 38%;">
                                            <span class="progress-value">86%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="progress-container">
                                    <span class="progress-badge">visitor from UK</span>
                                    <div class="progress">
                                        <div class="progress-bar l-salmon" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
                                            <span class="progress-value">86%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-container m-t-20">
                                    <span class="progress-badge">visitor from India</span>
                                    <div class="progress">
                                        <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                                            <span class="progress-value">86%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-container m-t-20">
                                    <span class="progress-badge">visitor from Australia</span>
                                    <div class="progress">
                                        <div class="progress-bar l-amber" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%;">
                                            <span class="progress-value">86%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix social-widget">                   
                    <div class="col-lg-4 col-md-4">
                        <div class="card info-box-2 hover-zoom-effect instagram-widget">
                            <div class="icon"><i class="zmdi zmdi-instagram"></i></div>
                            <div class="content">
                                <div class="text">Followers</div>
                                <div class="number">231</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="card info-box-2 hover-zoom-effect linkedin-widget">
                            <div class="icon"><i class="zmdi zmdi-linkedin"></i></div>
                            <div class="content">
                                <div class="text">Followers</div>
                                <div class="number">2510</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="card info-box-2 hover-zoom-effect behance-widget">
                            <div class="icon"><i class="zmdi zmdi-behance"></i></div>
                            <div class="content">
                                <div class="text">Project</div>
                                <div class="number">121</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Browser</strong> Usage</h2>
                        <ul class="header-dropdown">
                            
                        </ul>
                    </div>
                    <div class="body">
                        <div id="donut_chart" class="dashboard-donut-chart"></div>
                        <table class="table m-t-25 m-b-0">
                            <tbody>
                                <tr>                                   
                                    <td>Chrome</td>
                                    <td>6985</td>
                                    <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>Other</td>
                                    <td>2697</td>
                                    <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>Safari</td>
                                    <td>3597</td>
                                    <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                                </tr>
                                <tr>
                                    <td>Firefox</td>
                                    <td>2145</td>
                                    <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>Opera</td>
                                    <td>1854</td>
                                    <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                                </tr>
                                <tr>
                                    <td>IE</td>
                                    <td>154</td>
                                    <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix hidden">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Members</strong> Profiles <small>Members Preformance / Monthly Status</small> </h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive members_profiles">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:60px;">Member</th>
                                    <th>Name</th>
                                    <th>Earnings</th>
                                    <th>Sales</th>                                    
                                    <th>Reviews</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img class="rounded-circle" src="assets/images/xs/avatar1.jpg" alt="user" width="40"> </td>
                                    <td>
                                        <a href="javascript:void(0);">Logan</a>
                                    </td>
                                    <td>$420</td>
                                    <td>23</td>                                   
                                    <td>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star-outline"></i>
                                    </td>
                                        <td>
                                        <div class="progress">
                                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="rounded-circle" src="assets/images/xs/avatar2.jpg" alt="user" width="40"> </td>
                                    <td>
                                        <a href="javascript:void(0);">Isabella</a>
                                    </td>
                                    <td>$350</td>
                                    <td>16</td>                                   
                                    <td>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star-outline"></i>
                                        <i class="zmdi zmdi-star-outline"></i>
                                    </td>
                                        <td>
                                        <div class="progress">
                                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="rounded-circle" src="assets/images/xs/avatar3.jpg" alt="user" width="40"> </td>
                                    <td>
                                        <a href="javascript:void(0);">Jackson</a>
                                    </td>
                                    <td>$201</td>
                                    <td>11</td>                                   
                                    <td>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star-outline"></i>
                                        <i class="zmdi zmdi-star-outline"></i>
                                        <i class="zmdi zmdi-star-outline"></i>
                                    </td>
                                        <td>
                                        <div class="progress">
                                            <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width:32%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="rounded-circle" src="assets/images/xs/avatar4.jpg" alt="user" width="40"> </td>
                                    <td>
                                        <a href="javascript:void(0);">Victoria</a>
                                    </td>
                                    <td>$651</td>
                                    <td>28</td>                                   
                                    <td>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                    </td>
                                        <td>
                                        <div class="progress">
                                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img class="rounded-circle" src="assets/images/xs/avatar5.jpg" alt="user" width="40"> </td>
                                    <td>
                                        <a href="javascript:void(0);">Lucas</a>
                                    </td>
                                    <td>$300</td>
                                    <td>20</td>                                   
                                    <td>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                        <i class="zmdi zmdi-star-outline"></i>
                                    </td>
                                        <td>
                                        <div class="progress">
                                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
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
<script src="{{ asset('assets/plugins/chartjs/Chart.bundle.min.js') }}"></script> <!-- Chart Plugins Js -->
<script src="{{ asset('assets/js/pages/index.js') }}"></script>



<script src="{{ asset('assets/plugins/chartjs/polar_area_chart.js') }}"></script><!-- Polar Area Chart Js --> 
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js --> 
{{--  <script src="{{ asset('assets/js/pages/charts/chartjs.js') }}"></script>  --}}
<script src="{{ asset('assets/js/pages/charts/polar_area_chart.js') }}"></script>
<script> 
 

last_sex_years = [] ;
months = [] ;
sales = [] ;
orders = [] ;
days = [] ;
saless = [] ;
orderss = [] ;
yk = [] ;
lab = [] ;
i = 0 ;
@foreach($last_sex_years as $year)
        last_sex_years[i] ={
            period: "{{$year['period']}}",
            sales: "{{$year['sales']}}",
            orders: "{{$year['orders']}}"
        }; 
    i ++ ;
    {{--  console.log(last_sex_years);  --}}
@endforeach
i = 11 ;
@foreach($sales_for_year as $month)
    months[i] ="{{$month['period']}}" ;
    sales[i] ="{{$month['sales']}}" ;
    orders[i] ="{{$month['orders']}}" ;
           
    i -- ;
@endforeach

i = 6 ;
@foreach($sales_for_week as $day)
    days[i] ="{{$day['period']}}" ;
    saless[i] ="{{$day['sales']}}" ;
    orderss[i] ="{{$day['orders']}}" ;
           
    i -- ;
@endforeach
//======

xk = "{{__('admin.period')}}" ;
yk[0] = "{{__('admin.sales')}}" ;
yk[1] = "{{__('admin.orders')}}" ;
lab[0] = "{{__('admin.sales')}}" ;
lab[1] = "{{__('admin.orders')}}" ;

function MorrisArea() {
    Morris.Area({
        element: 'area_charts',
        data: last_sex_years,
    lineColors: [ '#00ced1', '#ff758e','#616161'],
    xkey: 'period',
    ykeys: [ 'sales', 'orders'],
    labels: lab,
    pointSize: 0,
    lineWidth: 0,
    resize: true,
    fillOpacity: 0.8,
    behaveLikeLine: true,
    gridLineColor: '#e0e0e0',
    hideHover: 'auto'
    });
}
//======
$(function () {
    new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
    {{--  new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));  --}}
    {{--  new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));      --}}
});

function getChartJs(type) {
    var config = null;

    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: days,
                datasets: [{
                    label: "{{__('admin.sales')}}",
                    data: saless,
                    borderColor: 'rgba(241,95,121, 0.2)',
                    backgroundColor: 'rgba(241,95,121, 0.5)',
                    pointBorderColor: 'rgba(241,95,121, 0.3)',
                    pointBackgroundColor: 'rgba(241,95,121, 0.2)',
                    pointBorderWidth: 1
                }, {
                    label: "{{__('admin.orders')}}",
                    data: orderss,                    
                    borderColor: 'rgba(140,147,154, 0.2)',
                    backgroundColor: 'rgba(140,147,154, 0.2)',
                    pointBorderColor: 'rgba(140,147,154, 0)',
                    pointBackgroundColor: 'rgba(140,147,154, 0.9)',
                    pointBorderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: false,
                
            }
        }
    }
    else if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: "{{__('admin.sales')}}",
                    data: sales,
                    backgroundColor: '#26c6da',
                    strokeColor: "rgba(255,118,118,0.1)",
                }, {
                        label: "{{__('admin.orders')}}",
                        data: orders,
                        backgroundColor: '#8a8a8b',
                        strokeColor: "rgba(255,118,118,0.1)",
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'radar') {
        config = {
            type: 'radar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 25, 90, 81, 56, 55, 40],
                    borderColor: 'rgba(241,95,121, 0.8)',
                    backgroundColor: 'rgba(241,95,121, 0.5)',
                    pointBorderColor: 'rgba(241,95,121, 0)',
                    pointBackgroundColor: 'rgba(241,95,121, 0.8)',
                    pointBorderWidth: 1
                }, {
                        label: "My Second dataset",
                        data: [72, 48, 40, 19, 96, 27, 100],
                        borderColor: 'rgba(140,147,154, 0.8)',
                        backgroundColor: 'rgba(140,147,154, 0.5)',
                        pointBorderColor: 'rgba(140,147,154, 0)',
                        pointBackgroundColor: 'rgba(140,147,154, 0.8)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'pie') {
        config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [150, 53, 121, 87, 45],
                    backgroundColor: [
                        "#2a8ceb",
                        "#58a3eb",
                        "#6fa6db",
                        "#86b8e8",
                        "#9dc7f0"
                    ],
                }],
                labels: [
                    "Pia A",
                    "Pia B",
                    "Pia C",
                    "Pia D",
                    "Pia E"
                ]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }   
    return config;
}
</script>
@endsection
