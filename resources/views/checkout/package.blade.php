@extends('layouts.Apps')
@section('page_title')
  Agent Packages
@endsection
@section('content')
  <!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
  <div class="container">
    <div class="row">
      <div class="col-xl-6">
        <div class="breadcrumb_content">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Membership</li>
          </ol>
          <h1 class="breadcrumb_title">Membership</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Service Section Area -->
<section class="our-service pb30">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="main-title text-center">
          <h2>Choose Your Perfect Plan From Us</h2>
          <p>We provide full service at every step</p>
        </div>
      </div>
    </div>
    <div class="row">
      @forelse ($plans as $package)
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="pricing_table">
          <div class="pricing_header">
            <div class="price">${{ $package->cost }} per @if($package->description == "Monthly") Month @elseif ($package->description == "Yearly") Year @endif</div>
            <h4>{{ $package->name }}</h4>
          </div>
          <div class="pricing_content">
            <form class="" action="{!! route('package_payment') !!}" method="post">
              @csrf
              <input type="hidden" name="package_id" value="{{ $package->id }}">
              <input type="hidden" name="package_price" value="{{ $package->cost }}">
            <ul class="mb0">
            </ul>
          </div>
          <div class="pricing_footer">
            <a class="btn pricing_btn btn-block" href="{{ route('plans.show', $package->slug) }}">Select Package</a>
          </div>
        </form>
        </div>
      </div>
      @empty
        <div class="col-sm-6 col-md-6 col-lg-6 m-auto">
          <div class="pricing_table">
            <div class="pricing_header">
              <div class="price"></div>
              <h4>No Package Available</h4>
            </div>
            <div class="pricing_footer">
              <a class="btn pricing_btn btn-block" href="{!! route('contact') !!}">Contact Us</a>
            </div>
          </div>
        </div>
      @endforelse
    </div>
  </div>
</section>
@endsection
