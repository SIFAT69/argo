@extends('layouts.agent')
@section('page_title')
Assign project
@endsection
@section('content')
<div class="container">
  <br>
  <br>
  <br>
  <br>
  @include('Alerts.success')
  @include('Alerts.danger')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <a href="{!! route('MyProject') !!}" class="btn btn-primary float-right" style="margin: 1rem">Back</a>
        <br>
        <br>
        <br>
        <br>
        <form class="needs-validation" novalidate action="{!! route('StoreMyProjectsAssign', $project->id) !!}" method="post">
            @csrf
            <div class="form-row">
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
                        <small class="text-danger">The project is not approved by admin. So assignment is not possible.</small>
                    @endif
                </div>
            </div>
            <button class="btn btn-primary mt-3 mb-3" type="submit" @if($project->moderation_status != "Approved") disabled @endif>Save</button>
        </form>
    </div>
</div>
</div>
@endsection
