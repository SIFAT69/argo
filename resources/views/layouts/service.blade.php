<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from creativelayers.net/themes/findhouse-html/page-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 15:32:57 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="advanced search custom, agency, agent, business, clean, corporate, directory, google maps, homes, listing, membership packages, property, real estate, real estate agent, realestate agency, realtor">
    <meta name="description" content="FindHouse - Real Estate HTML Template">
    <meta name="CreativeLayers" content="ATFN">
    <!-- css file -->
    <link rel="stylesheet" href="{!! asset('FontAsset') !!}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('FontAsset') !!}/css/style.css">
    <link rel="stylesheet" href="{!! asset('FontAsset') !!}/css/dashbord_navitaion.css">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{!! asset('FontAsset') !!}/css/responsive.css">
    <!-- sweetalert2 -->
    <link href="{{ asset('/BackAsset/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Title -->
    <title>Argo @yield('page_title')</title>
    <!-- Favicon -->
    <link href="{!! asset('FontAsset') !!}/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{!! asset('FontAsset') !!}/images/favicon.ico" sizes="128x128" rel="shortcut icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="wrapper">
        {{-- <div class="preloader"></div> --}}

        <!-- Main Header Nav -->
        <header class="header-nav menu_style_home_one style2 menu-fixed main-menu">
            <div class="container-fluid p0">
                <!-- Ace Responsive Menu -->

            </div>
        </header>

        {{-- Side bar --}}
        <div class="dashboard_sidebar_menu dn-992">
            <ul class="sidebar-menu">
                <li class="header"><img src="{{ asset('/uploads/header-logo.png') }}" alt="header logo"></li>
                <li class="title"><span>Main</span></li>
                <li class="treeview"><a href="{!! route('dashboard') !!}"><i class="flaticon-layers"></i><span> Dashboard</span></a></li>
                <li class="title"><span>Manage Listings</span></li>
                <li><a href="{!! route('servicesForServiceProviders') !!}"><i class="fas fa-cogs"></i> <span> Service Requests</span></a></li>
                <li class="title"><span>Manage Account</span></li>
                <li><a href="{!! route('agent.profile') !!}"><i class="flaticon-user"></i> <span>My Profile</span></a></li>
                <li class="title"><span>Session</span></li>
                <li><a href="{!! route('welcome') !!}"><i class="flaticon-back"></i> <span>Back To Website</span></a></li>
                <li><a href="{!! route('logout') !!}"><i class="flaticon-logout"></i> <span>Logout</span></a></li>
            </ul>
        </div>
        {{-- Side bar --}}
        @yield('content')

        <!-- Our Dashbord -->
        {{-- <a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a> --}}
    </div>
    <!-- Wrapper End -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/jquery-migrate-3.0.0.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/popper.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/jquery.mmenu.all.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/ace-responsive-menu.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/chart.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/chart-custome.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/snackbar.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/simplebar.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/parallax.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/scrollto.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/jquery-scrolltofixed-min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/jquery.counterup.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/wow.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/progressbar.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/slider.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/timepicker.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/wow.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/dashboard-script.js"></script>
    <script src="{{ asset('/BackAsset/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <!-- Custom script for all pages -->
    <script type="text/javascript" src="js/script.js"></script>
    @yield('script_in_body')
</body>

<!-- Mirrored from creativelayers.net/themes/findhouse-html/page-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 15:32:57 GMT -->

</html>
