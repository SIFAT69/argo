@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
  Searched properties
@endsection
@section('content')
  <section class="our-listing bgc-f7 pb30-991">
		<div class="container">
			
			<div class="row">
				<div class="col-md-8 col-lg-6">
					<div class="breadcrumb_content style2">
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
						    <li class="breadcrumb-item active text-thm" aria-current="page">Properties</li>
						</ol>
						<h2 class="breadcrumb_title">Properties of {{ $city }}</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="grid_list_search_result style2">
							<div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
								<div class="left_area">
									{{-- <p>{{ DB::table('properties')->count() }} Search results</p> --}}
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
            @forelse ($properties as $property)
              <div class="col-md-6 col-lg-4">
							<div class="feat_property home7 style4">
								<div class="thumb">
									<div class="fp_single_item_slider">
                    @foreach ($property->images as $image)
										<div class="item">
											<img class="img-whp" src="{{ $image }}" alt="property image">
										</div>
                  @endforeach

									</div>
									<div class="thmb_cntnt style2">
										<ul class="tag mb0">
                      @if ($property->type == "Rent" && !empty($property->type))
                        <li class="list-inline-item"><a href="#">For Rent</a></li>
                      @endif
                      @if ($property->type == "Sale" && !empty($property->type))
                        <li class="list-inline-item"><a href="#">For Sale</a></li>
                      @endif
										</ul>
									</div>
									<div class="thmb_cntnt style3">
										<a class="fp_price" href="#">${{ $property->price }}<small>/mo</small></a>
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
											<li class="list-inline-item"><a href="#"><img src="../uploads/{{ DB::table('users')->where('id', $property->user_id)->value('avatar') }}" style="width: 40px; border-radius: 50px" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="#">{{ DB::table('users')->where('id', $property->user_id)->value('name') }}</a></li>
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

					</div>
				</div>
			</div>
		</div>
	</section>

@endsection