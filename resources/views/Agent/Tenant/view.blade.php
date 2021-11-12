@extends('layouts.agent')
@section('page_title')
  - Create a new tanent
@endsection
@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
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
            <a href="{!! route('users.agent.create') !!}" class="btn btn-info float-right" style="margin: 1rem">Create Tenant</a>
              <a href="{!! route('AgentDashboard') !!}" class="btn btn-danger float-right" style="margin: 1rem">Go Back</a>
              <div class="candidate_revew_select style2 text-right mb30-991">
                <ul class="mb0">
                  <li class="list-inline-item">
                    <div class="candidate_revew_search_box course fn-520">
                      <form class="form-inline my-2">
                          <input class="form-control mr-sm-2" type="search" id="myInput" placeholder="Search Tenants" aria-label="Search">
                          <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
                        </form>
                    </div>
                  </li>
                </ul>
              </div>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @forelse ($tenants as $tenant)
                            <tr>
                                <td>{{ $loop->index+1 }}.</td>
                                <td>{{ $tenant->name }}</td>
                                <td>{{ $tenant->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($tenant->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{!! route('AgentTenantShow', $tenant->id) !!}" class="btn btn-outline-info rounded bs-tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a>
                                    <a href="{!! route('AgentTenantEdit', $tenant->id) !!}" class="btn btn-outline-primary rounded bs-tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                                    @if (empty($tenant->deleted_at))
                                    <a href="{!! route('AgentTenantDestroy', $tenant->id) !!}" class="btn btn-outline-danger rounded bs-tooltip" data-placement="top" title="Lock"><i class="fas fa-lock"></i></a>
                                    @else
                                    <a href="{!! route('AgentTenantDestroy', $tenant->id) !!}" class="btn btn-outline-warning rounded bs-tooltip" data-placement="top" title="Unlock"><i class="fas fa-unlock"></i></a>
                                    @endif

                                </td>
                            </tr>

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
