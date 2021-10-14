@extends('layouts.agent')
@section('page_title')
  Rent Payment Histoy
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
              <h2 class="breadcrumb_title">My Balance : ${{ Auth::user()->balance }}</h2>
              <button type="button" class="btn btn-success" name="button" data-toggle="modal" data-target="#WithdrawBalance">Withdraw Balance</button>

              <!-- Modal -->

              <div class="modal fade" id="WithdrawBalance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Withdraw Balance</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="" action="{!! route('agent.transaction.withdraw') !!}" method="post">
                        @csrf
                      <h4>Your Current Balance is: ${{ Auth::user()->balance }} USD</h4>
                      <input type="hidden" name="balance" value="{{ Auth::user()->balance }}">
                      <small> Provide your bank information we will deposite your money into your bank.</small>
                      <textarea name="bank_info" rows="8" class="form-control" cols="80" placeholder="Write your bank information here...." required></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Withdraw</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal -->
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
                            <tr>
                              <th scope="col">Sl No.</th>
                              <th scope="col">Name</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Bank Details</th>
                              <th scope="col">Status</th>
                              <th scope="col">Submited At</th>
                            </tr>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ($withdraws as $withdraw)
                          <tr>
                            <th scope="row"> {{ $loop->index+1 }} </th>
                            <td>{{ $withdraw->name }}</td>
                            <td>{{ $withdraw->amount }}</td>
                            <td>
                              <button type="button" name="button"  data-toggle="modal" data-target="#bankDetails{{ $loop->index+1 }}" class="btn btn-info">See Details</button>
                            </td>
                            <td>
                              @if ($withdraw->status == "Pending")
                                <span class="badge badge-warning">Pending</span>
                              @endif
                              @if ($withdraw->status == "Complete")
                                <span class="badge badge-success">Complete</span>
                              @endif
                              @if ($withdraw->status == "Canceled")
                                <span class="badge badge-danger">Canceled</span>
                              @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($withdraw->created_at)->format('d-M-Y (h:m A)') }}</td>

                            <!-- Modal -->

                            <div class="modal fade" id="bankDetails{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Bank Details:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    {{ $withdraw->bank_info }}
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    {{-- <button type="submit" class="btn btn-success">Withdraw</button> --}}
                                  </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal -->
                        @empty
                          <tr>
                            <th colspan="6"> No Records Found! </th>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  {{ $withdraws->links() }}
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
