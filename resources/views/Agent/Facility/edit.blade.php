@extends('layouts.agent')
@section('page_title')
  - Categories | {{ $facility->facilities }}
@endsection
@section('content')
  <section class="our-dashbord dashbord bgc-f7 pb50">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
              <div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="dashboard_navigationbar dn db-992">
                              <div class="dropdown">
                                  <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
                                  <ul id="myDropdown" class="dropdown-content">
                                      <li><a href="page-dashboard.html"><span class="flaticon-layers"></span> Dashboard</a></li>
                                      <li><a href="page-message.html"><span class="flaticon-envelope"></span> Message</a></li>
                                      <li><a href="page-my-properties.html"><span class="flaticon-home"></span> My Properties</a></li>
                                      <li><a href="page-my-favorites.html"><span class="flaticon-heart"></span> My Favorites</a></li>
                                      <li><a href="page-my-savesearch.html"><span class="flaticon-magnifying-glass"></span> Saved Search</a></li>
                                      <li><a href="page-my-review.html"><span class="flaticon-chat"></span> My Reviews</a></li>
                                      <li class="active"><a href="page-my-packages.html"><span class="flaticon-box"></span> My Package</a></li>
                                      <li><a href="page-my-profile.html"><span class="flaticon-user"></span> My Profile</a></li>
                                      <li><a href="page-add-new-property.html"><span class="flaticon-filter-results-button"></span> Add New Listing</a></li>
                                      <li><a href="page-login.html"><span class="flaticon-logout"></span> Logout</a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-xl-4 mb10">
                          <div class="breadcrumb_content style2 mb30-991">
                              <h2 class="breadcrumb_title">My Categories</h2>
                              <p>We are glad to see you again!</p>
                          </div>
                      </div>
                      <div class="col-lg-8 col-xl-8">
                          <div class="candidate_revew_select style2 text-right mb30-991">
                              <ul class="mb0">
                                  <li class="list-inline-item">
                                      <div class="candidate_revew_search_box course fn-520">
                                          <a class="btn btn-danger text-white" href="{!! route('Agentfacility.index') !!}">Go Back</a>
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
                                    Create a facility
                                  </div>
                                  <div class="card-body">
                                    <form class="" action="{!! route('Agentfacility.update', $facility->id) !!}" method="post">
                                      @csrf
                                      <label for="">Enter your facility name:</label>
                                      <input type="hidden" name="added_by" value="{{ Auth::id() }}">
                                      <input type="text" required class="form-control mb-3" name="facilities" value="{{ $facility->facilities }}">
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
