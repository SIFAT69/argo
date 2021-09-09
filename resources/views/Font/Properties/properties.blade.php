@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
  All properties
@endsection
@section('content')
<section class="our-listing bgc-f7 pb30-991">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="listing_sidebar">
					<div class="sidebar_content_details style3">
						<!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
						<div class="sidebar_listing_list style2 mb0">
							<div class="sidebar_advanced_search_widget">
								<h4 class="mb25">Advanced Search <a class="filter_closed_btn float-right" href="#"><small>Hide Filter</small> <span class="flaticon-close"></span></a></h4>
								<ul class="sasw_list style2 mb0">
									<li class="search_area">
										<div class="form-group">
											<input type="text" class="form-control" id="f-keyword" placeholder="keyword">
											<label for="f-keyword"><span class="flaticon-magnifying-glass"></span></label>
										</div>
									</li>
									<li class="search_area">
										<div class="form-group">
											<input type="text" class="form-control" id="f-location" placeholder="Location">
											<label for="f-location"><span class="flaticon-maps-and-flags"></span></label>
										</div>
									</li>
									<li>
										<div class="search_option_two">
											<div class="candidate_revew_select">
												<select class="selectpicker w100 show-tick" id="f-category">
													<option value="">Category</option>
													@foreach($categories as $category)
														<option value="{{ $category }}">{{ $category }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</li>
									<li>
										<div class="search_option_two">
											<div class="candidate_revew_select">
												<select class="selectpicker w100 show-tick" id="f-type">
													<option value="">Property Type</option>
													<option value="Rent">Rent</option>
													<option value="Sale">Sale</option>
												</select>
											</div>
										</div>
									</li>
									{{--
									<li>
										<div class="small_dropdown2">
											<div id="prncgs" class="btn dd_btn">
												<span>Price</span>
												<label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
											</div>
											<div class="dd_content2 w100">
												<div class="pricing_acontent">
													<!-- <input type="text" class="amount" placeholder="$10,000">
													<input type="text" class="amount2" placeholder="$50,000">
													<div class="slider-range"></div> -->
													<span id="slider-range-value1"></span>
													<span class="mt0" id="slider-range-value2"></span>
													<div id="slider"></div>
												</div>
											</div>
										</div>
									</li>
									--}}
									<li>
										<div class="search_option_two">
											<div class="candidate_revew_select">
												<select class="selectpicker w100 show-tick"  id="f-bedrooms">
													<option value="">Bedrooms</option>
													@foreach($bedrooms as $bedroom)
														<option value="{{ $bedroom }}">{{ $bedroom }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</li>
									<li>
										<div class="search_option_two">
											<div class="candidate_revew_select">
												<select class="selectpicker w100 show-tick" id="f-bathrooms">
													<option value="">Bathrooms</option>
													@foreach($bathrooms as $bathroom)
														<option value="{{ $bathroom }}">{{ $bathroom }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</li>
									<li>
										<div class="search_option_two">
											<div class="candidate_revew_select">
												<select class="selectpicker w100 show-tick" id="f-floors">
													<option value="">Floors</option>
													@foreach($floors as $floor)
														<option value="{{ $floor }}">{{ $floor }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</li>
									<li class="min_area style2 list-inline-item">
										<div class="form-group">
											<input type="number" class="form-control" id="f-minPrice" placeholder="Min Price">
										</div>
									</li>
									<li class="max_area list-inline-item">
										<div class="form-group">
											<input type="number" class="form-control" id="f-maxPrice" placeholder="Max Price">
										</div>
									</li>
									<li class="min_area style2 list-inline-item">
										<div class="form-group">
											<input type="number" class="form-control" id="f-minArea" placeholder="Min Area">
										</div>
									</li>
									<li class="max_area list-inline-item">
										<div class="form-group">
											<input type="number" class="form-control" id="f-maxArea" placeholder="Max Area">
										</div>
									</li>
									<li>
										<div id="accordion" class="panel-group">
											<div class="panel">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a href="#panelBodyRating" class="accordion-toggle link" data-toggle="collapse" data-parent="#accordion"><i class="flaticon-more"></i> Advanced features</a>
													</h4>
												</div>
												<div id="panelBodyRating" class="panel-collapse collapse">
													<div class="panel-body row">
														<div class="col-lg-12">
															<ul class="ui_kit_checkbox selectable-list float-left fn-400">
																@foreach($features as $feature)
																	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input f-feature" id="customCheck15-{{ $feature }}" value="{{ $feature }}">
																			<label class="custom-control-label" for="customCheck15-{{ $feature }}">{{ $feature }}</label>
																		</div>
																	</li>
																@endforeach
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="search_option_button">
											<button class="btn btn-block btn-thm" id="search">Search</button>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-lg-6">
				<div class="breadcrumb_content style2">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
						<li class="breadcrumb-item active text-thm" aria-current="page">properties</li>
					</ol>
					<h2 class="breadcrumb_title">All properties</h2>
				</div>
			</div>
			<div class="col-md-4 col-lg-6">
				<div class="sidebar_switch text-right">
					<div id="main2">
						<span id="open2" class="flaticon-filter-results-button filter_open_btn"> Show Filter</span>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12">
				<div class="row" id="card-section">
					@forelse ($properties as $property)
						@php
							$images = json_decode($property->images, true);
						@endphp
						<div class="col-md-6 col-lg-4">
							<div class="feat_property home7 style4">
								<div class="thumb">
									<div class="fp_single_item_slider">
										@foreach ($images as $image)
											<div class="item">
												<img class="img-whp" src="../uploads/{{ DB::table('libraries')->where('id', $image)->value('file_name') }}" alt="fp1.jpg">
											</div>
										@endforeach
									</div>
									<div class="thmb_cntnt style2">
										<ul class="tag mb0">
											@if($property->type == 'Rent')
												@if($property->assigned_to == null)
													<li class="list-inline-item"><a href="#">For Rent</a></li>
												@else
													<li class="list-inline-item"><a href="#">Rent Out</a></li>
												@endif
											@else
												@if($property->assigned_to == null)
													<li class="list-inline-item"><a href="#">For Sell</a></li>
												@else
													<li class="list-inline-item"><a href="#">Sold Out</a></li>
												@endif
											@endif
										</ul>
									</div>
									<div class="thmb_cntnt style3">
										@if($property->type == "Rent")
											<a class="fp_price" href="#">${{ $property->price }}<small>/mo</small></a>
										@else
											<a class="fp_price" href="#">${{ $property->price }}</a>
										@endif
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<p class="text-thm">{{ $property->category }}</p>
										<a href="{!! route('properties_view', $property->slug) !!}">
											<h4>{{ $property->title }}</h4>
											<p><span class="flaticon-placeholder"></span> {{ $property->city }}, {{ $property->states }}, {{ $property->location }}</p>
											<ul class="prop_details mb0">
												<li class="list-inline-item"><a class="text-thm3" href="#">Beds: {{ $property->flat_beds }}</a></li>
												<li class="list-inline-item"><a class="text-thm3" href="#">Baths: {{ $property->flat_baths }}</a></li>
												<li class="list-inline-item"><a class="text-thm3" href="#">m<sup>2</sup> : {{ $property->size }}</a></li>
											</ul>
										</a>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="{!! route('agenency_details', $property->user_id) !!}"><img src="../uploads/{{ DB::table('users')->where('id', $property->user_id)->value('avatar') }}" style="width: 40px; border-radius: 50px" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="{!! route('agenency_details', $property->user_id) !!}">{{ DB::table('users')->where('id', $property->user_id)->value('name') }}</a></li>
										</ul>
										@php
											$section = DB::table('users')->where('id', $property->user_id)->value('created_at');
										@endphp
										<div class="fp_pdate float-right">{{ \Carbon\Carbon::parse($property->created_at)->diffForHumans() }}</div>
									</div>
								</div>
							</div>
						</div>
					@empty
						<p style="color:red">No properties found!</p>
					@endforelse
					<div class="col-lg-12 mt20">
						<div class="mbp_pagination">
							<ul class="page_navigation">
								<li class="page-item">
									<a class="page-link" href="{{ $properties->previousPageUrl() }}"><span class="flaticon-left-arrow"></span></a>
								</li>
								<li class="page-item">
									<a class="page-link" href="{{ $properties->nextPageUrl() }}"><span class="flaticon-right-arrow"></span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</div>
</section>
@endsection


@section('script_in_body')
<script>
	$(document).ready(function(){
            $("#search").click(function(){
                let keyword =  $('#f-keyword').val();
                let location =  $('#f-location').val();
                let category =  $('#f-category').val();
                let type =  $('#f-type').val();
                let beds =  $('#f-bedrooms').val();
                let baths =  $('#f-bathrooms').val();
                let floors =  $('#f-floors').val();
                let minArea =  $('#f-minArea').val();
                let maxArea =  $('#f-maxArea').val();
				let minPrice =  $('#f-minPrice').val();
                let maxPrice =  $('#f-maxPrice').val();
                let features = [];

				console.log(minPrice);
				console.log(maxPrice);
                $('.f-feature').each(function(){
                    if(this.checked)
                        features.push($(this).attr('value'));
                })

                $.ajax({
                    url: `{{ route('properties_filter') }}`,
                    type: `GET`,
                    data: {keyword: keyword, location: location, category: category, type: type, beds: beds, baths: baths, floors: floors, minPrice: minPrice, maxPrice: maxPrice, minArea: minArea, maxArea: maxArea, features: features},
                    success: function(properties){
                        // console.log(properties);
                        let cards = "";
                        for(property of properties)
                        {
                            let card = `
                            <div class="col-md-6 col-lg-4">
                            <div class="feat_property home7 style4">
								<div class="thumb">
									<div class="fp_single_item_slider">
                                    `;
                                        for(image of property.images)
                                        {
                                            card += `
                                                <div class="item">
                                                    <img class="img-whp" src="${image}" alt="no img">
                                                </div>
                                            `;
                                        }

                                        card += `
                                        </div>
									<div class="thmb_cntnt style2">
										<ul class="tag mb0">`;
											if(property.type == 'Rent')
											{
												if(property.assigned_to == null)
													card += `<li class="list-inline-item"><a href="#">For Rent</a></li>`;
												else
													card += `<li class="list-inline-item"><a href="#">Rent Out</a></li>`;
											}	
											else
											{
												if(property.assigned_to == null)
													card += `<li class="list-inline-item"><a href="#">For Sell</a></li>`;
												else
													card += `<li class="list-inline-item"><a href="#">Sold Out</a></li>`;
											}
									card +=	`</ul>
									</div>
									<div class="thmb_cntnt style3">`;

                                        if(property.type == 'Rent')
                                            card += `<a class="fp_price" href="#">${property.price}<small>/mo</small></a>`;
                                        else
                                        card += `<a class="fp_price" href="#">${property.price}</a>`;

									card += `</div>;
								</div>
								<div class="details">
									<div class="tc_content">
										<p class="text-thm">${property.category}</p>
                    <a href="{{ url('properties/view') }}/${property.slug}">
										<h4>${property.title}</h4>
										<p><span class="flaticon-placeholder"></span> ${property.city}, ${property.states}, ${property.location}</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a class="text-thm3" href="#">Beds: ${property.flat_beds }</a></li>
											<li class="list-inline-item"><a class="text-thm3" href="#">Baths: ${property.flat_baths}</a></li>
											<li class="list-inline-item"><a class="text-thm3" href="#">m<sup>2</sup> : ${property.size}</a></li>
										</ul>
                  </a>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="{{ url('/agenency') }}/${property.user_id}"><img src="${property.user_avatar}" style="width: 40px; border-radius: 50px" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="{{ url('/agenency') }}/${property.user_id}">${property.user_name}</a></li>
										</ul>
										<div class="fp_pdate float-right">${property.created_at}</div>
									</div>
								</div>
							</div>
						</div> `;

                        cards += card;
                        }

						if(cards == "")
						{
							let msg = `
								<div class="col-12 h4 text-center" style="height: 50vh">
									No Property Found!
								</div>
							`;
							$('#card-section').html(msg);
						}
						else
						{
							$('#card-section').html(cards);
						}
                    },
                });
            });
        });
</script>
@endsection
