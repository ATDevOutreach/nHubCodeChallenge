<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="javascript:void(0)">
                <!-- Logo icon image, you can use font-icon also -->
                <b>
                    <!--This is dark logo icon-->
                    <img src="/assets/plugins/images/admin-logo.png" alt="home" class="dark-logo" />
                    <!--This is light logo icon-->
                    <img src="/assets/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                </b>
                <!-- Logo text image you can use text also -->
                <span class="hidden-xs">
                    <!--This is dark logo text-->
                    <img src="/assets/plugins/images/admin-text.png" alt="home" class="dark-logo" />
                    <!--This is light logo text-->
                    <img src="/assets/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                </span>
            </a>
        </div>
        <!-- /Logo -->
        <!-- Search input and Toggle icon -->
        <ul class="nav navbar-top-links navbar-left">
            <li>
                <a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs">
                    <i class="ti-close ti-menu"></i>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                    <input type="text" placeholder="Search..." class="form-control"> 
                    <a href=""><i class="fa fa-search"></i></a> 
                </form>
            </li>
            @if(Sentinel::check())
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
                    @if(!Sentinel::getUser()->profile_pic)
                        <img src="/assets/plugins/images/users/default.png" alt="user-img" width="36" class="img-circle">
                    @else
                        <img src="{{ Sentinel::getUser()->profile_pic }}" alt="user pic">
                    @endif                    
                    <b class="hidden-xs">
                        @if(session('currentUser') == null)
                            <script>
                                window.location.href = '{{route("logout")}}'; //using a named route
                            </script>
                        @else
                            {{ session('currentUser')->first_name }} {{ session('currentUser')->last_name }}
                        @endif
                    </b>
                    <span class="caret"></span> 
                </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li>
                        <div class="dw-user-box">
                            <div class="u-img">
                                @if(!Sentinel::getUser()->profile_pic)
                                    <img src="/assets/plugins/images/users/default.png" alt="user" />
                                @else
                                    <img src="{{ Sentinel::getUser()->profile_pic }}" alt="user pic">
                                @endif 
                            </div>
                            <div class="u-text">
                                <h4>{{ session('currentUser')->first_name }}</h4>
                                <p class="text-muted">{{ session('currentUser')->email }}</p>
                                <a href="{{ route('user.profile', Sentinel::getUser()->id) }}" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                            </div>
                        </div>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            @endif
            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
</nav>

