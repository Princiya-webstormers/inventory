@extends('backend.layout.main')
@section('content')
    @push('head_content')
        <link href="{{ url('assets/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush
    @if (isset($edit))
        @php $title = "Edit Role"; @endphp
    @else
        @php $title = "Add Role"; @endphp
    @endif
    {{-- {{dd($data)}} --}}
    <div class="row justify-content-between">
        <div class="col-md-4 mt-1">
            <div class="mt-md-0">
                <h4 class="page-title-main page">{{$title}}</h4>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            @if (isset($edit))
                            <form method="post" action="{{ url('/super-admin/role/'.Crypt::encrypt($edit->id)) }}">
                                @csrf
                                @method('PUT')
                                <h4>Role</h4>
                                <input type="text" class="form-control" name="role_name" placeholder="Role" value="{{$edit->name}}">
                                <h4 class="mt-4">Permission</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Permission</th>
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    @foreach ($data as $key => $value)
                                    {{-- {{dd($value1)}} --}}
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>
                                                <input type="checkbox" name="permission_id[]"
                                                value="{{ $value[0]['permission_name'] }}" data-plugin="switchery"
                                                data-color="#084076" data-size="small" @if( $value[0]['status'] ) checked="checked" @endif />
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permission_id[]"
                                                value="{{ $value[1]['permission_name'] }}" data-plugin="switchery"
                                                data-color="#084076" data-size="small" @if( $value[1]['status'] ) checked="checked" @endif />
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permission_id[]"
                                                value="{{ $value[2]['permission_name'] }}" data-plugin="switchery"
                                                data-color="#084076" data-size="small" @if( $value[2]['status'] ) checked="checked" @endif />
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <button type="submit" class="btn save text-white float-end button-color">Save</button>
                            </form>
                            @else
                            <form method="post" action="{{ url('/super-admin/role') }}">
                                @csrf
                                <h4>Role</h4>
                                <input type="text" class="form-control" required name="role_name" placeholder="Role">
                                <h4 class="mt-4">Permission</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Permission</th>
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            @foreach ($value as $key1 => $value1)
                                                <td><input type="checkbox" checked name="permission_id[]"
                                                        value="{{ $value1->name }}" data-plugin="switchery"
                                                        data-color="#084076" data-size="small" /></td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </table>
                                <button type="submit" class="btn save text-white float-end button-color">Save</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('footer_content')
        <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
        <script>
            $(function() {
                @if (Session::has('success'))
                    Swal.fire({
                        title: "Good job!",
                        text: "{{ Session::get('success') }}",
                        icon: "success"
                    })
                    sessionStorage.clear();
                @endif
            });
        </script>
        <script>
            $(document).ready(function(){
                $('[data-plugin="switchery"]').each(function(e,a){
                    new Switchery(a, $(a).data())
                })
                // var init = new Switchery();
                // e.prototype.initSwitchery=function(){$('[data-plugin="switchery"]').each(function(e,a){new Switchery(a,t(a).data())})}
            });

        </script>
        <script src="{{ url('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
        <script src="{{ url('assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
        <script src="{{ url('assets/libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ url('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ url('assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
        <script src="{{ url('assets/js/pages/sweet-alerts.init.js') }}"></script>
        {{-- // <script src="{{ url('assets/js/pages/form-advanced.init.js') }}"></script> --}}
    @endpush
@endsection
