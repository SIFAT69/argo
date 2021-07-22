<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> Argo Admin - @yield('page_title') </title>
    <link href="{!! asset('FontAsset') !!}/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{!! asset('FontAsset') !!}/images/favicon.ico" sizes="128x128" rel="shortcut icon" />

    <link href="{!! asset('BackAsset') !!}/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="{!! asset('BackAsset') !!}/assets/js/loader.js"></script>
    <link href="{!! asset('BackAsset') !!}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{!! asset('BackAsset') !!}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{!! asset('BackAsset') !!}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{!! asset('BackAsset') !!}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{!! asset('BackAsset') !!}/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" href="{!! asset('BackAsset') !!}/plugins/editors/markdown/simplemde.min.css">
    <link href="{!! asset('BackAsset') !!}/assets/css/elements/tooltip.css" rel="stylesheet" type="text/css" />
    <link href="{!! asset('BackAsset') !!}/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link href="{!! asset('BackAsset') !!}/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="{!! asset('BackAsset') !!}/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <link href="{!! asset('BackAsset') !!}/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/efa364fdee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{!! asset('BackAsset') !!}/assets/css/forms/theme-checkbox-radio.css">
    <link href="{!! asset('BackAsset') !!}/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="{!! asset('BackAsset') !!}/assets/css/apps/contacts.css" rel="stylesheet" type="text/css" />

    <link href="{!! asset('BackAsset') !!}/assets/css/elements/tooltip.css" rel="stylesheet" type="text/css" />

    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        .layout-px-spacing {
            min-height: calc(100vh - 166px)!important;
        }

        .navbar .theme-brand li.theme-logo img {
            width: 183px;
            height: 36px;
            border-radius: 5px;
        }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="{!! route('dashboard') !!}">
                        <img src="{!! asset('FontAsset') !!}/images/header-logo.png" class="navbar-logo" width="50px" alt="logo">
                    </a>
                </li>

            </ul>

            <ul class="navbar-item flex-row ml-md-auto">

                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="{!! asset('BackAsset') !!}/assets/img/90x90.jpg" alt="avatar">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="user_profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="apps_mailbox.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> Inbox</a>
                            </div>

                            <div class="dropdown-item">
                                <a class="" href="{!! route('logout') !!}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <div class="page-title">
                            <h3>@yield('page_title')</h3>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav flex-row ml-5">
                <li>
                    <div class="page-header">
                        <div class="page-title">
                            <a href="{!! route('welcome') !!}" class="btn btn-primary" target="_blank">View Website</a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">
                <div class="shadow-bottom"></div>

                <ul class="list-unstyled menu-categories" id="accordionExample">


                    <li class="menu">
                        <a href="{!! route('dashboard') !!}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#blogs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span> Blog</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="blogs" data-parent="#accordionExample">
                            <li>
                                <a href="{!! route('blogList') !!}"> Posts </a>
                            </li>
                            <li>
                                <a href="{!! route('categoriesList') !!}"> Categories </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span> Real Estate</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="submenu" data-parent="#accordionExample">
                            <li>
                                <a href="javascript:void(0);"> Properties </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Projects </a>
                            </li>
                            <li>
                                <a href="{!! route('realstateFeature') !!}"> Features </a>
                            </li>
                            <li>
                                <a href="{!! route('realstateFacilities') !!}"> Facilities </a>
                            </li>
                            <li>
                                <a href="{!! route('realstateIndex') !!}"> Categories </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                      <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                          <span>Consults</span>
                        </div>
                      </a>
                    </li>
                    <li class="menu">
                      <a href="{!! route('AccountList') !!}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                          <span>Accounts</span>
                        </div>
                      </a>
                    </li>
                    <li class="menu">
                      <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                          <span>Packages</span>
                        </div>
                      </a>
                    </li>
                    <li class="menu">
                      <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                          <span>Contact</span>
                        </div>
                      </a>
                    </li>
                    <li class="menu">
                        <a href="#payments" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span> Payments</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="payments" data-parent="#accordionExample">
                            <li>
                                <a href="javascript:void(0);"> Transactions </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Payment Method </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#location" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Location</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="location" data-parent="#accordionExample">
                            <li>
                                <a href="{!! route('indexCountries') !!}">Countries</a>
                            </li>
                            <li>
                                <a href="{!! route('indexStates') !!}">States</a>
                            </li>
                            <li>
                                <a href="{!! route('indexCities') !!}">Cities</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#media" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Media</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="media" data-parent="#accordionExample">
                            <li>
                                <a href="{!! route('LibraryIndex') !!}">Add Media</a>
                            </li>
                            <li>
                                <a href="{!! route('LibraryFiles') !!}">View Media</a>
                            </li>
                            <li>
                                <a href="{!! route('LibraryFilesTrash') !!}">View Trash</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#settings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span> Settings</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="settings" data-parent="#accordionExample">
                            <li>
                                <a href="javascript:void(0);"> General </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Email </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#plat" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Administration</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="plat" data-parent="#accordionExample">
                            <li>
                                <a href="javascript:void(0);"> Roles & Permission </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Users </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Cache Management </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Activies Log </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);"> Backup </a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT PART  -->
        @yield('content')
        <!--  END CONTENT PART  -->


    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{!! asset('BackAsset') !!}/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="{!! asset('BackAsset') !!}/bootstrap/js/popper.min.js"></script>
    <script src="{!! asset('BackAsset') !!}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{!! asset('BackAsset') !!}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{!! asset('BackAsset') !!}/assets/js/app.js"></script>
    <script src="{!! asset('BackAsset') !!}/assets/js/scrollspyNav.js"></script>
    <script src="{!! asset('BackAsset') !!}/plugins/editors/markdown/simplemde.min.js"></script>
    <script src="{!! asset('BackAsset') !!}/plugins/editors/markdown/custom-markdown.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{!! asset('BackAsset') !!}/assets/js/custom.js"></script>
    <script src="{!! asset('BackAsset') !!}/plugins/table/datatable/datatables.js"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
    <script src="{!! asset('BackAsset') !!}/plugins/apex/apexcharts.min.js"></script>
    <script src="{!! asset('BackAsset') !!}/assets/js/dashboard/dash_2.js"></script>
    <script src="{!! asset('BackAsset') !!}/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="{!! asset('BackAsset') !!}/assets/js/elements/tooltip.js"></script>
    <script src="{!! asset('BackAsset') !!}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="{!! asset('BackAsset') !!}/assets/js/apps/contact.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>
