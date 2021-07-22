@extends('layouts.dashboard')
@section('page_title')
  States
@endsection
@section('content')
  <div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
              @include('Alerts.success')
              @include('Alerts.danger')
                <div class="widget-content widget-content-area br-6">
                  <a href="#" class="btn btn-primary float-right" style="margin: 1rem" data-toggle="modal" data-target="#exampleModal">Create new</a>
                  <h4 href="#" class="float-left" style="margin: 1rem">All States</h4>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>States</th>
                                    <th>Countries</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($states as $state)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $state->states }}</td>
                                    <td>{{ $state->country }}</td>
                                    <td>
                                      <a href="#" class="btn btn-outline-primary rounded bs-tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#EditModal{{ $loop->index+1 }}"><img src="https://img.icons8.com/material-outlined/24/000000/edit--v4.png"/></a>
                                      <a href="{!! route('StatesDelete',$state->id) !!}" class="btn btn-outline-danger rounded bs-tooltip" data-placement="top" title="Delete"><img src="https://img.icons8.com/material-rounded/24/000000/delete-sign.png"/></a>
                                    </td>
                                </tr>

                                {{-- Edit Modals --}}
                                <div class="modal animated zoomInUp custo-zoomInUp" id="EditModal{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit States:</h5>
                                            </div>
                                            <form action="{!! route('StatesEdit',$state->id) !!}" method="post">
                                              @csrf
                                            <div class="modal-body">
                                              <input type="hidden" name="id" value="{{ $state->id }}">
                                                <input type="text" value="{{ $state->states }}" placeholder="Enter a country name...." required class="form-control mb-3" name="state">
                                                <input type="text" value="{{ $state->country }}" placeholder="Enter nationality...." required class="form-control mb-3" name="country">
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- Edit Modals --}}
                              @endforeach
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>Sl. No</th>
                                <th>States</th>
                                <th>Countries</th>
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


{{-- Modals --}}
<!-- Modal -->
<div class="modal animated zoomInUp custo-zoomInUp" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new state:</h5>
            </div>
            <form action="{!! route('StatesPost') !!}" method="post">
              @csrf
            <div class="modal-body">
                <input type="text" placeholder="Enter a states name...." class="form-control mb-3" name="state">
                <select class="form-control" name="country">
                  @foreach ($countries as $country)
                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


{{-- Modals --}}
@endsection
