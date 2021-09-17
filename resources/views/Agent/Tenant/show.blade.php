@extends('layouts.agent')
@section('page_title')
  | Tenant | {{ $tenant->name }}
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
                              <h2 class="breadcrumb_title">Tenant - {{ $tenant->name }}</h2>
                              <p>We are glad to see you again!</p>
                          </div>
                      </div>
                      <div class="col-lg-8 col-xl-8">
                          <div class="candidate_revew_select style2 text-right mb30-991">
                              <ul class="mb0">
                                  <li class="list-inline-item">
                                      <div class="candidate_revew_search_box course fn-520">
                                          <a class="btn btn-primary text-white" href="{!! route('AgentTenantEdit', $tenant->id) !!}">Edit</a>
                                          <a class="btn btn-danger text-white" href="{!! route('Landlord.index') !!}">Go Back</a>
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
                                     <h4>{{ $tenant->name }}'s Details:</h4>
                                  </div>
                                  <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> <b>Name: </b> {{ $tenant->name }} </li>
                                        <li class="list-group-item"> <b>Address: </b> {{ $tenant->address }} </li>
                                        <li class="list-group-item"> <b>Email: </b> {{ $tenant->email }} </li>
                                        <li class="list-group-item"> <b>Contact: </b> {{ $tenant->phoneNumber }} </li>
                                        <li class="list-group-item"> <b>Bank Name: </b> {{ $tenant->bank_name }} </li>
                                        <li class="list-group-item"> <b>Bank Account: </b> {{ $tenant->bank_account }} </li>
                                        <li class="list-group-item"> <b>Bank Sort Code: </b> {{ $tenant->bank_sort_code }} </li>
                                        <li class="list-group-item"> <b>Payment Type: </b> {{ $tenant->payment_type }} </li>
                                        <li class="list-group-item"> <b>Date Of Birth: </b> {{ $tenant->dob }} </li>
                                        <li class="list-group-item"> <b>Identification Documents: </b> {{ $tenant->identification_documents }} </li>
                                        <li class="list-group-item"> <b>Contractual Documents: </b> {{ $tenant->contractual_documents  }} </li>
                                        <li class="list-group-item"> <b>Status: </b> <small class="badge badge-success">Active</small> </li>
                                      </ul>
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
