@extends('layouts.Apps')
@section('Site_name')
Argo
@endsection
@section('page_name')
Lost password
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
            Reset Password:
          </div>
          <div class="card-body mb-5">
            <form method="POST" action="{{ route('password.email') }}">
              @csrf

              <!-- Email Address -->
              <div>
                <label for="email">Enter your email:</label>
                <input type="email" class="form-control"  name="email" required>
              </div>

              <div class="flex items-center justify-end mt-4">
                <button class="btn btn-primary btn-block">
                  Email Password Reset Link
                </button>
              </div>
            </form>
          </div>
        </div>
        <br>
        <br>
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
