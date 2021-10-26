@extends('layouts.tanent')
@section('page_title')
Rent Payment checkout
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@php
    $stripe_key = 'pk_test_51Ic31vAvjSDpdiu4vOxF5gxK9aporITPSDwopdAdtRcOD05U12cRDDUzrGBE68VxenB20YCmMWH1EMkMpdolsLXn00RH2s1mwB';
@endphp
<section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
            <div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
                <div class="row">
                    @include('layouts.menu.tenantmenu')
                    <div class="col-lg-4 col-xl-4 mb10">
                        <div class="breadcrumb_content style2 mb30-991">
                            <h2 class="breadcrumb_title">Rent Payment checkout</h2>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-8">

                        <div class="candidate_revew_select style2 text-right mb30-991">
                            <ul class="mb0">
                                <li class="list-inline-item">
                                    <a href="{!! route('TanentDashboard') !!}" class="btn btn-danger">Back to Dashbord</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @include('Alerts.success')
                        @include('Alerts.danger')
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="my_dashboard_review mb40">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                      <table class="table table-hover">
                                        <thead>
                                          <tr>
                                            <th scope="col">Sl No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Apartment</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Last Updated</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @forelse ($payments as $payment)
                                            @php
                                              $user = DB::table('users')->where('id', $payment->user_id)->first();
                                              $properties = DB::table('properties')->where('id', $payment->property_id)->first();
                                            @endphp
                                            <tr>
                                              <th scope="row"> {{ $loop->index+1 }} </th>
                                              <td>{{ $user->name }}</td>
                                              <td>{{ $properties->title }}</td>
                                              <td>{{ $payment->amount }}</td>
                                              @if ($payment->status == "Complete")
                                                <td> <span class="badge badge-success">{{ $payment->status }} </span></td>
                                              @else
                                                <td> <span class="badge badge-danger">{{ $payment->status }} </span></td>
                                              @endif
                                              @if (empty($payment->updated_at))
                                                <td>{{ \Carbon\Carbon::parse($payment->created_at)->diffForHumans() }}</td>
                                              @else
                                                <td>{{ \Carbon\Carbon::parse($payment->updated_at)->diffForHumans() }}</td>
                                              @endif
                                            </tr>
                                          @empty
                                            <tr>
                                              <th colspan="6"> No Records Found! </th>
                                            </tr>
                                          @endforelse
                                        </tbody>
                                      </table>
                                    </div>
                                    {{ $payments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt10">
                    <div class="col-lg-12">
                        <div class="copyright-widget text-center">
                            <p>©2021 Argo. Made By SifzTech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
