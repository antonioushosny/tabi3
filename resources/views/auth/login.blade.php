@extends('layouts.auth')
@section('content')
<div class="page-header-image" style="background-image:url(assets/images/login.jpg)"></div>
<div class="container">
    <div class="col-md-12 content-center">
        <div class="card-plain">
                <form action="{{ route('login') }}" method="POST" class="form" id="loginform" autocomplete="off">
                    @csrf
                        <div class="header">
                            <div class="logo-container">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                            </div>
                        <h5>{{__(('admin.sign'))}}</h5>
                        </div>
                        @if(Session::has('error'))

                            <div class="alert alert-danger">
                                <strong>{{__('admin.error')}}!</strong> {{ Session::get('error') }}.
                            </div>
                            {{--  <span class="alert alert-warning">
                                <strong>{{ Session::get('error') }}</strong>
                            </span>  --}}
                        @endif
                        <div class="content">                                                
                            <div class="input-group input-lg">
                                <input type="text" name="email" class="form-control" placeholder="{{trans('admin.placeholder_email')}}" value="{{ old('email') }}"  autofocus>
                                <!-- <input type="text" class="form-control" placeholder="Enter User Name" value="{{ old('email') }}"  autofocus> -->
                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-account-circle"></i>
                                </span>
                                
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong >{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                            <div class="input-group input-lg">
                                <input type="password"  placeholder="{{trans('admin.placeholder_password')}}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                                <!-- <input type="password" placeholder="Password" class="form-control" /> -->
                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-lock"></i>
                                </span>
                                
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="footer text-center">
                            <!-- <a href="index.html" class="btn btn-primary btn-round btn-lg btn-block ">SIGN IN</a> -->
                            <button type="submit" class="btn btn-primary  btn-round btn-lg btn-block">{{trans('admin.sign')}}</button>
                        <h5><a href="{{Url('password/reset')}}" class="link">Forgot Password Or First Login ?</a></h5>
                        </div>
                </form>
        </div>
    </div>
</div>
@endsection 

