<!DOCTYPE html>


<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ trans('admin.nasebk')}}</title>
    <link rel="shortcut icon" href="{{ asset('images/nasebk.PNG') }}" >
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('rtl/bootstrap/css/bootstrap.min.css') }}">
    {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') }}">  --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonynasebks">
    <link rel="stylesheet" href="{{ asset('rtl/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('rtl/plugins/iCheck/square/blue.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonynasebks"></script>
    <script src="{{ asset('rtl/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <style>
      html{
        background-image: url('{{ asset('images/bghome.png') }}');
      }
      body{
        background-image: url('{{ asset('images/bghome.png') }}');
        
           background: #fafafa !important;
      }
        .toast-top-full-width {
          top: 10%;
          right: 25%;
          width: 50%;
        }

        .login-box-body, .register-box-body {

          color: #fff;
      }
      .invalid-feedback{
        font-size: 10px ;
      }
    </style>
    <script> 
        language = localStorage.getItem("lang"); 
      $("html").attr("lang", language);
    </script>

  </head>
  <body class="login-page"  >
      <?php 
      //if(isset($_COOKIE[$cookie_lang])) {
      //  App::setLocale($cookie_lang);
      //} 
     // if(!isset($_COOKIE[$cookie_lang])) {
        //echo "Cookie named '" . $cookie_lang . "' is not set!"; die();
   // } else {
    //    echo "Cookie '" . $cookie_lang . "' is set!<br>";
      //  echo "Value is: " . $_COOKIE[$cookie_lang]; die();
    //}
      
      ?>
    <div class="login-box">
        @if(Session::has('error'))

        <script>
            toastr.options = {
              "positionClass": "toast-top-full-width",
            }
           toastr.error('{{ Session::get('error') }}', 'Error', {timeOut: 5000});
       </script>
       @endif 
      <div class="login-logo">
        {{--  <a href="#"><b>{{ trans('admin.nasebk')}}</b></a>  --}}
        <img src="{{ asset('images/nasebk.PNG') }}" width="100%" height="250px" alt="">
      </div><!-- /.login-logo -->
      <div class="login-box-body" style="
      background-color: #31516a;">
        <p class="login-box-msg">{{ trans('admin.Sign_session')}}</p>
        <form action="{{ route('login') }}" method="POST" id="loginform" autocomplete="off">
                @csrf
          <div class="form-group has-feedback">
            <input type="text" name="email" class="form-control" placeholder="{{trans('admin.placeholder_email')}}" value="{{ old('email') }}"  autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <span>{{ $errors->first('email') }}</span>
                </span>
            @endif
          </div>
     
          <!--/*<?php print_r(Hash::make('123456') ); ?>*/-->
          <div class="form-group has-feedback">
            <input type="password"  placeholder="{{trans('admin.placeholder_password')}}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <span>{{ $errors->first('password') }}</span>
                </span>
            @endif
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div >
                <label>
                  <input type="checkbox"  {{ old('remember') ? 'checked' : '' }} class="checkbox icheck"> {{trans('admin.remember')}}
                  
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-success  btn-block btn-flat">{{trans('admin.sign')}}</button>
            </div><!-- /.col -->
          </div>
        </form>
        {{-- <a href="{{ route('password.request') }}"> {{trans('admin.forgot')}}</a> --}} 
        <br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('rtl/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="{{ asset('rtl/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('rtl/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

  {{--  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $("#loginform").validate({
        rules: {
            email: "required|email",
            password: "required",
        },
        messages: {
                email:{
                    required: "{{trans('admin.required')}}",
                },
                password:{
                    required: "{{trans('admin.required')}}",
                }
            }
    });

</script>  --}}
  </body>
</html>
