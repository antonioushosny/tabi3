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

<title>:: {{ __('admin.project_name') }} ::</title>
<!-- <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">  -->
<link rel="shortcut icon" href="{{ asset('images/Logo.PNG') }}" >

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
    .notificationimage{
        max-width: 15%;
    }
    .unread{
        background-color: #dedede;
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

<body class="theme-purple rtl">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('images/Logo.PNG') }}" width="48" height="48" alt="{{ __('admin.project_name') }}"></div>
        <p>{{__('admin.Please_wait')}}...</p>        
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
                <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('images/Logo.PNG') }}" width="30" alt="{{ __('admin.project_name') }}"><span class="m-l-10">{{ __('admin.project_name') }}</span></a>
            </div>
        </li>
        <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
        @if($lang == 'ar')
        <li> <a class="" href=" {{route('setlang',['lang'=>'en'])}}">{{trans('admin.en')}}</a> </li>
        @else 
        <li> <a class="" href=" {{route('setlang',['lang'=>'ar'])}}">{{trans('admin.ar')}}</a> </li>
        @endif

        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle notificaiton" data-toggle="dropdown" role="button" ><i class="zmdi zmdi-notifications"></i>
            <div class="notify"><span class="heartbit" style="color:black;"></span>
                <span class="point"  id="count" style=" right: -9px; top: -38px;font-size: 8px; color: #3d4c5a;">{{count(auth()->user()->unreadnotifications)}}</span>
            </div>
            </a>
            <ul class="dropdown-menu pullDown">
                <li class="body">
                    <ul class="menu list-unstyled " id="showNofication">
                        @if(sizeof(Auth()->user()->notifications) > 0)
                            @foreach(Auth()->user()->notifications as $note)
                              
                                <li>
                                    <a href="javascript:void(0);"  class="{{ $note->read_at == null ? 'unread' : '' }}">
                                        <div class="media">
                                            <img class="media-object notificationimage" src="{{ asset('images/Logo.PNG') }}" alt="">
                                            <div class="media-body">
                                                <span class="name"> <span class="time"> {!! $note->created_at  !!} </span></span><br>
                                                <span class="message">
                                                    @if($lang == 'ar')
                                                    {!! $note->data['data']['ar']  !!}  
                                                    @else 
                                                    {!! $note->data['data']['en']  !!}  
                                                    @endif  </span>                                        
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @else 

                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object notificationimage" src="{{ asset('images/Logo.PNG') }}" alt="">
                                        <div class="media-body">
                                            {{--  <span class="name">Sophia <span class="time"> </span></span>  --}}
                                            <span class="message">{{__('admin.no_notification_found')}}</span>                                        
                                        </div>
                                    </div>
                                </a>
                            </li>               
                        @endif
                    </ul>
                </li>
                {{--  <li class="footer"> <a href="javascript:void(0);">View All</a> </li>  --}}
            </ul>
        </li>

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
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard"><i class="zmdi zmdi-home m-r-5"></i>{{ __('admin.project_name') }} </a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user"><i class="zmdi zmdi-account m-r-5"></i> {{Auth::user()->name}} </a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            @if(Auth::user()->image != '' || Auth::user()->image != null)
                                <div class="image"><a href="javascript:void(0);"><img src="{{ asset('img/'.Auth::user()->image) }}" alt="{{Auth::user()->name}}"></a></div>
                            @else 
                                <div class="image"><a href="javascript:void(0);"><img src="{{ asset('images/Logo.PNG') }}" alt="{{Auth::user()->name}}"></a></div>
                            @endif
                            <div class="detail">
                                <h4>{{Auth::user()->name}}</h4>
                                <small>{{Auth::user()->email}}</small>  
                            </div>
                        </div>
                    </li>
                    <!-- <li class="header">MAIN</li> -->

                    <li <?php echo ($page == 'home') ? "class='active open'" : ""; ?> ><a href="{{ route('home') }}"  ><i class="zmdi zmdi-home"></i> <span> {{trans('admin.dashboard')}}</span></a></li>
 
                    <li <?php echo ($page == 'admins') ? "class='active open'" : ""; ?> ><a href="{{ route('admins') }}"  ><i class="zmdi zmdi-accounts-add"></i> <span> {{trans('admin.admins')}}</span></a></li>

                    
                    <li <?php echo ($page == 'countries') ? "class='active open'" : ""; ?> ><a href="{{ route('countries') }}"  ><i class="zmdi zmdi-city"></i> <span> {{trans('admin.countries')}}</span></a></li>
 
                    <li <?php echo ($page == 'cities') ? "class='active open'" : ""; ?> ><a href="{{ route('cities') }}"  ><i class="zmdi zmdi-city"></i> <span> {{trans('admin.cities')}}</span></a></li>
 
                    <li <?php echo ($page == 'areas') ? "class='active open'" : ""; ?> ><a href="{{ route('areas') }}"  ><i class="zmdi zmdi-pin"></i> <span> {{trans('admin.areas')}}</span></a></li>
 
                    <li <?php echo ($page == 'categories') ? "class='active open'" : ""; ?> ><a href="{{ route('categories') }}"  ><i class="zmdi zmdi-view-list-alt"></i> <span> {{trans('admin.categories')}}</span></a></li>

                    <li <?php echo ($page == 'departments') ? "class='active open'" : ""; ?> ><a href="{{ route('departments') }}"  ><i class="zmdi zmdi-view-list-alt"></i> <span> {{trans('admin.departments')}}</span></a></li>
                    
                    <li <?php echo ($page == 'subcategories') ? "class='active open'" : ""; ?> ><a href="{{ route('subcategories') }}"  ><i class="zmdi zmdi-view-list-alt"></i> <span> {{trans('admin.subcategories')}}</span></a></li>

                    <li <?php echo ($page == 'companies') ? "class='active open'" : ""; ?> ><a href="{{ route('companies') }}"  ><i class="zmdi zmdi-city"></i> <span> {{trans('admin.companies')}}</span></a></li>
                    
                    <li <?php echo ($page == 'packages') ? "class='active open'" : ""; ?> ><a href="{{ route('packages') }}"  ><i class="zmdi zmdi-money-box"></i> <span> {{trans('admin.packages')}}</span></a></li>

                    <li <?php echo ($page == 'advertisements') ? "class='active open'" : ""; ?> ><a href="{{ route('advertisements') }}"  ><i class="zmdi zmdi-aspect-ratio-alt"></i> <span> {{trans('admin.advertisements')}}</span></a></li>

                    <li <?php echo ($page == 'sponsors') ? "class='active open'" : ""; ?> ><a href="{{ route('sponsors') }}"  ><i class="zmdi zmdi-accounts-list"></i> <span> {{trans('admin.sponsors')}}</span></a></li>
                   
                    <li <?php echo ($page == 'users') ? "class='active open'" : ""; ?> ><a href="{{ route('users') }}"  ><i class="zmdi zmdi-accounts"></i> <span> {{trans('admin.users')}}</span></a></li>

                    <li <?php echo ($page == 'contacts') ? "class='active open'" : ""; ?> ><a href="{{ route('contacts') }}"  ><i class="zmdi zmdi-email"></i> <span> {{trans('admin.contacts')}}</span></a></li>

 
                    <li <?php echo ($page == 'AboutUs' || $page == 'Terms' || $page == 'Policy'|| $page == 'informations' || $page == 'messages') ? "class='active open'" : ""; ?> > <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings"></i><span>{{trans('admin.settings')}}</span> </a>
                        <ul class="ml-menu">
                            <li <?php echo ($page == 'AboutUs') ? "class='active open'" : ""; ?> ><a href="{{ route('editsetting','about') }}"  > <span> {{trans('admin.AboutUs')}}</span></a></li>

                            <li <?php echo ($page == 'Terms') ? "class='active open'" : ""; ?> ><a href="{{ route('editsetting','term') }}"  > <span> {{trans('admin.Terms')}}</span></a></li>

                            <li <?php echo ($page == 'Policy') ? "class='active open'" : ""; ?> ><a href="{{ route('editsetting','policy') }}"  > <span> {{trans('admin.Policy')}}</span></a></li>
                            
                            <li <?php echo ($page == 'informations') ? "class='active open'" : ""; ?> ><a href="{{ route('editsetting','information') }}"  > <span> {{trans('admin.informations')}}</span></a></li>

                            <li <?php echo ($page == 'messages') ? "class='active open'" : ""; ?> ><a href="{{ route('messages') }}"  > <span> {{trans('admin.messages')}}</span></a></li>
                        </ul>
                    </li> 
                                        
                </ul>
            </div>
        </div>
        <div class="tab-pane stretchLeft" id="user">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info m-b-20 p-b-15">
                            @if(Auth::user()->image != '' || Auth::user()->image != null)
                                <div class="image"><a href="javascript:void(0);"><img src="{{ asset('img/'.Auth::user()->image) }}" alt="{{Auth::user()->name}}"></a></div>
                            @else 
                                <div class="image"><a href="javascript:void(0);"><img src="{{ asset('images/Logo.PNG') }}" alt="{{Auth::user()->name}}"></a></div>
                            @endif
                            <div class="detail">
                                <h4>{{Auth::user()->name}}</h4>
                                @if(Auth::user()->role == 'provider')
                                <small>{{Auth::user()->company_name}}</small>  
                                @endif
                                <small>{{Auth::user()->email}}</small>  
                                             
                                @if(Auth::user()->role == 'provider')
                                <p class="text-muted">{{Auth::user()->address}}</p>
                                @endif
                            
                            </div>
                        </div>
                    </li>
                    <li>
                        <small class="text-muted">{{__('admin.email')}}: </small>
                        <p>{{Auth::user()->email}}</p>
                        <hr>
                        <small class="text-muted">{{__('admin.mobile')}}: </small>
                        <p>{{Auth::user()->mobile}}</p>
                        <hr>
                        <ul class="list-unstyled">
                            {!! Form::open(['route'=>['editprofile'],'method'=>'post','autocomplete'=>'off', 'enctype'=>'multipart/form-data' ])!!} 

                            <li>
                                <input type="hidden" value="{{Auth::user()->id}}" name="id" required>
                            </li>
                            <li>
                                <div>{{__('admin.email')}}</div>
                                <div class="m-t-10 m-b-20">
                                    <input type="email" value="{{Auth::user()->email}}" class="form-control" placeholder="{{__('admin.placeholder_email')}}" name="email" autocomplete="off" >
                                    <label id="email-error" class="error" for="email" style=""></label>
                                </div>
                            </li>
                            <li>
                                <div>{{__('admin.mobile')}}</div>
                                <div class="m-t-10 m-b-20">
                                    <input type="text" value="{{Auth::user()->mobile}}" class="form-control" placeholder="{{__('admin.mobile')}}" name="mobile" >
                                    <label id="mobile-error" class="error" for="mobile" style="">  </label>
                                </div>
                            </li>
                            <li>
                                <div>{{__('admin.password')}}</div>
                                <div class="m-t-10 m-b-20">
                                    <input type="password"  class="form-control" placeholder="{{__('admin.placeholder_password')}}" name="password"  autocomplete="new-password">
                                    <label id="password-error" class="error" for="password" style=""></label>
                                </div>
                            </li>
                            <li>
                                <div>{{__('admin.image')}}</div>
                                <div class="form-group form-float row" >
                                    {{--  for image  --}}
                                    <div class= "col-md-6 col-xs-3">
                                        <div class="form-group form-float  " >
                                            <div style="position:relative; ">
                                                <a class='btn btn-primary' href='javascript:void(0);'  style="color: white;">
                                                    {{trans('admin.Choose_Image')}}
            
                                                    {!! Form::file('image',['class'=>'form-control','id' => 'images_field', 'accept'=>'image/x-png,image/gif,image/jpeg' ,'style'=>'position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;','size'=> '40' ,'onchange' => 'readURL(this,"changeimages");' ]) !!}
                                                </a>
                                                &nbsp;
                                                <div class='label label-primary' id="upload-file-infos" ></div>
                                                <span style="color: red " class="image text-center hidden"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        
                                        @if(Auth::user()->image)
                                            <img id="changeimages" src="{{asset('img/'.Auth::user()->image)}}" width="100px" height="100px" alt=" {{trans('admin.image')}}" />
                                        @else 
                                            <img id="changeimages" src="{{asset('images/default.png')}}" width="100px" height="100px" alt=" {{trans('admin.image')}}" />
                                        @endif
                                    </div>
                                </div>

                            </li>
                            <li> 
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">{{__('admin.edit')}}</button>
                            </li>
                        </form>
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
@if($lang=='ar')
<script src="{{ asset('assets/plugins/sweetalert/sweetalert.min-ar.js') }}"></script> <!-- SweetAlert Plugin Js --> 
@else 
<script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script> <!-- SweetAlert Plugin Js -->
@endif

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
        var message, ShowDiv = $('#showNofication'), count = $('#count'), c;

        $('.notificaiton').on('click' , function(){
            setTimeout( function(){
                count.html(0);
                $('.unread').each(function(){
                    $(this).removeClass('unread');
                });
            }, 5000);
            $.get( "{{route('MarkAllSeen') }}" , function(){});
        });
    </script> 
    @yield('script')
    <script src="https://www.gstatic.com/firebasejs/6.2.2/firebase.js"></script>
    <script>
        
        var config = {
            apiKey: "AIzaSyB7plMdLEI9IkHEYQIYHI_btxj5sYElhn8",
            authDomain: "elsalamapp.firebaseapp.com",
            databaseURL: "https://elsalamapp.firebaseio.com",
            projectId: "elsalamapp",
            storageBucket: "elsalamapp.appspot.com",
            messagingSenderId: "844700117021",
            appId: "1:844700117021:web:afdaf9090454799d"
        };
        firebase.initializeApp(config);
        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
                {{--  console.log("Notification permission granted.");  --}}
                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                {{--  console.log("token is : " + token);  --}}
                if(token){
                    $.ajax({
                        url: "<?php echo url('/')?>/token/"+token,
                        success: data => {
                        }
                    })
                }
                
            })
            .catch(function (err) {
                console.log("Unable to get permission to notify.", err);
            });
            messaging.onMessage(function(payload) {
                {{--  var jsonObj = $.parseJSON('[' + payload.data.message + ']');  --}}
                {{-- var jsonObj1 = $.parseJSON('[' + payload.data + ']'); --}}
                {{--  console.log("Message received. ", payload);  --}}
                c = parseInt(count.html());
                count.html(c+1);
                {{--  console.log(jsonObj);  --}}
                {{--  console.log(payload.data);  --}}
                var start = Date.now();
                    ShowDiv.prepend(`<li>
                            <a href="javascript:void(0);"  class="unread">
                                <div class="media">
                                    <img class="media-object notificationimage" src="{{ asset('assets/images/Logo.PNG') }}" alt="">
                                    <div class="media-body">
                                        <span class="name"> <span class="time"> `+payload.data.date +`  </span></span><br>
                                        <span class="message"> `+payload.data.message +  ` </span>                                        
                                    </div>
                                </div>
                            </a>
                        </li> `);
             

            });

    </script>
    <script>
        table =  $('.js-exportable-ar').DataTable({
            "language": {
                "url": "{{asset('datatablelang.json')}}"
            },
            dom: 'Bfrtip',
            // dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],   
        });
     </script>
</body>
</html>