@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
  Agencies
@endsection
@section('content')
<!-- Agent Listing Grid View -->
<section class="our-agent-listing bgc-f7 pb30-991">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="breadcrumb_content style2 mb0-991">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
              <li class="breadcrumb-item active text-thm" aria-current="page">Agencies</li>
          </ol>
          <h2 class="breadcrumb_title">Our Agencies</h2>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="listing_list_style tal-991">

        </div>
      </div>
    </div>
    <div class="row">
      @include('Font.left_featured_properties')
      <div class="col-md-12 col-lg-8">
        <div class="row">

          @forelse ($agents as $agency)
          <div class="col-lg-12">
            <div class="feat_property list agency">
              <div class="thumb">
                <img class="img-whp" src="../uploads/{{ $agency->avatar }}" alt="1.jpg">
                <div class="thmb_cntnt">
                  <ul class="tag mb0">
                    <li class="list-inline-item dn"></li>
                    <li class="list-inline-item"><a href="#">{{ DB::table('properties')->where('user_id', $agency->id)->count() }} Listings</a></li>
                  </ul>
                </div>
              </div>
              <div class="details">
                <div class="tc_content">
                  <h4>{{ $agency->name }}</h4>
                  <p class="text-thm">Agent</p>
                  <ul class="prop_details mb0">
                    <li><a href="#">Email: {{ $agency->email }}</a></li>
                  </ul>
                </div>
                <div class="fp_footer">
                  <a href="{!! route('agenency_details', $agency->id) !!}">
                  <div class="fp_pdate float-right text-thm">View My Listings <i class="fa fa-angle-right"></i></div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          @empty
            <p>No agent found!</p>
          @endforelse


          <div class="col-lg-12 mt20">
            <div class="mbp_pagination">
              <ul class="page_navigation">
                  <li class="page-item">
                    <a class="page-link" href="{{ $agents->previousPageUrl() }}"> <span class="flaticon-left-arrow"></span></a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="{{ $agents->nextPageUrl() }}"><span class="flaticon-right-arrow"></span></a>
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
