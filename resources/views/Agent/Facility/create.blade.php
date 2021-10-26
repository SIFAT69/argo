@extends('layouts.agent')
@section('page_title')
  Feature
@endsection
@section('content')
  <section class="our-dashbord dashbord bgc-f7 pb50">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
              <div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
                  <div class="row">
                      @include('layouts.menu.agentmenu')
                      <div class="col-lg-8 col-xl-8">
                          <div class="candidate_revew_select style2 text-right mb30-991">
                              <ul class="mb0">
                                  <li class="list-inline-item">
                                      <div class="candidate_revew_search_box course fn-520">
                                          <a class="btn btn-danger text-white" href="{!! route('agentsFeaturesList') !!}">Go Back</a>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-lg-12">
                          @include('Alerts.success')
                          @include('Alerts.danger')
                          <div class="my_dashboard_review mb40">
                              <div class="col-lg-12">
                                <div class="card">
                                  <div class="card-header">
                                    Create a Facilities
                                  </div>
                                  <div class="card-body">
                                    <form class="" action="{!! route('Agentfacility.store') !!}" method="post">
                                      @csrf
                                      <label for="">Enter your facilities name:</label>
                                      <input type="hidden" name="added_by" value="{{ Auth::id() }}">
                                      <input type="text" required class="form-control mb-3" name="facilities">
                                      <button type="submit" class="btn btn-primary mb-3" name="button">Save</button>
                                    </form>
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
