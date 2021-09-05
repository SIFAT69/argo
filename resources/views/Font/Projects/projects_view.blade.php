@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
  Project - {{ $project->title }}
@endsection

@section('content')
<div class="single_page_listing_tab">
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="slider_tabs" role="tabpanel" aria-labelledby="slider-tab">
			<!-- 10th Home Slider -->
			<div class="home10-mainslider">
				<div class="container-fluid p0">
					<div class="row">
						<div class="col-lg-12">
							<div class="main-banner-wrapper home10">
								<div class="banner-style-one owl-theme owl-carousel">
					@php
					$images = json_decode($project->images, true);
					@endphp
					@foreach ($images as $image)
					@php
						$showImage = DB::table('libraries')->where('id', $image)->value('file_name');
					@endphp
									<div class="slide slide-one" style="background-image: url('/uploads/{{ $showImage }}');height: 600px;"></div>
					@endforeach
								</div>
								<div class="carousel-btn-block banner-carousel-btn">
									<span class="carousel-btn left-btn"><i class="flaticon-left-arrow-1 left"></i></span>
									<span class="carousel-btn right-btn"><i class="flaticon-right-arrow right"></i></span>
								</div><!-- /.carousel-btn-block banner-carousel-btn -->
							</div><!-- /.main-banner-wrapper -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

  <section class="our-agent-single bgc-f7 pb30-991">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-xl-8">
					<div class="single_property_title mt30-767 mb30-767">
						<h2>{{ $project->title }}</h2>
						<p>{{ $project->city }},{{ $project->states }},{{ $project->location }}</p>
					</div>
				</div>
				<div class="col-lg-5 col-xl-4">
					<div class="single_property_social_share">
						<div class="price float-left fn-400">
							<h2>${{ $project->low_price }} - ${{ $project->max_price }}</h2>
							@if($project->assigned_to == null)
								<span class="badge badge-danger h4">For Sell</span>
							@else
								<span class="badge badge-danger h4">Sold Out</span>
							@endif
						</div>
						<div class="spss mt20 text-right tal-400">
							<ul class="mb0">
								<li class="list-inline-item"><a href="#"><span class="flaticon-share"></span></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-8 mt50">
					<div class="row">
						<div class="col-lg-12">
							<div class="listing_single_description">
								<div class="lsd_list">
									<ul class="mb0">
										<li class="list-inline-item"><a href="#">{{ $project->category }}</a></li>
										<li class="list-inline-item"><a href="#">Blocks: {{ $project->flat_blocks }}</a></li>
										<li class="list-inline-item"><a href="#">Floors: {{ $project->flat_floors }}</a></li>
										<li class="list-inline-item"><a href="#">Flat Numbers: {{ $project->flat_number }}</a></li>
									</ul>
								</div>
								<h4 class="mb30">Description</h4>
						    	<p class="mb25">
                    {!! $project->description !!}
                  </p>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="additional_details">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb15">Project Details</h4>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<!-- <li><p>Project ID :</p></li> -->
											<li><p>Flat Blocks :</p></li>
											<li><p>Flat Floors :</p></li>
											<li><p>Flat Number :</p></li>
										</ul>
										<ul class="list-inline-item">
											<!-- <li><p><span>HZ27</span></p></li> -->
											<li><p><span>{{ $project->flat_blocks }}</span></p></li>
											<li><p><span>{{ $project->flat_floors }}</span></p></li>
											<li><p><span>{{ $project->flat_number }}</span></p></li>
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Minimum Price :</p></li>
											<li><p>Maximum Price :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{ $project->low_price }}</span></p></li>
											<li><p><span>{{ $project->max_price }}</span></p></li>
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Project Type :</p></li>
											<li><p>Project Status :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>Apartment</span></p></li>
											<li><p>
												@if($project->assigned_to == null)
													<span>For Sell</span>
												@else
													<span class="text-danger">Sold Out</span>
												@endif
											</p></li>
										</ul>
									</div>
									<div class="col-12">
										<ul class="list-inline-item">
											<li><p>Project Code :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{ $project->code }}</span></p></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="application_statics mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb10">Features</h4>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-4">
										<ul class="order_list list-inline-item">
											@foreach($project->features as $feature)
												<li><a href="#"><span class="flaticon-tick"></span>{{ $feature }}</a></li>
												@if($loop->iteration % 5 == 0)
													</ul>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-4">
													<ul class="order_list list-inline-item">
												@endif
											@endforeach
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="shop_single_tab_content style2 mt30">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
									    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Project video</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent2">
									<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
										<div class="property_video">
											<div class="thumb">
												<img class="pro_img img-fluid w100" src="/uploads/{{ $project->youtube_thumb }}" alt="Property Image">
												<div class="overlay_icon">
													<a class="video_popup_btn popup-img red popup-youtube" href="{{ $project->youtube_link }}"><span class="flaticon-play"></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="whats_nearby mt30">
								<h4 class="mb10">What's Nearby</h4>
								<div class="education_distance mb15">
									@foreach($project->facilities as $facility)
										@if($facility != "Null" && $project->distance[$loop->index] != null)
										<p class="para">{{ $facility }} <span>({{ $project->distance[$loop->index] }} miles)</span></p>
										@endif
									@endforeach
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<h4 class="mt30 mb30">Similar Projects</h4>
						</div>
						@foreach($similarProjects as $similarProject)
							<div class="col-lg-6">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="/uploads/{{ $similarProject->youtube_thumb }}" alt="fp2.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												@if($similarProject->assigned_to == null)
													<li class="list-inline-item"><a href="#">For Sale</a></li>
												@else
													<<li class="list-inline-item"><a href="#">Sold Out</a></li>
												@endif
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
											</ul>
											<a class="fp_price" href="#">${{ $similarProject->low_price }} - ${{ $similarProject->max_price }}</a>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">{{ $similarProject->category }}</p>
											<a href="{!! route('projects_view', $similarProject->slug) !!}">
												<h4>{{ $similarProject->title }}</h4>
												<p><span class="flaticon-placeholder"></span>{{ $similarProject->city }}, {{ $similarProject->state }}, {{ $similarProject->location }}</p>
												<ul class="prop_details mb0">
													<li class="list-inline-item"><a href="#">Beds: {{ $similarProject->flat_blocks }}</a></li>
													<li class="list-inline-item"><a href="#">Baths: {{ $similarProject->flat_floors }}</a></li>
													<li class="list-inline-item"><a href="#">Sq Ft: {{ $similarProject->flat_number }}</a></li>
												</ul>
											</a>
										</div>
										<div class="fp_footer">
											<ul class="fp_meta float-left mb0">
												<li class="list-inline-item"><a href="{!! route('agenency_details', $similarProject->user_id) !!}"><img src="/uploads/{{ DB::table('users')->where('id', $similarProject->user_id)->value('avatar') }}" style="width:50px; border-radius: 50px" alt="Owner Image"></a></li>
												<li class="list-inline-item"><a href="{!! route('agenency_details', $similarProject->user_id) !!}">{{ $similarProject->user_name }}</a></li>
											</ul>
											<div class="fp_pdate float-right">{{ Carbon\Carbon::parse($similarProject->created_at)->diffForHumans() }}</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-4 col-xl-4 mt50">
          @include('Alerts.success')
          @include('Alerts.danger')
					<div class="sidebar_listing_list">
						<div class="sidebar_advanced_search_widget">
							<div class="sl_creator">
								<h4 class="mb25">Listed By</h4>
								<div class="media">
									<img class="mr-3" src="/uploads/{{ $projectOwner->avatar }}" style="border-radius:50px;" alt="Property Owner Image">
									<div class="media-body">
								    	<h5 class="mt-0 mb0">{{ $projectOwner->name }}</h5>
								    	<p class="mb0">{{ $projectOwner->phoneNumber ?? 'No Phone' }}</p>
								    	<p class="mb0">{{ $projectOwner->email }}</p>
								    	<a class="text-thm" href="{{ route('agenency_details', $projectOwner->id) }}">View My Listing</a>
								  	</div>
								</div>
							</div>
              <form class="" action="{!! route('agenency_message') !!}" method="post">
                @csrf
                <input type="hidden" name="to_id" value="{{ $projectOwner->id }}">
							<ul class="sasw_list mb0">
								<li class="search_area">
								    <div class="form-group">
								    	<input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Your Name">
								    </div>
								</li>
								<li class="search_area">
								    <div class="form-group">
								    	<input type="tel" class="form-control" name="phoneNumber" id="exampleInputName2" placeholder="Phone">
								    </div>
								</li>
								<li class="search_area">
								    <div class="form-group">
								    	<input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Email">
								    </div>
								</li>
								<li class="search_area">
                  <div class="form-group">
                      <textarea id="form_message" name="message" class="form-control required" rows="5" required="required" placeholder="I'm interest in [ Listing Single ]"></textarea>
                  </div>
								</li>
								<li>
									<div class="search_option_button">
									    <button type="submit" class="btn btn-block btn-thm">Submit</button>
									</div>
								</li>
							</ul>
            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
