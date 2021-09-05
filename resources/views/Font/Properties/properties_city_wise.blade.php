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

				</div>
			</div>
		</div>
	</div>
</section>
@endsection