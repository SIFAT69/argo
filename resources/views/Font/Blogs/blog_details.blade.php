@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
  {{ $blog->title }}
@endsection
@section('content')
@php
  $author = DB::table('users')->where('id', $blog->posted_by)->first();

  $RecomBlogsOne = DB::table('blogs')->limit(1)->inRandomOrder()->first();
  $RecomBlogsTwo = DB::table('blogs')->limit(1)->inRandomOrder()->first();
@endphp
  <section class="blog_post_container bgc-f7 pb30">
		<div class="container">
			<div class="row">
				<div class="col-xl-6">
					<div class="breadcrumb_content style2">
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="{!! route('welcome') !!}">Home</a></li>
						    <li class="breadcrumb-item active text-thm" aria-current="page">Blog – {{ $blog->title }}</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<div class="main_blog_post_content">
						<div class="mbp_thumb_post">
							<h3 class="blog_sp_title">{{ $blog->title }}</h3>
							<ul class="blog_sp_post_meta">
								<li class="list-inline-item"><a href="#"><img src="../uploads/{{ $author->avatar }}" style="width: 40px; border-radius: 50px" alt="pposter1.png"></a></li>
								<li class="list-inline-item"><a href="#">{{ $author->name }}</a></li>
								<li class="list-inline-item"><span class="flaticon-calendar"></span></li>
								<li class="list-inline-item"><a href="#">{{ Carbon\Carbon::parse($blog->created_at)->format('M-d-Y') }}</a></li>
								<li class="list-inline-item"><span class="flaticon-view"></span></li>
								<li class="list-inline-item"><a href="#"> {{ $countViews }} views</a></li>
							</ul>
							<div class="thumb">
								<img class="img-fluid" src="../uploads/{{ $blog->meta_image }}" alt="bs1.jpg">
							</div>
							<div class="details">
								{!! $blog->description !!}
							</div>
						</div>
						<div class="mbp_pagination_tab">
							<div class="row">
								<div class="col-sm-6 col-lg-6">
									<div class="pag_prev">
										<a href="{!! route('blog_details', $RecomBlogsOne->slug) !!}"><span class="flaticon-back"></span></a>
										<div class="detls"><h5>Previous Post</h5> <p> {{ $RecomBlogsOne->title }}</p></div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-6">
									<div class="pag_next text-right">
										<a href="{!! route('blog_details', $RecomBlogsTwo->slug) !!}"><span class="flaticon-next"></span></a>
										<div class="detls"><h5>Next Post</h5> <p> {{ $RecomBlogsTwo->title }}</p></div>
									</div>
								</div>
							</div>
						</div>
					</div>
          @include('Font.Blogs.similar_blogs')
				</div>
        @include('Font.right')
			</div>
		</div>
	</section>
@endsection
