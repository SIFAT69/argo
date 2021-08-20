@extends('layouts.dashboard')
@section('page_title')
  Contacts
@endsection
@section('content')
  <div id="content" class="main-content">
      <div class="layout-px-spacing">
          <div class="row layout-top-spacing">
              <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                @include('Alerts.success')
                @include('Alerts.danger')
                  <div class="widget-content widget-content-area br-6">
                    <h4 href="#" class="float-left" style="margin: 1rem">All Contacts</h4>
                      <div class="table-responsive mb-4 mt-4">
                          <table id="zero-config" class="table table-hover" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Sl. No</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Mobile</th>
                                      <th>Subject</th>
                                      <th>Created At</th>
                                      <th>View</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @forelse ($contacts as $contact)
                                  <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $contact->form_name }}</td>
                                    <td>{{ $contact->form_email }}</td>
                                    <td>{{ $contact->form_phone }}</td>
                                    <td>{{ $contact->form_subject }}</td>
                                    <td> {{ \Carbon\Carbon::parse($contact->created_at)->diffForhumans() }}</td>
                                    <td>
                                      <button type="button" class="btn btn-info" name="button" data-toggle="modal" data-target="#view{{ $loop->index+1 }}"> <i class="fa fa-eye"></i> </button>
                                    </td>
                                    <form class="" action="{!! route('statusContact') !!}" method="post">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $contact->id }}">
                                      <td>
                                        <select class="form-control" name="status">
                                          <option value="Unread" @if($contact->status == "Unread") selected @endif>Unread</option>
                                          <option value="Seen" @if($contact->status == "Seen") selected @endif>Seen</option>
                                          <option value="Delete" @if($contact->status == "Delete") selected @endif>Delete</option>
                                        </select>
                                      </td>
                                      <td>
                                        <button type="submit" class="btn btn-primary" name="button">Save</button>
                                      </td>
                                   </form>
                                  </tr>

                                  <div class="modal fade" id="view{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalCenterTitle">{{ $contact->form_name }}</h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                             <ul class="list-group list-group-flush">
                                              <li class="list-group-item">Email : {{  $contact->form_email }}</li>
                                              <li class="list-group-item">Phone Number : {{  $contact->form_phone }}</li>
                                              <li class="list-group-item">Subject : {{  $contact->form_subject }}</li>
                                              <li class="list-group-item">Message : {{  $contact->form_message }}</li>
                                            </ul>
                                           </div>
                                           <div class="modal-footer">
                                               <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                               {{-- <button type="button" class="btn btn-primary">Save</button> --}}
                                           </div>
                                       </div>
                                   </div>
                               </div>
                                @empty

                                @endforelse

                              </tbody>
                              <tfoot>
                                <tr>
                                  <th>Sl. No</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Mobile</th>
                                  <th>Subject</th>
                                  <th>Created At</th>
                                  <th>View</th>
                                  <th>Status</th>
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
