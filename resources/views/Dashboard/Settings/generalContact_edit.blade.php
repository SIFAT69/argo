@extends('layouts.dashboard')
@section('page_title')
Edit general contact
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
                    <form class="needs-validation" novalidate action="{{ route('settings.generalContact.update') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Short Description:</label>
                                <input type="text" class="form-control" name="about" value="{{ old('about') ?? $generalContact->about }}" required>
                                @error('about')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Address:</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') ?? $generalContact->address }}" required>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Phone:</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $generalContact->phone }}" required>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Mail:</label>
                                <input type="text" class="form-control" name="mail" value="{{ old('mail') ?? $generalContact->mail }}" required>
                                @error('mail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Skype:</label>
                                <input type="text" class="form-control" name="skype" value="{{ old('skype') ?? $generalContact->skype }}">
                                @error('skype')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Facebook:</label>
                                <input type="text" class="form-control" name="facebook" value="{{ old('facebook') ?? $generalContact->facebook }}">
                                @error('facebook')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Twitter:</label>
                                <input type="text" class="form-control" name="twitter" value="{{ old('twitter') ?? $generalContact->twitter }}">
                                @error('twitter')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Instagram:</label>
                                <input type="text" class="form-control" name="instagram" value="{{ old('instagram') ?? $generalContact->instagram }}">
                                @error('instagram')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Google Plus:</label>
                                <input type="text" class="form-control" name="googlePlus" value="{{ old('googlePlus') ?? $generalContact->googlePlus }}">
                                @error('googlePlus')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Pinterest:</label>
                                <input type="text" class="form-control" name="pinterest" value="{{ old('pinterest') ?? $generalContact->pinterest }}">
                                @error('pinterest')
                                    <div class="alert alert-danger">{{ $message }}</div>
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
