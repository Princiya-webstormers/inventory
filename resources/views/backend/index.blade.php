@extends('backend.layout.main')
@section('content')
    @push('head_content')
        <link rel="stylesheet" href="{{ url('assets/libs/chartist/chartist.min.css') }}">
    @endpush

    <div class="row justify-content-between">
        <div class="col-md-4 mt-1">
            <div class="mt-md-0">
                <h4 class="page-title-main page">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card" style="border-top: 3px solid #71b6f9;">
                {{-- <a href="{{ url('admin\support') }}"> --}}
                    <div class="card-body text-center">
                        <div class="widget-box-2">
                            <div class="widget-detail-2">
                                <h2 class="fw-normal mb-1"> {{$ready_for_sale}} </h2>
                                <b class="text-muted mb-3 text-primary">Ready For Sale</b>
                            </div>
                            <div class="progress progress-bar-alt-primary progress-sm">
                                <div class="progress-bar bg-primary" role="progressbar"
                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                        style="width: {{$ready_for_sale}}%;">
                                    <span class="visually-hidden">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </a> --}}
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card" style="border-top: 3px solid #10c469;">
                {{-- <a href="{{ url('admin\support') }}"> --}}
                    <div class="card-body text-center">
                        <div class="widget-box-2">
                            <div class="widget-detail-2">
                                <h2 class="fw-normal mb-1"> {{$sold}} </h2>
                                <b class="text-muted mb-3 text-success">Sold</b>
                            </div>
                            <div class="progress progress-bar-alt-success progress-sm">
                                <div class="progress-bar bg-success" role="progressbar"
                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                        style="width: {{$sold}}%;">
                                    <span class="visually-hidden">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </a> --}}
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card" style="border-top: 3px solid #ff5b5b;">
                {{-- <a href="{{ url('admin\support') }}"> --}}
                    <div class="card-body text-center">
                        <div class="widget-box-2">
                            <div class="widget-detail-2">
                                <h2 class="fw-normal mb-1"> {{$rental}} </h2>
                                <b class="text-muted mb-3 text-danger">Rental</b>
                            </div>
                            <div class="progress progress-bar-alt-danger progress-sm">
                                <div class="progress-bar bg-danger" role="progressbar"
                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                        style="width: {{$rental}}%;">
                                    <span class="visually-hidden">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </a> --}}
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card" style="border-top: 3px solid #f9c851;">
                {{-- <a href="{{ url('admin\support') }}"> --}}
                    <div class="card-body text-center">
                        <div class="widget-box-2">
                            <div class="widget-detail-2">
                                <h2 class="fw-normal mb-1"> {{$newly_added}} </h2>
                                <b class="text-muted mb-3 text-warning">Newly Added</b>
                            </div>
                            <div class="progress progress-bar-alt-warning progress-sm">
                                <div class="progress-bar bg-warning" role="progressbar"
                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                        style="width: {{$newly_added}}%;">
                                    <span class="visually-hidden">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </a> --}}
            </div>
        </div>
    </div>
    <div class="row">
        {{-- <div class="col s12">
            <div class="col-lg-9"> --}}
            <div class="col-xl-9 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">New Compressor Details</h4>
                        <div id="simple-line-chart" class="ct-chart ct-golden-section"></div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
        <div class="col-xl-3 col-md-6">
            <div class="card" style="border-top: 3px solid #ff8acc;">
                <div class="card-body text-center">
                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="fw-normal mb-1"> {{$total}} </h2>
                            <b class="text-muted mb-3 text-pink">Total Compressor</b>
                        </div>
                        <div class="progress progress-bar-alt-pink progress-sm">
                            <div class="progress-bar bg-pink" role="progressbar"
                                    aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{$total}}%;">
                                <span class="visually-hidden">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="border-top: 3px solid #ff8acc;">
                <a href="{{ url('admin/compressor?filter=rental') }}">
                <div class="card-body text-center">
                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="fw-normal mb-1"> {{$rental_date}} </h2>
                            <b class="text-muted mb-3 text-pink">Rental Last 7 Days</b>
                        </div>
                        <div class="progress progress-bar-alt-pink progress-sm">
                            <div class="progress-bar bg-pink" role="progressbar"
                                    aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{$rental_date}}%;">
                                <span class="visually-hidden">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Recent Users<a href="{{ url('/admin/user') }}"
                                class="
                                    float-end"><i class="fas fa-angle-right"></i>
                                View All
                                Users</a></h4>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $users)
                                        <tr>
                                            <td>
                                                {{ $users->name }}
                                            </td>
                                            <td><a href="mailto:{{ $users->email }}">{{ $users->email }}</a></td>
                                            <td><a href="tel:{{ $users->phone }}">{{ $users->phone }}</a></td>
                                            @if($users->active == 'Active')
                                                <td><span class="badge bg-success">{{ $users->active }}</span></td>
                                            @else
                                                <td><span class="badge bg-danger">{{ $users->active }}</span></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('footer_content')
        <script src="{{ url('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
        <script src="{{ url('assets/libs/chartist/chartist.min.js') }}"></script>
        <script src="{{ url('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}"></script>
        {{-- <script src="{{ url('assets/js/pages/chartist.init.js') }}"></script> --}}
        <script src="{{ url('assets/js/pages/dashboard.init.js') }}"></script>
        <script>
            var count = {!! json_encode($data['composser_chart']) !!};
        new Chartist.Line("#simple-line-chart", {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            series: [
                [count[1]['count'], count[2]['count'], count[3]['count'], count[4]['count'], count[5]['count'],
                    count[6]['count'], count[7]['count'], count[8]['count'], count[9]['count'], count[10][
                        'count'
                    ], count[11]['count'], count[12]['count']
                ],
            ]
        }, {
            fullWidth: !0,
            chartPadding: {
                right: 40
            },
            plugins: [Chartist.plugins.tooltip()]
        });
        var times = function(e) {
                return Array.apply(null, new Array(e))
            },
            data = times(52).map(Math.random).reduce(function(e, t, i) {
                return e.labels.push(i + 1), e.series.forEach(function(e) {
                    e.push(100 * Math.random())
                }), e
            }, {
                labels: [],
                series: times(4).map(function() {
                    return new Array
                })
            }),
            options = {
                showLine: !1,
                axisX: {
                    labelInterpolationFnc: function(e, t) {
                        return t % 13 == 0 ? "W" + e : null
                    }
                }
            },
            responsiveOptions = [
                ["screen and (min-width: 640px)", {
                    axisX: {
                        labelInterpolationFnc: function(e, t) {
                            return t % 4 == 0 ? "W" + e : null
                        }
                    }
                }]
            ];
        </script>
    @endpush
@endsection
