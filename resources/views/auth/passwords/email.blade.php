@extends('layouts.auth')

@section('content')
<div class="page-header-image" style="background-image:url(../assets/images/login.jpg)"></div>
<div class="container">
    <div class="col-md-12 content-center">
        <div class="card-plain">

            <form action="{{ route('password.email') }}" method="POST" class="form" id="loginform" autocomplete="off">
                @csrf
                <div class="header">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="logo-container">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    </div>
                    <h5>Enter your e-mail address below to reset your password.</h5>
                </div>
                <div class="content">                                                
                    <div class="input-group input-lg">
                        <input type="text" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{trans('admin.placeholder_email')}}" value="{{ old('email') }}"  required autofocus>
                        <!-- <input type="text" class="form-control" placeholder="Enter User Name" value="{{ old('email') }}"  autofocus> -->
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-account-circle"></i>
                        </span>
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    
                </div>
                <div class="footer text-center">
                    <!-- <a href="index.html" class="btn btn-primary btn-round btn-lg btn-block ">SIGN IN</a> -->
                    <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                    {{--  <button type="submit" class="btn btn-primary  btn-round btn-lg btn-block">{{trans('admin.sign')}}</button>  --}}
                {{--  <h5><a href="{{Url('password/reset')}}" class="link">Forgot Password Or First Login ?</a></h5>  --}}
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
