@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
  All Projects
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
											<div class="small_dropdown2">
											    <div id="prncgs" class="btn dd_btn">
											    	<span>Price</span>
											    	<label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
											    </div>
											  	<div class="dd_content2 w100">
												    <div class="pricing_acontent">
														<!-- <input type="text" class="amount" placeholder="$52,239">
														<input type="text" class="amount2" placeholder="$985,14">
														<div class="slider-range"></div> -->
												    	<span id="slider-range-value1"></span>
														<span class="mt0" id="slider-range-value2"></span>
													    <div id="slider"></div>
												    </div>
											  	</div>
											</div>
										</li>
										<li>
											<div class="search_option_two">
												<div class="candidate_revew_select">
													<select class="selectpicker w100 show-tick"  id="f-blocks">
														<option value="">Blocks</option>
														@foreach($blocks as $block)
															<option value="{{ $block }}">{{ $block }}</option>
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
						    <li class="breadcrumb-item"><a href="#">Home</a></li>
						    <li class="breadcrumb-item active text-thm" aria-current="page">projects</li>
						</ol>
						<h2 class="breadcrumb_title">All Projects</h2>
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
					<div class="row">
						<div class="grid_list_search_result style2">
							<div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
								<div class="left_area">
									<p></p>
								</div>
							</div>
							<div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
								<div class="right_area style2 text-right">
									<ul>
										<li class="list-inline-item"><span class="shrtby">Sort by:</span>
											<select class="selectpicker show-tick">
												<option>Featured First</option>
												<option>Featured 2nd</option>
												<option>Featured 3rd</option>
												<option>Featured 4th</option>
												<option>Featured 5th</option>
											</select>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="card-section">
            @forelse ($projects as $project)
              @php
               $images = json_decode($project->images, true);
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
											<li class="list-inline-item"><a href="#">For Sale</a></li>
										</ul>
									</div>
									<div class="thmb_cntnt style3">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
										<a class="fp_price" href="#">${{ $project->max_price }}<small></small></a>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<p class="text-thm">{{ $project->category }}</p>
										<a href="{!! route('projects_view', $project->slug) !!}">
										<h4>{{ $project->title }}</h4>
										<p><span class="flaticon-placeholder"></span> {{ $project->city }}, {{ $project->state }}, {{ $project->location }}</p>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="../uploads/{{ DB::table('users')->where('id', $project->user_id)->value('avatar') }}" style="width: 40px; border-radius: 50px" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="#">{{ DB::table('users')->where('id', $project->user_id)->value('name') }}</a></li>
										</ul>
										<div class="fp_pdate float-right">{{ \Carbon\Carbon::parse($project->created_at)->diffForHumans() }}</div>
									</div>
								</div>
							</div>
						</div>
            @empty
              <p>No projects found!</p>
            @endforelse
						<div class="col-lg-12 mt20">
								<div class="mbp_pagination">
									<ul class="page_navigation">
										<li class="page-item">
											<a class="page-link" href="{{ $projects->previousPageUrl() }}"><span class="flaticon-left-arrow"></span></a>
										</li>
										<li class="page-item">
											<a class="page-link" href="{{ $projects->nextPageUrl() }}"><span class="flaticon-right-arrow"></span></a>
										</li>
									</ul>
								</div>
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
                let blocks =  $('#f-blocks').val();
                let floors =  $('#f-floors').val();
                // let minArea =  $('#f-minArea').val();
                // let maxArea =  $('#f-maxArea').val();
                let features = [];

                $('.f-feature').each(function(){
                    if(this.checked)
                        features.push($(this).attr('value'));
                }) 

                $.ajax({
                    url: `{{ route('projects_filter') }}`,
                    type: `GET`,
                    data: {keyword: keyword, location: location, category: category, blocks: blocks, floors: floors, features: features},
                    success: function(projects){
                        console.log(projects);
                        let cards = "";
                        for(project of projects)
                        {
                            let card = `
                            <div class="col-md-6 col-lg-4">
                            <div class="feat_property home7 style4">
								<div class="thumb">
									<div class="fp_single_item_slider">
                                    `;
                                        for(image of project.images)
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
										<ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#"></a></li>
										</ul>
									</div>
									<div class="thmb_cntnt style3">
                                        
                                        
                                        `;

                                        card += `<a class="fp_price" href="#">${project.low_price} - ${project.max_price}</a>`;

									card += `</div>;
								</div>
								<div class="details">
									<div class="tc_content">
										<p class="text-thm">${project.category}</p>
                    <a href="{{ url('projects/view') }}/${project.slug}">
										<h4>${project.title}</h4>
										<p><span class="flaticon-placeholder"></span> ${project.city}, ${project.state}, ${project.location}</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a class="text-thm3" href="#">Blocks: ${project.flat_blocks }</a></li>
											<li class="list-inline-item"><a class="text-thm3" href="#">Floors: ${project.flat_floors}</a></li>
										</ul>
                  </a>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="${project.user_avatar}" style="width: 40px; border-radius: 50px" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="#">${project.user_name}</a></li>
										</ul>
										<div class="fp_pdate float-right">${project.created_at}</div>
									</div>
								</div>
							</div>
						</div> `;

                        cards += card;
                        }
						console.log(cards);
                        $('#card-section').html(cards);
                    },
                });
            });
        });
</script>
@endsection