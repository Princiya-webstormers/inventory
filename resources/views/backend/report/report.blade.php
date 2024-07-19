@extends('backend.layout.main')
@section('content')
    @push('head_content')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" href="{{ url('assets/libs/chartist/chartist.min.css') }}">
        <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    @endpush
    <div class="row justify-content-between">
        <div class="col-md-4 mt-1">
            <div class="mt-md-0">
                <h4 class="page-title-main page login-label">Report</h4>
            </div>
        </div><!-- end col-->
    </div>
    {{-- {{dd(request()->all())}} --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card save-card form-card-color">
                <div class="card-body">
                    @if(auth()->user()->isSuperAdmin() )
                        <form class="form mx-auto" action="{{ url('/super-admin/report-filter') }}" method="get">
                    @elseif(auth()->user()->isAdmin())
                        <form class="form mx-auto" action="{{ url('/admin/report-filter') }}" method="get">
                    @endif
                        @csrf
                        <div class="row">
                            <div class="col-5 mb-3">
                                <label class="form-label text-dark">Product</label>
                                <div class="">
                                    <select class="form-control form-field-style mb-3 input-form type user @error('product_id') is-invalid @enderror"
                                            name="product_id" required style="height: 43px;">
                                            <option>Select Product</option>
                                            <option @if ( isset($product_id) && $product_id == 'all') {{ 'selected' }} @endif value="all">All Product</option>
                                            @foreach ( $product as $value)
                                                <option value="{{$value->id}}"
                                                    @if(isset($product_id)) @if ( $product_id == $value->id) {{ 'selected' }} @endif @else  @if ( old('product_id') == $value->id) {{ 'selected' }} @endif @endif> {{$value->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-5 mb-3">
                                <label class="form-label text-dark">Date</label>
                                <div class="">
                                    <div class="form-control form-field-style input-form" name="date" id="reportrange"
                                        style="cursor: pointer; padding: 10px 10px; border: 1px solid #ccc; width: 100%">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> <i class="fa fa-caret-down"></i>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="start-date" name="start_date">
                            <input type="hidden" class="end-date" name="end_date">
                            <div class="col-2 report-submit">
                                <button type="submit" style="margin-top: 32px !important;"
                                    class="btn waves-effect waves-light button-color save-width input-form text-white account-save mt-4">Get
                                    Report</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(isset($report))
    <div class="row justify-content-between">
        <div class="col-md-6 mt-1">
            <div class="mt-3 mt-md-0">
                <h4 class="page-title-main page login-label">Inventory Log</h4>
            </div>
        </div><!-- end col-->
        <div class="col-md-6 mt-3 flex-wrap align-items-center justify-content-sm-end text-end">
            @if(sizeOf($report) != 0)
            <a class="btn button-color text-light" id="button-excel"><i class='fas fa-file-excel excel-icon'></i>
                Export </a>
            @else
            <a class="btn button-color text-light"><i class='fas fa-file-excel excel-icon'></i>
                Export </a>
            @endif
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card card-shadow">
                <div class="card-body">
                    <div class="table-responsive table-border-radius">
                        <table id="export" class="table table-striped data-table">
                            <thead class="button-color">
                                <tr>
                                    <th class="text-white">Date</th>
                                    <th class="text-white">User</th>
                                    <th class="text-white">Name</th>
                                    <th class="text-white">Price</th>
                                    <th class="text-white">Action</th>
                                    <th class="text-white">Old Quantity</th>
                                    <th class="text-white">New Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (sizeOf($report) != 0)
                                    @foreach ($report as $data)
                                        <tr>
                                            <td>{{ $data->created_at->format('d-m-Y') ?? '-' }}</td>
                                            <td>{{ $data->user->first_name ?? '-' }}</td>
                                            <td>{{ $data->inventory->name ?? '-' }}</td>
                                            <td> {{ '₹'.number_format($data->inventory->price,2) }}</td>
                                            <td> {{ $data->action }}</td>
                                            <td> {{ $data->old_quantity ?? '-' }}</td>
                                            <td> {{ $data->new_quantity }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No data found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @push('footer_content')
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

        <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

        <script src="{{ url('assets/libs/chartist/chartist.min.js') }}"></script>
        <script src="{{ url('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

        <script type="text/javascript">
            $(function() {

                var start = moment().subtract(29, 'days');
                var end = moment();

                function cb(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }

                $('#reportrange').daterangepicker({
                    startDate: start,
                    endDate: end,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    }
                }, cb);

                cb(start, end);

            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var startDate = $('#reportrange').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate = $('#reportrange').data('daterangepicker').endDate.format('YYYY-MM-DD');
                $('.start-date').val(startDate);
                $('.end-date').val(endDate);
                $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                    var startDate = $('#reportrange').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    var endDate = $('#reportrange').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    $('.start-date').val(startDate);
                    $('.end-date').val(endDate);
                });
                $('#startDates').append(startDate);
                $('#endDates').append(endDate);
                $('#users').append($('.user').val());
                $('#types').append($('.type').val());
            });
        </script>
        <script>
            let button = document.querySelector("#button-excel");
            button.addEventListener("click", e => {
                let table = document.querySelector("#export");
                TableToExcel.convert(table);
            });
        </script>
    @endpush
@endsection
