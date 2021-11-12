@extends('layouts.agent')
@section('page_title')
  - Service Providers
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
              <a href="{!! route('users.agent.create') !!}" class="btn btn-success float-right" style="margin: 1rem">Create user</a>
              <br>
              <br>
              <br>
              <br>
              <div class="packages_table">
                <div class="table-responsive mt0">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Sl. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>User Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                              @if ($user->account_role != "Agent Stuff")
                            <tr>
                                <td>{{ $loop->index+1 }}.</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>

                                <form action="{!! route('users.agent.update') !!}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <td>
                                        <select name="account_role" id="" class="form-control">
                                            <option value="Tenant" @if($user->account_role == "Tenant") selected @endif>Tenant</option>
                                            <option value="Service Providers" @if($user->account_role == "Service Providers") selected @endif>Service Providers</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-outline-success rounded bs-tooltip" data-placement="top" title="Save"><img src="https://img.icons8.com/material-outlined/24/000000/save--v4.png" /></button>
                                    </form>
                                    <a href="{!! route('AgentTenantEdit', $user->id) !!}" class="btn btn-outline-info rounded bs-tooltip" data-placement="top" title="View"><img src="https://img.icons8.com/material-sharp/24/000000/edit--v1.png" width="25px" /></a>
                                    <a href="{!! route('AgentTenantShow', $user->id) !!}" class="btn btn-outline-info rounded bs-tooltip" data-placement="top" title="View"><img src="https://img.icons8.com/ios/50/000000/visible.png" width="25px" /></a>
                                    @if (empty($user->deleted_at))
                                    <a href="{!! route('AgentTenantDestroy', $user->id) !!}" class="btn btn-outline-danger rounded bs-tooltip" data-placement="top" title="Lock"><img src="https://img.icons8.com/ios-filled/64/000000/lock.png"  width="24px"/></a>
                                    @else
                                    <a href="{!! route('AgentTenantDestroy', $user->id) !!}" class="btn btn-outline-warning rounded bs-tooltip" data-placement="top" title="Unlock"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-unlock-multimedia-kiranshastry-solid-kiranshastry.png" width="24px"/></a>
                                    @endif

                                </td>
                            </tr>
                          @endif

                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No Tenants created yet!</td>
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
