@extends('layouts.agent')
@section('page_title')
 - Tenat Message
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
                    <div class="col-lg-12">
                        @include('Alerts.success')
                        @include('Alerts.danger')
                        <div class="row">
                    						<div class="col-lg-5 col-xl-4">
                    							<div class="message_container">
                    								<div class="inbox_user_list">
                                        <h3><b>Inbox</b></h3>
                                        <hr>
                    									<ul>
                                        @forelse ($tenants as $tenant)
                                          <li class="contact">
                    											<a href="{!! route('tenant.message.openCoversation', [$tenant->name, $tenant->id]) !!}">
                    												<div class="wrap">
                    													{{-- <span class="contact-status online"></span> --}}
                    													<img class="img-fluid" src="../uploads/{{ $tenant->avatar }}" alt="{{ $tenant->avatar }}"/>
                    													<div class="meta">
                    														<h5 class="name">{{ $tenant->name }}</h5>
                    														<p class="preview">Click to start the coversation.</p>
                    													</div>
                    													<div class="m_notif">2</div>
                    												</div>
                    											</a>
                    										</li>
                                        @empty
                                          <li class="contact">
                                            <p class="preview color-warning text-center">No tenant available.</p>
                                          </li>
                                        @endforelse
                    									</ul>
                    								</div>
                    							</div>
                    						</div>
                    						<div class="col-lg-7 col-xl-8">
                    							<div class="message_container">
                    								<div class="inbox_chatting_box">
                                      <div class="card mt-5 m-5">
                                        <div class="card-body">
                                          <p class="card-text text-center">Select conversation to start chat.</p>
                                        </div>
                                      </div>
                    								</div>
                    							</div>
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
@endsection
