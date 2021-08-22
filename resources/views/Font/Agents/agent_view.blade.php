@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
Agencies - {{ $agents->name }}
@endsection
@section('content')


@php
$categories = DB::table('realstatecategories')->get();
$is_featured_properties = DB::table('properties')->where('is_featured', 'yes')->limit(5)->inRandomOrder()->get();
$myProperties = DB::table('properties')->where('user_id', $agents->id)->get();
@endphp

<!-- Agent Single Grid View -->
<section class="our-agent-single bgc-f7 pb30-991">
    <div class="container">
      @include('Alerts.success')
      @include('Alerts.danger')
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb_content style2 mt30-767 mb30-767">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active text-thm" aria-current="page">Agencies</li>
                            </ol>
                            <h2 class="breadcrumb_title">{{ $agents->name }}</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="feat_property list style2 agent">
                            <div class="thumb">
                                <img class="img-whp" src="../uploads/{{ $agents->avatar }}" alt="11.jpg">
                                <div class="thmb_cntnt">
                                    <ul class="tag mb0">
                                        <li class="list-inline-item dn"></li>
                                        <li class="list-inline-item"><a href="#">{{ DB::table('properties')->where('user_id', $agents->id)->count() }} Listings</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="details">
                                <div class="tc_content">
                                    <h4>Christopher Pakulla</h4>
                                    <p class="text-thm">Agent</p>
                                    <ul class="prop_details mb0">
                                        <li><a href="#">Address: Dhaka, Bangladesh</a></li>
                                        <li><a href="#">Mobile: 891 456 9874</a></li>
                                        <li><a href="#">Email: {{ $agents->email }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="shop_single_tab_content style2 mt30">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="listing-tab" data-toggle="tab" href="#listing" role="tab" aria-controls="listing" aria-selected="false">Listing</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="product_single_content">
                                        <div class="mbp_pagination_comments">
                                            <div class="mbp_first media">
                                                <div class="media-body">
                                                    <p class="mb25">Evans Tower very high demand corner junior one bedroom plus a large balcony boasting full open NYC views. You need to see the views to believe them. Mint condition with new hardwood
                                                        floors. Lots of closets plus washer and dryer.</p>
                                                    <p class="mt10 mb0">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2
                                                        bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room.
                                                        The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade row pl15 pl0-1199 pr15 pr0-1199" id="listing" role="tabpanel" aria-labelledby="listing-tab">
                                  @forelse ($myProperties as $myProperty)
                                    <div class="col-lg-12">
                                        <div class="feat_property list style2 hvr-bxshd bdrrn mb10 mt20">
                                            <div class="thumb">
                                                <img class="img-whp" src="../uploads/{{ $myProperty->youtube_thumb }}" alt="fp1.jpg">
                                            </div>
                                            <div class="details">
                                                <div class="tc_content">
                                                    <div class="dtls_headr">
                                                        <a class="fp_price" href="#">${{ $myProperty->price }}</a>
                                                    </div>
                                                    <p class="text-thm">{{ $myProperty->category }}</p>
                                                    <h4>{{ $myProperty->title }}</h4>
                                                    <p><span class="flaticon-placeholder"></span> {{ $myProperty->city }}, {{ $myProperty->states }}, {{ $myProperty->location }}</p>
                                                    <ul class="prop_details mb0">
                                                        <li class="list-inline-item"><a href="#">Beds: {{ $myProperty->flat_beds }}</a></li>
                                                        <li class="list-inline-item"><a href="#">Baths: {{ $myProperty->flat_baths }}</a></li>
                                                        <li class="list-inline-item"><a href="#"> m<sup>2</sup>: {{ $myProperty->size }}</a></li>
                                                    </ul>
                                                </div>
                                                <div class="fp_footer">
                                                    <ul class="fp_meta float-left mb0">
                                                        <li class="list-inline-item"><a href="#"><img src="../uploads/{{ $agents->avatar }}" style="width:50px; border-radius:50px" alt="pposter1.png"></a></li>
                                                        <li class="list-inline-item"><a href="#">{{ $agents->name }}</a></li>
                                                    </ul>
                                                    <div class="fp_pdate float-right">{{ Carbon\Carbon::parse($myProperty->created_at)->diffForHumans() }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  @empty
                                    <div class="col-lg-12">
                                        <div class="feat_property list style2 hvr-bxshd bdrrn mb10 mt20">
                                            <div class="details">
                                                <div class="tc_content">
                                                    <p class="text-thm">No properties found!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  @endforelse
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">

                <div class="sidebar_listing_grid1">
                    <div class="sidebar_listing_list">
                        <div class="sidebar_advanced_search_widget">
                            <h4 class="mb25">Contact {{ $agents->name }}</h4>
                            <form action="{!! route('agenency_message') !!}" method="post">
                              @csrf
                              <input type="hidden" name="to_id" value="{{ $agents->id }}">
                            <ul class="sasw_list mb0">
                                <li class="search_area">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Your Name">
                                    </div>
                                </li>
                                <li class="search_area">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="phoneNumber" id="exampleInputName2" placeholder="Phone">
                                    </div>
                                </li>
                                <li class="search_area">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Email">
                                    </div>
                                </li>
                                <li class="search_area">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-control required" rows="5" required="required" placeholder="Your Message"></textarea>
                                    </div>
                                </li>
                                <li>
                                    <div class="search_option_button">
                                        <button type="submit" class="btn btn-block btn-thm">Send Message</button>
                                    </div>
                                </li>

                              </form>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
