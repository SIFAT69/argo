@php
$categories = DB::table('realstatecategories')->get();
$is_featured_properties = DB::table('properties')->where('is_featured', 'yes')->limit(5)->inRandomOrder()->get();
@endphp

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
        <a href="{!! route('properties_view', $featured_properties->slug) !!}">
          <h5 class="mt-0 post_title">{{ $featured_properties->title }}</h5>
        </a>
          <a href="{!! route('properties_view', $featured_properties->slug) !!}">${{ $featured_properties->price }}</a>
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
