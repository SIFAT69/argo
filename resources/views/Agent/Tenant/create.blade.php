@extends('layouts.agent')
@section('page_title')
  - Create a new tanent
@endsection
@section('content')
<section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
        <div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        @include('Alerts.success')
        @include('Alerts.danger')
          <div class="widget-content widget-content-area br-6">
              <a href="{!! route('MyInbox') !!}" class="btn btn-primary float-right" style="margin: 1rem">Back</a>
              <br>
              <br>
              <br>
              <br>
              <form class="needs-validation" novalidate action="{!! route('tanents.store') !!}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">Name:</label>
                          <input type="text" class="form-control" value="{{ $name }}" name="name" required>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">Email:</label>
                          <input type="email" class="form-control" value="{{ $email }}" name="email" readonly required>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">Password:</label>
                          <input type="text" class="form-control" name="password" required>
                      </div>
                  </div>
                  <button class="btn btn-primary mt-3" type="submit">Save</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
