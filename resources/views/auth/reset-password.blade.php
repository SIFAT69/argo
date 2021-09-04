@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
Reset password
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <br>
      <br>
      <br>
      @if (Session::has('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="card text-center">
        <div class="card-header">
          Reset password from here....
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('password.update') }}">
              @csrf

              <!-- Password Reset Token -->
              <input type="hidden" name="token" value="{{ $request->route('token') }}">

              <!-- Email Address -->
              <div>
                  <x-label for="email" :value="__('Email')" />

                  <input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
              </div>

              <!-- Password -->
              <div class="mt-4">
                  <x-label for="password" :value="__('Password')" />

                  <input id="password" class="form-control" type="password" name="password" required />
              </div>

              <!-- Confirm Password -->
              <div class="mt-4">
                  <x-label for="password_confirmation" :value="__('Confirm Password')" />

                  <input id="password_confirmation" class="form-control"
                                      type="password"
                                      name="password_confirmation" required />
              </div>

              <div class="flex items-center justify-end mt-4">
                  <button class="btn btn-primary btn-block">
                      Reset Password
                  <button>
              </div>
          </form>
        </div>
        <div class="card-footer text-muted">
          Made By Argo
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </div>
</div>

      @endsection
