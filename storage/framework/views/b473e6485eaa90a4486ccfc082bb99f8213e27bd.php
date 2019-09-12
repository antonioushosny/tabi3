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
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<title>:: <?php echo e(__('admin.project_name')); ?> ::</title>
<!-- <link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/x-icon">  -->
<link rel="shortcut icon" href="<?php echo e(asset('images/Logo.PNG')); ?>" >

<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/morrisjs/morris.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.css')); ?>"/>

<!-- Custom Css -->
<link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/color_skins.css')); ?>">

<!-- Bootstrap Material Datetime Picker Css -->
<link href="<?php echo e(asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>" rel="stylesheet" />
<!-- Bootstrap Select Css -->
<link href="<?php echo e(asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')); ?>" rel="stylesheet" />




<?php echo $__env->yieldContent('style'); ?>  
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
<?php if($lang=='ar'): ?>
<link href='https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&subset=arabic,latin,latin-ext' rel='stylesheet' type='text/css'>
<style>
@import  url(https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&subset=arabic,latin,latin-ext);
body, html { 
    font-family: 'Cairo', sans-serif !important ;
}
.sidebar { 
    font-family: 'Cairo', sans-serif !important ;
    font-weight: bold !important ;
}

</style>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/rtl.css')); ?>">
<?php endif; ?>

<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')); ?>">
</head>

<body class="theme-purple rtl">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="<?php echo e(asset('images/Logo.PNG')); ?>" width="48" height="48" alt="<?php echo e(__('admin.project_name')); ?>"></div>
        <p><?php echo e(__('admin.Please_wait')); ?>...</p>        
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
                <a class="navbar-brand" href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('images/Logo.PNG')); ?>" width="30" alt="<?php echo e(__('admin.project_name')); ?>"><span class="m-l-10"><?php echo e(__('admin.project_name')); ?></span></a>
            </div>
        </li>
        <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
        <?php if($lang == 'ar'): ?>
        <li> <a class="" href=" <?php echo e(route('setlang',['lang'=>'en'])); ?>"><?php echo e(trans('admin.en')); ?></a> </li>
        <?php else: ?> 
        <li> <a class="" href=" <?php echo e(route('setlang',['lang'=>'ar'])); ?>"><?php echo e(trans('admin.ar')); ?></a> </li>
        <?php endif; ?>

        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle notificaiton" data-toggle="dropdown" role="button" ><i class="zmdi zmdi-notifications"></i>
            <div class="notify"><span class="heartbit" style="color:black;"></span>
                <span class="point"  id="count" style=" right: -9px; top: -38px;font-size: 8px; color: #3d4c5a;"><?php echo e(count(auth()->user()->unreadnotifications)); ?></span>
            </div>
            </a>
            <ul class="dropdown-menu pullDown">
                <li class="body">
                    <ul class="menu list-unstyled " id="showNofication">
                        <?php if(sizeof(Auth()->user()->notifications) > 0): ?>
                            <?php $__currentLoopData = Auth()->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                                <li>
                                    <a href="javascript:void(0);"  class="<?php echo e($note->read_at == null ? 'unread' : ''); ?>">
                                        <div class="media">
                                            <img class="media-object notificationimage" src="<?php echo e(asset('images/Logo.PNG')); ?>" alt="">
                                            <div class="media-body">
                                                <span class="name"> <span class="time"> <?php echo $note->created_at; ?> </span></span><br>
                                                <span class="message">
                                                    <?php if($lang == 'ar'): ?>
                                                    <?php echo $note->data['data']['ar']; ?>  
                                                    <?php else: ?> 
                                                    <?php echo $note->data['data']['en']; ?>  
                                                    <?php endif; ?>  </span>                                        
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?> 

                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object notificationimage" src="<?php echo e(asset('images/Logo.PNG')); ?>" alt="">
                                        <div class="media-body">
                                            
                                            <span class="message"><?php echo e(__('admin.no_notification_found')); ?></span>                                        
                                        </div>
                                    </div>
                                </a>
                            </li>               
                        <?php endif; ?>
                    </ul>
                </li>
                
            </ul>
        </li>

        <li class="float-right">
            <!-- <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true"><i class="zmdi zmdi-fullscreen"></i></a> -->
            <!-- <a href="<?php echo e(route('logout')); ?>" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a> -->
            <a class="mega-menu" href="<?php echo e(route('logout')); ?>" data-close="true" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  <i class="zmdi zmdi-power"></i></a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
            </form>
            <!-- <a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a> -->
        </li>
    </ul>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard"><i class="zmdi zmdi-home m-r-5"></i><?php echo e(__('admin.project_name')); ?> </a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user"><i class="zmdi zmdi-account m-r-5"></i> <?php echo e(Auth::user()->name); ?> </a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <?php if(Auth::user()->image != '' || Auth::user()->image != null): ?>
                                <div class="image"><a href="javascript:void(0);"><img src="<?php echo e(asset('img/'.Auth::user()->image)); ?>" alt="<?php echo e(Auth::user()->name); ?>"></a></div>
                            <?php else: ?> 
                                <div class="image"><a href="javascript:void(0);"><img src="<?php echo e(asset('images/Logo.PNG')); ?>" alt="<?php echo e(Auth::user()->name); ?>"></a></div>
                            <?php endif; ?>
                            <div class="detail">
                                <h4><?php echo e(Auth::user()->name); ?></h4>
                                <small><?php echo e(Auth::user()->email); ?></small>  
                            </div>
                        </div>
                    </li>
                    <!-- <li class="header">MAIN</li> -->

                    <li <?php echo ($page == 'home') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('home')); ?>"  ><i class="zmdi zmdi-home"></i> <span> <?php echo e(trans('admin.dashboard')); ?></span></a></li>
 
                    <li <?php echo ($page == 'admins') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('admins')); ?>"  ><i class="zmdi zmdi-accounts-add"></i> <span> <?php echo e(trans('admin.admins')); ?></span></a></li>

                    
                    <li <?php echo ($page == 'countries') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('countries')); ?>"  ><i class="zmdi zmdi-city"></i> <span> <?php echo e(trans('admin.countries')); ?></span></a></li>
 
                    <li <?php echo ($page == 'cities') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('cities')); ?>"  ><i class="zmdi zmdi-city"></i> <span> <?php echo e(trans('admin.cities')); ?></span></a></li>
 
                    <li <?php echo ($page == 'areas') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('areas')); ?>"  ><i class="zmdi zmdi-pin"></i> <span> <?php echo e(trans('admin.areas')); ?></span></a></li>
 

                    <li <?php echo ($page == 'categories') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('categories')); ?>"  ><i class="zmdi zmdi-view-list-alt"></i> <span> <?php echo e(trans('admin.categories')); ?></span></a></li>

                    <li <?php echo ($page == 'departments') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('departments')); ?>"  ><i class="zmdi zmdi-view-list-alt"></i> <span> <?php echo e(trans('admin.departments')); ?></span></a></li>

                    <li <?php echo ($page == 'companies') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('companies')); ?>"  ><i class="zmdi zmdi-city"></i> <span> <?php echo e(trans('admin.companies')); ?></span></a></li>
                    
                    <li <?php echo ($page == 'packages') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('packages')); ?>"  ><i class="zmdi zmdi-money-box"></i> <span> <?php echo e(trans('admin.packages')); ?></span></a></li>

                    <li <?php echo ($page == 'advertisements') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('advertisements')); ?>"  ><i class="zmdi zmdi-aspect-ratio-alt"></i> <span> <?php echo e(trans('admin.advertisements')); ?></span></a></li>

                    <li <?php echo ($page == 'sponsors') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('sponsors')); ?>"  ><i class="zmdi zmdi-accounts-list"></i> <span> <?php echo e(trans('admin.sponsors')); ?></span></a></li>
                   
                    <li <?php echo ($page == 'users') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('users')); ?>"  ><i class="zmdi zmdi-accounts"></i> <span> <?php echo e(trans('admin.users')); ?></span></a></li>

                    <li <?php echo ($page == 'contacts') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('contacts')); ?>"  ><i class="zmdi zmdi-email"></i> <span> <?php echo e(trans('admin.contacts')); ?></span></a></li>

 
                    <li <?php echo ($page == 'AboutUs' || $page == 'Terms' || $page == 'Policy'|| $page == 'informations' || $page == 'messages') ? "class='active open'" : ""; ?> > <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings"></i><span><?php echo e(trans('admin.settings')); ?></span> </a>
                        <ul class="ml-menu">
                            <li <?php echo ($page == 'AboutUs') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('editsetting','about')); ?>"  > <span> <?php echo e(trans('admin.AboutUs')); ?></span></a></li>

                            <li <?php echo ($page == 'Terms') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('editsetting','term')); ?>"  > <span> <?php echo e(trans('admin.Terms')); ?></span></a></li>

                            <li <?php echo ($page == 'Policy') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('editsetting','policy')); ?>"  > <span> <?php echo e(trans('admin.Policy')); ?></span></a></li>
                            
                            <li <?php echo ($page == 'informations') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('editsetting','information')); ?>"  > <span> <?php echo e(trans('admin.informations')); ?></span></a></li>

                            <li <?php echo ($page == 'messages') ? "class='active open'" : ""; ?> ><a href="<?php echo e(route('messages')); ?>"  > <span> <?php echo e(trans('admin.messages')); ?></span></a></li>
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
                            <?php if(Auth::user()->image != '' || Auth::user()->image != null): ?>
                                <div class="image"><a href="javascript:void(0);"><img src="<?php echo e(asset('img/'.Auth::user()->image)); ?>" alt="<?php echo e(Auth::user()->name); ?>"></a></div>
                            <?php else: ?> 
                                <div class="image"><a href="javascript:void(0);"><img src="<?php echo e(asset('images/Logo.PNG')); ?>" alt="<?php echo e(Auth::user()->name); ?>"></a></div>
                            <?php endif; ?>
                            <div class="detail">
                                <h4><?php echo e(Auth::user()->name); ?></h4>
                                <?php if(Auth::user()->role == 'provider'): ?>
                                <small><?php echo e(Auth::user()->company_name); ?></small>  
                                <?php endif; ?>
                                <small><?php echo e(Auth::user()->email); ?></small>  
                                             
                                <?php if(Auth::user()->role == 'provider'): ?>
                                <p class="text-muted"><?php echo e(Auth::user()->address); ?></p>
                                <?php endif; ?>
                            
                            </div>
                        </div>
                    </li>
                    <li>
                        <small class="text-muted"><?php echo e(__('admin.email')); ?>: </small>
                        <p><?php echo e(Auth::user()->email); ?></p>
                        <hr>
                        <small class="text-muted"><?php echo e(__('admin.mobile')); ?>: </small>
                        <p><?php echo e(Auth::user()->mobile); ?></p>
                        <hr>
                        <ul class="list-unstyled">
                            <?php echo Form::open(['route'=>['editprofile'],'method'=>'post','autocomplete'=>'off', 'enctype'=>'multipart/form-data' ]); ?> 

                            <li>
                                <input type="hidden" value="<?php echo e(Auth::user()->id); ?>" name="id" required>
                            </li>
                            <li>
                                <div><?php echo e(__('admin.email')); ?></div>
                                <div class="m-t-10 m-b-20">
                                    <input type="email" value="<?php echo e(Auth::user()->email); ?>" class="form-control" placeholder="<?php echo e(__('admin.placeholder_email')); ?>" name="email" autocomplete="off" >
                                    <label id="email-error" class="error" for="email" style=""></label>
                                </div>
                            </li>
                            <li>
                                <div><?php echo e(__('admin.mobile')); ?></div>
                                <div class="m-t-10 m-b-20">
                                    <input type="text" value="<?php echo e(Auth::user()->mobile); ?>" class="form-control" placeholder="<?php echo e(__('admin.mobile')); ?>" name="mobile" >
                                    <label id="mobile-error" class="error" for="mobile" style="">  </label>
                                </div>
                            </li>
                            <li>
                                <div><?php echo e(__('admin.password')); ?></div>
                                <div class="m-t-10 m-b-20">
                                    <input type="password"  class="form-control" placeholder="<?php echo e(__('admin.placeholder_password')); ?>" name="password"  autocomplete="new-password">
                                    <label id="password-error" class="error" for="password" style=""></label>
                                </div>
                            </li>
                            <li>
                                <div><?php echo e(__('admin.image')); ?></div>
                                <div class="form-group form-float row" >
                                    
                                    <div class= "col-md-6 col-xs-3">
                                        <div class="form-group form-float  " >
                                            <div style="position:relative; ">
                                                <a class='btn btn-primary' href='javascript:void(0);'  style="color: white;">
                                                    <?php echo e(trans('admin.Choose_Image')); ?>

            
                                                    <?php echo Form::file('image',['class'=>'form-control','id' => 'images_field', 'accept'=>'image/x-png,image/gif,image/jpeg' ,'style'=>'position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;','size'=> '40' ,'onchange' => 'readURL(this,"changeimages");' ]); ?>

                                                </a>
                                                &nbsp;
                                                <div class='label label-primary' id="upload-file-infos" ></div>
                                                <span style="color: red " class="image text-center hidden"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        
                                        <?php if(Auth::user()->image): ?>
                                            <img id="changeimages" src="<?php echo e(asset('img/'.Auth::user()->image)); ?>" width="100px" height="100px" alt=" <?php echo e(trans('admin.image')); ?>" />
                                        <?php else: ?> 
                                            <img id="changeimages" src="<?php echo e(asset('images/default.png')); ?>" width="100px" height="100px" alt=" <?php echo e(trans('admin.image')); ?>" />
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </li>
                            <li> 
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit"><?php echo e(__('admin.edit')); ?></button>
                            </li>
                        </form>
                        </ul>                        
                    </li>
                </ul>
            </div>
        </div>
    </div>    
</aside>

<?php echo $__env->yieldContent('content'); ?>   

<!-- Jquery Core Js --> 
<script src="<?php echo e(asset('assets/bundles/libscripts.bundle.js')); ?>"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="<?php echo e(asset('assets/bundles/vendorscripts.bundle.js')); ?>"></script> <!-- slimscroll, waves Scripts Plugin Js -->
<script src="<?php echo e(asset('assets/bundles/mainscripts.bundle.js')); ?>"></script>

<!-- // for form validations  -->
<?php if($lang=='ar'): ?>
<script src="<?php echo e(asset('assets/plugins/jquery-validation/jquery.validate-ar.js')); ?>"></script> <!-- Jquery Validation Plugin Css --> 
<?php else: ?> 
<script src="<?php echo e(asset('assets/plugins/jquery-validation/jquery.validate.js')); ?>"></script> <!-- Jquery Validation Plugin Css --> 
<?php endif; ?>
<script src="<?php echo e(asset('assets/plugins/jquery-steps/jquery.steps.js')); ?>"></script> <!-- JQuery Steps Plugin Js --> 
<script src="<?php echo e(asset('assets/js/pages/forms/form-validation.js')); ?>"></script> 
  <!-- //for  dialogs  -->
<?php if($lang=='ar'): ?>
<script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.min-ar.js')); ?>"></script> <!-- SweetAlert Plugin Js --> 
<?php else: ?> 
<script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalert.min.js')); ?>"></script> <!-- SweetAlert Plugin Js -->
<?php endif; ?>

<script src="<?php echo e(asset('assets/js/pages/ui/dialogs.js')); ?>"></script>
 
<script src="<?php echo e(asset('assets/plugins/momentjs/moment.js')); ?>"></script> <!-- Moment Plugin Js --> 
<!-- Bootstrap Material Datetime Picker Plugin Js --> 
<script src="<?php echo e(asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>"></script> 
<script src="<?php echo e(asset('assets/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script> 
<script src="<?php echo e(asset('assets/js/pages/forms/basic-form-elements.js')); ?>"></script> 

<!-- Jquery DataTable Plugin Js --> 
<script src="<?php echo e(asset('assets/bundles/datatablescripts.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/tables/jquery-datatable.js')); ?>"></script> 
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
                imag = "<?php echo e(asset('images/addimage.png')); ?>" ;
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
            $.get( "<?php echo e(route('MarkAllSeen')); ?>" , function(){});
        });
    </script> 
    <?php echo $__env->yieldContent('script'); ?>
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
                
                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                
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
                
                
                
                c = parseInt(count.html());
                count.html(c+1);
                
                
                var start = Date.now();
                    ShowDiv.prepend(`<li>
                            <a href="javascript:void(0);"  class="unread">
                                <div class="media">
                                    <img class="media-object notificationimage" src="<?php echo e(asset('assets/images/Logo.PNG')); ?>" alt="">
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
                "url": "<?php echo e(asset('datatablelang.json')); ?>"
            },
            dom: 'Bfrtip',
            // dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],   
        });
     </script>
</body>
</html><?php /**PATH E:\xampp7\htdocs\tabi3\resources\views/layouts/index.blade.php ENDPATH**/ ?>