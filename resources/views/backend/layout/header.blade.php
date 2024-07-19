<div class="navbar-custom nav-bar-color">
                    <ul class="list-unstyled topnav-menu float-end mb-0">


                        <li class="dropdown d-inline-block d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>



                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light theme-menu-color user-name" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                {{-- <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle"> --}}
                                <span class="pro-user-name ms-1 text-dark">
                                    {{auth()->user()->first_name}} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ url('/admin/account') }}" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a class="dropdown-item notify-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                    <i class="fe-log-out"></i> <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>

                        {{-- <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li> --}}

                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box nav-bar-color">
                        <a href="#" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <div class="text-white">INVENTORY</div>
                            </span>
                            <span class="logo-lg">
                                <div class="text-white">INVENTORY</div>
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                        <li>
                            <button class="button-menu-mobile disable-btn waves-effect">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <!-- <li>
                            <h4 class="page-title-main">Starter</h4>
                        </li> -->

                    </ul>

                    <div class="clearfix"></div>

            </div>
