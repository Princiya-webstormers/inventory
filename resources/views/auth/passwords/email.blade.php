<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Webstormers') }}</title>
    <link rel="shortcut icon" href="{{url('img/Inventory-logo-mini.png')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{url('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
	<link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/custom.css')}}" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="row">
        <div class="col-3 theme-menu-color sign-in-container overlay-panel overlay-right">
            {{-- <div class="text-center mb-4">
                <h4 class="text-white mt-0">WELCOME</h4>
            </div> --}}
            <img src="{{url('img/front.png')}}" class="login-img" height="711px" width="400px">

        </div>
        <div class="col-9 theme-menu-color">
            <div class="row justify-content-center">
                <div class="col-8">

                    <div class="text-center mb-4">
                    <h4 style="margin-top:75px !important" class="mt-0 login-text">Forgot Password</h4>
                    <img style="margin-top:15px !important" src="{{url('img/forgot.png')}}" class="login-img">

                        {{-- <h4 class="theme-text-color mb-5"><img src="{{url('img/LOGIN.png')}}" width="200px"></h4> --}}
                    </div>

                    <form method="POST" action="{{ route('password.email') }}" class="login-page">
                        @csrf
                        <div class="mb-4">
                            <h6 class="forgot-text">Enter Email Address below<br>
                                We will send you a password rest link</h6>
                            <label for="emailaddress" class="form-label">Email address</label>
                            {{-- <input name="email" class="form-control login-form @error('email') is-invalid @enderror" type="email" id="emailaddress" value="{{ old('email') }}" required="" placeholder="Enter your email" autocomplete="email" autofocus> --}}
                            <div class="input-group input-group-merge">
                                <input name="email" class="form-control login-form @error('email') is-invalid @enderror" type="email" id="emailaddress" value="{{ old('email') }}" required="" placeholder="Enter your email" autocomplete="email" autofocus>
                                <div class="input-group-text" data-password="false">
                                    <i class='fa fa-user'></i>
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 d-grid text-center login-button login-form form-control">
                            <button class="btn save text-white fw-bold" type="submit"> Send Password Reset Link </button>
                        </div>
                        @if(session('error'))
                            <div class="alert alert-danger bg-danger text-light p-2" style="text-align: center;">
                                {{ session('error') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
            $('.alert').fadeOut('slow');
        }, 5000);
    });
</script>
<script src="assets/js/app.min.js"></script>
</html>
