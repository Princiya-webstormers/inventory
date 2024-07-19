<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inventory') }}</title>
    <link rel="shortcut icon" href="{{ url('img/Inventory-logo-mini.png') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/custom.css') }}" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="login-body">
    <div class="row loginbg">
        <div class="col-3 theme-menu-color sign-in-container overlay-panel overlay-right">
            <img src="{{ url('img/front.png') }}" class="login-img">
        </div>
        <div class="col-9 theme-menu-color">
            <div class="row justify-content-center">
                <div class="col-12">

                    <div class="text-center mb-4">
                        <h4 class="login-text">Register</h4>
                        {{-- <img src="{{url('img/login-logo.png')}}" class="login-img" width="200px" height="200px"> --}}
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="login-page">
                        @csrf
                        <div class="row">

                            <div class="col-6 mb-3">
                                <label for="first_name" class="login-label form-label">{{ __('First Name') }}</label>

                                <div>
                                    <input id="first_name" type="text"
                                        class="form-control login-form @error('first_name') is-invalid @enderror"
                                        name="first_name" value="{{ old('first_name') }}" required
                                        autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="last_name" class="login-label form-label">{{ __('Last Name') }}</label>

                                <div>
                                    <input id="last_name" type="text"
                                        class="form-control login-form @error('last_name') is-invalid @enderror"
                                        name="last_name" value="{{ old('last_name') }}" required
                                        autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="dob" class="login-label form-label">{{ __('Date of Birth') }}</label>

                                <div>
                                    <input id="dob" type="date"
                                        class="form-control login-form @error('dob') is-invalid @enderror"
                                        name="dob" value="{{ old('dob') }}" required autocomplete="dob"
                                        autofocus>

                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="email" class="login-label form-label">{{ __('Email Address') }}</label>

                                <div>
                                    <input id="email" type="email"
                                        class="form-control login-form @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="mobile" class="login-label form-label">{{ __('Mobile Number') }}</label>

                                <div>
                                    <input id="mobile" type="tel"
                                        class="form-control login-form @error('mobile') is-invalid @enderror"
                                        value="{{ old('mobile') }}" name="mobile" required autocomplete="mobile">

                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="address" class="login-label form-label">{{ __('Address') }}</label>

                                <div>
                                    <textarea id="address" class="form-control login-form @error('address') is-invalid @enderror" name="address" required
                                        autocomplete="address">{{ old('address') }}</textarea>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="state" class="login-label form-label">{{ __('State') }}</label>

                                <div>
                                    <input id="state" type="text"
                                        class="form-control login-form @error('state') is-invalid @enderror"
                                        value="{{ old('state') }}" name="state" required autocomplete="state">

                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-6 mb-3">
                                <label for="city" class="login-label form-label">{{ __('City') }}</label>

                                <div>
                                    <input id="city" type="text"
                                        class="form-control login-form @error('city') is-invalid @enderror"
                                        name="city" value="{{ old('city') }}" required autocomplete="city">

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="pincode" class="login-label form-label">{{ __('Pincode') }}</label>

                                <div>
                                    <input id="pincode" type="number"
                                        class="form-control login-form @error('pincode') is-invalid @enderror"
                                        name="pincode" value="{{ old('pincode') }}" required autocomplete="pincode">

                                    @error('pincode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="username" class="login-label form-label">{{ __('Username') }}</label>

                                <div>
                                    <input id="username" type="text"
                                        class="form-control login-form @error('username') is-invalid @enderror"
                                        name="username" required autocomplete="username" value="{{old('username')}}">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="password" class="login-label form-label">{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password"
                                        class="form-control login-form @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- @if($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif --}}
                        <div class="mb-3 d-grid text-center login-button login-form form-control">
                            <button class="btn save text-white fw-bold" type="submit"> Register </button>
                        </div>
                        <p class="text-end"> Already have an account ? <a href="{{ url('/frontend-login') }}" class="text-decoration-none ms-1">Log In</a></p>
                    </form>


                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    });
</script>
<script src="assets/js/app.min.js"></script>

</html>
