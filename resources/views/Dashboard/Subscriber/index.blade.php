@extends('layouts.dashboard')
@section('page_title')
  Subscribers
@endsection
@section('content')
  <div id="content" class="main-content">
      <div class="layout-px-spacing">
          <div class="row layout-top-spacing">
              <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                @include('Alerts.success')
                @include('Alerts.danger')
                  <div class="widget-content widget-content-area br-6">
                    <h4 href="#" class="float-left" style="margin: 1rem">All Subscribers</h4>
                      <div class="table-responsive mb-4 mt-4">
                          <table id="zero-config" class="table table-hover" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Sl. No</th>
                                      <th>Email</th>
                                      <th>Subscribe At</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @forelse ($subscribers as $subscriber)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subscriber->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($subscriber->created_at)->diffForhumans() }}</td>
                                    </tr>   
                                @endforeach
                              </tbody>
                              <tfoot>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Email</th>
                                    <th>Subscribe At</th>
                                </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
              </div>

          </div>

      </div>
      <div class="footer-wrapper">
          <div class="footer-section f-section-1">
              <p class="">Copyright © 2021 <a target="_blank" href="{!! route('dashboard') !!}">Argo</a>, All rights reserved.</p>
          </div>
          <div class="footer-section f-section-2">
              <p class="">Coded with <a href="https://sifztech.com/">SifzTech</a></p>
          </div>
      </div>
  </div>

@endsection
