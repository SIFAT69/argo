@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
  Blogs
@endsection
@section('content')

  	<!-- Main Blog Post Content -->
  	<section class="blog_post_container bgc-f7">
  		<div class="container">
  			<div class="row">
  				<div class="col-xl-6">
  					<div class="breadcrumb_content style2">
  						<ol class="breadcrumb">
  						    <li class="breadcrumb-item"><a href="#">Home</a></li>
  						    <li class="breadcrumb-item active text-thm" aria-current="page">Simple Listing – Grid View</li>
  						</ol>
  						<h2 class="breadcrumb_title">Blog</h2>
  					</div>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-lg-8">
  					<div class="main_blog_post_content">
              @forelse ($blogs as $blog)
                <div class="for_blog feat_property">
  							<div class="thumb">
  								<img class="img-whp" src="../uploads/{{ $blog->meta_image }}" alt="7.jpg">
  							</div>
  							<div class="details">
  								<div class="tc_content">
  									<h4 class="mb15">{{ $blog->title }}</h4>
  									<p>{{ $blog->meta_desc }}</p>
  								</div>
  								<div class="fp_footer">
  									<ul class="fp_meta float-left mb0">
                      @php
                        $author = DB::table('users')->where('id', $blog->posted_by)->first();
                      @endphp
  										<li class="list-inline-item"><a href="#"><img src="../uploads/{{ $author->avatar }}" alt="pposter1.png" style="width: 40px; border-radius: 50px"></a></li>
  										<li class="list-inline-item"><a href="#">{{ $author->name }}</a></li>
  										<li class="list-inline-item"><a href="#"><span class="flaticon-calendar pr10"></span>{{ Carbon\Carbon::parse($blog->created_at)->format('M-d-Y') }}</a></li>
  									</ul>
  									<a class="fp_pdate float-right text-thm" href="#">Read More <span class="flaticon-next"></span></a>
  								</div>
  							</div>
  						</div>
              @empty
                <p>No blogs found!</p>
              @endforelse
  						<div class="row">
  							<div class="col-lg-12">
  								<div class="mbp_pagination mt20">
  									<ul class="page_navigation">
  									    <li class="page-item disabled">
  									    	<a class="page-link" href="{{ $blogs->nextPageUrl() }}" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
  									    </li>
  									    <li class="page-item">
  									    	<a class="page-link" href="{{ $blogs->previousPageUrl() }}"><span class="flaticon-right-arrow"></span></a>
  									    </li>
  									</ul>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  				<div class="col-lg-4 col-xl-4">
  					<div class="sidebar_search_widget">
  						<div class="blog_search_widget">
  							<div class="input-group">
  								<input type="text" class="form-control" placeholder="Search Here" aria-label="Recipient's username" aria-describedby="button-addon2">
  								<div class="input-group-append">
  							    	<button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-magnifying-glass"></span></button>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="terms_condition_widget">
  						<h4 class="title">Categories Property</h4>
  						<div class="widget_list">
  							<ul class="list_details">
                  @foreach ($categories as $category)
  								<li><a href="#"><i class="fa fa-caret-right mr10"></i>{{ $category->name }} <span class="float-right">{{ DB::table('properties')->where('category', $category->name)->count() }} properties</span></a></li>
                  @endforeach
  							</ul>
  						</div>
  					</div>
  					<div class="sidebar_feature_listing">
  						<h4 class="title">Featured Listings</h4>
              @forelse ($is_featured_properties as $featured_properties)
                <div class="media">
  							<img class="align-self-start mr-3" src="../uploads/{{ $featured_properties->youtube_thumb }}" style="width: 90px; height: 80px" alt="fls1.jpg">
  							<div class="media-body">
  						    	<h5 class="mt-0 post_title">{{ $featured_properties->title }}</h5>
  						    	<a href="#">${{ $featured_properties->price }}</a>
  						    	<ul class="mb0">
  						    		<li class="list-inline-item">Beds: {{ $featured_properties->flat_beds }}</li>,
  						    		<li class="list-inline-item">Baths: {{ $featured_properties->flat_baths }}</li>,
  						    		<li class="list-inline-item">m<sup>2</sup>: {{ $featured_properties->size }}</li>
  						    	</ul>
  							</div>
  						</div>
              @empty
                <div class="media">
  							<div class="media-body">
  						    	<h5 class="mt-0 post_title">No featured properties found!</h5>
  							</div>
  						</div>
              @endforelse
  					</div>

  				</div>
  			</div>
  		</div>
  	</section>

@endsection
