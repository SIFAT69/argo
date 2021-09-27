@extends('layouts.agent')
@section('page_title')
 - All Contracts
@endsection
@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
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
										<li class="active"><a href="page-my-properties.html"><span class="flaticon-home"></span> My Properties</a></li>
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
						<div class="col-lg-4 col-xl-4 mb10">
							<div class="breadcrumb_content style2 mb30-991">
								<h2 class="breadcrumb_title">All Contracts - {{ $contract->contract_property }} </h2>
							</div>
						</div>
						<div class="col-lg-8 col-xl-8">

							<div class="candidate_revew_select style2 text-right mb30-991">
								<ul class="mb0">
									<li class="list-inline-item">
                                        <a href="{!! route('contracts.agent.index') !!}" class="btn btn-danger">Go Back</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-12">
                            @include('Alerts.success')
                            @include('Alerts.danger')
							<div class="my_dashboard_review mb40">
                                <div class="card">
                                    <div class="card-header">
                                        Property Name : {{ $contract->contract_property }}
                                    </div>
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item"> <strong>Contract Name: </strong> {{ $contract->contract_name}}</li>
                                      <li class="list-group-item"> <strong>Contract Duration: </strong> {{ $contract->contract_duration}}</li>
                                      <li class="list-group-item"> <strong>Created At: </strong> {{ \Carbon\Carbon::parse($contract->created_at)->diffForHumans() }}</li>
                                      <li class="list-group-item"> <strong>Property/Project ID : </strong> {{ $contract->contract_property_type }}</li>
                                      <li class="list-group-item"> <strong>Status: </strong>
                                        @if ($contract->status == "Active")
                                        <span class="badge badge-success"> {{ $contract->status }} </span>
                                        @endif
                                    </li>
                                    <li class="list-group-item"> <strong>Description : </strong> <br>
                                         {{ $contract->description }}</li>
                                    </ul>
                                    @php
                                        $files = json_decode($contract->files);
                                    @endphp
                                     <li class="list-group-item"> <strong>Files : </strong> <br>
                                        @forelse ($files as $file)
                                        {{ $loop->index+1 }}. <a href="../../../uploads/Files/{{ $file }}" target="_blank"> {{ $file }} </a> <br>
                                        @empty
                                         <p>No files attached ...</p>
                                        @endforelse
                                     </li>
                                    </ul>
                                  </div>
							</div>
						</div>
					</div>
					<div class="row mt10">
						<div class="col-lg-12">
							<div class="copyright-widget text-center">
								<p>©2021 Argo. Made By SifzTech.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
