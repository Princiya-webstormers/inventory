<div class="left-side-menu theme-menu-color">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
                @if(auth()->user()->isSuperAdmin() )
                <li>
                    <a href="{{ url('/super-admin/dashboard') }}">
                        {{-- <i class="mdi mdi-view-dashboard"></i> --}}
                        <img class="menu-img" src="{{url('img/users.png')}}">
                        <span class="badge bg-success rounded-pill float-end"></span>
                        <span class="menu-text"> User </span>
                    </a>
                </li>
                @endif
                <li>
                    @if(auth()->user()->isSuperAdmin() )
                        <a href="{{ url('/super-admin/product') }}">
                    @elseif(auth()->user()->isAdmin() )
                        <a href="{{ url('/admin/product') }}">
                    @endif
                        {{-- <i class="mdi mdi-clipboard-list"></i> --}}
                        <img class="menu-img" src="{{url('img/task.png')}}">
                        <span class="badge bg-success rounded-pill float-end"></span>
                        <span class="menu-text"> Product </span>
                    </a>
                </li>

                <li>
                    @if(auth()->user()->isSuperAdmin() )
                        <a href="{{ url('/super-admin/report') }}">
                    @elseif(auth()->user()->isAdmin() )
                        <a href="{{ url('/admin/report') }}">
                    @endif
                        {{-- <i class="mdi mdi-view-dashboard"></i> --}}
                        <img class="menu-img" src="{{url('img/report.png')}}">
                        <span class="badge bg-success rounded-pill float-end"></span>
                        <span class="menu-text"> Report </span>
                    </a>
                </li>
                @if(auth()->user()->isSuperAdmin() )
                <li>
                    <a href="#access" data-bs-toggle="collapse">
                        {{-- <i class="mdi mdi-account-arrow-right"></i> --}}
                        <img class="menu-img" src="{{url('img/user_accesss.png')}}">
                        <span class="menu-text"> User Access </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="access">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{url('super-admin/role')}}">Role</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
