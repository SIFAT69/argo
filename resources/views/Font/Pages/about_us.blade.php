@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
  About Us
@endsection
@section('content')


<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
  <div class="container">
    <div class="row">
      <div class="col-xl-6">
        <div class="breadcrumb_content">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">About Us</li>
          </ol>
          <h4 class="breadcrumb_title">About Us</h4>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- About Text Content -->
<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2 class="mt0">Know What We Are</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="about_content">
                    {!! $discription !!}
                </div>
            </div>
        </div>
        <div class="row mt50">
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
                    <div class="why_chose_us style2">
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
<hr>

<!-- Our Testimonials -->
<section class="our-testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center mb20">
                    <h2>Testimonials</h2>
                    <p>What People think about us</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="testimonial_grid_slider style2">
                    @foreach($testimonials as $testimonial)
                        <div class="item">
                            <div class="testimonial_grid style2">
                                <div class="thumb">
                                    @if($testimonial->avatar)
                                        <img src="/uploads/{{ $testimonial->avatar }}" alt="commenter image">
                                    @else
                                        <img src="/uploads/avatar.png" alt="commenter image">
                                    @endif
                                    <div class="tg_quote"><span class="fa fa-quote-left"></span></div>
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
            <div class="col-sm-6 col-md-4 col-lg">
                <div class="our_partner">
                    <img class="img-fluid" src="images/partners/5.png" alt="5.png">
                </div>
            </div>
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

@include('Font.footer_reg')

@endsection
