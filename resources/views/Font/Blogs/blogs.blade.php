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
  						    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
  						    <li class="breadcrumb-item active text-thm" aria-current="page">Blogs</li>
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
  										<li class="list-inline-item"><a href="{!! route('agenency_details', $blog->posted_by) !!}"><img src="../uploads/{{ $author->avatar }}" alt="pposter1.png" style="width: 40px; border-radius: 50px"></a></li>
  										<li class="list-inline-item"><a href="{!! route('agenency_details', $blog->posted_by) !!}">{{ $author->name }}</a></li>
  										<li class="list-inline-item"><a href="#"><span class="flaticon-calendar pr10"></span>{{ Carbon\Carbon::parse($blog->created_at)->format('M-d-Y') }}</a></li>
  									</ul>
  									<a class="fp_pdate float-right text-thm" href="{!! route('blog_details', $blog->slug) !!}">Read More <span class="flaticon-next"></span></a>
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
  									    <li class="page-item">
  									    	<a class="page-link" href="{{ $blogs->previousPageUrl() }}" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
  									    </li>
  									    <li class="page-item">
  									    	<a class="page-link" href="{{ $blogs->nextPageUrl() }}"><span class="flaticon-right-arrow"></span></a>
  									    </li>
  									</ul>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  				@include('Font.right')
  			</div>
  		</div>
  	</section>

@endsection
