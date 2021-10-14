@extends('layouts.agent')
@section('page_title')
Assign project
@endsection
@section('content')
<section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
        <div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
  @include('Alerts.success')
  @include('Alerts.danger')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <a href="{!! route('MyProject') !!}" class="btn btn-primary float-right" style="margin: 1rem">Back</a>
        <br>
        <br>
        <br>
        <br>
        <form class="needs-validation" novalidate action="{!! route('StoreMyPropertiesAssign', $project->id) !!}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="property_name" value=" {{ $project->title }} ">
            <input type="hidden" name="contract_property_id" value=" {{ $project->id }} ">
            <input type="hidden" name="contract_property_code" value=" {{ $project->code }} ">
            <div class="form-row">
                <div class="col-md-6 mb-4">
                    <label for="">Contract interval amount :</label>
                    <input type="text" name="contract_interval_amount" class="form-control">
                </div>
                  <div class="col-md-6 mb-4">
                    <label for="">Contract Interval :</label>
                    <select name="contract_interval" class="form-control">
                        <option value="Days">Days</option>
                        <option value="Months">Months</option>
                        <option value="Years">Years</option>
                    </select>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="validationCustom01">Tenant Name :</label>
                    <select class="form-control" name="tanent_name" required @if($project->moderation_status != "Approved") disabled @endif>
                        <option value="">Select Tenant</option>
                        @foreach($tenants as $tenant)
                            @if($tenant->id == $project->assigned_to)
                                <option value="{{ $project->name }}" selected>{{ $tenant->name }}</option>
                            @else
                                <option value="{{ $tenant->name }}">{{ $tenant->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($project->moderation_status != "Approved")
                        <small class="text-danger">The property is not approved by admin. So assignment is not possible.</small>
                    @endif
                </div>
                <div class="col-md-12 mb-4">
                    <label for="validationCustom01">Tenant List :</label>
                    <select class="form-control" name="tenant_id" required @if($project->moderation_status != "Approved") disabled @endif>
                        <option value="">Select Tenant</option>
                        @foreach($tenants as $tenant)
                            @if($tenant->id == $project->assigned_to)
                                <option value="{{ $tenant->id }}" selected>{{ $tenant->email }} ({{ $tenant->name }})</option>
                            @else
                                <option value="{{ $tenant->id }}">{{ $tenant->email }} ({{ $tenant->name }})</option>
                            @endif
                        @endforeach
                    </select>
                    @if($project->moderation_status != "Approved")
                        <small class="text-danger">The property is not approved by admin. So assignment is not possible.</small>
                    @endif
                </div>

                <div class="col-md-12 mb-4">
                    <label for="">Description :</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Write here ...."></textarea>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="">Files :</label>
                    <input type="file" class="form-control-file" multiple name="files[]">
                </div>
            </div>
            <button class="btn btn-primary mt-3 mb-3" type="submit" @if($project->moderation_status != "Approved") disabled @endif>Save</button>
        </form>
    </div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
                    </section>
@endsection
