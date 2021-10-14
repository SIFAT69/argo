@extends('layouts.agent')
@section('page_title')
  Accounts
@endsection
@section('content')
<section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
            <div class="col-lg-9 col-xl-10 maxw100flex-992">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dashboard_navigationbar dn db-992">
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
                                <ul id="myDropdown" class="dropdown-content">
                                    <li class="active"><a href="page-dashboard.html"><span class="flaticon-layers"></span> Dashboard</a></li>
                                    <li><a href="page-message.html"><span class="flaticon-envelope"></span> Message</a></li>
                                    <li><a href="page-my-properties.html"><span class="flaticon-home"></span> My Properties</a></li>
                                    <li><a href="page-my-favorites.html"><span class="flaticon-heart"></span> My Favorites</a></li>
                                    <li><a href="page-my-savesearch.html"><span class="flaticon-magnifying-glass"></span> Saved Search</a></li>
                                    <li><a href="page-my-review.html"><span class="flaticon-chat"></span> My Reviews</a></li>
                                    <li><a href="page-my-packages.html"><span class="flaticon-box"></span> My Package</a></li>
                                    <li><a href="page-my-profile.html"><span class="flaticon-user"></span> My Profile</a></li>
                                    <li><a href="page-add-new-property.html"><span class="flaticon-filter-results-button"></span> Add New Listing</a></li>
                                    <li><a href="page-login.html"><span class="flaticon-logout"></span> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb10">
                        <div class="breadcrumb_content style2">
                            <h2 class="breadcrumb_title">Hello, {{ Auth::user()->name }}!</h2>
                            <p>We are glad to see you again!</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="ff_one">
                            <div class="icon"><span class="flaticon-home"></span></div>
                            <div class="detais">
                                <div class="timer">{{ $count_of_properties }}</div>
                                <p>All Properties</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="ff_one style3">
                            <div class="icon"><span class="flaticon-home"></span></div>
                            <div class="detais">
                                <div class="timer">{{ DB::table('projects')->where('user_id', Auth::id())->count() }}</div>
                                <p>Total Projects</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="ff_one style2">
                            <div class="icon"><span class="flaticon-view"></span></div>
                            <div class="detais">
                                <div class="timer">{{ $totalView }}</div>
                                <p>Total Views</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="ff_one style2">
                            <div class="icon"> <img src="https://img.icons8.com/external-those-icons-lineal-color-those-icons/48/000000/external-dollar-money-currency-those-icons-lineal-color-those-icons-1.png" alt=""> </div>
                            <div class="detais">
                                <div class="timer">${{ Auth::user()->balance }}</div>
                                <p>Total Balance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="recent_job_activity">
                            <h4 class="title">Recent Activities</h4>
                            @foreach($logs as $log)
                                <div class="grid">
                                    <ul>
                                        <li class="list-inline-item">
                                            <div class="icon"><span class="flaticon-chat" st></span></div>
                                        </li>
                                        <li class="list-inline-item">
                                            <p>{{ $log->activity }} </p>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row mt50">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="copyright-widget text-center">
                            <p>© 2021 Argo. Made with SifzTech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
