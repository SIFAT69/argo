@extends('layouts.agent')
@section('page_title')
Create New Tenant
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
                            <h2 class="breadcrumb_title">Create new tenant</h2>
                            <p>We are glad to see you again!</p>
                        </div>
                        <a href="{!! route('MyInbox') !!}" class="btn btn-danger float-right" style="margin: 1rem">Back to Message</a>
                    </div>
                    {{-- {{ $user }} --}}
                    <div class="col-lg-12">

                        @include('Alerts.success')
                        @include('Alerts.danger')
                        <div class="my_dashboard_review">
                            <div class="row">
                                <div class="col-xl-2">
                                    <h4>Profile Information</h4>
                                </div>
                                <div class="col-xl-10">
                                    <form action="{{ route('tanents.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{-- @method('PUT') --}}
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="wrap-custom-file">
                                                    <input type="file" name="avatar" id="image1" accept=".jpg, .png"/>
                                                    <label  for="image1" id="img-preview">
                                                        <span><i class="flaticon-download"></i> Upload Photo </span>
                                                    </label>
                                                </div>
                                                @error('avatar')
                                                    @include('layouts.atom.error')
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput1">Username</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput1" name="name" required>
                                                    @error('name')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleEmail">Email</label>
                                                    <input type="email" class="form-control" id="formGroupExampleEmail" name="email" required>
                                                    @error('email')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12 text-right">
                                                <div class="my_profile_setting_input">
                                                    <button type="submit" class="btn btn2">Create Now</button>
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

@section('script_in_body')
<script>
    $(document).ready(function () {
        $("#image1").change(function(){
            let fileObject = this.files[0];
            let fileType = fileObject.type;
            if(fileType == "image/png" || fileType == "image/jpeg" || fileType == "image/jpg")
            {
                let fileReader = new FileReader();
                fileReader.readAsDataURL(fileObject);
                fileReader.onload = function(e){
                    $("#img-preview").css('background-image', `url(${e.target.result})`);
                    $("#img-preview").css('background-repeat', `no-repeat`);
                    $("#img-preview").css('background-size', `250px 250px`);
                    console.log(`url(${e.target.result})`);
                };
            }
        });
    });
</script>
@endsection
