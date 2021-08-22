@php
$categories = DB::table('realstatecategories')->get();
$is_featured_properties = DB::table('properties')->where('is_featured', 'yes')->limit(5)->inRandomOrder()->get();
@endphp

<div class="col-lg-4 col-xl-4">
  <div class="sidebar_listing_grid1 dn-991">
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
    <div class="terms_condition_widget">
      <h4 class="title">Featured Properties</h4>
      <div class="sidebar_feature_property_slider">
        @forelse ($is_featured_properties as $is_featured)
        <div class="item">
          <div class="feat_property home7 agent">
            <div class="thumb">
              <img class="img-whp" src="../uploads/{{ $is_featured->youtube_thumb }}" alt="fp2.jpg">
              <div class="thmb_cntnt">
                <a class="fp_price" href="#">${{ $is_featured->price }}</a>
                <h4 class="posr color-white">{{ $is_featured->title }}</h4>
              </div>
            </div>
          </div>
        </div>
        @empty
          <p>No featured properties found!</p>
        @endforelse
      </div>
    </div>

  </div>
</div>
