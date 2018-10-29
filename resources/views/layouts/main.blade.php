<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/plugins/images/favicon.png">
    <title>TMH | @yield('title')</title>
    <link href="/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="/assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    
    <!-- <link href="/assets/plugins/bower_components/morrisjs/morris.css" rel="stylesheet"> -->
    <!-- <link href="/assets/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet"> -->
    <!-- <link href="/assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet"> -->
    <link href="/assets/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <link href="/assets/css/animate.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    @yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layouts.navbar')
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            @if(session('currentUserRole') == 'user')
                @include('userdash.sidebar')
            @elseif(session('currentUserRole') == 'admin')
                @include('layouts.sidebar')
            @endif            
        </div>
        <!-- End Left Sidebar -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
                <!-- /.row -->               
            </div>
            <!-- /.container-fluid -->
            @include('layouts.footer')
        </div>
        <!-- End Page Content  -->
    </div>
    <!-- End Wrapper -->
    <script src="/assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="/assets/js/jquery.slimscroll.js"></script>
    <script src="/assets/js/waves.js"></script>
    <script src="/assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="/assets/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- <script src="/assets/plugins/bower_components/raphael/raphael-min.js"></script> -->
    <!-- <script src="/assets/plugins/bower_components/morrisjs/morris.js"></script> -->
    <!-- <script src="/assets/plugins/bower_components/chartist-js/dist/chartist.min.js"></script> -->
    <!-- <script src="/assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script> -->
    <script src="/assets/plugins/bower_components/moment/moment.js"></script>
    <script src='/assets/plugins/bower_components/calendar/dist/fullcalendar.min.js'></script>
    <script src="/assets/plugins/bower_components/calendar/dist/cal-init.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/cbpFWTabs.js"></script>
    <script type="text/javascript">
        (function() {
            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });
        })();
    </script>
    <script src="/assets/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script src="/assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                break;
            }
        @endif
    </script>
    @yield('script')
</body>

</html>
