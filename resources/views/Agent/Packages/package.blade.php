@extends('layouts.agent')
@section('page_title')
  My Packages
@endsection
@section('content')
  <section class="our-dashbord dashbord bgc-f7 pb50">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
      <div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
        <div class="row">
          <div class="col-lg-12">
            <div class="dashboard_navigationbar dn db-992">
              <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
                <ul id="myDropdown" class="dropdown-content">
                  <li><a href="page-dashboard.html"><span class="flaticon-layers"></span> Dashboard</a></li>
                  <li><a href="page-message.html"><span class="flaticon-envelope"></span> Message</a></li>
                  <li><a href="page-my-properties.html"><span class="flaticon-home"></span> My Properties</a></li>
                  <li><a href="page-my-favorites.html"><span class="flaticon-heart"></span> My Favorites</a></li>
                  <li><a href="page-my-savesearch.html"><span class="flaticon-magnifying-glass"></span> Saved Search</a></li>
                  <li><a href="page-my-review.html"><span class="flaticon-chat"></span> My Reviews</a></li>
                  <li class="active"><a href="page-my-packages.html"><span class="flaticon-box"></span> My Package</a></li>
                  <li><a href="page-my-profile.html"><span class="flaticon-user"></span> My Profile</a></li>
                  <li><a href="page-add-new-property.html"><span class="flaticon-filter-results-button"></span> Add New Listing</a></li>
                  <li><a href="page-login.html"><span class="flaticon-logout"></span> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xl-4 mb10">
            <div class="breadcrumb_content style2 mb30-991">
              <h2 class="breadcrumb_title">My Package</h2>
              <p>We are glad to see you again!</p>
            </div>
          </div>
          <div class="col-lg-8 col-xl-8">
            <div class="candidate_revew_select style2 text-right mb30-991">
              <ul class="mb0">
                <li class="list-inline-item">
                  <div class="candidate_revew_search_box course fn-520">
                    <form class="form-inline my-2">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search Packages" aria-label="Search">
                        <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
                      </form>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-12">
            @include('Alerts.success')
            @include('Alerts.danger')
            <div class="my_dashboard_review mb40">
              <div class="col-lg-12">
                <div class="packages_table">
                  <div class="table-responsive mt0">
                    <table class="table">
                      <thead class="thead-light">
                          <tr>
                            <th scope="col">Current Package</th>
                            <th scope="col">Package Status</th>
                            {{-- <th scope="col">Package Status</th> --}}
                            <th scope="col">Subsciption Date</th>
                            <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($packages as $package)
                          <tr>
                            <th scope="row">{{ $package->name }}</th>
                            <td>@if($package->stripe_status == "expire" || $package->stripe_status == "canceled") <span class="badge badge-danger"> {{ $package->stripe_status }} </span> @else <span class="badge badge-success"> {{ $package->stripe_status }} </span> @endif </td>
                            <td>{{ Carbon\Carbon::parse($package->created_at)->format('Y-D-M') }}</td>
                            <td>
                              @if($package->stripe_status == 'active')
                                <button type="button" class="btn btn-danger unsubscribe" subscription-id="{{ $package->id }}">Unsubscribe</button>
                              @else
                                <button type="button" class="btn btn-success subscribe" subscription-id="{{ $package->id }}">Subscribe</button>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                {{--<div class="pck_chng_btn text-right">
                  <a href="{!! route('dashboard') !!}" class="btn btn-lg btn-thm">Return Dashboard</a>
                </div>--}}
              </div>
            </div>
          </div>
        </div>
        <div class="row mt10">
          <div class="col-lg-12">
            <div class="copyright-widget text-center">
              <p>© 2021 Argo. Made By SifzTech.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Button trigger modal -->    
<!-- unsubscribe Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Do you want to unsubscribe?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="POST" action="" id="unsubscribe-form">
          @csrf
          <button type="submit" class="btn btn-danger">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->    
<!-- unsubscribe Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Do you want to subscribe?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="POST" action="" id="subscribe-form">
          @csrf
          <button type="submit" class="btn btn-success">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


@section('script_in_body')
<script>
  $(document).ready(function(){
        $(".unsubscribe").click(function(){
          let subscription_id = $(this).attr('subscription-id');
          $('#unsubscribe-form').attr('action', `{{ url('subscription/cancel') }}/` + subscription_id);
          $('#exampleModal1').modal('show');
        });

        $(".subscribe").click(function(){
          let subscription_id = $(this).attr('subscription-id');
          $('#subscribe-form').attr('action', `{{ url('subscription/resume') }}/` + subscription_id);
          $('#exampleModal2').modal('show');
        });
  });
</script>
@endsection