@extends('layouts.dashboard')
@section('page_title')
  Media Library - trash
@endsection
@section('content')

  <div id="content" class="main-content">
      <div class="layout-px-spacing">
          <div class="row layout-top-spacing">
              <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                @include('Alerts.success')
                @include('Alerts.danger')
                  <div class="widget-content widget-content-area br-6">
                    <h4 href="#" class="float-left" style="margin: 1rem">All Trash</h4>
                      <div class="table-responsive mb-4 mt-4">
                          <table id="zero-config" class="table table-hover" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Sl. No</th>
                                      <th>Image</th>
                                      <th>Uploaded By</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($medias as $media)
                                  <tr>
                                      <td>{{ $loop->index+1 }}</td>
                                      <td>
                                        <img src="../uploads/{{ $media->file_name }}" width="50px" alt="{{ $media->file_name }}">
                                      </td>
                                      <td>{{ $media->uploader_name }}</td>
                                      <td>
                                        <a href="#" class="btn btn-outline-primary rounded bs-tooltip" data-placement="top" title="View" data-toggle="modal" data-target="#View{{ $loop->index+1 }}"><img src="https://img.icons8.com/material-outlined/24/000000/eye--v4.png"/></a>
                                        <a href="{!! route('LibraryFilesTrashRestore',$media->id) !!}" class="btn btn-outline-primary rounded bs-tooltip" data-placement="top" title="Re-Store"><img src="https://img.icons8.com/ios-filled/50/000000/settings-backup-restore.png" width="24.3px"/></a>
                                        <a href="{!! route('HardDelete',$media->id) !!}" class="btn btn-outline-danger rounded bs-tooltip" data-placement="top" title="Permanent Delete"><img src="https://img.icons8.com/material-rounded/24/000000/delete-sign.png"/></a>
                                      </td>
                                  </tr>
                                  {{-- Edit Modals --}}

                                  <div class="modal animated zoomInUp custo-zoomInUp" id="View{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Your Media:</h5>
                                              </div>
                                              <div class="modal-body">
                                                <img src="../uploads/{{ $media->file_name }}" width="450px" alt="">
                                              </div>
                                              <div class="modal-footer">
                                                  <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                  <a href="{!! route('HardDelete',$media->id) !!}" class="btn btn-danger">Delete</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  {{-- Edit Modals --}}
                                @endforeach
                              </tbody>
                              <tfoot>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Image</th>
                                    <th>Uploaded By</th>
                                    <th>Action</th>
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
