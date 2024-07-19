@extends('backend.layout.main')
@section('content')
    @if (isset($edit))
        @php $title = "Change User"; @endphp
    @else
        @php $title = "New User"; @endphp
    @endif
    @push('head_content')
        <link href="{{url('assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
            type="text/css" />
    @endpush
    <h4 class="page-title-main page">{{ $title }}</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (isset($edit))
                    <form class="form mx-auto" method="POST"
                        action="{{ url('/super-admin/user/' . \Crypt::encrypt($edit->id)) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-6 mb-3">
                                <label for="first_name" class="login-label form-label">{{ __('First Name') }}</label>

                                <div>
                                    <input id="first_name" type="text"
                                        class="form-control login-form @error('first_name') is-invalid @enderror"
                                        name="first_name" value="{{  $edit->first_name }}" required
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
                                        name="last_name" value="{{  $edit->last_name }}" required
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
                                        name="dob" value="{{  $edit->dob }}" required autocomplete="dob"
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
                                        name="email" value="{{  $edit->email }}" required autocomplete="email">

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
                                        value="{{  $edit->mobile }}" name="mobile" required autocomplete="mobile">

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
                                        autocomplete="address">{{  $edit->address }}</textarea>

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
                                        value="{{  $edit->state }}" name="state" required autocomplete="state">

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
                                        name="city" value="{{  $edit->city }}" required autocomplete="city">

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
                                        name="pincode" value="{{  $edit->pincode }}" required autocomplete="pincode">

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
                                        name="username" required autocomplete="username" value="{{ $edit->username }}">

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
                                        name="password" required autocomplete="password" value="{{ $edit->password }}">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-6">
                                <label class="form-label login-label">Role</label>
                                <select class="form-select login-form  @error('role') is-invalid @enderror" name="role">
                                    <option>Select Role</option>
                                    @foreach ($role as $roles)
                                        <option value="{{ $roles->name }}"
                                            @if ($edit['role'] == $roles->name) {{ 'selected' }} @endif>
                                            {{ $roles->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="submit_btn">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        </div>
                    </form>
                    @else
                    <form method="POST" action="{{ url('/super-admin/user') }}">
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
                            <div class="col-6">
                                <label class="form-label login-label">Role</label>
                                <select class="form-select login-form  @error('role') is-invalid @enderror" name="role">
                                    <option>Select Role</option>
                                    @foreach ($role as $roles)
                                        <option value="{{ $roles->name }}"
                                            @if ( old('role') == $roles->name) {{ 'selected' }} @endif>
                                            {{ $roles->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- @if($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif --}}
                        <div class="submit_btn">
                            <button type="submit" class="btn btn-primary waves-effect waves-light button-color">Save</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @push('footer_content')
        <script type="text/javascript">
            $(document).ready(function(){
                $(".load-datepicker").flatpickr({
                    dateFormat: "d-m-Y"
                })
            });
        </script>
        <script src="{{url('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{url('assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
        <script src="{{url('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
        <script src="{{ url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

        {{-- <script src="{{ url('assets/js/pages/form-pickers.init.js') }}"></script> --}}
    @endpush
@endsection
