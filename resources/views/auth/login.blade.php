<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('auth.login', ['app_name' => config('app.name')]) }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{url('/')}}" class="h1"><b>{{ config('app.name') }}</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">{{ trans('auth.sign_in_to_start_your_session') }}</p>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input value="{{ old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror " placeholder="{{ trans('auth.email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                <div class="alert alert-danger text-sm">{{ $message }}</div>
                @enderror
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror " placeholder="{{ trans('auth.password_field') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <div class="alert alert-danger text-sm">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                {{ trans('auth.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ trans('auth.sign_in') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mt-2 mb-3">
{{--                <a href="#" class="btn btn-block btn-primary">--}}
{{--                    {!! trans('auth.sign_in_using_facebook') !!}--}}
{{--                </a>--}}
                <a href="{{ route('auth.google.redirect') }}" class="btn btn-block btn-danger">
                    {!! trans('auth.sign_in_using_google') !!}
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ trans('auth.i_forgot_my_password') }}</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">{{ trans('auth.register_a_new_membership') }}</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<script src="{{ mix('js/app.js') }}"></script>
@include('layouts.partials.session_messages')
</body>
</html>
