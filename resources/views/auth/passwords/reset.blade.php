@extends('layouts.auth')

@section('content')
<div class="page-header-image" style="background-image:url(../../assets/images/login.jpg)"></div>
<div class="container">
    <div class="col-md-12 content-center">
        <div class="card-plain">

            <form action="{{ route('password.request') }}" method="POST" class="form" id="loginform" autocomplete="off">
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
                    {{--  <h5>Enter Email Address</h5>  --}}
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
                    
                    <div class="input-group input-lg">
                    <input type="password" id="password-confirm" placeholder="{{trans('admin.placeholder_password_confirmation')}}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" >
                    <span class="input-group-addon">
                        <i class="zmdi zmdi-lock"></i>
                    </span>
                    
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif

                </div>
                <div class="footer text-center">
                        <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

{{--  @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}
