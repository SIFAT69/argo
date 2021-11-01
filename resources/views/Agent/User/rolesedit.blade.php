@extends('layouts.agent')
@section('page_title')
Edit New Roles
@endsection
@section('content')
<section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
            <div class="col-lg-9 col-xl-10 maxw100flex-992">
                <div class="row">
                    @include('layouts.menu.agentmenu')
                    <a href="{!! route('agent.roles') !!}" class="btn btn-danger float-right" style="margin: 1rem">Go Back</a>
                    {{-- {{ $user }} --}}
                    <div class="col-lg-12">

                        @include('Alerts.success')
                        @include('Alerts.danger')
                        <div class="my_dashboard_review">
                            <div class="row">
                                <div class="col-xl-2">
                                    <h4>Roles information</h4>
                                </div>
                                <div class="col-xl-10">
                                    <form action="{!! route('agent.roles.update', $role->id) !!}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput1">Role Name: </label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput1" name="rolesname" value="{{ $role->rolesname }}" required>
                                                    @error('name')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="formGroupExampleInput1">Permission For: </label>
                                                    <br>
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="dashboard" id="dashboard" @if($role->dashboard == 'on') checked @endif> <label for="dashboard">Dashboard</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="contacts" id="contacts" @if($role->contacts == 'on') checked @endif> <label for="contacts">Contacts</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="message" id="message" @if($role->message == 'on') checked @endif> <label for="message">Message</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="properties" id="properties" @if($role->properties == 'on') checked @endif> <label for="properties">Properties</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="projects" id="projects" @if($role->projects == 'on') checked @endif> <label for="projects">Projects</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="features" id="features" @if($role->features == 'on') checked @endif> <label for="features">Features</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="facilities" id="facilities" @if($role->facilities == 'on') checked @endif> <label for="facilities">Facilities</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="categories" id="categories" @if($role->categories == 'on') checked @endif> <label for="categories">Categories</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="landlord" id="landlord" @if($role->landlord == 'on') checked @endif> <label for="landlord">Landlord</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="tenant_list" id="tenant_list" @if($role->tenant_list == 'on') checked @endif> <label for="tenant_list">Tenant List</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="service_request" id="service_request" @if($role->service_request == 'on') checked @endif> <label for="service_request">Service Request</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                        <input type="checkbox" name="contracts" id="contracts" @if($role->contracts == 'on') checked @endif> <label for="contracts">Contracts</label>
                                                      </div>
                                                    </div>
                                                    @error('name')
                                                        @include('layouts.atom.error')
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12 text-right">
                                                <div class="my_profile_setting_input">
                                                    <button type="submit" class="btn btn2">Save</button>
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
