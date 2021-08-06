@extends('layouts.dashboard')
@section('page_title')
  Agent Packages
@endsection
@section('content')
  <div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
      <div class="col-lg-12">
          <div class="box box-shadow">
              <div class="widget-content widget-content-area">
                  <div class="container">
                      <section class="pricing-section bg-7 mt-5">
                          <div class="pricing pricing--norbu">
                            @foreach ($plans as $package)
                              <div class="pricing__item">
                                <form class="" action="{!! route('package_payment') !!}" method="post">
                                  @csrf
                                  <input type="hidden" name="package_id" value="{{ $package->id }}">
                                  <input type="hidden" name="package_price" value="{{ $package->cost }}">
                                  <h3 class="pricing__title">{{ $package->name }}</h3>
                                  <p class="pricing__sentence">This package will enable will Agent access. And controll of dashboard.</p>
                                  <div class="pricing__price"><span class="pricing__currency"> $</span>@if($package->cost == 0) Free @else {{ $package->cost }} @endif<span class="pricing__period">/ @if($package->description == "Monthly") Month @elseif ($package->description == "Yearly") Year @endif</span></div>
                                  <a href="{{ route('plans.show', $package->slug) }}" class="pricing__action mx-auto mb-4" type="submit">Buy</a>
                                </form>
                              </div>
                            @endforeach
                          </div>
                      </section>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection
