@extends('layouts.dashboard')
@section('page_title')
  Real State Category
@endsection

@section('content')
  <div id="content" class="main-content">
      <div class="layout-px-spacing">
          <div class="row layout-top-spacing">
              <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                @include('Alerts.success')
                @include('Alerts.danger')
                  <div class="widget-content widget-content-area br-6">
                    <a href="#" class="btn btn-primary float-right" style="margin: 1rem" data-toggle="modal" data-target="#createCategory">Create new</a>
                    <h4 href="#" class="float-left" style="margin: 1rem">All blogs</h4>
                      <div class="table-responsive mb-4 mt-4">
                          <table id="zero-config" class="table table-hover" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Sl. No</th>
                                      <th>Category Name</th>
                                      <th>Created At</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($categories as $category)
                                  <tr>
                                      <td>{{ $loop->index+1 }}.</td>
                                      <td>{{ $category->name }}</td>
                                      <td>{{ $category->created_at }}</td>
                                      <td>
                                        <a href="#" class="btn btn-outline-primary rounded bs-tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#EditCategory{{ $loop->index+1 }}"><img src="https://img.icons8.com/material-outlined/24/000000/edit--v4.png"/></a>
                                        <a href="{!! route('realstateDelete', $category->id) !!}" class="btn btn-outline-danger rounded bs-tooltip" data-placement="top" title="Delete"><img src="https://img.icons8.com/material-rounded/24/000000/delete-sign.png"/></a>
                                      </td>
                                  </tr>

                                  {{-- Create Modal  --}}
                                  <div id="EditCategory{{ $loop->index+1 }}" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Real-State Category:</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            <form class="" action="{!! route('realstateEdit', $category->id) !!}" method="post">
                                              @csrf
                                            <div class="modal-body">
                                              <label for="">Enter your category name:</label>
                                              <input type="text" class="form-control" name="realstatecategory" value="{{ $category->name }}">
                                            </div>
                                            <div class="modal-footer md-button">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                          </form>
                                        </div>
                                    </div>
                                </div>

                                  {{-- Create Modal  --}}
                                @endforeach
                              </tbody>
                              <tfoot>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Category Name</th>
                                    <th>Created At</th>
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
              <p class="">Copyright © 2020 <a target="_blank" href="{!! route('welcome') !!}">Argo</a>, All rights reserved.</p>
          </div>
          <div class="footer-section f-section-2">
              <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
          </div>
      </div>
  </div>


  {{-- Create Modal  --}}
  <div id="createCategory" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Real-State Category:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form class="" action="{!! route('realstateStore') !!}" method="post">
              @csrf
            <div class="modal-body">
              <label for="">Enter your category name:</label>
              <input type="text" class="form-control" name="realstatecategory">
            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>

  {{-- Create Modal  --}}

@endsection
