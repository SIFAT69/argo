@extends('layouts.dashboard')
@section('page_title')
Edit email configurations
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
@php
  $is_exist = DB::table('email_configurations')->get();
  $config = DB::table('email_configurations')->where('id', 1)->first();
@endphp
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
              <div class="max-w-md w-full space-y-8">
                @include('Alerts.success')
                @include('Alerts.danger')

                  <div>
                      <h2 class="text-center text-3xl font-extrabold text-gray-900">Create Email Configuration</h2>
                  </div>
                  @if (empty($is_exist))
                    <form class="mt-8 space-y-6" action="{{route('configuration.store')}}" method="POST">
                      @csrf
                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="driver" class="sr-only">SMTP Driver</label>
                                  <input id="driver" name="driver" type="text" required class="form-control" placeholder="Driver">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="host-name" class="sr-only">Host Name</label>
                                  <input id="host-name" name="hostName" type="text" required class="form-control" placeholder="Host">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="port" class="sr-only">Port</label>
                                  <input id="port" name="port" type="text" required class="form-control" placeholder="Port">
                              </div>
                          </div>
                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="encryption" class="sr-only">Encryption Type</label>
                                  <input id="encryption" name="encryption" type="text" required class="form-control" placeholder="Encryption">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="userName" class="sr-only">User Name</label>
                                  <input id="userName" name="userName" type="text" required class="form-control" placeholder="User Name">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="password" class="sr-only">Password</label>
                                  <input id="password" name="password" type="password" autocomplete="current-password" required class="form-control" placeholder="Password">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="senderName" class="sr-only">Sender Name</label>
                                  <input id="senderName" name="senderName" type="text" required class="form-control" placeholder="Sender Name">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="senderEmail" class="sr-only">Sender Email</label>
                                  <input id="senderEmail" name="senderEmail" type="text" required class="form-control" placeholder="Sender Email">
                              </div>
                          </div>
                      <div>
                      <button type="submit" class="btn btn-primary">Save</button>
                      <a href="{!! route('testMailSend') !!}" class="btn btn-warning">Test Mail</a>
                  </form>
                @else
                  <form class="mt-8 space-y-6" action="{{route('configuration.store')}}" method="POST">
                      @csrf
                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="driver" class="sr-only">SMTP Driver</label>
                                  <input id="driver" name="driver" type="text" required class="form-control" value="{{ $config->driver }}" placeholder="Driver">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="host-name" class="sr-only">Host Name</label>
                                  <input id="host-name" name="hostName" type="text" required class="form-control" value="{{ $config->host }}" placeholder="Host">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="port" class="sr-only">Port</label>
                                  <input id="port" name="port" type="text" required class="form-control" value="{{ $config->port }}" placeholder="Port">
                              </div>
                          </div>
                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="encryption" class="sr-only">Encryption Type</label>
                                  <input id="encryption" name="encryption" type="text" required class="form-control" value="{{ $config->encryption }}" placeholder="Encryption">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="userName" class="sr-only">User Name</label>
                                  <input id="userName" name="userName" type="text" required class="form-control" value="{{ $config->user_name }}" placeholder="User Name">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="password" class="sr-only">Password</label>
                                  <input id="password" name="password" type="password" autocomplete="current-password" value="{{ $config->password }}" required class="form-control" placeholder="Password">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="senderName" class="sr-only">Sender Name</label>
                                  <input id="senderName" name="senderName" type="text" required class="form-control" value="{{ $config->sender_name }}" placeholder="Sender Name">
                              </div>
                          </div>

                          <div class="shadow-sm -space-y-px mb-4">
                              <div>
                                  <label for="senderEmail" class="sr-only">Sender Email</label>
                                  <input id="senderEmail" name="senderEmail" type="text" required class="form-control" value="{{ $config->sender_email }}" placeholder="Sender Email">
                              </div>
                          </div>
                      <div>
                      <button type="submit" class="btn btn-primary">Save</button>
                      <a href="{!! route('testMailSend') !!}" class="btn btn-warning">Test Mail</a>
                  </form>
                @endif
              </div>
            </div>
        </div>
    </div>
</div>

<script src="{!! asset('BackAsset') !!}/plugins/file-upload/file-upload-with-preview.min.js"></script>
<script>
    //Second upload
    var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>
@endsection
