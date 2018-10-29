<div class="sidebar-nav slimscrollsidebar">
    <div class="sidebar-head">
        <h3>
            <span class="fa-fw open-close">
                <i class="ti-menu hidden-xs"></i>
                <i class="ti-close visible-xs"></i>
            </span> 
            <span class="hide-menu">Navigation</span>
        s</h3>
    </div>
    <ul class="nav" id="side-menu">
        <li class="user-pro">
            <a href="#" class="waves-effect">
                <img src="/assets/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> 
                <span class="hide-menu"> 
                    {{ session('currentUser')->username }}
                    <span class="fa arrow"></span>
                </span>
            </a>
            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                <li>
                    <a href="javascript:void(0)">
                        <i class="ti-user"></i> 
                        <span class="hide-menu">My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="ti-settings"></i> 
                        <span class="hide-menu">Account Setting</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="fa fa-power-off"></i> 
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
            </ul>
        </li>
        <li> 
            <a href="{{ route('admin_dash') }}" class="waves-effect">
                <i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> 
                <span class="hide-menu"> 
                    Dashboard
                </span>
            </a>
        </li>
        <!-- <li class="devider"></li> -->
        <li> 
            <a href="javascript:void(0);" class="waves-effect">
                <i class="mdi mdi-cart-outline fa-fw" data-icon="v"></i> 
                <span class="hide-menu"> Packages <span class="fa arrow"></span> </span>
            </a>
            <ul class="nav nav-second-level collapse">
                <li> 
                    <a href="{{ route('package.index') }}">
                        <i class="fa-fw">P</i>
                        <span class="hide-menu">Packages</span>
                    </a> 
                </li>
                <li> 
                    <a href="{{ route('package.create') }}">
                        <i class="fa-fw">CP</i>
                        <span class="hide-menu">Create Package</span>
                    </a> 
                </li>
            </ul>
        </li>
        
        <li> 
            <a href="javascript:void(0);" class="waves-effect">
                <i class="mdi mdi-cart-outline fa-fw" data-icon="v"></i> 
                <span class="hide-menu"> Product &amp; Category <span class="fa arrow"></span> </span>
            </a>
            <ul class="nav nav-second-level collapse">
                <li> 
                    <a href="{{ route('product.category.index') }}">
                        <i class="fa-fw">C</i>
                        <span class="hide-menu">Categories</span>
                    </a> 
                </li>
                <li> 
                    <a href="{{ route('product.category.create') }}">
                        <i class="fa-fw">CC</i>
                        <span class="hide-menu">Create a Category</span>
                    </a> 
                </li>
                <li> 
                    <a href="{{ route('products.index') }}">
                        <i class="fa-fw">P</i>
                        <span class="hide-menu">Products</span>
                    </a> 
                </li>
                <li> 
                    <a href="{{ route('products.create') }}">
                        <i class="fa-fw">CP</i>
                        <span class="hide-menu">Create Product</span>
                    </a> 
                </li>
            </ul>
        </li>
    </ul>
</div>