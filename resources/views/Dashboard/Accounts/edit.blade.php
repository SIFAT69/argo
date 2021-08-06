@extends('layouts.dashboard')
@section('page_title')
Accounts settings
@endsection
@section('content')

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="account-settings-container layout-top-spacing">

          @include('Alerts.success')
          @include('Alerts.danger')

          <form class="section general-info" action="{!! route('AccountEditPost') !!}" enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $accounts->id }}">
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="info">
                                <h6 class="">General Information</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4">
                                                    <input type="file" id="input-file-max-fs" name="profile_picture" class="dropify" data-default-file="../uploads/{{ $accounts->avatar }}" accept="image/*" data-max-file-size="10M" />
                                                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>Upload Picture</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="fullName">Full Name</label>
                                                                <input type="text" class="form-control mb-4" placeholder="Full Name" name="name" value="{{ $accounts->name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="info">
                                <h5 class="">Change Password:</h5>
                                <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="form-group">
                                            <label for="">New Password password:</label>
                                            <input type="text" class="form-control mb-2" name="password" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="account-settings-footer">

                <div class="as-footer-container">

                    <button id="multiple-reset" class="btn btn-primary">Reset All</button>
                    <div class="blockui-growl-message">
                        <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                    </div>
                    <button type="submit" id="multiple-messages" class="btn btn-primary">Save Changes</button>

                </div>

            </div>
          </form>
        </div>

    </div>
</div>
@endsection
