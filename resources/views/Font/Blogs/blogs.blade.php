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
  						<div class="for_blog feat_property">
  							<div class="thumb">
  								<img class="img-whp" src="{!! asset('FontAsset') !!}/images/blog/7.jpg" alt="7.jpg">
  								<div class="blog_tag">Construction</div>
  							</div>
  							<div class="details">
  								<div class="tc_content">
  									<h4 class="mb15">Redfin Ranks the Most Competitive Neighborhoods of 2020</h4>
  									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin. Donec non odio neque. Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh
  									facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>
  								</div>
  								<div class="fp_footer">
  									<ul class="fp_meta float-left mb0">
  										<li class="list-inline-item"><a href="#"><img src="{!! asset('FontAsset') !!}/images/property/pposter1.png" alt="pposter1.png"></a></li>
  										<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
  										<li class="list-inline-item"><a href="#"><span class="flaticon-calendar pr10"></span> January 16, 2020</a></li>
  									</ul>
  									<a class="fp_pdate float-right text-thm" href="#">Read More <span class="flaticon-next"></span></a>
  								</div>
  							</div>
  						</div>
  						<div class="for_blog feat_property">
  							<div class="thumb">
  								<img class="img-whp" src="{!! asset('FontAsset') !!}/images/blog/8.jpg" alt="8.jpg">
  								<div class="blog_tag">Construction</div>
  							</div>
  							<div class="details">
  								<div class="tc_content">
  									<h4 class="mb15">Redfin Ranks the Most Competitive Neighborhoods of 2020</h4>
  									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin. Donec non odio neque. Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh
  									facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>
  								</div>
  								<div class="fp_footer">
  									<ul class="fp_meta float-left mb0">
  										<li class="list-inline-item"><a href="#"><img src="{!! asset('FontAsset') !!}/images/property/pposter1.png" alt="pposter1.png"></a></li>
  										<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
  										<li class="list-inline-item"><a href="#"><span class="flaticon-calendar pr10"></span> January 16, 2020</a></li>
  									</ul>
  									<a class="fp_pdate float-right text-thm" href="#">Read More <span class="flaticon-next"></span></a>
  								</div>
  							</div>
  						</div>
  						<div class="for_blog feat_property">
  							<div class="thumb">
  								<img class="img-whp" src="{!! asset('FontAsset') !!}/images/blog/9.jpg" alt="9.jpg">
  								<div class="blog_tag">Construction</div>
  							</div>
  							<div class="details">
  								<div class="tc_content">
  									<h4 class="mb15">Redfin Ranks the Most Competitive Neighborhoods of 2020</h4>
  									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin. Donec non odio neque. Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh
  									facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>
  								</div>
  								<div class="fp_footer">
  									<ul class="fp_meta float-left mb0">
  										<li class="list-inline-item"><a href="#"><img src="{!! asset('FontAsset') !!}/images/property/pposter1.png" alt="pposter1.png"></a></li>
  										<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
  										<li class="list-inline-item"><a href="#"><span class="flaticon-calendar pr10"></span> January 16, 2020</a></li>
  									</ul>
  									<a class="fp_pdate float-right text-thm" href="#">Read More <span class="flaticon-next"></span></a>
  								</div>
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-lg-12">
  								<div class="mbp_pagination mt20">
  									<ul class="page_navigation">
  									    <li class="page-item disabled">
  									    	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
  									    </li>
  									    <li class="page-item"><a class="page-link" href="#">1</a></li>
  									    <li class="page-item active" aria-current="page">
  									    	<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
  									    </li>
  									    <li class="page-item"><a class="page-link" href="#">3</a></li>
  									    <li class="page-item"><a class="page-link" href="#">...</a></li>
  									    <li class="page-item"><a class="page-link" href="#">29</a></li>
  									    <li class="page-item">
  									    	<a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>
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
  								<li><a href="#"><i class="fa fa-caret-right mr10"></i>Apartment <span class="float-right">6 properties</span></a></li>
  								<li><a href="#"><i class="fa fa-caret-right mr10"></i>Condo <span class="float-right">12 properties</span></a></li>
  								<li><a href="#"><i class="fa fa-caret-right mr10"></i>Family House <span class="float-right">8 properties</span></a></li>
  								<li><a href="#"><i class="fa fa-caret-right mr10"></i>Modern Villa <span class="float-right">26 properties</span></a></li>
  								<li><a href="#"><i class="fa fa-caret-right mr10"></i>Town House <span class="float-right">89 properties</span></a></li>
  							</ul>
  						</div>
  					</div>
  					<div class="sidebar_feature_listing">
  						<h4 class="title">Featured Listings</h4>
  						<div class="media">
  							<img class="align-self-start mr-3" src="{!! asset('FontAsset') !!}/images/blog/fls1.jpg" alt="fls1.jpg">
  							<div class="media-body">
  						    	<h5 class="mt-0 post_title">Nice Room With View</h5>
  						    	<a href="#">$13,000/<small>/mo</small></a>
  						    	<ul class="mb0">
  						    		<li class="list-inline-item">Beds: 4</li>
  						    		<li class="list-inline-item">Baths: 2</li>
  						    		<li class="list-inline-item">Sq Ft: 5280</li>
  						    	</ul>
  							</div>
  						</div>
  						<div class="media">
  							<img class="align-self-start mr-3" src="{!! asset('FontAsset') !!}/images/blog/fls2.jpg" alt="fls2.jpg">
  							<div class="media-body">
  						    	<h5 class="mt-0 post_title">Villa called Archangel</h5>
  						    	<a href="#">$13,000<small>/mo</small></a>
  						    	<ul class="mb0">
  						    		<li class="list-inline-item">Beds: 4</li>
  						    		<li class="list-inline-item">Baths: 2</li>
  						    		<li class="list-inline-item">Sq Ft: 5280</li>
  						    	</ul>
  							</div>
  						</div>
  						<div class="media">
  							<img class="align-self-start mr-3" src="{!! asset('FontAsset') !!}/images/blog/fls3.jpg" alt="fls3.jpg">
  							<div class="media-body">
  						    	<h5 class="mt-0 post_title">Sunset Studio</h5>
  						    	<a href="#">$13,000<small>/mo</small></a>
  						    	<ul class="mb0">
  						    		<li class="list-inline-item">Beds: 4</li>
  						    		<li class="list-inline-item">Baths: 2</li>
  						    		<li class="list-inline-item">Sq Ft: 5280</li>
  						    	</ul>
  							</div>
  						</div>
  					</div>
  					<div class="blog_tag_widget">
  						<h4 class="title">Tags</h4>
  						<ul class="tag_list">
  							<li class="list-inline-item"><a href="#">Apartment</a></li>
  							<li class="list-inline-item"><a href="#">Real Estate</a></li>
  							<li class="list-inline-item"><a href="#">Estate</a></li>
  							<li class="list-inline-item"><a href="#">Luxury</a></li>
  							<li class="list-inline-item"><a href="#">Real</a></li>
  						</ul>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>

@endsection
