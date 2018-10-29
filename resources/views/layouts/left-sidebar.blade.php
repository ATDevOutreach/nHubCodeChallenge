<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
        <ul class="nav" id="side-menu">
            <li class="user-pro">
                <a href="#" class="waves-effect">
                    <!-- <img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle">  -->
                    <span class="hide-menu"> 
                        {{ $user->first_name }} {{ $user->last_name }}
                        <span class="fa arrow"></span>
                    </span>
                </a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="javascript:void(0)"><i class="ti-user"></i> <span class="hide-menu">My Profile</span></a></li>
                    <!-- <li><a href="javascript:void(0)"><i class="ti-wallet"></i> <span class="hide-menu">My Balance</span></a></li> -->
                    <!-- <li><a href="javascript:void(0)"><i class="ti-email"></i> <span class="hide-menu">Inbox</span></a></li> -->
                    <li><a href="javascript:void(0)"><i class="ti-settings"></i> <span class="hide-menu">Account Setting</span></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
                </ul>
            </li>
            <li> <a href="{{ route('user_dash') }}" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a>
                <!-- <ul class="nav nav-second-level">
                    <li> <a href="index.html"><i class=" fa-fw">1</i><span class="hide-menu">Dashboard 1</span></a> </li>
                    <li> <a href="index2.html"><i class=" fa-fw">2</i><span class="hide-menu">Dashboard 2</span></a> </li>
                    <li> <a href="index3.html"><i class=" fa-fw">3</i><span class="hide-menu">Dashboard 3</span></a> </li>
                </ul> -->
            </li>
            <li> 
                <a href="#" class="waves-effect">
                    <i class="mdi mdi-av-apps fa-university" data-icon="v"></i> 
                    <span class="hide-menu"> Companies </span>
                </a>
            </li>

            <li> 
                <a href="{{ route('blog.create') }}" class="waves-effect">
                    <i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> 
                    <span class="hide-menu"> Blog/News </span>
                </a>
            </li>
            
           
            <!-- <li><a href="inbox.html" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">Apps<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="chat.html"><i class="ti-comments-smiley fa-fw"></i><span class="hide-menu">Chat-message</span></a></li>
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-desktop fa-fw"></i><span class="hide-menu">Inbox</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li> <a href="inbox.html"><i class="ti-email fa-fw"></i><span class="hide-menu">Mail box</span></a></li>
                            <li> <a href="inbox-detail.html"><i class="ti-layout-media-left-alt fa-fw"></i><span class="hide-menu">Inbox detail</span></a></li>
                            <li> <a href="compose.html"><i class="ti-layout-media-center-alt fa-fw"></i><span class="hide-menu">Compose mail</span></a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-user fa-fw"></i><span class="hide-menu">Contacts</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li> <a href="contact.html"><i class="icon-people fa-fw"></i><span class="hide-menu">Contact1</span></a></li>
                            <li> <a href="contact2.html"><i class="icon-user-follow fa-fw"></i><span class="hide-menu">Contact2</span></a></li>
                            <li> <a href="contact-detail.html"><i class="icon-user-following fa-fw"></i><span class="hide-menu">Contact Detail</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li> -->
            <form action="{{ route('logout') }}" method="post" id="logout-form">
                <li>
                    <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()" class="waves-effect">
                        <i class="mdi mdi-logout fa-fw"></i> 
                        <span class="hide-menu">                                    
                            {{ csrf_field() }}
                            Logout
                        </span>
                    </a>
                </li>
            </form>
            <li class="devider"></li>
            
        </ul>
    </div>
</div>