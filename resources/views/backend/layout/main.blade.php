<!DOCTYPE html>
<html lang="en">
    <head>
        @include('backend.layout.head')
    </head>

    <body class="loading" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

        <div id="wrapper">

            @include('backend.layout.header')

            @include('backend.layout.menu')

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                @include('backend.layout.footer')

            </div>

        </div>

        <div class="rightbar-overlay"></div>

        <script src="{{url('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{url('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{url('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{url('assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{url('assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{url('assets/libs/feather-icons/feather.min.js')}}"></script>

        @stack('footer_content')
        <script src="{{url('assets/js/app.min.js')}}"></script>
        <script src="{{url('assets/js/custom.js')}}"></script>
    </body>
</html>
