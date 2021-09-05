@extends('layouts.dashboard')
@section('page_title')
  Payment Gateway Settings
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                @include('Alerts.success')
                @include('Alerts.danger')
                <div class="widget-content widget-content-area br-6">
                  <form class="" action="index.html" method="post">
                    <label for="">Public Key</label>
                    <input type="text" class="form-control mb-2" name="public_key" value="{{ $paymentgateway_keys->public_key }}">
                    <label for="">Private Key</label>
                    <input type="text" class="form-control mb-2" name="private_key" value="{{ $paymentgateway_keys->private_key }}">
                    <button type="submit" class="btn btn-primary" name="button">Save</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
