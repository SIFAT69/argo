@extends('layouts.tanent')
@section('page_title')
  All properties
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
								<h2 class="breadcrumb_title">Properties</h2>
							</div>
						</div>
						<div class="col-lg-8 col-xl-8">

							<div class="candidate_revew_select style2 text-right mb30-991">
								<ul class="mb0">
                  <li class="list-inline-item">
                      <a href="{!! route('services.request.index') !!}" class="btn btn-danger">Servies Request List</a>
                  </li>
								</ul>
							</div>
						</div>
						<div class="col-lg-12">
                        @include('Alerts.success')
                        @include('Alerts.danger')
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="my_dashboard_review mb40">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{!! route('services.request.store') !!}" method="post">
                                        @csrf
                                            <label for="service_title">Services request title:</label>
                                            <input type="text" class="form-control mb-3" id="service_title" name="service_title" placeholder="Enter a title for your service....">
                                            <label for="type">Services for:</label>
                                            <select name="type" id="type" class="form-control mb-3">
                                                <option value="Project">Project</option>
                                                <option value="Property">Property</option>
                                            </select>
                                            <label for="code_id">Select your property/Project Code:</label>
                                            <select name="code_id" id="code_id" class="form-control mb-3">
                                                <optgroup label="Your projects">
                                                    @forelse ($projects as $project)
                                                    <option value=" {{ $project->code }} ">[{{ $project->code }}] - {{ $project->title }}</option>
                                                    @empty
                                                    <option disabled>No projects assigned to you.</option>
                                                    @endforelse
                                                </optgroup>
                                                <optgroup label="Your properties">
                                                    @forelse ($properties as $property)
                                                    <option value="{{ $property->code }}">[ {{ $property->code }} ] - {{ $property->title }}</option>
                                                    @empty
                                                    <option disabled>No property assigned to you.</option>
                                                    @endforelse
                                                </optgroup>
                                            </select>
                                            <label for="title">Select your property/Project Title:</label>
                                            <select name="title" id="title" class="form-control mb-3">
                                                <optgroup label="Your projects">
                                                    @forelse ($projects as $project)
                                                    <option value=" {{ $project->title }}">{{ $project->title }}</option>
                                                    @empty
                                                    <option disabled>No projects assigned to you.</option>
                                                    @endforelse
                                                </optgroup>
                                                <optgroup label="Your properties">
                                                    @forelse ($properties as $property)
                                                    <option value=" {{ $property->title }} ">{{ $property->title }}</option>
                                                    @empty
                                                    <option disabled>No property assigned to you.</option>
                                                    @endforelse
                                                </optgroup>
                                            </select>
                                            <label for="priority">Priority Level:</label>
                                            <select name="priority" id="priority" class="form-control mb-3">
                                                <option value="Low">Low</option>
                                                <option value="Medium">Medium</option>
                                                <option value="High">High</option>
                                            </select>
                                            <label for="request_desc">Request Description:</label>
                                            <textarea name="request_desc" id="request_desc" cols="30" rows="10" class="form-control mb-3"></textarea>
                                            <label for="request_desc">Notes:</label>
                                            <textarea name="notes" id="notes" cols="30" rows="5" class="form-control mb-3"></textarea>
                                            <button type="submit" class="btn btn-outline-primary btn-block mb-3">Send Services Request</button>
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
								<p>©2021 Argo. Made By SifzTech.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
