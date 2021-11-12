@extends('layouts.agent')
@section('page_title')
- Landlord List
@endsection
@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
      $(document).ready(function() {
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
                    @include('layouts.menu.agentmenu')
                    <div class="col-lg-12 col-xl-12">
                        <div class="candidate_revew_select style2 text-right mb30-991">
                            <ul class="mb0">
                                <li class="list-inline-item">
                                    <div class="candidate_revew_search_box course fn-520">
                                        <form class="form-inline my-2">
                                            <input class="form-control mr-sm-2" type="search" id="myInput" placeholder="Search landlords" aria-label="Search">
                                            <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
                                        </form>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{!! route('Landlord.create') !!}" class="btn btn-success">Create Landlords</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        @include('Alerts.success')
                        @include('Alerts.danger')
                        <div class="my_dashboard_review mb40">
                            <div class="col-lg-12">
                                <div class="packages_table">
                                    <div class="table-responsive mt0">
                                        <table class="table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Sl. No</th>
                                                    <th>Landlord Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Email</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                @forelse ($landlords as $lordlord)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}.</td>
                                                    <td>{{ $lordlord->name }}</td>
                                                    <td>{{ $lordlord->contact_number }}</td>
                                                    <td>{{ $lordlord->email }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($lordlord->created_at)->diffForHumans() }}</td>
                                                    <td>
                                                        <a href="{!! route('Landlord.show', $lordlord->id) !!}" class="btn btn-outline-info rounded bs-tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a>
                                                        <a href="{!! route('Landlord.edit', $lordlord->id) !!}" class="btn btn-outline-primary rounded bs-tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                                                        <a href="{!! route('Landlord.destroy', $lordlord->id) !!}" class="btn btn-outline-danger rounded bs-tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>

                                                @empty
                                                  <tr>
                                                    <td colspan="6" class="text-center">No landlords added yet!</td>
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
                <div class="row mt10">
                    <div class="col-lg-12">
                        <div class="copyright-widget text-center">
                            <p>© 2021 Argo. Made By SifzTech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
