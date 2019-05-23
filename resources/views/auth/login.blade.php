<!DOCTYPE html>


<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ trans('admin.nasebk')}}</title>
    <link rel="shortcut icon" href="{{ asset('images/nasebk.png') }}" >
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('rtl/bootstrap/css/bootstrap.min.css') }}">
    {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') }}">  --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonynasebks">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('rtl/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('rtl/plugins/iCheck/square/blue.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonynasebks"></script>
    <script src="{{ asset('rtl/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <style>
      html{
        background: #364150 !important;
        /* background-image: url('{{ asset('images/bghome.png') }}'); */
      }
      body{
        /* background-image: url('{{ asset('images/bghome.png') }}'); */
           background: #364150 !important;
           
      }
        .toast-top-full-width {
          top: 10%;
          right: 25%;
          width: 50%;
        }
        
        .btn-block:hover {

          color: #FFF !important;
          background-color: #1f858e !important;
          border-color: #18666d !important;
        }
        .login-box-body .form-control-feedback, .register-box-body .form-control-feedback {
            color: #cccccc;
            font-size: 13px !important;
        }
        .invalid-feedback{
          font-size: 13px !important;
        }
        .btn-block {

          color: #FFF;
          background-color: #269600;
          border-color: #32c5d2;
        }
        .login-box-body, .register-box-body {

            /* text-align: center; */
            font-family: 'DroidArabicKufiRegular'; 
            /* font-weight: normal; 
            font-style: normal; */
            font-size: 28px;
            font-weight: 400 !important;
            color: #32c5d2!important;
            background-color: #eceef1;
      }
      .ch_checkbox{
          font-size: 14px !important;
          font-weight: 200 !important;
        }
        .login-box, .register-box {
            width: 500px !important;
            margin: 7% auto;
        }
    </style>
    <script> 
        language = localStorage.getItem("lang"); 
      $("html").attr("lang", language);
    </script>

  </head>
  <body class="login-page"  >

    <div class="login-box">
        @if(Session::has('error'))

        <script>
            toastr.options = {
              "positionClass": "toast-top-full-width",
            }
           toastr.error('{{ Session::get('error') }}', 'Error', {timeOut: 5000});
       </script>
       @endif 
      
      <div class="login-box-body" >
      <div class="login-logo">
        {{--  <a href="#"><b>{{ trans('admin.nasebk')}}</b></a>  --}}
        <img src="{{ asset('images/nasebk.png') }}" width="50%" height="50%" alt="">
      </div><!-- /.login-logo -->

        <p class="login-box-msg">{{ trans('admin.Sign_session')}}</p>
        <form action="{{ route('login') }}" method="POST" id="loginform" autocomplete="off">
                @csrf
          <div class="form-group has-feedback">
            <input type="text" name="email" class="form-control" placeholder="{{trans('admin.placeholder_email')}}" value="{{ old('email') }}"  autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
     
          <!--/*<?php print_r(Hash::make('123456') ); ?>*/-->
          <div class="form-group has-feedback">
            <input type="password"  placeholder="{{trans('admin.placeholder_password')}}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="row">
            <div class="col-xs-6">
              <div >
                <label>
                  <!-- <input type="checkbox"  {{ old('remember') ? 'checked' : '' }} class=" ch_checkbox icheck"> {{trans('admin.remember')}} -->
                  
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-6">
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
