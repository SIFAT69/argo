@extends('layouts.agent')
@section('page_title')
  Rent Payment Histoy
@endsection
@section('content')
  <section class="our-dashbord dashbord bgc-f7 pb50">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
      <div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
        <div class="row">
          <div class="col-lg-12">
            @include('layouts.menu.agentmenu')
          </div>
          <div class="col-lg-12 col-xl-12 mb10">
            <div class="breadcrumb_content style2 mb30-991">
              <button type="button" class="btn btn-block btn-dark"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Stripe_Logo%2C_revised_2016.svg/2560px-Stripe_Logo%2C_revised_2016.svg.png" alt="" width="50px"> <b> Connect to stripe</b> </button>
            </div>
          </div>
          <div class="col-lg-12">
            @include('Alerts.success')
            @include('Alerts.danger')
            <div class="my_dashboard_review mb40">
              <div class="col-lg-12">
                <div class="card">
                  <h5 class="card-header">Enter your email</h5>
                  <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt10">
          <div class="col-lg-12">
            <div class="copyright-widget text-center">
              <p>© 2021 Argo. Made By SifzTech.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
