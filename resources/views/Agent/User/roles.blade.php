@extends('layouts.agent')
@section('page_title')
  - Roles/Permission
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
          <div class="widget-content widget-content-area br-6">
              <a href="{!! route('agent.stuff.create') !!}" class="btn btn-success float-right" style="margin: 1rem">Create Stuff</a>
              <a href="{!! route('agent.create.roles') !!}" class="btn btn-warning float-right" style="margin: 1rem">Create Role</a>
              <a href="{!! route('agent.stuff') !!}" class="btn btn-info float-right" style="margin: 1rem">See Stuff's</a>
              <br>
              <br>
              <br>
              <br>
              <div class="packages_table">
                <div class="table-responsive mt0">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Role</th>
                                <th>Dashboard</th>
                                <th>Contacts</th>
                                <th>Message</th>
                                <th>Properties</th>
                                <th>Projects</th>
                                <th>Features</th>
                                <th>Facilities</th>
                                <th>Categories</th>
                                <th>Landlord</th>
                                <th>Tenant List</th>
                                <th>Service Request</th>
                                <th>Contracts</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <td>{{ $role->rolesname }}</td>
                                <td>@if($role->dashboard == "on") <span class="badge badge-success"> {{ $role->dashboard }}  </span> @else <span class="badge badge-danger">  off  </span> @endif</td>
                                <td>@if($role->contacts == "on") <span class="badge badge-success">  {{ $role->contacts }} </span> @else <span class="badge badge-danger">  off  </span> @endif</td>
                                <td>@if($role->message == "on") <span class="badge badge-success">  {{ $role->message }} </span> @else <span class="badge badge-danger"> off  </span> @endif</td>
                                <td>@if($role->properties == "on") <span class="badge badge-success"> {{ $role->properties }}  </span> @else <span class="badge badge-danger">  off   </span> @endif</td>
                                <td>@if($role->projects == "on") <span class="badge badge-success">  {{ $role->projects }} </span> @else <span class="badge badge-danger"> off   </span> @endif</td>
                                <td>@if($role->features == "on") <span class="badge badge-success">  {{ $role->features }} </span> @else <span class="badge badge-danger">  off  </span> @endif</td>
                                <td>@if($role->facilities == "on") <span class="badge badge-success"> {{ $role->facilities }}  </span> @else <span class="badge badge-danger">   off  </span> @endif</td>
                                <td>@if($role->categories == "on") <span class="badge badge-success">  {{ $role->categories }} </span> @else <span class="badge badge-danger"> off </span> @endif</td>
                                <td>@if($role->landlord == "on") <span class="badge badge-success">  {{ $role->landlord }} </span> @else <span class="badge badge-danger"> off   </span> @endif</td>
                                <td>@if($role->tenant_list == "on") <span class="badge badge-success">  {{ $role->tenant_list }} </span> @else <span class="badge badge-danger">   off  </span> @endif</td>
                                <td>@if($role->service_request == "on") <span class="badge badge-success">  {{ $role->service_request }} </span> @else <span class="badge badge-danger"> off    </span> @endif</td>
                                <td>@if($role->contracts == "on") <span class="badge badge-success"> {{ $role->contracts }}  </span> @else <span class="badge badge-danger">  off  </span> @endif</td>
                                <td>
                                  <a href="{!! route('agent.roles.edit', $role->id) !!}" class="mr-2"><i class="far fa-edit"></i></a>
                                  <a href="{!! route('agent.roles.delete', $role->id) !!}"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="13" class="text-center">No roles created yet!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
