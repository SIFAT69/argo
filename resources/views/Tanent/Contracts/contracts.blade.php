@extends('layouts.tanent')
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
								<h2 class="breadcrumb_title">All Contracts</h2>
							</div>
						</div>
						<div class="col-lg-8 col-xl-8">

							<div class="candidate_revew_select style2 text-right mb30-991">
								<ul class="mb0">
									<li class="list-inline-item">
										<div class="candidate_revew_search_box course fn-520">
											{{-- <form class="form-inline my-2">
										    	<input class="form-control mr-sm-2" type="search" id="myInput" placeholder="Search Contract" aria-label="Search">
										    	<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
										    </form> --}}
										</div>
									</li>
									<li class="list-inline-item">
                                        {{-- <a href="{!! route('MyPropertiesCreate') !!}" class="btn btn-success">Create New</a> --}}
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-12">
                            @include('Alerts.success')
                            @include('Alerts.danger')
							<div class="my_dashboard_review mb40">
								<div class="property_table">
									<div class="table-responsive mt0">
										<table class="table">
											<thead class="thead-light">
										    	<tr>
										    		<th scope="col">Contract Name</th>
										    		<th scope="col">Contract Duration</th>
										    		<th scope="col">Created At</th>
										    		<th scope="col">Status</th>
										    		<th scope="col">Action</th>
										    	</tr>
											</thead>
											<tbody id="myTable">
                                               @forelse ($contracts as $contract)
										    	<tr>
                                                    <td> {{ $contract->contract_name }} </td>
                                                    <td> {{ $contract->contract_duration }} </td>
                                                    <td> {{ \Carbon\Carbon::parse($contract->created_at)->diffForHumans() }} </td>
                                                    <td>
                                                        @if ($contract->status == "Active")
                                                         <span class="badge badge-success"> {{ $contract->status }} </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('contracts.tenant.show',$contract->id ) }}" class="btn btn-outline-info" title="View"> <i class="fas fa-eye"></i> </a>
                                                        {{-- <a href="{{ route('contracts.agent.remove', [$contract->contract_property_type, $contract->id]) }}" class="btn btn-outline-danger" title="Unlink Contract"><i class="fas fa-unlink"></i> </a> --}}
                                                    </td>
                                                </tr>
                                                    @empty
										    	<tr>
                                                    <td colspan="5" class="text-center">No contracts found!</td>
                                                </tr>
                                                @endforelse
											</tbody>
										</table>
									</div>
									<div class="mbp_pagination">
									</div>
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
