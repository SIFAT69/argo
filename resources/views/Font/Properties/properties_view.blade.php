@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
  Property - {{ $property->title }}
@endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                					$images = json_decode($property->images, true);
                					@endphp
                					@foreach ($images as $image)
                					@php
                						$showImage = DB::table('libraries')->where('id', $image)->value('file_name');
                					@endphp
                			         <div class="slide slide-one" style="background-image: url(../uploads/{{ $showImage }});height: 600px;"></div>
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
          <div id="success"></div>
					<div class="single_property_title mt30-767 mb30-767">
						<h2>{{ $property->title }}</h2>
						<p>{{ $property->city }},{{ $property->states }},{{ $property->location }}</p>
					</div>
				</div>
				<div class="col-lg-5 col-xl-4">
					<div class="single_property_social_share">
						<div class="price float-left fn-400">
							<h2>${{ $property->price }} @if($property->type == 'Rent') /mo @endif</h2>
							@if($property->type == 'Rent')
								@if($property->assigned_to == null)
									For Rent
								@else
									<span class="badge badge-danger h4">Rent Out</span>
								@endif
							@else
								@if($property->assigned_to == null)
									For Sell
								@else
									<span class="badge badge-danger h4">Sold Out</span>
								@endif
							@endif
						</div>
						<div class="spss mt20 text-right tal-400">
							<ul class="mb0">
							    <input type="text" style="display:none" value="{!! route('properties_view', $property->slug) !!}" id="myInput">
								<li class="list-inline-item" onclick="myFunction()"><a href="#"><span class="flaticon-share"></span></a></li>
								<script>
                function myFunction() {
                  /* Get the text field */
                  var copyText = document.getElementById("myInput");

                  /* Select the text field */
                  copyText.select();
                  copyText.setSelectionRange(0, 99999); /* For mobile devices */

                  /* Copy the text inside the text field */
                  navigator.clipboard.writeText(copyText.value);

                  /* Alert the copied text */
                  // alert("Copied the text: " + copyText.value);
                   $("#success").append("<div class='alert alert-success alert-dismissable' id='myAlert2'> <button type='button' class='close' data-dismiss='alert'  aria-hidden='true'>&times;</button> Success! Link copied to clipboard!.</div>");
                }
                </script>
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
										<li class="list-inline-item"><a href="#">{{ $property->category }}</a></li>
										<li class="list-inline-item"><a href="#">Beds: {{ $property->flat_beds }}</a></li>
										<li class="list-inline-item"><a href="#">Baths: {{ $property->flat_baths }}</a></li>
										<li class="list-inline-item"><a href="#">m<sup>2</sup>: {{ $property->size }}</a></li>
									</ul>
								</div>
								<h4 class="mb30">Description</h4>
						    	<p class="mb25">
                    {!! $property->description !!}
                  </p>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="additional_details">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb15">Property Details</h4>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Price :</p></li>
											<li><p>Property Size :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{ $property->price }} @if($property->type == 'Rent') /mo @endif</span></p></li>
											<li><p><span>{{ $property->size }} m<sup>2</sup></span></p></li>
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Bedrooms :</p></li>
											<li><p>Bathrooms :</p></li>
											<li><p>Floors :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{ $property->flat_beds }}</span></p></li>
											<li><p><span>{{ $property->flat_baths }}</span></p></li>
											<li><p><span>{{ $property->flat_floors }}</span></p></li>
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Property Type :</p></li>
											<li><p>Property Status :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>Apartment</span></p></li>
											<li><p><span>
												@if($property->type == 'Rent')
													@if($property->assigned_to == null)
														For Rent
													@else
														<span class="text-danger">Rent Out</span>
													@endif
												@else
													@if($property->assigned_to == null)
														For Sell
													@else
														<span class="text-danger">Sold Out</span>
													@endif
												@endif
											</span></p></li>
										</ul>
									</div>
									<div class="col-12">
										<ul class="list-inline-item">
											<li><p>Property Code :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{ $property->code }}</span></p></li>
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
											@foreach($property->features as $feature)
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
									    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Property video</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent2">
									<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
										<div class="property_video">
											<div class="thumb">
												<img class="pro_img img-fluid w100" src="/uploads/{{ $property->youtube_thumb }}" alt="Property Image">
												<div class="overlay_icon">
													<a class="video_popup_btn popup-img red popup-youtube" href="{{ $property->youtube_link }}"><span class="flaticon-play"></span></a>
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
									@foreach($property->facilities as $facility)
										@if($facility != "Null" && $property->distance[$loop->index] != null)
											<p class="para">{{ $facility }} <span>({{ $property->distance[$loop->index] }} miles)</span></p>
										@endif
									@endforeach
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<h4 class="mt30 mb30">Similar Properties</h4>
						</div>
						@foreach($similarProperties as $similarProperty)
							<div class="col-lg-6">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="/uploads/{{ $similarProperty->youtube_thumb }}" alt="fp2.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												@if($similarProperty->type == 'Rent')
													@if($similarProperty->assigned_to == null)
														<li class="list-inline-item"><a href="#">For Rent</a></li>
													@else
														<li class="list-inline-item"><a href="#">Rent Out</a></li>
													@endif
												@else
													@if($similarProperty->assigned_to == null)
														<li class="list-inline-item"><a href="#">For Sell</a></li>
													@else
														<li class="list-inline-item"><a href="#">Sold Out</a></li>
													@endif
												@endif

												@if($similarProperty->is_featured == 'Yes')
													<li class="list-inline-item"><a href="#">Featured</a></li>
												@endif
											</ul>
											<a class="fp_price" href="#">$ {{ $similarProperty->price }} @if($similarProperty->type == 'Rent') <small>/mo</small> @endif</a>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartment</p>
                      <a href="{!! route('properties_view', $similarProperty->slug) !!}">
											<h4>{{ $similarProperty->title }}</h4>
											<p><span class="flaticon-placeholder"></span>{{ $similarProperty->city }}, {{ $similarProperty->state }}, {{ $similarProperty->location }}</p>
											<ul class="prop_details mb0">
												<li class="list-inline-item"><a href="#">Beds: {{ $similarProperty->flat_beds }}</a></li>
												<li class="list-inline-item"><a href="#">Baths: {{ $similarProperty->flat_baths }}</a></li>
												<li class="list-inline-item"><a href="#">Sq Ft: {{ $similarProperty->size }}</a></li>
											</ul>
                      </a>
										</div>
										<div class="fp_footer">
											<ul class="fp_meta float-left mb0">
												<li class="list-inline-item"><a href="{!! route('agenency_details', $similarProperty->user_id) !!}"><img src="/uploads/{{ DB::table('users')->where('id', $similarProperty->user_id)->value('avatar') }}" style="width:50px; border-radius: 50px" alt="Owner Image"></a></li>
												<li class="list-inline-item"><a href="{!! route('agenency_details', $similarProperty->user_id) !!}">{{ $similarProperty->user_name }}</a></li>
											</ul>
											<div class="fp_pdate float-right">{{ Carbon\Carbon::parse($similarProperty->created_at)->diffForHumans() }}</div>
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
									<img class="mr-3" src="/uploads/{{ $propertyOwner->avatar }}" style="border-radius:50px;" alt="Property Owner Image">
									<div class="media-body">
								    	<h5 class="mt-0 mb0">{{ $propertyOwner->name }}</h5>
								    	<p class="mb0">{{ $propertyOwner->phoneNumber ?? 'No Phone' }}</p>
								    	<p class="mb0">{{ $propertyOwner->email }}</p>
								    	<a class="text-thm" href="{{ route('agenency_details', $propertyOwner->id) }}">View My Listing</a>
								  	</div>
								</div>
							</div>
              <form class="" action="{!! route('agenency_message') !!}" method="post">
                @csrf
                <input type="hidden" name="to_id" value="{{ $propertyOwner->id }}">
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
					<div class="terms_condition_widget">
						<h4 class="title">Featured Properties</h4>
						<div class="sidebar_feature_property_slider">
							@forelse($featuredProperties as $featuredProperty)
								<div class="item">
									<div class="feat_property home7 agent">
										<div class="thumb">
											<img class="img-whp" src="/uploads/{{ $featuredProperty->youtube_thumb }}" alt="Featured Image">
											<div class="thmb_cntnt">
												<ul class="tag mb0">
													@if($featuredProperty->type == 'Rent')
														@if($featuredProperty->assigned_to == null)
															<li class="list-inline-item"><a href="#">For Rent</a></li>
														@else
															<li class="list-inline-item"><a href="#">Rent Out</a></li>
														@endif
													@else
														@if($featuredProperty->assigned_to == null)
															<li class="list-inline-item"><a href="#">For Sell</a></li>
														@else
															<li class="list-inline-item"><a href="#">Sold Out</a></li>
														@endif
													@endif
													<li class="list-inline-item"><a href="#">Featured</a></li>
												</ul>
												<a class="fp_price" href="{!! route('properties_view', $featuredProperty->slug) !!}">${{ $featuredProperty->price }} @if($featuredProperty->type == 'Rent')<small>/mo</small>@endif</a>
												<h4 class="posr color-white">{{ $featuredProperty->title }}</h4>
											</div>
                    </div>
									</div>
								</div>
							@empty
								<div>No Properties</div>
							@endforelse
						</div>
					</div>
					<div class="terms_condition_widget">
						<h4 class="title">Categories Property</h4>
						<div class="widget_list">
              @php
                $categories = DB::table('realstatecategories')->get();
              @endphp
							<ul class="list_details">
                @foreach ($categories as $category)
                <li><a href="#"><i class="fa fa-caret-right mr10"></i>{{ $category->name }} <span class="float-right">{{ DB::table('properties')->where('category', $category->name)->count() }} properties</span></a></li>
                @endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
