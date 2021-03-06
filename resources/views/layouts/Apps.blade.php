<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from creativelayers.net/themes/findhouse-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 15:31:27 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ DB::table('meta_keywords')->where('id', 1)->value('data') }}">
    <meta name="description" content="FindHouse - Real Estate HTML Template">
    <meta name="CreativeLayers" content="ATFN">
    <!-- css file -->
    <link rel="stylesheet" href="{!! asset('FontAsset') !!}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('FontAsset') !!}/css/style.css">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{!! asset('FontAsset') !!}/css/responsive.css">
    <!-- Title -->
    <title>@yield('Site_name') - @yield('page_name')</title>
    <!-- Favicon -->
    <link href="{!! asset('FontAsset') !!}/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{!! asset('FontAsset') !!}/images/favicon.ico" sizes="128x128" rel="shortcut icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>

<body>
    <div class="wrapper">
        {{-- <div class="preloader"></div> --}}
        <!-- Main Header Nav -->
        <header class="header-nav menu_style_home_one navbar-scrolltofixed stricky main-menu">
            <div class="container-fluid p0">
                <!-- Ace Responsive Menu -->
                <nav>

                    <!-- Menu Toggle btn-->
                    <div class="menu-toggle">
                        <img class="nav_logo_img img-fluid" src="{{ asset('/uploads/header-logo.png') }}" alt="header-logo.png" width="250px">
                        <button type="button" id="menu-btn">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <a href="{!! route('welcome') !!}" class="navbar_brand float-left dn-smd">
                        <img class="logo1 img-fluid" src="{{ asset('/uploads/header-logo.png') }}" alt="header-logo.png" width="250px">
                        <img class="logo2 img-fluid" src="{{ asset('/uploads/header-logo.png') }}" alt="header-logo.png" width="250px">
                    </a>
                    <!-- Responsive Menu Structure-->
                    <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
                    <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                        <li>
                            <a href="{!! route('welcome') !!}"><span class="title">Home</span></a>
                        </li>
                        <li>
                            <a href="{!! route('properties_lists') !!}"><span class="title">Properties</span></a>
                        </li>
                        <li>
                            <a href="{!! route('projects_lists') !!}"><span class="title">Projects</span></a>
                        </li>
                        <li>
                            <a href="{!! route('agencies_lists') !!}"><span class="title">Agencies</span></a>
                        </li>
                        <li>
                            <a href="{!! route('blogs_lists') !!}"><span class="title">Blogs</span></a>

                        </li>
                        <li>
                            <a href="{!! route('contact') !!}"><span class="title">Contact</span></a>
                        </li>
                        @php
                        $subCheck = DB::table('subscriptions')->where('user_id', Auth::id())->value('stripe_status');
                        @endphp
                        @if ($subCheck != "active" && !empty(Auth::user()))
                          <li class="last">
                            <a href="{!! route('package_index') !!}"><span class="title">Be An Agent</span></a>
                          </li>
                        @endif
                        @if (Auth::check())
                          <li class="list-inline-item list_s"><a href="{!! route('dashboard') !!}" class="btn flaticon-user"> <span class="dn-lg">Dashboard</span></a></li>
                        @else

                          <li class="list-inline-item list_s"><a href="#" class="btn flaticon-user" data-toggle="modal" data-target=".bd-example-modal-lg"> <span class="dn-lg">Login/Register</span></a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </header>
        <!-- Modal -->

        <div class="sign_up_modal modal fade bd-example-modal-lg active show" tabindex="-1" role="dialog" aria-hidden="true" @if ($errors->any()) style="display: block; padding-right: 17px;" @endif>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                       @if ($errors->any())
                         <a href="{!! route('welcome') !!}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </a>
                       @else
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       @endif
                    </div>
                    <div class="modal-body container pb20">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                                  @if (Auth::check())
                                    <li class="nav-item">
                                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dashboard</a>
                                    </li>
                                  @else
                                    <li class="nav-item">
                                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                                    </li>
                                  @endif
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content container" id="myTabContent">
                            <div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="col-lg-6 col-xl-6">
                                    <div class="login_thumb">
                                        <img class="img-fluid w100" src="{!! asset('FontAsset') !!}/images/resource/login.jpg" alt="login.jpg">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                  @if ($errors->any())
                                    <div class="alert alert-danger">
                                      <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                        @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                      </ul>
                                    </div>
                                  @endif
                                    <div class="login_form">
                                        <form action="{!! route('login') !!}" method="post">
                                          @csrf
                                            <div class="heading">
                                                <h4>Login</h4>
                                            </div>
                                            {{-- <div class="row mt25">
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-fb btn-block"><i class="fa fa-facebook float-left mt5"></i> Login with Facebook</button>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-googl btn-block"><i class="fa fa-google float-left mt5"></i> Login with Google</button>
                                                </div>
                                            </div> --}}
                                            {{-- <hr> --}}
                                            <div class="input-group mb-2 mr-sm-2">
                                                <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="email" :value="old('email')" required autofocus >
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="flaticon-user"></i></div>
                                                </div>
                                            </div>
                                            <div class="input-group form-group">
                                                <input type="password" class="form-control" id="exampleInputPassword1" type="password" name="password" required autocomplete="current-password">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="flaticon-password"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                                <label class="custom-control-label" for="exampleCheck1">Remember me</label>
                                                <a class="btn-fpswd float-right" href="{{ route('password.request') }}">Lost your password?</a>
                                            </div>
                                            <button type="submit" class="btn btn-log btn-block btn-thm">Log In</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt25 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="col-lg-6 col-xl-6">
                                    <div class="regstr_thumb">
                                        <img class="img-fluid w100" src="{!! asset('FontAsset') !!}/images/resource/regstr.jpg" alt="regstr.jpg">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                  @if ($errors->any())
                                    <div class="alert alert-danger">
                                      <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                        @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                      </ul>
                                    </div>
                                  @endif
                                    <div class="sign_up_form">
                                        <div class="heading">
                                            <h4>Register</h4>
                                        </div>
                                        <form action="{!! route('register') !!}" method="post">
                                          @csrf
                                            <div class="form-group input-group">
                                                <input type="text" class="form-control" id="exampleInputName" name="name" :value="old('name')" required autofocus placeholder="User Name">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="flaticon-user"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group input-group">
                                                <input type="email" class="form-control" id="exampleInputEmail2" name="email" :value="old('email')" required placeholder="Email">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group input-group">
                                                <input type="password" class="form-control" id="exampleInputPassword2" name="password" required autocomplete="new-password" placeholder="Password">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="flaticon-password"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group input-group">
                                                <input type="password" class="form-control" id="exampleInputPassword3" name="password_confirmation" required placeholder="Re-enter password">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="flaticon-password"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="exampleCheck2">
                                                <label class="custom-control-label" for="exampleCheck2">I have read and accept the <a href="{!! route('pages.t&c') !!}">Terms & Conditions</a> and <a href="{!! route('pages.privacyPolicy') !!}">Privacy Policy</a>?</label>
                                            </div>
                                            <button type="submit" class="btn btn-log btn-block btn-thm">Sign Up</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header Nav For Mobile -->
        <div id="page" class="stylehome1 h0">
            <div class="mobile-menu">
                <div class="header stylehome1">
                    <div class="main_logo_home2 text-center">
                        <img class="nav_logo_img img-fluid mt20" width="200rem" src="{!! asset('FontAsset') !!}/images/header-logo2.png" alt="header-logo2.png">
                    </div>
                    <ul class="menu_bar_home2">
                      @if (Auth::check())
                        <li class="list-inline-item list_s"><a href="{!! route('dashboard') !!}"><span class="flaticon-user"></span></a></li>
                      @endif
                        <li class="list-inline-item"><a href="#menu"><span></span></a></li>
                    </ul>
                </div>
            </div>
            <!-- /.mobile-menu -->
            @include('layouts.menu.main')
        </div>

        @yield('content')


        <!-- Our Footer Bottom Area -->
        <section class="footer_middle_area pt40 pb40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="footer_menu_widget">
                            <ul>
                                <li class="list-inline-item"><a href="{{ route('welcome') }}">Home</a></li>
                                <li class="list-inline-item"><a href="{{ route('properties_lists') }}">Properties</a></li>
                                <li class="list-inline-item"><a href="{{ route('projects_lists') }}">Projects</a></li>
                                <li class="list-inline-item"><a href="{{ route('blogs_lists') }}">Blogs</a></li>
                                <li class="list-inline-item"><a href="{{ route('contact') }}">Contact</a></li>
                                <li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="copyright-widget text-right">
                            <p>??2021 Argo. Made by Sifztech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>

    </div>
    <!-- Wrapper End -->
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/jquery-migrate-3.0.0.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/popper.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/jquery.mmenu.all.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/ace-responsive-menu.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/isotop.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/snackbar.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/simplebar.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/parallax.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/scrollto.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/jquery-scrolltofixed-min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/jquery.counterup.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/wow.min.js"></script>
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/slider.js"></script>
    <!-- <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/pricing-slider.js"></script> -->
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/timepicker.js"></script>
    <!-- Custom script for all pages -->
    <script type="text/javascript" src="{!! asset('FontAsset') !!}/js/script.js"></script>
    @yield('script_in_body')
</body>


</html>
