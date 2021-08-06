@extends('layouts.dashboard')
@section('page_title')
  Payment Gateway Settings
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
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
@endsection
