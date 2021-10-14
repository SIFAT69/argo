@extends('layouts.dashboard')
@section('page_title')
  Withdraw Request By Agents
@endsection
@section('content')

  <div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
              @include('Alerts.success')
              @include('Alerts.danger')
                <div class="widget-content widget-content-area br-6">
                  {{-- <a href="{!! route('create.plan') !!}" class="btn btn-primary float-right" style="margin: 1rem">Create new</a> --}}
                  <h4 href="#" class="float-left" style="margin: 1rem">Withdraw Request</h4>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                  <th>Sl No.</th>
                                  <th>Name</th>
                                  <th>Apartment</th>
                                  <th>Amount</th>
                                  <th>Status</th>
                                  <th>Last Updated</th>
                                  <th>Actions</th>
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
                                  <td>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#Complete{{ $loop->index+1 }}">Complete</button>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#Undo{{ $loop->index+1 }}">Undo</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#Cancel{{ $loop->index+1 }}">Cancele</button>
                                  </td>

                                  <!-- Complete Confirm Modal Start -->
                                  <div class="modal fade" id="Complete{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p style="color:green"> <b>"Complete"</b> means this will be paid or you are already paid this user.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn" data-dismiss="modal">Close</button>
                                          <a href="{!! route('admin.withdraw.request.complete', $withdraw->id) !!}" type="button" class="btn btn-success">Yes, I agree</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Complete Confirm Modal Start -->

                                  <!-- Undo Confirm Modal Start -->
                                  <div class="modal fade" id="Undo{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p style="color:orange"> <b>"Undo"</b> means this payment will be on  <b>"pending"</b> again.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn" data-dismiss="modal">Close</button>
                                          <a href="{!! route('admin.withdraw.request.undo', $withdraw->id) !!}" type="button" class="btn btn-success">Yes, I agree</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Undo Confirm Modal Start -->

                                  <!-- Cancel Confirm Modal Start -->
                                  <div class="modal fade" id="Cancel{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p style="color:red"> <b>"Cancel"</b> means this payment request is going to be rejected.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn" data-dismiss="modal">Close</button>
                                          <a href="{!! route('admin.withdraw.request.cancel', $withdraw->id) !!}" type="button" class="btn btn-success">Yes, I agree</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Cancel Confirm Modal Start -->

                                  <!-- Bank Details Modal Start -->
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
                                          <button type="button" class="btn" data-dismiss="modal">Close</button>
                                        </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Bank Details Modal End -->
                              @empty
                                <tr>
                                  <th colspan="6"> No Records Found! </th>
                                </tr>
                              @endforelse
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
