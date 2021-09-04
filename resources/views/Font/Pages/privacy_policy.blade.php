@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
  Privacy Policy
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
              <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
          </ol>
          <h4 class="breadcrumb_title">Privacy Policy</h4>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Our Terms & Conditions -->
<section class="our-terms bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="terms_condition_grid">
                    {!! $description !!}
                </div>
            </div>
        </div>
    </div>
</section>

@include('Font.footer_reg')

@endsection
