@extends('layouts.agent')
@section('page_title')
Create New Tenant
@endsection
@section('content')
  @php
    $user = Auth::user();
  @endphp
<section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
            <div class="col-lg-9 col-xl-10 maxw100flex-992">
                <div class="row">
                    @include('layouts.menu.agentmenu')
                    <a href="{!! route('users.agent.index') !!}" class="btn btn-danger float-right" style="margin: 1rem">Go Back</a>
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
                                    <form action="{{ route('service.providers.store') }}" method="POST" enctype="multipart/form-data">
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
                                            {{-- <div class="col-lg-12 col-xl-12">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleEmail">Select Roles</label>
                                                    <select name="account_role" id="" class="form-control">
                                                        <option value="Tenant">Tenant</option>
                                                        <option value="Service Providers">Service Providers</option>
                                                    </select>
                                                    @error('email')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div> --}}
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput6">License</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput6" value="{{ old('license') ?? $user->license }}" name="license">
                                                    @error('license')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput7">Tax Number</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput7" value="{{ old('taxNumber') ?? $user->taxNumber }}" name="taxNumber">
                                                    @error('taxNumber')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput8">Phone Number</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput8" value="{{ old('phoneNumber') ?? $user->phoneNumber }}" name="phoneNumber" >
                                                    @error('phoneNumber')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput9">Fax Number</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput9" value="{{ old('faxNumber') ?? $user->faxNumber }}" name="faxNumber" >
                                                    @error('faxNumber')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput10">Mobile Number</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput10" value="{{ old('mobileNumber') ?? $user->mobileNumber }}" name="mobileNumber" >
                                                    @error('mobileNumber')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput11">Language</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput11" value="{{ old('language') ?? $user->language }}" name="language" >
                                                    @error('language')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput12">Company Name</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput12" value="{{ old('companyName') ?? $user->companyName }}" name="companyName" >
                                                    @error('companyName')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput12">Date Of Birth</label>
                                                    <input type="date" class="form-control" id="dob" value="{{ old('dob') ?? $user->dob }}" name="dob" >
                                                    @error('dob')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                              <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput12">Bank Name</label>
                                                    <input type="text" class="form-control" id="bank_name" value="{{ old('bank_name') ?? $user->bank_name }}" name="bank_name" >
                                                    @error('bank_name')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput12">Bank Account</label>
                                                    <input type="text" class="form-control" id="bank_account" value="{{ old('bank_account') ?? $user->bank_account }}" name="bank_account" >
                                                    @error('bank_account')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput12">Bank Sort Code</label>
                                                    <input type="text" class="form-control" id="bank_sort_code" value="{{ old('bank_sort_code') ?? $user->bank_sort_code }}" name="bank_sort_code" >
                                                    @error('bank_sort_code')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput12">Payment Type</label>
                                                    <select name="payment_type" id="payment_type" class="form-control">
                                                        <option value="Bank" @if ($user->payment_type == "Bank") selected @endif>Bank</option>
                                                        <option value="Online" @if ($user->payment_type == "Online") selected @endif>Online</option>
                                                    </select>
                                                    @error('dob')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput12">Identification Documents</label>
                                                    <input type="file" class="form-control-file" multiple id="identification_documents" name="identification_documents" >
                                                    @error('identification_documents')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput12">Contractual Documents</label>
                                                    <input type="file" class="form-control-file" multiple id="contractual_documents" name="contractual_documents" >
                                                    @error('contractual_documents')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput13">Address</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput13" value="{{ old('address') ?? $user->address }}" name="address" >
                                                    @error('address')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_profile_setting_textarea">
                                                    <label for="exampleFormControlTextarea1">About me</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="about" >{{ old('about') ?? $user->about }}</textarea>
                                                    @error('about')
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
