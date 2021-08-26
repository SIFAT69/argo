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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active text-thm" aria-current="page">Simple Listing – Grid View</li>
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
          <div class="grid_list_search_result style2">
            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
              <div class="left_area">
                <p>{{ $agents->perPage() }} Search results</p>
              </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
              <div class="right_area style2 text-right">
                <ul>
                  <li class="list-inline-item"><span class="shrtby">Sort by:</span>
                    <select class="selectpicker show-tick">
                      <option>Featured First</option>
                      <option>Featured 2nd</option>
                      <option>Featured 3rd</option>
                      <option>Featured 4th</option>
                      <option>Featured 5th</option>
                    </select>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
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
