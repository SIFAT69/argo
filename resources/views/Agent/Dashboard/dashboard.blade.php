@extends('layouts.agent')
@section('page_title')
  Accounts
@endsection
@section('content')
  @php
  \Stripe\Stripe::setApiKey('sk_test_51Ic31vAvjSDpdiu41rDwfhxI6EGPESq6fageb4qYq180X7c8HqtjBp7L6s9WdI8igbxIPfY1ZeQCW60TGygSythc00GitPxO12');
  $balance = \Stripe\Balance::retrieve(
    ['stripe_account' => Auth::user()->account_id]
  );

  $balanceObject = $balance->pending;
  foreach ($balanceObject as $value) {
    $amount =  $value->amount;
    $amount = $amount/100;
  }
  @endphp
<section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
            <div class="col-lg-9 col-xl-10 maxw100flex-992">
                <div class="row">
                    @include('layouts.menu.agentmenu')
                    <div class="col-lg-12 mb10">
                      <div class="breadcrumb_content style2">
                        <h2 class="breadcrumb_title">Hello, {{ Auth::user()->name }}!</h2>
                        <p>We are glad to see you again!</p>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                        <div class="ff_one">
                            <div class="icon"><span class="flaticon-home"></span></div>
                            <div class="detais">
                                <div class="timer">{{ $count_of_properties }}</div>
                                <p>All Properties</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                        <div class="ff_one style3">
                            <div class="icon"><span class="flaticon-home"></span></div>
                            <div class="detais">
                                <div class="timer">{{ $count_of_project }}</div>
                                <p>Total Projects</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                        <div class="ff_one style2">
                            <div class="icon"><span class="flaticon-view"></span></div>
                            <div class="detais">
                                <div class="timer">{{ $totalView }}</div>
                                <p>Total Views</p>
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
