<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('auth.create_new_account', ['app_name' => config('app.name')]) }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ url('/') }}" class="h1"><b>{{ config('app.name') }}</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">{{ trans('auth.register_a_new_membership') }}</p>

            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror " placeholder="{{ trans('auth.full_name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('name')
                <div class="alert alert-danger text-sm">{{ $message }}</div>
                @enderror
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
                <div class="input-group mb-3">
                    <input name="password_confirmation" type="password" class="form-control" placeholder="{{ trans('auth.retype_password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                {!! trans('auth.i_agree_to_the_terms') !!}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ trans('auth.register') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
{{--                <a href="#" class="btn btn-block btn-primary">--}}
{{--                    {!! trans('auth.sign_up_using_facebook') !!}--}}
{{--                </a>--}}
                <a href="{{ route('auth.google.redirect') }}" class="btn btn-block btn-danger">
                    {!! trans('auth.sign_up_using_google') !!}
                </a>
            </div>

            <a href="{{ route('login') }}" class="text-center">{{ trans('auth.i_already_have_a_membership') }}</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<script src="{{ mix('js/app.js') }}"></script>
@include('layouts.partials.session_messages')
</body>
</html>
