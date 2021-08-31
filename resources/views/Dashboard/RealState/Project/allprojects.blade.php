@extends('layouts.dashboard')
@section('page_title')
  Project Lists
@endsection
@section('content')
  <div id="content" class="main-content">
      <div class="layout-px-spacing">
          <div class="row layout-top-spacing">
              <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                @include('Alerts.success')
                @include('Alerts.danger')
                  <div class="widget-content widget-content-area br-6">
                    <a href="{!! route('createProject') !!}" class="btn btn-primary float-right" style="margin: 1rem">Create new</a>
                    <h4 href="#" class="float-left" style="margin: 1rem">All Projects</h4>
                      <div class="table-responsive mb-4 mt-4">
                          <table id="zero-config" class="table table-hover" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Sl. No</th>
                                      <th>Image</th>
                                      <th>Title</th>
                                      <th>Created At</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($projects as $project)
                                  <tr>
                                      <td>{{ $loop->index+1 }}</td>
                                      <td>
                                        <img src="../uploads/{{ $project->youtube_thumb }}" alt="" width="120px">
                                      </td>
                                      <td>{{ $project->title }}</td>
                                      <td>{{ $project->created_at}}</td>
                                      <td>
                                        <select class="form-control mb-3 moderation-status" name="moderation_status" project-id="{{ $project->id }}">
                                            <option value="Pending" @if($project->moderation_status == "Pending") selected @endif>Pending</option>
                                            <option value="Approved" @if($project->moderation_status == "Approved") selected @endif>Approved</option>
                                            <option value="Deny" @if($project->moderation_status == "Deny") selected @endif>Deny</option>
                                        </select>
                                      </td>
                                      <td>
                                        <a href="{!! route('createProjectEdit',$project->id) !!}" class="btn btn-outline-primary rounded bs-tooltip" data-placement="top" title="Edit"><img src="https://img.icons8.com/material-outlined/24/000000/edit--v4.png"/></a>
                                        <a href="#" class="btn btn-outline-danger rounded bs-tooltip" data-placement="top" title="Delete" data-toggle="modal" data-target="#exampleModalCenter{{ $loop->index }}"><img src="https://img.icons8.com/material-rounded/24/000000/delete-sign.png"/></a>
                                      </td>
                                  </tr>

                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModalCenter{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalCenterTitle">Do you want to delete "{{ $project->title }}"</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                  </button>
                                              </div>
                                              {{-- <div class="modal-body"> --}}
                                              <div class="modal-footer">
                                                  <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                  <a href="{!! route('softDeleteProject', $project->id) !!}" type="button" class="btn btn-danger">Sure, Delete</a>
                                              </div>
                                          {{-- </div> --}}
                                      </div>
                                  </div>
                                  {{-- Modals --}}
                                @endforeach
                              </tbody>
                              <tfoot>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Created At</th>
                                    <th>Status</th>
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
@endsection

@section('script_in_body')
<script>
  $(document).ready(function(){
    $('.moderation-status').change(function(){
      let moderation_status = $(this).val();
      let project = $(this).attr('project-id');
      
      $.ajax({
        url: `{{ route('ModStatusChangeProject') }}`,
        type: 'GET',
        data: {moderation_status: moderation_status, id: project},
        success: function(msg){
          // alert(msg);
        },
      });

    });
  });
</script>
@endsection
