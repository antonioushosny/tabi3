<!doctype html>
<?php   
    $lang = session('lang');
    App::setLocale($lang);
    $lang = App::getlocale();
    if($lang == null){
        $lang ='ar';
    }
    if($title){
        $page = $title;
    }
    else {
        $page ='home';
    }
?>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>:: Khazan ::</title>
<!-- <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">  -->
<link rel="shortcut icon" href="{{ asset('images/logo.png') }}" >

<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/plugins/morrisjs/morris.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}"/>

<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/color_skins.css') }}">

<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />




@yield('style')  
<style>

    .select2{
        width: 100%  !important ;
        
    }
    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #867e7e;
        border-radius: 25px;
        height: 40px;
        max-width: 100% !important ;
    }

    /* for text in select2 */
    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 21px;
        padding-right: 20px;
    }
    /* for arrow in select2 */
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        top: 8px;
        right: 8px;
        width: 17px;
    }
</style>
<!-- Custom Css -->
@if($lang=='ar')
<link href='https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&subset=arabic,latin,latin-ext' rel='stylesheet' type='text/css'>
<style>
@import url(https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&subset=arabic,latin,latin-ext);
body, html { 
    font-family: 'Cairo', sans-serif !important ;
}
.sidebar { 
    font-family: 'Cairo', sans-serif !important ;
    font-weight: bold !important ;
}

</style>
<link rel="stylesheet" href="{{ asset('assets/css/rtl.css')}}">
@endif

<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="{{ asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">
</head>

<body class="theme-purple rtl"">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('images/logo_0.png') }}" width="48" height="48" alt="Khazan"></div>
        <p>{{__('admin.Please wait')}}...</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('assets/images/logo.png') }}" width="30" alt="Khazan"><span class="m-l-10">Khazan</span></a>
            </div>
        </li>
        <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
        @if($lang == 'ar')
        <li> <a class="" href=" {{route('setlang',['lang'=>'en'])}}">{{trans('admin.en')}}</a> </li>
        @else 
        <li> <a class="" href=" {{route('setlang',['lang'=>'ar'])}}">{{trans('admin.ar')}}</a> </li>
        @endif

        <!-- <li class="hidden-md-down"><a href="events.html" title="Events"><i class="zmdi zmdi-calendar"></i></a></li> -->
        <!-- <li class="hidden-md-down"><a href="mail-inbox.html" title="Inbox"><i class="zmdi zmdi-email"></i></a></li> -->
        <!-- <li><a href="contact.html" title="Contact List"><i class="zmdi zmdi-account-box-phone"></i></a></li> -->
        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
            <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu pullDown">
                <li class="body">
                    <ul class="menu list-unstyled">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object" src="{{ asset('assets/images/xs/avatar2.jpg') }}" alt="">
                                    <div class="media-body">
                                        <span class="name">Sophia <span class="time">30min ago</span></span>
                                        <span class="message">There are many variations of passages</span>                                        
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object" src="{{ asset('assets/images/xs/avatar3.jpg') }}" alt="">
                                    <div class="media-body">
                                        <span class="name">Sophia <span class="time">31min ago</span></span>
                                        <span class="message">There are many variations of passages of Lorem Ipsum</span>                                        
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object" src="{{ asset('assets/images/xs/avatar4.jpg') }}" alt="">
                                    <div class="media-body">
                                        <span class="name">Isabella <span class="time">35min ago</span></span>
                                        <span class="message">There are many variations of passages</span>                                        
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object" src="{{ asset('assets/images/xs/avatar5.jpg') }}" alt="">
                                    <div class="media-body">
                                        <span class="name">Alexander <span class="time">35min ago</span></span>
                                        <span class="message">Contrary to popular belief, Lorem Ipsum random</span>                                        
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object" src="{{ asset('assets/images/xs/avatar6.jpg') }}" alt="">
                                    <div class="media-body">
                                        <span class="name">Grayson <span class="time">1hr ago</span></span>
                                        <span class="message">There are many variations of passages</span>                                        
                                    </div>
                                </div>
                            </a>
                        </li>                        
                    </ul>
                </li>
                <li class="footer"> <a href="javascript:void(0);">View All</a> </li>
            </ul>
        </li>
        <!-- <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-flag"></i>
            <div class="notify">
                <span class="heartbit"></span>
                <span class="point"></span>
            </div>
            </a>
            <ul class="dropdown-menu pullDown">
                <li class="header">Project</li>
                <li class="body">
                    <ul class="menu tasks list-unstyled">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">eCommerce Website</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                                            <span class="progress-value">86%</span>
                                        </div>
                                    </div>                        
                                    <ul class="list-unstyled team-info">
                                        <li class="m-r-15"><small class="text-muted">Team</small></li>
                                        <li>
                                            <img src="{{ asset('assets/images/xs/avatar2.jpg') }}" alt="Avatar">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/images/xs/avatar3.jpg') }}" alt="Avatar">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/images/xs/avatar4.jpg') }}" alt="Avatar">
                                        </li>                            
                                    </ul>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="progress-container progress-info">
                                    <span class="progress-badge">iOS Game Dev</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                            <span class="progress-value">45%</span>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled team-info">
                                        <li class="m-r-15"><small class="text-muted">Team</small></li>
                                        <li>
                                            <img src="{{ asset('assets/images/xs/avatar10.jpg') }}" alt="Avatar">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/images/xs/avatar9.jpg') }}" alt="Avatar">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/images/xs/avatar8.jpg') }}" alt="Avatar">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/images/xs/avatar7.jpg') }}" alt="Avatar">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/images/xs/avatar6.jpg') }}" alt="Avatar">
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="progress-container progress-warning">
                                    <span class="progress-badge">Home Development</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;">
                                            <span class="progress-value">29%</span>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled team-info">
                                        <li class="m-r-15"><small class="text-muted">Team</small></li>
                                        <li>
                                            <img src="{{ asset('assets/images/xs/avatar5.jpg') }}" alt="Avatar">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/images/xs/avatar2.jpg') }}" alt="Avatar">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/images/xs/avatar7.jpg') }}" alt="Avatar">
                                        </li>                            
                                    </ul>
                                </div>
                            </a>
                        </li>                    
                    </ul>
                </li>
                <li class="footer"><a href="javascript:void(0);">View All</a></li>
            </ul>
        </li> -->
        <!-- <li class="hidden-sm-down">
            <div class="input-group">                
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-search"></i>
                </span>
            </div>
        </li>  -->
        <li class="float-right">
            <!-- <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true"><i class="zmdi zmdi-fullscreen"></i></a> -->
            <!-- <a href="{{route('logout')}}" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a> -->
            <a class="mega-menu" href="{{ route('logout') }}" data-close="true" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  <i class="zmdi zmdi-power"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
            <!-- <a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a> -->
        </li>
    </ul>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard"><i class="zmdi zmdi-home m-r-5"></i>Khazan</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user"><i class="zmdi zmdi-account m-r-5"></i>User</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="profile.html"><img src="{{ asset('assets/images/profile_av.jpg') }}" alt="User"></a></div>
                            <div class="detail">
                                <h4>Michael</h4>
                                <small>UI UX Designer</small>                        
                            </div>
                            <a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="twitter" href="#"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="instagram" href="#"><i class="zmdi zmdi-instagram"></i></a>                            
                        </div>
                    </li>
                    <!-- <li class="header">MAIN</li> -->
                    <li <?php echo ($page == 'home') ? "class='active open'" : ""; ?> ><a href="{{ route('home') }}"  ><i class="zmdi zmdi-home"></i> <span> {{trans('admin.dashboard')}}</span></a></li>
                    @if(Auth::user()->role == 'admin')

                    <li <?php echo ($page == 'admins') ? "class='active open'" : ""; ?> ><a href="{{ route('admins') }}"  ><i class="zmdi zmdi-accounts-add"></i> <span> {{trans('admin.admins')}}</span></a></li>

                    <li <?php echo ($page == 'cities') ? "class='active open'" : ""; ?> ><a href="{{ route('cities') }}"  ><i class="zmdi zmdi-accounts-add"></i> <span> {{trans('admin.cities')}}</span></a></li>

                    <li <?php echo ($page == 'areas') ? "class='active open'" : ""; ?> ><a href="{{ route('areas') }}"  ><i class="zmdi zmdi-accounts-add"></i> <span> {{trans('admin.areas')}}</span></a></li>

                    <li <?php echo ($page == 'containers') ? "class='active open'" : ""; ?> ><a href="{{ route('containers') }}"  ><i class="zmdi zmdi-accounts-add"></i> <span> {{trans('admin.containers')}}</span></a></li>

                    <li <?php echo ($page == 'providers') ? "class='active open'" : ""; ?> ><a href="{{ route('providers') }}"  ><i class="zmdi zmdi-accounts-add"></i> <span> {{trans('admin.providers')}}</span></a></li>
                    @endif
                    
                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'provider')
                    <li <?php echo ($page == 'centers') ? "class='active open'" : ""; ?> ><a href="{{ route('centers') }}"  ><i class="zmdi zmdi-accounts-add"></i> <span> {{trans('admin.centers')}}</span></a></li>
                    @endif

                    <li <?php echo ($page == 'drivers') ? "class='active open'" : ""; ?> ><a href="{{ route('drivers') }}"  ><i class="zmdi zmdi-accounts-add"></i> <span> {{trans('admin.drivers')}}</span></a></li>
                    
                    @if(Auth::user()->role == 'center')
                   <!--  <li <?php echo ($page == 'orders') ? "class='active open'" : ""; ?> ><a href="{{ route('orders') }}"  ><i class="zmdi zmdi-accounts-add"></i> <span> {{trans('admin.orders')}}</span></a></li>  -->

                    <li <?php echo ($page == 'orders') ? "class='active open'" : ""; ?>  <?php echo ($page == 'neworders') ? "class='active open'" : ""; ?> > <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>{{trans('admin.orders')}}</span> </a>
                        <ul class="ml-menu">
                            <li <?php echo ($page == 'neworders') ? "class='active '" : ""; ?>><a href="{{ route('neworders') }}">{{trans('admin.neworders')}}</a></li>
                            <li <?php echo ($page == 'noworders') ? "class='active '" : ""; ?>><a href="{{ route('noworders') }}">{{trans('admin.noworders')}}</a></li>
                            <li <?php echo ($page == 'lastorders') ? "class='active '" : ""; ?>><a href="{{ route('lastorders') }}">{{trans('admin.lastorders')}}</a></li>
                            <li <?php echo ($page == 'orders') ? "class='active '" : ""; ?>><a href="{{ route('orders') }}">{{trans('admin.allorders')}}</a></li>
                        </ul>
                    </li> 
                    @endif
                   
                    @if(Auth::user()->role == 'admin')
                    <li <?php echo ($page == 'users') ? "class='active open'" : ""; ?> ><a href="{{ route('users') }}"  ><i class="zmdi zmdi-accounts-add"></i> <span> {{trans('admin.users')}}</span></a></li>
                    @endif

                    <li <?php echo ($page == 'reports') ? "class='active open'" : ""; ?> ><a href="{{ route('reports') }}"  ><i class="zmdi zmdi-accounts-add"></i> <span> {{trans('admin.reports')}}</span></a></li>

                    <!-- <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>App</span> </a>
                        <ul class="ml-menu">
                            <li><a href="mail-inbox.html">Inbox</a></li>
                            <li><a href="blog-dashboard.html">Blog</a></li>
                        </ul>
                    </li> -->

                    
                </ul>
            </div>
        </div>
        <div class="tab-pane stretchLeft" id="user">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info m-b-20 p-b-15">
                            <div class="image"><a href="profile.html"><img src="{{ asset('assets/images/profile_av.jpg') }}" alt="User"></a></div>
                            <div class="detail">
                                <h4>Michael</h4>
                                <small>UI UX Designer</small>                        
                            </div>
                            <a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="twitter" href="#"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="instagram" href="#"><i class="zmdi zmdi-instagram"></i></a>
                            <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                            <div class="row">
                                <div class="col-4">
                                    <h5 class="m-b-5">852</h5>
                                    <small>Following</small>
                                </div>
                                <div class="col-4">
                                    <h5 class="m-b-5">13k</h5>
                                    <small>Followers</small>
                                </div>
                                <div class="col-4">
                                    <h5 class="m-b-5">234</h5>
                                    <small>Post</small>
                                </div>                            
                            </div>
                        </div>
                    </li>
                    <li>
                        <small class="text-muted">Email address: </small>
                        <p>michael@gmail.com</p>
                        <hr>
                        <small class="text-muted">Phone: </small>
                        <p>+ 202-555-0191</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li>
                                <div>Photoshop</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%"> <span class="sr-only">62% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Wordpress</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-green " role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%"> <span class="sr-only">87% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>HTML 5</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">32% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Angular</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blush" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%"> <span class="sr-only">56% Complete</span> </div>
                                </div>
                            </li>
                        </ul>                        
                    </li>
                </ul>
            </div>
        </div>
    </div>    
</aside>

@yield('content')   

<!-- Jquery Core Js --> 
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- slimscroll, waves Scripts Plugin Js -->
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

<!-- // for form validations  -->
@if($lang=='ar')
<script src="{{ asset('assets/plugins/jquery-validation/jquery.validate-ar.js') }}"></script> <!-- Jquery Validation Plugin Css --> 
@else 
<script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script> <!-- Jquery Validation Plugin Css --> 
@endif
<script src="{{ asset('assets/plugins/jquery-steps/jquery.steps.js') }}"></script> <!-- JQuery Steps Plugin Js --> 
<script src="{{ asset('assets/js/pages/forms/form-validation.js') }}"></script> 
  <!-- //for  dialogs  -->
<script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script> <!-- SweetAlert Plugin Js --> 
<script src="{{ asset('assets/js/pages/ui/dialogs.js') }}"></script>
 
<script src="{{ asset('assets/plugins/momentjs/moment.js') }}"></script> <!-- Moment Plugin Js --> 
<!-- Bootstrap Material Datetime Picker Plugin Js --> 
<script src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script> 
<script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script> 
<script src="{{ asset('assets/js/pages/forms/basic-form-elements.js') }}"></script> 

<!-- Jquery DataTable Plugin Js --> 
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script> 
<script>
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
    function readURL(input,imagediv) {
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            src = document.getElementById(imagediv).src;    
            imag = "{{asset('images/addimage.png')}}" ;
            if(imag != src){
                arrayimages = src ;
            }
            reader.onload = function (e) {
                $('#'+imagediv).attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
   
</script> 
@yield('script')

<script>
     $('.js-exportable-ar').DataTable({
        "language": {
            "url": "{{asset('datatablelang.json')}}"
        },
        dom: 'Bfrtip',
        // dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],   
    });
    $('.select2').select2();
</script>


</body>
</html>