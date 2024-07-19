@extends('backend.layout.main')
@section('content')
    @push('head_content')
        <link href="{{ url('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
        <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    @endpush
    <div class="row justify-content-between">
        <div class="col-md-4 mt-1">
            <div class="mt-3 mt-md-0">
                <h4 class="page-title-main page">Inventory</h4>
            </div>
        </div><!-- end col-->
        <div class="col-md-8 mt-3 d-flex flex-wrap align-items-center justify-content-sm-end">
            @if(auth()->user()->isSuperAdmin() )
            <a href="{{ url('/super-admin/product/create') }}" type="button" class="btn btn-primary waves-effect waves-light button-color"><i
                        class="mdi mdi-plus-circle me-1"></i> Add</a>
            @elseif(auth()->user()->isAdmin() && auth()->user()->can('Inventory Create'))
            <a href="{{ url('/admin/product/create') }}" type="button" class="btn btn-primary waves-effect waves-light button-color"><i
                class="mdi mdi-plus-circle me-1"></i> Add</a>
            @endif
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered data-table">
                            <thead class="theme-menu-color">
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('footer_content')
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

        <script type="text/javascript">
            $(function() {
                if (window.location.pathname == "/admin/product") {
                    url = "{{ url('admin/product') }}"
                } else if (window.location.pathname == "/super-admin/product") {
                    url = "{{ url('super-admin/product') }}"
                }
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: url,
                    order: [
                        [0, 'desc']
                    ],
                    columnDefs: [{
                        'visible': false,
                        'targets': [0]
                    }],
                    createdRow: function( row, data, dataIndex){
                            if( data['low_quantity'] >=  data['quantity']){
                                $(row).addClass('low-quantity');
                            }
                        },
                    columns: [{
                            data: 'date',
                            name: 'date',
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'quantity',
                            name: 'quantity'
                        },
                        {
                            data: 'price',
                            name: 'price'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ],
                    dom: 'Bfrtip',
                    buttons: [
                        { extend: 'excel', text: 'Export' }
                    ]
                });

            });
        </script>
        <script>
            $(function() {
                @if (Session::has('success'))
                    Swal.fire({
                        title: "Good job!",
                        text: "{{ Session::get('success') }}",
                        icon: "success"
                    })
                    sessionStorage.clear();
                @elseif (Session::has('error'))
                    Swal.fire({
                        title: "Sorry!",
                        text: "{{ Session::get('error') }}",
                        icon: "error"
                    })
                    sessionStorage.clear();
                @endif
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '.delete', function(event) {
                    event.preventDefault();
                    var id = $(this).data('id');
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: !0,
                        confirmButtonColor: "#28bb4b",
                        cancelButtonColor: "#f34e4e",
                        confirmButtonText: "Yes, delete it!"
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                type: "DELETE",
                                url: "{{ url('/admin/product/') }}/" + id,
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": id
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(data) {
                                    console.log(data);
                                    if (data.status == 1) {
                                        location.reload(true);
                                        Swal.fire({
                                            title: "Deleted!",
                                            text: "Your file has been deleted.",
                                            icon: "success"
                                        })
                                    } else {
                                        location.reload(true);
                                        Swal.fire({
                                            title: "Cancelled",
                                            text: "Delete operation cancelled!",
                                            type: "error"
                                        })
                                    }
                                },
                            });
                        }
                    })

                });
            });
        </script>
        <script src="{{ url('assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

        <script src="{{ url('assets/js/pages/sweet-alerts.init.js') }}"></script>
    @endpush
@endsection
