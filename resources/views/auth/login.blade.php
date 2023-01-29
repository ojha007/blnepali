@extends('auth.layouts.master')

@section('content')
    <div class="login-box">
        @if ($errors->has('user_name') || $errors->has('password'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                @if ($errors->has('user_name'))
                    <span class="invalid-feedback" role="alert">
                    {{ $errors->first('user_name') }}
                </span><br>
                @endif
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                    {{ $errors->first('password') }}
                </span>

                @endif
            </div>
        @endif
        <!-- /.login-logo -->
        <div class="login-box-body">
            <div class="login-logo">
                <a href="/">
                    <img loading='lazy' src="{{asset('images/logo.png')}}"
                         alt="BL"
                         style="max-height: 100px">

                </a>
            </div>
            <p class="login-box-msg">{{ __('Login') }}</p>
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
                <div class="form-group has-feedback {{ $errors->has('user_name') ? ' has-error' : '' }}">
                    <input id="user_name" type="text"
                           class="form-control {{ $errors->has('user_name') ? ' is-invalid' : '' }}"
                           placeholder="User Name" name="user_name" value="{{ old('user_name') }}"
                           required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password"
                           class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="Password" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password_confirmation " type="password"
                           class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="Confirm Password" name="password_confirmation" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-block btn-primary btn-block btn-flat">{{ __('Login') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
    </div>

@endsection
