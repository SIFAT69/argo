@extends('layouts.service')
@section('page_title')
  - Service Dashbord
@endsection
@section('content')

  <section class="our-dashbord dashbord bgc-f7 pb50">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
              <div class="col-lg-9 col-xl-10 maxw100flex-992">
                  <div class="row">
                      @include('layouts.menu.servicemenu')
                      {{-- {{ $user }} --}}
                      <div class="col-lg-12">
                          @include('Alerts.success')
                          @include('Alerts.danger')
                          <div class="card">
                            <div class="card-body text-center">
                              <h2>Wellcome to Service Dashbord</h2>
                            </div>
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
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 m-auto">

      </div>
    </div>
  </div>

@endsection
