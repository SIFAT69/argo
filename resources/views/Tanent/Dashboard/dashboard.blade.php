@extends('layouts.tanent')
@section('page_title')
  Dashboard
@endsection
@section('content')
<section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
            <div class="col-lg-9 col-xl-10 maxw100flex-992">
                <div class="row">
                  @include('layouts.menu.tenantmenu')
                    <div class="col-lg-12 mb10">
                      @include('Alerts.success')
                      @include('Alerts.danger')
                        <div class="breadcrumb_content style2">
                            <h2 class="breadcrumb_title">Dashboard</h2>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                        <div class="ff_one">
                            <div class="icon"><span class="flaticon-home"></span></div>
                            <div class="detais">
                                <div class="timer">{{ $count_of_properties }}</div>
                                <p>Properties</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                        <div class="ff_one style3">
                            <div class="icon"><span class="flaticon-home"></span></div>
                            <div class="detais">
                                <div class="timer">{{ $count_of_projects }}</div>
                                <p>Projects</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                        <div class="ff_one style3">
                            <div class="icon"><span class="flaticon-home"></span></div>
                            <div class="detais">
                                <div class="timer">{{ DB::table('servicerequests')->where('user_id', Auth::id())->count(); }}</div>
                                <p>Service Request</p>
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
