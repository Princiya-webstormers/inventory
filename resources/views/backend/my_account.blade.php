@extends('backend.layout.main')
@section('content')

@push('head_content')
    <link href="{{url('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endpush
<h4 class="header-title mb-3 mt-3">Change Password</h4>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('/admin/account')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row mb-3">
                                <label class="form-label">Old Password</label>
                                <div class="">
                                    <input type="password" class="form-control" name="oldpassword" value="" placeholder="Old Password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="form-label">Confirm Password</label>
                                <div class="">
                                    <input type="password" class="form-control" name="confirmpassword" value="" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mb-3">
                                <label class="form-label">New Password</label>
                                <div class="">
                                    <input type="password" class="form-control" name="newpassword" value="" placeholder="New Password">
                                </div>
                            </div>
                        </div>
                        <div class="submit_btn text-end">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('footer_content')

<script>
    $(function() {
        @if (Session::has('success'))
            Swal.fire({title:"Good job!",text:"{{ Session::get("success") }}",icon:"success"})
            sessionStorage.clear();
        @elseif(Session::has('error'))
            Swal.fire({title:"Sorry!",text:"{{ Session::get("error") }}",icon:"error"})
            sessionStorage.clear();
        @endif
    });
</script>
<script src="{{url('assets/libs/sweetalert2/sweetalert2.all.min.js')}}"></script>

<script src="{{url('assets/js/pages/sweet-alerts.init.js')}}"></script>
@endpush
@endsection
