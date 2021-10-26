@extends('layouts.agent')
@section('page_title')
  Category Create
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
                                          <a class="btn btn-danger text-white" href="{!! route('Agentcatgories.index') !!}">Go Back</a>
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
                                    Create a category
                                  </div>
                                  <div class="card-body">
                                    <form class="" action="{!! route('Agentcatgories.store') !!}" method="post">
                                      @csrf
                                      <label for="">Enter your category name:</label>
                                      <input type="hidden" name="added_by" value="{{ Auth::id() }}">
                                      <input type="text" required class="form-control mb-3" name="name">
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

  <div id="createCategory" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Real-State Feature:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form class="" action="{!! route('realstateFeatureStore') !!}" method="post">
              @csrf
            <div class="modal-body">
              <label for="">Enter your Feature name:</label>
              <input type="text" class="form-control" name="feature">
            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
