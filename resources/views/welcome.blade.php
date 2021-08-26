@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
  Home
@endsection

@section('content')

<!-- Home Design -->
<section class="home-one home1-overlay home1_bgi1">
    <div class="container">
        <div class="row posr">
            <div class="col-lg-12">
                <div class="home_content">
                    <div class="home-text text-center">
                        <h2 class="fz55">Find Your Dream Home</h2>
                        <p class="fz18 color-white">From as low as $10 per day with limited time offer discounts.</p>
                    </div>
                    <div class="home_adv_srch_opt">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active p-type" value="Sale" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Buy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-type" value="Rent" id="pills-profile-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-profile" aria-selected="false">Rent</a>
                            </li>
                        </ul>
                        <div class="tab-content home1_adsrchfrm" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="home1-advnc-search">
                                    <form action="{{ route('properties_search') }}" method="GET">
                                        <div>
                                            <input type="hidden" name="type" value="Sale" id="input-type">
                                        </div>
                                        <ul class="h1ads_1st_list mb0">
                                            <li class="list-inline-item">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="keyword" placeholder="Enter keyword...">
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="search_option_two">
                                                    <div class="candidate_revew_select">
                                                        <select class="selectpicker w100 show-tick" name="category">
                                                            <option value="">Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category }}">{{ $category }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="location" id="exampleInputEmail" placeholder="Location">
                                                    <label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="small_dropdown2">
                                                    <div id="prncgs" class="btn dd_btn">
                                                        <span>Price</span>
                                                        <label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
                                                    </div>
                                                    <div class="dd_content2">
                                                        <div class="pricing_acontent">
                                                            {{-- <input type="text" class="amount" placeholder="$52,239">
                                                                <input type="text" class="amount2" placeholder="$985,14">
                                                                <div class="slider-range"></div> --}}
                                                            <span id="slider-range-value1"></span>
                                                            <span id="slider-range-value2"></span>
                                                            <div id="slider"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="custome_fields_520 list-inline-item">
                                                <div class="navbered">
                                                    <div class="mega-dropdown">
                                                        <span id="show_advbtn" class="dropbtn">Advanced <i class="flaticon-more pl10 flr-520"></i></span>
                                                        <div class="dropdown-content">
                                                            <div class="row p15">
                                                                <div class="col-lg-12">
                                                                    <h4 class="text-thm3">Amenities</h4>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        @foreach($features as $feature)
                                                                            <div class="col-sm-6 col-md-4 col-lg-3">
                                                                                <ul class="ui_kit_checkbox selectable-list">
                                                                                    <li>
                                                                                        <div class="custom-control custom-checkbox">
                                                                                            <input type="checkbox" class="custom-control-input" id="customCheck1-{{ $feature }}" value="{{ $feature }}" name="features[]">
                                                                                            <label class="custom-control-label" for="customCheck1-{{ $feature }}">{{ $feature }}</label>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row p15 pt0-xsd">
                                                                <div class="col-lg-11 col-xl-10">
                                                                    <ul class="apeartment_area_list mb0">
                                                                        <li class="list-inline-item">
                                                                            <div class="candidate_revew_select">
                                                                                <select class="selectpicker w100 show-tick" name="bedrooms">
                                                                                    <option value="">Bedrooms</option>
                                                                                    @foreach($bedrooms as $bedroom)
                                                                                        <option value="{{ $bedroom }}">{{ $bedroom }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <div class="candidate_revew_select">
                                                                                <select class="selectpicker w100 show-tick" name="bathrooms">
                                                                                    <option value="">Bathrooms</option>
                                                                                    @foreach($bathrooms as $bathroom)
                                                                                        <option value="{{ $bathroom }}">{{ $bathroom }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <div class="candidate_revew_select">
                                                                                <select class="selectpicker w100 show-tick" name="floors">
                                                                                    <option value="">Floors</option>
                                                                                    @foreach($floors as $floor)
                                                                                        <option value="{{ $floor }}">{{ $floor }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-1 col-xl-2">
                                                                    <div class="mega_dropdown_content_closer">
                                                                        <h5 class="text-thm text-right mt15"><span id="hide_advbtn" class="curp">Hide</span></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="search_option_button">
                                                    <button type="submit" class="btn btn-thm">Search</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature Properties -->
<section id="feature-property" class="feature-property bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="#feature-property">
                    <div class="mouse_scroll">
                        <div class="icon">
                            <h4>Scroll Down</h4>
                            <p>to discover more</p>
                        </div>
                        <div class="thumb">
                            <img src="{!! asset('FontAsset') !!}/images/resource/mouse.png" alt="mouse.png">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="container ovh">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center mb40">
                    <h2>Featured Properties</h2>
                    <p>Handpicked properties by our team.</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="feature_property_slider">

                    @foreach($featuredProperties as $featuredProperty)
                        <div class="item">
                            <div class="feat_property">
                                <div class="thumb">
                                    <img class="img-whp" src="../uploads/{{ $featuredProperty->youtube_thumb }}" alt="property image">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            @if($featuredProperty->type == 'Rent')
                                                <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            @else
                                                <li class="list-inline-item"><a href="#">For Sale</a></li>
                                            @endif
                                            <li class="list-inline-item"><a href="#">Featured</a></li>
                                        </ul>
                                        <ul class="icon mb0">
                                            <li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
                                            <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                                        </ul>
                                        @if($featuredProperty->type == 'Rent')
                                            <a class="fp_price" href="#">${{ $featuredProperty->price }}<small>/mo</small></a>
                                        @else
                                            <a class="fp_price" href="#">${{ $featuredProperty->price }}</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p class="text-thm">{{ $featuredProperty->categroy }}</p>
                                        <h4><a href="{{ route('properties_view', $featuredProperty->slug) }}">{{ $featuredProperty->title }}</a></h4>
                                        <p><span class="flaticon-placeholder"></span> {{ $featuredProperty->city }}, {{ $featuredProperty->states }}, {{ $featuredProperty->location }}</p>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: {{ $featuredProperty->flat_beds }}</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: {{ $featuredProperty->flat_baths }}</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: {{ $featuredProperty->size }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="fp_footer">
                                        <ul class="fp_meta float-left mb0">
                                            <li class="list-inline-item"><a href="{{ route('agenency_details', $featuredProperty->user_id) }}"><img src="../uploads/{{ $featuredProperty->user_avatar }}" alt="owner image" style="width: 40px; border-radius: 50px"></a></li>
                                            <li class="list-inline-item"><a href="{{ route('agenency_details', $featuredProperty->user_id) }}">{{ $featuredProperty->user_name }}</a></li>
                                        </ul>
                                        <div class="fp_pdate float-right">{{ $featuredProperty->time }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Property Cities -->
<section id="property-city" class="property-city pb30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>Find Properties in These Cities</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($cities as $city)
                @if($loop->iteration == 1 || $loop->iteration == 4)
                    <div class="col-lg-4 col-xl-4">
                @else
                    <div class="col-lg-8 col-xl-8">
                @endif                   
                        <a href="{{ route('properties_city_wise', $city->name) }}">
                            <div class="properti_city">
                                <div class="thumb"><img class="img-fluid w100" src="{!! asset('FontAsset') !!}/images/property/pc{{ $loop->iteration}}.jpg" alt="city image"></div>
                                <div class="overlay">
                                    <div class="details">
                                        <h4>{{ $city->name }}</h4>
                                        <p>{{ $city->quantity }}</p>
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>               
            @endforeach
        </div>
    </div>
</section>

<!-- Why Chose Us -->
<section id="why-chose" class="whychose_us bgc-f7 pb30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>Why Choose Us</h2>
                    <p>We provide full service at every step.</p>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($choices as $choice)
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="why_chose_us">
                        <div class="icon">
                            <span class="{{ $choice->icon }}"></span>
                        </div>
                        <div class="details">
                            <h4>{{ $choice->title }}</h4>
                            <p>{{ $choice->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<!-- Our Testimonials -->
<section id="our-testimonials" class="our-testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2 class="color-white">Testimonials</h2>
                    <p class="color-white">Here could be a nice sub title</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="testimonial_grid_slider">

                    @foreach($testimonials as $testimonial)
                        <div class="item">
                            <div class="testimonial_grid">
                                <div class="thumb">
                                    @if($testimonial->avatar)
                                        <img src="/uploads/{{ $testimonial->avatar }}" alt="commenter image">
                                    @else
                                        <img src="/uploads/avatar.png" alt="commenter image">
                                    @endif                      
                                </div>
                                <div class="details">
                                    <h4>{{ $testimonial->user_name }}</h4>
                                    <p>{{ $testimonial->position }}</p>
                                    <p class="mt25">{{ $testimonial->comment }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Blog -->
<section class="our-blog bgc-f7 pb30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>Articles & Tips</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="for_blog feat_property">
                        <div class="thumb">
                            <img class="img-whp" src="{{ asset('/uploads/' . $blog->meta_image) }}" alt="blog image">
                        </div>
                        <div class="details">
                            <div class="tc_content">
                                <p class="text-thm">{{ $blog->category }}</p>
                                <h4><a href="{{ route('blog_details', $blog->slug) }}">{{ $blog->title }}</a></h4>
                            </div>
                            <div class="fp_footer">
                                <ul class="fp_meta float-left mb0">
                                    <li class="list-inline-item"><a href="{{ route('agenency_details', $blog->posted_by) }}"><img src="{{ asset('/uploads/' . $blog->poster_avatar) }}" style="width:50px; border-radius:50px" alt="poster image"></a></li>
                                    <li class="list-inline-item"><a href="{{ route('agenency_details', $blog->posted_by) }}">{{ $blog->poster_name }}</a></li>
                                </ul>
                                <a class="fp_pdate float-right" href="#">{{ $blog->time }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Our Partners -->
<section id="our-partners" class="our-partners">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>Our Partners</h2>
                    <p>We only work with the best companies around the globe</p>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($partners as $partner)
                <div class="col-sm-6 col-md-4 col-lg">
                    <div class="our_partner">
                        <img class="img-fluid" src="{{ asset('/uploads/' . $partner->image) }}" alt="partner image">
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<!-- Start Partners -->
<section class="start-partners bgc-thm pt50 pb50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="start_partner tac-smd">
                    <h2>Become a Real Estate Agent</h2>
                    <p>We only work with the best companies around the globe</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="parner_reg_btn text-right tac-smd">
                    <a class="btn btn-thm2" href="#">Register Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Footer -->
<section class="footer_one">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pr0 pl0">
                <div class="footer_about_widget">
                    <h4>About Site</h4>
                    <p>We’re reimagining how you buy, sell and rent. It’s now easier to get into a place you love. So let’s do this, together.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_qlink_widget">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">User’s Guide</a></li>
                        <li><a href="#">Support Center</a></li>
                        <li><a href="#">Press Info</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_contact_widget">
                    <h4>Contact Us</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">info<blade findhouse.com</a>
                        </li> />
                        <li><a href="#">Collins Street West, Victoria</a></li>
                        <li><a href="#">8007, Australia.</a></li>
                        <li><a href="#">+1 246-345-0699</a></li>
                        <li><a href="#">+1 246-345-0695</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_social_widget">
                    <h4>Follow us</h4>
                    <ul class="mb30">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                    </ul>
                    <h4>Subscribe</h4>
                    <form class="footer_mailchimp_form">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <input type="email" class="form-control mb-2" id="inlineFormInput" placeholder="Your email">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


@section('script_in_body')
<script>
    $(document).ready(function(){
        $('.p-type').click(function(){
            let type = $(this).attr('value');
            $('#input-type').attr('value', type);
        });
    });
</script>
@endsection
