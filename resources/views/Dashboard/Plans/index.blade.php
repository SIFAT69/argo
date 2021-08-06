@extends('layouts.dashboard')
@section('page_title')
  Packages
@endsection
@section('content')

  <div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
              @include('Alerts.success')
              @include('Alerts.danger')
                <div class="widget-content widget-content-area br-6">
                  <a href="{!! route('create.plan') !!}" class="btn btn-primary float-right" style="margin: 1rem">Create new</a>
                  <h4 href="#" class="float-left" style="margin: 1rem">All Packages</h4>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Title</th>
                                    <th>Cost</th>
                                    <th>Monthly / Yearly</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($plans as $plan)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $plan->name }}</td>
                                    <td>${{ number_format($plan->cost, 2) }}</td>
                                    <td>{{ $plan->description }}</td>
                                    <td>
                                      <label class="switch s-success mr-2">
                                        <a href="{!! route('PlanStatus', $plan->id) !!}">
                                          <input type="checkbox" @if($plan->status == 1) checked @endif>
                                          <span class="slider round"></span>
                                        </a>
                                      </label>
                                    </td>
                                    <td>
                                      <a href="{!! route('DeletePackages', $plan->id) !!}" class="btn btn-danger rounded bs-tooltip"  data-placement="right" title="Delete"> <i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>Sl. No</th>
                                <th>Title</th>
                                <th>Cost</th>
                                <th>Monthly / Yearly</th>
                                <th>Status</th>
                                <th>Actions</th>
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
            <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div>
</div>
@endsection
