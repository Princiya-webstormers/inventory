@extends('backend.layout.main')
@section('content')
    @if (isset($edit))
        @php $title = "Change Task"; @endphp
    @else
        @php $title = "New Task"; @endphp
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
                    {{-- {{dd($edit)}} --}}
                    @if (isset($edit))
                    @if(auth()->user()->isSuperAdmin() )
                    <form class="form mx-auto" method="POST"
                            action="{{ url('/super-admin/product/' . \Crypt::encrypt($edit->id)) }}">
                    @else
                    <form class="form mx-auto" method="POST"
                            action="{{ url('/admin/product/' . \Crypt::encrypt($edit->id)) }}">
                    @endif
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <div class="">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $edit['name'] }}" placeholder="Enter Name">
                                        @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Quantity</label>
                                    <div class="">
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                            name="quantity" value="{{ $edit['quantity'] }}" placeholder="Enter Quantity">
                                        @error('quantity')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Quantity lowest limit</label>
                                    <div class="">
                                        <input type="number" class="form-control @error('low_quantity') is-invalid @enderror"
                                            name="low_quantity" value="{{ $edit['low_quantity'] }}" placeholder="Enter low_Quantity">
                                        @error('low_quantity')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Price</label>
                                    <div class="">
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                            name="price" value="{{ $edit['price'] }}" placeholder="Enter Price">
                                        @error('price')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label text-dark">Description</label>
                                    <div class="">
                                        <textarea type="text" name="description"
                                            class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description">{{$edit->description}}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="old_quantity" value="{{ $edit['quantity'] }}">
                            <input type="hidden" name="action" value="Edit">
                            <div class="submit_btn">
                                <button type="submit" class="btn btn-primary waves-effect waves-light button-color">Save Changes</button>
                            </div>
                        </form>
                    @else
                    @if(auth()->user()->isSuperAdmin() )
                        <form action="{{ url('super-admin/product') }}" method="post" class="form-horizontal">
                    @else
                        <form action="{{ url('admin/product') }}" method="post" class="form-horizontal">
                    @endif
                            @csrf
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <div class="">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                        @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Quantity</label>
                                    <div class="">
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                            name="quantity" value="{{ old('quantity') }}" placeholder="Enter Quantity">
                                        @error('quantity')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Quantity lowest limit</label>
                                    <div class="">
                                        <input type="number" class="form-control @error('low_quantity') is-invalid @enderror"
                                            name="low_quantity" value="{{ old('low_quantity') }}" placeholder="Enter low_Quantity">
                                        @error('low_quantity')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Price</label>
                                    <div class="">
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                            name="price" value="{{ old('price') }}" placeholder="Enter Price">
                                        @error('price')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label text-dark">Description</label>
                                    <div class="">
                                        <textarea type="text" name="description"
                                            class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="action" value="Create">
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
