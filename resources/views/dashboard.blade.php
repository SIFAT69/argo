@extends('layouts.dashboard')
@section('page_title')
Dashboard
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <br>
        @include('Alerts.success')
        @include('Alerts.danger')
        <div class="row layout-top-spacing">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-card-one">
                    <div class="widget-content">

                        <div class="media">
                            <div class="media-body">
                                <h6>Total Projects</h6>
                            </div>
                        </div>
                        <div class="w-action">
                            <div class="card-like">
                                <h2>{{ DB::table('Projects')->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-card-one">
                    <div class="widget-content">

                        <div class="media">
                            <div class="media-body">
                                <h6>Total Properties</h6>
                            </div>
                        </div>
                        <div class="w-action">
                            <div class="card-like">
                                <h2>{{ DB::table('Projects')->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-card-one">
                    <div class="widget-content">

                        <div class="media">
                            <div class="media-body">
                                <h6>Total Users</h6>
                            </div>
                        </div>
                        <div class="w-action">
                            <div class="card-like">
                                <h2>{{ DB::table('users')->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-card-one">
                    <div class="widget-content">

                        <div class="media">
                            <div class="media-body">
                                <h6>Total Blogs</h6>
                            </div>
                        </div>
                        <div class="w-action">
                            <div class="card-like">
                                <h2>{{ DB::table('blogs')->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- For Users --}}
            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-one">
                    <div class="widget-heading">
                        <h5 class="">Transactions</h5>
                    </div>
                    @php
                    $transactions = DB::table('transactions')->orderByDesc('id')->limit(4)->get();
                    @endphp
                    <div class="widget-content">
                        @foreach ($transactions as $transaction)
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                              class="feather feather-home">
                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>{{ $transaction->username }}</h4>
                                        <p class="meta-date">{{ $transaction->created_at }}</p>
                                    </div>

                                </div>
                                <div class="t-rate rate-inc">
                                    <p><span>${{ $transaction->amount }}</span></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                <div class="widget widget-activity-four">

                    <div class="widget-heading">
                        <h5 class="">Recent Activities</h5>
                    </div>

                    <div class="widget-content">

                        <div class="mt-container mx-auto">
                            <div class="timeline-line">

                                <div class="item-timeline timeline-primary">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p><span>Updated</span> Server Logs</p>
                                        <span class="badge badge-danger">Pending</span>
                                        <p class="t-time">Just Now</p>
                                    </div>
                                </div>

                                <div class="item-timeline timeline-success">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Send Mail to <a href="javascript:void(0);">HR</a> and <a href="javascript:void(0);">Admin</a></p>
                                        <span class="badge badge-success">Completed</span>
                                        <p class="t-time">2 min ago</p>
                                    </div>
                                </div>

                                <div class="item-timeline  timeline-danger">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Backup <span>Files EOD</span></p>
                                        <span class="badge badge-danger">Pending</span>
                                        <p class="t-time">14:00</p>
                                    </div>
                                </div>

                                <div class="item-timeline  timeline-dark">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Collect documents from <a href="javascript:void(0);">Sara</a></p>
                                        <span class="badge badge-success">Completed</span>
                                        <p class="t-time">16:00</p>
                                    </div>
                                </div>

                                <div class="item-timeline  timeline-warning">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Conference call with <a href="javascript:void(0);">Marketing Manager</a>.</p>
                                        <span class="badge badge-primary">In progress</span>
                                        <p class="t-time">17:00</p>
                                    </div>
                                </div>

                                <div class="item-timeline  timeline-secondary">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Rebooted Server</p>
                                        <span class="badge badge-success">Completed</span>
                                        <p class="t-time">17:00</p>
                                    </div>
                                </div>

                                <div class="item-timeline  timeline-warning">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Send contract details to Freelancer</p>
                                        <span class="badge badge-danger">Pending</span>
                                        <p class="t-time">18:00</p>
                                    </div>
                                </div>

                                <div class="item-timeline  timeline-dark">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Kelly want to increase the time of the project.</p>
                                        <span class="badge badge-primary">In Progress</span>
                                        <p class="t-time">19:00</p>
                                    </div>
                                </div>

                                <div class="item-timeline  timeline-success">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Server down for maintanence</p>
                                        <span class="badge badge-success">Completed</span>
                                        <p class="t-time">19:00</p>
                                    </div>
                                </div>

                                <div class="item-timeline  timeline-secondary">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Malicious link detected</p>
                                        <span class="badge badge-warning">Block</span>
                                        <p class="t-time">20:00</p>
                                    </div>
                                </div>

                                <div class="item-timeline  timeline-warning">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Rebooted Server</p>
                                        <span class="badge badge-success">Completed</span>
                                        <p class="t-time">23:00</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tm-action-btn">
                            <button class="btn">View All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                  class="feather feather-chevron-down">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg></button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- For Users --}}

            {{-- For Admin --}}
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    <div class="widget-heading">
                        <h5 class="">Recent Properties</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="th-content">Image</div>
                                        </th>
                                        <th>
                                          <div class="th-content">Title</div>
                                        </th>
                                        <th>
                                            <div class="th-content">Created At</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Status</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($properties as $property)
                                    <tr>
                                        <td>
                                            <div class=""><img src="../uploads/{{ $property->youtube_thumb }}" width="70px"></div>
                                        </td>
                                        <td>
                                            <div class="td-content product-brand">{{ $property->title }}</div>
                                        </td>
                                        <td>
                                            <div class="td-content">{{ Carbon\Carbon::parse($property->created_at)->diffForhumans() }}</div>
                                        </td>
                                        <td>
                                          <div class="td-content"> @if($property->moderation_status == "Approved") <span class="badge outline-badge-success">Active</span> @elseif($property->moderation_status == "Pending") <span class="badge outline-badge-danger">Pending</span> @else <span class="badge outline-badge-success">Paused</span> @endif</div>
                                        </td>
                                      </tr>
                                  @empty
                                    <tr>
                                      <td colspan="4" class="text-center">No properties found!</td>
                                    </tr>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    <div class="widget-heading">
                        <h5 class="">Recent Properties</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="th-content">Image</div>
                                        </th>
                                        <th>
                                          <div class="th-content">Title</div>
                                        </th>
                                        <th>
                                            <div class="th-content">Created At</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Status</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($projects as $project)
                                    <tr>
                                        <td>
                                            <div class=""><img src="../uploads/{{ $project->youtube_thumb }}" width="70px"></div>
                                        </td>
                                        <td>
                                            <div class="td-content product-brand">{{ $project->title }}</div>
                                        </td>
                                        <td>
                                            <div class="td-content">{{ Carbon\Carbon::parse($project->created_at)->diffForhumans() }}</div>
                                        </td>
                                        <td>
                                          <div class="td-content"> @if($project->status == "1") <span class="badge outline-badge-success">Active</span> @elseif($property->status == "0") <span class="badge outline-badge-danger">Pending</span> @else <span class="badge outline-badge-success">Paused</span> @endif</div>
                                        </td>
                                      </tr>
                                  @empty
                                    <tr>
                                      <td colspan="4" class="text-center">No properties found!</td>
                                    </tr>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- For Admin --}}

        </div>
    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2020 <a target="_blank" href="{!! route('welcome') !!}">Argo</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg></p>
        </div>
    </div>
</div>
@endsection
