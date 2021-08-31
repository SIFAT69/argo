@extends('layouts.dashboard')
@section('page_title')
  Users
@endsection
@section('content')
  <div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
              @include('Alerts.success')
              @include('Alerts.danger')
                <div class="widget-content widget-content-area br-6">
                  {{--<a href="{{ route('users.create') }}" class="btn btn-primary float-right" style="margin: 1rem">Create new</a>--}}
                  <h4 href="#" class="float-left" style="margin: 1rem">All Users</h4>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('/uploads/' . $user->avatar) }}" class="rounded" width="50px" alt="{{ $user->avatar }}"></td>
                                    <td>
                                      <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->account_role }}</td>
                                    <td>
                                      <a href="{!! route('users.edit', $user->id) !!}" class="btn btn-outline-primary rounded bs-tooltip"><img src="https://img.icons8.com/material-outlined/24/000000/edit--v4.png"/></a>
                                      <a href="{!! route('users.destroy', $user->id) !!}" class="btn btn-outline-danger rounded bs-tooltip" data-placement="top" title="@if($user->trashed()) Unlock @else Lock @endif">
                                            @if($user->trashed())
                                                <img src="https://img.icons8.com/metro/24/000000/unlock-2.png"/>
                                            @else
                                                <img src="https://img.icons8.com/ios-glyphs/24/000000/lock--v1.png"/>
                                            @endif
                                      </a>
                                    </td>
                                </tr>

                                
                              @endforeach
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>Sl. No</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
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
