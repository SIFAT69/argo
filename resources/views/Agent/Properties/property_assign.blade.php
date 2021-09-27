@extends('layouts.agent')
@section('page_title')
Assign property
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
  @if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <a href="{!! route('MyProperties') !!}" class="btn btn-primary float-right" style="margin: 1rem">Back</a>
        <br>
        <br>
        <br>
        <br>
        <h4>Create Contract And Assign property to user:</h4>
        <br>
        <form class="needs-validation" novalidate action="{!! route('StoreMyPropertiesAssign', $property->id) !!}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="property_name" value=" {{ $property->title }} ">
            <input type="hidden" name="contract_property_id" value=" {{ $property->id }} ">
            <input type="hidden" name="contract_property_code" value=" {{ $property->code }} ">
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
                    <select class="form-control" name="tanent_name" required @if($property->moderation_status != "Approved") disabled @endif>
                        <option value="">Select Tenant</option>
                        @foreach($tenants as $tenant)
                            @if($tenant->id == $property->assigned_to)
                                <option value="{{ $tenant->name }}" selected>{{ $tenant->name }}</option>
                            @else
                                <option value="{{ $tenant->name }}">{{ $tenant->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($property->moderation_status != "Approved")
                        <small class="text-danger">The property is not approved by admin. So assignment is not possible.</small>
                    @endif
                </div>
                <div class="col-md-12 mb-4">
                    <label for="validationCustom01">Tenant List :</label>
                    <select class="form-control" name="tenant_id" required @if($property->moderation_status != "Approved") disabled @endif>
                        <option value="">Select Tenant</option>
                        @foreach($tenants as $tenant)
                            @if($tenant->id == $property->assigned_to)
                                <option value="{{ $tenant->id }}" selected>{{ $tenant->email }} ({{ $tenant->name }})</option>
                            @else
                                <option value="{{ $tenant->id }}">{{ $tenant->email }} ({{ $tenant->name }})</option>
                            @endif
                        @endforeach
                    </select>
                    @if($property->moderation_status != "Approved")
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
            <button class="btn btn-primary mt-3 mb-3" type="submit" @if($property->moderation_status != "Approved") disabled @endif>Save</button>
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
