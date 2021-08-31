@extends('layouts.dashboard')
@section('page_title')
Edit user
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                <div class="widget-content widget-content-area br-6">
                    <a href="{!! route('users.index') !!}" class="btn btn-primary float-right" style="margin: 1rem">Back</a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <form class="needs-validation" novalidate action="{!! route('users.update', $user->id) !!}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-row">
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Full Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}" required>
                                @error('name')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') ?? $user->email }}" required>
                                @error('email')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">License:</label>
                                <input type="text" class="form-control" name="license" value="{{ old('license') ?? $user->license }}">
                                @error('license')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Tax Number:</label>
                                <input type="text" class="form-control" name="taxNumber" value="{{ old('taxNumber') ?? $user->taxNumber }}">
                                @error('taxNumber')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Phone Number:</label>
                                <input type="text" class="form-control" name="phoneNumber" value="{{ old('phoneNumber') ?? $user->phoneNumber }}">
                                @error('phoneNumber')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Fax Number:</label>
                                <input type="text" class="form-control" name="faxNumber" value="{{ old('faxNumber') ?? $user->faxNumber }}">
                                @error('faxNumber')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Mobile Number:</label>
                                <input type="text" class="form-control" name="mobileNumber" value="{{ old('mobileNumber') ?? $user->mobileNumber }}">
                                @error('mobileNumber')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Language:</label>
                                <input type="text" class="form-control" name="language" value="{{ old('language') ?? $user->language }}">
                                @error('language')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Company Name:</label>
                                <input type="text" class="form-control" name="companyName" value="{{ old('companyName') ?? $user->companyName }}">
                                @error('companyName')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-4">
                                <label for="validationCustom01">Address:</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') ?? $user->address }}">
                                @error('address')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 mb-4">
                                <label for="validationCustom01">About Me:</label>
                                <textarea class="form-control" rows="5" name="about">{{ old('about') ?? $user->about }}</textarea>
                                @error('about')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Skype:</label>
                                <input type="text" class="form-control" name="skype" value="{{ old('skype') ?? $user->skype }}">
                                @error('skype')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Website:</label>
                                <input type="text" class="form-control" name="website" value="{{ old('website') ?? $user->website }}">
                                @error('website')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Facebook:</label>
                                <input type="text" class="form-control" name="facebook" value="{{ old('facebook') ?? $user->facebook }}">
                                @error('facebook')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Twitter:</label>
                                <input type="text" class="form-control" name="twitter" value="{{ old('twitter') ?? $user->twitter }}">
                                @error('twitter')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Linkedin:</label>
                                <input type="text" class="form-control" name="linkedin" value="{{ old('linkedin') ?? $user->linkedin }}">
                                @error('linkedin')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Instagram:</label>
                                <input type="text" class="form-control" name="instagram" value="{{ old('instagram') ?? $user->instagram }}">
                                @error('instagram')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Google Plus:</label>
                                <input type="text" class="form-control" name="googlePlus" value="{{ old('googlePlus') ?? $user->googlePlus }}">
                                @error('googlePlus')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Youtube:</label>
                                <input type="text" class="form-control" name="youtube" value="{{ old('youtube') ?? $user->youtube }}">
                                @error('youtube')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Pinterest:</label>
                                <input type="text" class="form-control" name="pinterest" value="{{ old('pinterest') ?? $user->pinterest }}">
                                @error('pinterest')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-4 col-xl-4 mb-4">
                                <label for="validationCustom01">Vimeo:</label>
                                <input type="text" class="form-control" name="vimeo" value="{{ old('vimeo') ?? $user->vimeo }}">
                                @error('vimeo')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <div>
                                    @if($user->avatar)
                                        <img src="{{ asset('/uploads/' . $user->avatar) }}" width="100px" class="mb-3" alt="user avatar">
                                    @endif
                                </div>
                                <label for="validationCustom01">User Image:</label>
                                <input type="file" class="form-control-file mb-2" name="avatar" value="">
                                @error('avatar')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <form class="needs-validation" novalidate action="{!! route('users.update.password', $user->id) !!}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-row">
                            <div class="col-lg-6 col-xl-6 mb-4">
                                <label for="validationCustom01">New Password:</label>
                                <input type="password" class="form-control" name="newPassword" required>
                                @error('newPassword')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-xl-6 mb-4">
                                <label for="validationCustom01">Confirm New Password:</label>
                                <input type="password" class="form-control" name="newPassword_confirmation" required>
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
