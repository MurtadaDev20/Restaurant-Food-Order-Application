<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" data-key="t-menu">Menu</li>

        <li>
            <a href="index.html">
                <i data-feather="home"></i>
                <span data-key="t-dashboard">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="grid"></i>
                <span data-key="t-apps">Apps</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
                    <a href="apps-calendar.html">
                        <span data-key="t-calendar">Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="apps-chat.html">
                        <span data-key="t-chat">Chat</span>
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="users"></i>
                <span data-key="t-authentication">Authentication</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="auth-login.html" data-key="t-login">Login</a></li>
                <li><a href="auth-register.html" data-key="t-register">Register</a></li>

            </ul>
        </li>


        <li class="menu-title mt-2" data-key="t-components">Elements</li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="briefcase"></i>
                <span data-key="t-components">Components</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="ui-alerts.html" data-key="t-alerts">Alerts</a></li>
                <li><a href="ui-buttons.html" data-key="t-buttons">Buttons</a></li>

            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="gift"></i>
                <span data-key="t-ui-elements">Extended</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="extended-lightbox.html" data-key="t-lightbox">Lightbox</a></li>
                <li><a href="extended-rangeslider.html" data-key="t-range-slider">Range Slider</a></li>

            </ul>
        </li>


    </ul>

    <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
        <div class="card-body">
            <img src="assets/images/giftbox.png" alt="">
            <div class="mt-4">
                <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>

            </div>
        </div>
    </div>
</div>
        <!-- Sidebar -->
    </div>
</div>
 120 changes: 115 additions & 5 deletions120
resources/views/client/client_dashboard.blade.php
Original file line number	Diff line number	Diff line change
@@ -1,6 +1,116 @@
<html>
    <title>
        cleint dahs
    </title>
    <h1>client </h1>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Client Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- plugin css -->
        <link href="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- preloader css -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/preloader.min.css') }}" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            @include('client.body.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('client.body.sidebar')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
<div class="main-content">

     @yield('client')
<!-- End Page-content -->

@include('client.body.footer')

</div>
<!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right Sidebar -->
        @include('client.body.rightside')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>
        <!-- pace js -->
        <script src="{{ asset('backend/assets/libs/pace-js/pace.min.js') }}"></script>

        <!-- apexcharts -->
        <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- dashboard init -->
        <script src="{{ asset('backend/assets/js/pages/dashboard.init.js') }}"></script>

        <script src="{{ asset('backend/assets/js/app.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
         @if(Session::has('message'))
         var type = "{{ Session::get('alert-type','info') }}"
         switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
         }
         @endif
        </script>

    </body>

</html>
