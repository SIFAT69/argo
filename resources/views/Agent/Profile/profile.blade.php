@extends('layouts.agent')
@section('page_title')
  Profile
@endsection
@section('content')
<section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
            <div class="col-lg-9 col-xl-10 maxw100flex-992">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dashboard_navigationbar dn db-992">
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
                                <ul id="myDropdown" class="dropdown-content">
                                    <li class="active"><a href="page-dashboard.html"><span class="flaticon-layers"></span> Dashboard</a></li>
                                    <li><a href="page-message.html"><span class="flaticon-envelope"></span> Message</a></li>
                                    <li><a href="page-my-properties.html"><span class="flaticon-home"></span> My Properties</a></li>
                                    <li><a href="page-my-favorites.html"><span class="flaticon-heart"></span> My Favorites</a></li>
                                    <li><a href="page-my-savesearch.html"><span class="flaticon-magnifying-glass"></span> Saved Search</a></li>
                                    <li><a href="page-my-review.html"><span class="flaticon-chat"></span> My Reviews</a></li>
                                    <li><a href="page-my-packages.html"><span class="flaticon-box"></span> My Package</a></li>
                                    <li><a href="page-my-profile.html"><span class="flaticon-user"></span> My Profile</a></li>
                                    <li><a href="page-add-new-property.html"><span class="flaticon-filter-results-button"></span> Add New Listing</a></li>
                                    <li><a href="page-login.html"><span class="flaticon-logout"></span> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb10">
                        <div class="breadcrumb_content style2">
                            <h2 class="breadcrumb_title">My Profile</h2>
                            <p>We are glad to see you again!</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="my_dashboard_review">
                            <div class="row">
                                <div class="col-xl-2">
                                    <h4>Profile Information</h4>
                                </div>
                                <div class="col-xl-10">
                                    <form action="{{ route('update.agent.profile.information', $user->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="wrap-custom-file">
                                                    <input type="file" name="image1" id="image1" accept=".gif, .jpg, .png"/>
                                                    <label  for="image1">
                                                        <span><i class="flaticon-download"></i> Upload Photo </span>
                                                    </label>
                                                </div>
                                                <p>*minimum 260px x 260px</p>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput1">Username</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput1" value="{{ old('name') ?? $user->name }}" name="name" required>
                                                    @error('name')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleEmail">Email</label>
                                                    <input type="email" class="form-control" id="formGroupExampleEmail" value="{{ old('email') ?? $user->email }}" name="email" required>
                                                    @error('email')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput6">License</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput6" value="{{ old('license') ?? $user->license }}" name="license">
                                                    @error('license')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput7">Tax Number</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput7" value="{{ old('taxNumber') ?? $user->taxNumber }}" name="taxNumber">
                                                    @error('taxNumber')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput8">Phone Number</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput8" value="{{ old('phoneNumber') ?? $user->phoneNumber }}" name="phoneNumber" >
                                                    @error('phoneNumber')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput9">Fax Number</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput9" value="{{ old('faxNumber') ?? $user->faxNumber }}" name="faxNumber" >
                                                    @error('faxNumber')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput10">Mobile Number</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput10" value="{{ old('mobileNumber') ?? $user->mobileNumber }}" name="mobileNumber" >
                                                    @error('mobileNumber')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput11">Language</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput11" value="{{ old('language') ?? $user->language }}" name="language" >
                                                    @error('language')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput12">Company Name</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput12" value="{{ old('companyName') ?? $user->companyName }}" name="companyName" >
                                                    @error('companyName')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput13">Address</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput13" value="{{ old('address') ?? $user->address }}" name="address" >
                                                    @error('address')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_profile_setting_textarea">
                                                    <label for="exampleFormControlTextarea1">About me</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="about" >{{ old('about') ?? $user->about }}</textarea>
                                                    @error('about')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12 text-right">
                                                <div class="my_profile_setting_input">
                                                    <button class="btn btn1">View Public Profile</button>
                                                    <button type="submit" class="btn btn2">Update Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="my_dashboard_review mt30">
                            <div class="row">
                                <div class="col-xl-2">
                                    <h4>Social Media</h4>
                                </div>
                                <div class="col-xl-10">
                                    <form action="{{ route('update.agent.profile.socialMedia', $user->id) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <div class="row">
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleSkype">Skype</label>
                                                    <input type="text" class="form-control" id="formGroupExampleSkype" value="{{ old('skype') ?? $user->skype }}" name="skype">
                                                    @error('skype')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleWebsite">Website</label>
                                                    <input type="text" class="form-control" id="formGroupExampleWebsite" value="{{ old('website') ?? $user->website }}" name="website">
                                                    @error('oldPassword')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleFaceBook">Facebook</label>
                                                    <input type="text" class="form-control" id="formGroupExampleFaceBook" value="{{ old('facebook') ?? $user->facebook }}" name="facebook">
                                                    @error('facebook')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleTwitter">Twitter</label>
                                                    <input type="text" class="form-control" id="formGroupExampleTwitter" value="{{ old('twitter') ?? $user->twitter }}" name="twitter">
                                                    @error('twitter')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleLinkedin">Linkedin</label>
                                                    <input type="text" class="form-control" id="formGroupExampleLinkedin" value="{{ old('linkedin') ?? $user->linkedin }}" name="linkedin">
                                                    @error('linkedin')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInstagram">Instagram</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInstagram" value="{{ old('instagram') ?? $user->instagram }}" name="instagram">
                                                    @error('instagram')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleGooglePlus">Google Plus</label>
                                                    <input type="text" class="form-control" id="formGroupExampleGooglePlus" value="{{ old('googlePlus') ?? $user->googlePlus }}" name="googlePlus">
                                                    @error('googlePlus')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleYoutube">Youtube</label>
                                                    <input type="text" class="form-control" id="formGroupExampleYoutube" value="{{ old('youtube') ?? $user->youtube }}" name="youtube">
                                                    @error('youtube')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExamplePinterest">Pinterest</label>
                                                    <input type="text" class="form-control" id="formGroupExamplePinterest" value="{{ old('pinterest') ?? $user->pinterest }}" name="pinterest">
                                                    @error('pinterest')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleVimeo">Vimeo</label>
                                                    <input type="text" class="form-control" id="formGroupExampleVimeo" value="{{ old('vimeo') ?? $user->vimeo }}" name="vimeo">
                                                    @error('vimeo')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12 text-right">
                                                <div class="my_profile_setting_input">
                                                    <button type="submit" class="btn btn2">Update Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="my_dashboard_review mt30">
                            <div class="row">
                                <div class="col-xl-2">
                                    <h4>Change password</h4>
                                </div>
                                <div class="col-xl-10">
                                   <form action="{{ route('update.agent.profile.password', $user->id) }}" method="POST">
                                       @csrf 
                                       @method("PUT")
                                       <div class="row">
                                            <div class="col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleOldPass">Old Password</label>
                                                    <input type="password" class="form-control" id="formGroupExampleOldPass" name="oldPassword" value="{{ old('oldPassword') }}" required>
                                                    @error('oldPassword')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleNewPass">New Password</label>
                                                    <input type="password" class="form-control" id="formGroupExampleNewPass" name="newPassword" required>
                                                    @error('newPassword')
                                                        <div class="d-block small text-danger">
                                                            <b>{{ $message }}</b>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleConfPass">Confirm New Password</label>
                                                    <input type="password" class="form-control" id="formGroupExampleConfPass" name="newPassword_confirmation" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_profile_setting_input float-left fn-520">
                                                    <button class="btn btn3 btn-dark">Update Profile</button>
                                                </div>
                                                <div class="my_profile_setting_input float-right fn-520">
                                                    <button type="submit" class="btn btn2">Update Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt50">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="copyright-widget text-center">
                            <p>© 2021 Argo. Made with SifzTech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection