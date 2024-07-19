<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inventory') }}</title>
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

<body class="login-body">
    <div class="row loginbg">
        <div class="col-3 theme-menu-color sign-in-container overlay-panel overlay-right">
            <img src="{{url('img/front.png')}}" class="login-img" >
        </div>
        <div class="col-9 theme-menu-color">
            <div class="row justify-content-center">
                <div class="col-8">

                    <div class="text-center mb-4">
                    <h4 class="login-text">SUPER ADMIN LOGIN</h4>
                    {{-- <img src="{{url('img/login-logo.png')}}" class="login-img" width="200px" height="200px"> --}}
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="login-page">
                        @csrf
                        <div class="mb-4">
                            <label for="emailaddress" class="form-label login-label">Username</label>
                            {{-- <input name="email" class="form-control login-form @error('email') is-invalid @enderror" type="email" id="emailaddress" value="{{ old('email') }}" required="" placeholder="Enter your email" autocomplete="email" autofocus> --}}
                            <div class="input-group input-group-merge">
                                <input name="username" class="form-control login-form @error('username') is-invalid @enderror" type="text" id="emailaddress" value="{{ old('username') }}" required="" placeholder="Enter your username" autocomplete="username" autofocus>
                                <div class="input-group-text" data-password="false">
                                    <i class='fa fa-user'></i>
                                </div>
                            </div>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label login-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input name="password" type="password" id="password" class="form-control login-form @error('password') is-invalid @enderror" placeholder="Enter your password" required="" autocomplete="current-password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 d-grid text-center login-button login-form form-control">
                            <button class="btn save text-white fw-bold" type="submit"> LOGIN </button>
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
