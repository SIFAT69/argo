@extends('layouts.dashboard')
@section('page_title')
Edit email configurations
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                @include('Alerts.success')
                <div class="widget-content widget-content-area br-6">
                    <form class="needs-validation" novalidate action="{{ route('settings.emailConfig.update') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Host:</label>
                                <input type="text" class="form-control" name="host" value="{{ old('host') ?? $emailConfig->host }}" required>
                                @error('host')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Port:</label>
                                <input type="number" class="form-control" name="port" value="{{ old('port') ?? $emailConfig->port }}" required>
                                @error('port')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Username:</label>
                                <input type="text" class="form-control" name="username" value="{{ old('username') ?? $emailConfig->username }}" required>
                                @error('username')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Password:</label>
                                <input type="text" class="form-control" name="password" value="{{ old('password') ?? $emailConfig->password }}" required>
                                @error('password')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Encryption:</label>
                                <input type="text" class="form-control" name="encryption" value="{{ old('encryption') ?? $emailConfig->encryption }}" required>
                                @error('encryption')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
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

<script src="{!! asset('BackAsset') !!}/plugins/file-upload/file-upload-with-preview.min.js"></script>
<script>
    //Second upload
    var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>
@endsection
