@extends('backend.layout.main')
@section('content')
    @push('head_content')
        <link href="{{ url('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
        <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <link href="{{url('assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
            type="text/css" />
    @endpush
    <div class="row justify-content-between">
        <div class="col-md-4 mt-1">
            <div class="mt-3 mt-md-0">
                <h4 class="page-title-main page">Report</h4>
            </div>
        </div><!-- end col-->
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(auth()->user()->isSuperAdmin() )
                        <form action="{{ url('super-admin/report') }}" method="post" class="form-horizontal">
                    @elseif(auth()->user()->isAdmin())
                        <form action="{{ url('admin/report') }}" method="post" class="form-horizontal">
                    @endif
                        @csrf
                        <div class="row">
                            <div class="col-3 mb-3">
                                <div class="input-group">
                                    <span class="input-group-text theme-menu-color" id="basic-addon1">From</span>
                                    <input type="text" value="{{old('from')}}" name="from" id="basic-datepicker" class="form-control from" placeholder="From" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <div class="input-group">
                                    <span class="input-group-text theme-menu-color" id="basic-addon2">To</span>
                                    <input type="text" value="{{old('to')}}" name="to" id="basic-datepicker1" class="form-control to" placeholder="To" aria-label="Username" aria-describedby="basic-addon2">
                                </div>
                            </div>
                            <div class="col-2 mb-3">
                                @if (request()->status)
                                <select class="form-select" name="status">
                                    <option >Select Status</option>
                                    <option {{$status == "Newly Added" ? "selected" : ''}} value="Newly Added" >Newly Added</option>
                                    <option {{$status == "Sold" ? "selected" : ''}} value="Sold" >Sold</option>
                                    <option {{$status == "Rental" ? "selected" : ''}} value="Rental" >Rental</option>
                                    <option {{$status == "Service" ? "selected" : ''}} value="Service" >Service</option>
                                    <option {{$status == "Inspection" ? "selected" : ''}} value="Inspection" >Inspection</option>
                                    <option {{$status == "Purchase Order" ? "selected" : ''}} value="Purchase Order" >Purchase Order</option>
                                    <option {{$status == "Ready For Sale" ? "selected" : ''}} value="Ready For Sale" >Ready For Sale</option>
                                    <option {{$status == "Scrap Condition" ? "selected" : ''}} value="Scrap Condition" >Scrap Condition</option>
                                </select>
                                <input type="hidden" class="from-date" value="{{request()->from}}">
                                <input type="hidden" class="to-date" value="{{request()->to}}">
                                @else
                                <select class="form-select" name="status">
                                    <option value="Newly Added">Newly Added</option>
                                    <option value="Sold">Sold</option>
                                    <option value="Rental">Rental</option>
                                    <option value="Service">Service</option>
                                    <option value="Inspection">Inspection</option>
                                    <option value="Purchase Order">Purchase Order</option>
                                    <option value="Ready For Sale">Ready For Sale</option>
                                    <option value="Scrap Condition">Scrap Condition</option>
                                </select>
                                @endif
                            </div>
                            <div class="col-2 mb-3">
                                <button type="submit" class="form-control report-button text-white">
                                    Get Report
                                </button>

                            </div>
                            <div class="col-2 mb-3">
                                <button class="btn btn-primary waves-effect waves-light report-button" id="button-excel"> Export </button>
                            </div>
                        </div>
                    </form>
                    @if(request()->status == "Service")
                    <div class="table-responsive">
                        <table class="table table-bordered data-table">
                            <thead class="theme-menu-color">
                                <tr>
                                    <th>Ref no</th>
                                    <th>Service Date</th>
                                    <th>Service Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(sizeOf($report) != 0)
                                @foreach($report as $reports)
                                    <tr>
                                        <td><a href="{{url('admin/compressor/'.Crypt::encrypt($reports->compressor->id))}}">{{$reports->compressor->ref_no}}</a></td>
                                        <td>{{$reports->created_at->format('d-m-Y')}}</td>
                                        <td>{{$reports->content}}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" style="text-align: center">No data found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @push('footer_content')
      {{-- <script src="{{ url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script> --}}
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> --}}
        <script type="text/javascript">
            $(document).ready(function(){
                var from = $('.from-date').val();
                var to = $('.to-date').val();
                $('.from').val(from);
                $('.to').val(to);
                $("#basic-datepicker").flatpickr({
                    dateFormat: "d-m-Y"
                })
                $("#basic-datepicker1").flatpickr({
                    dateFormat: "d-m-Y"
                })
            });
            </script>
            <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
            <script>
                $(document).ready(function(){
                    $("#button-excel").click(function() {
                        let table = document.getElementsByTagName("table");
                        TableToExcel.convert(table[0], {
                        name: `report-export.xlsx`,
                        sheet: {
                            name: 'Sheet 1'
                        }
                        });
                    });
                });
            </script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="{{url('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{url('assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
        <script src="{{url('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
        <script src="{{ url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    @endpush
@endsection
