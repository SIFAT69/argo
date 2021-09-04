@extends('layouts.dashboard')
@section('page_title')
Edit Terms & Conditions
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                @include('Alerts.success')
                @include('Alerts.danger')
                <div class="widget-content widget-content-area br-6">
                    <form class="needs-validation" novalidate action="{{ route('settings.tAndC.update') }}" method="post">
                        @csrf
                        <div class="form-row">
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-12">
                                <div class="">
                                    <div class="widget-content">
                                      <textarea name="description">{{ old('description') ?? $description }}</textarea>
                                      <script>
                                              CKEDITOR.replace('description' );
                                      </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
