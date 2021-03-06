@extends('layouts.service')
@section('page_title')
- Maintence Request
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
                      @include('layouts.menu.servicemenu')
                    <div class="col-lg-12">
                        <div class="candidate_revew_select style2 text-right mb30-991">
                          <a href="{!! route('dashboard') !!}" class="btn btn-danger float-right" style="margin: 1rem">Go Back</a>
                          <ul class="mb0">
                            <li class="list-inline-item">
                              <div class="candidate_revew_search_box course fn-520">
                                <form class="form-inline my-2">
                                  <input class="form-control mr-sm-2" type="search" id="myInput" placeholder="Search service request" aria-label="Search">
                                  <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
                                </form>
                              </div>
                            </li>
                          </ul>
                        </div>
                        @include('Alerts.success')
                        @include('Alerts.danger')
                        <div class="my_dashboard_review mb40">
                            <div class="property_table">
                                <div class="table-responsive mt0">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Servies Title</th>
                                                <th scope="col">Property/Project ID</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Property/Project Title</th>
                                                <th scope="col">Requester Name</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Request Time</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            @forelse ($servicesRequests as $servicesRequest)
                                            <tr>
                                                <td> {{ $servicesRequest->service_title }} </td>
                                                <td> {{ $servicesRequest->code_id }} </td>
                                                <td> {{ $servicesRequest->type }} </td>
                                                <td> {{ $servicesRequest->title }} </td>
                                                <td> {{ $servicesRequest->requester }} </td>
                                                <td>
                                                    @if ($servicesRequest->status == "New")
                                                    <span class="badge badge-danger">
                                                        {{ $servicesRequest->status }}
                                                    </span>
                                                    @endif
                                                    @if ($servicesRequest->status == "Assigned")
                                                    <span class="badge badge-info">
                                                        {{ $servicesRequest->status }}
                                                    </span>
                                                    @endif
                                                    @if ($servicesRequest->status == "In progress")
                                                    <span class="badge badge-primary">
                                                        {{ $servicesRequest->status }}
                                                    </span>
                                                    @endif
                                                    @if ($servicesRequest->status == "Complete")
                                                    <span class="badge badge-success">
                                                        {{ $servicesRequest->status }}
                                                    </span>
                                                    @endif
                                                    @if ($servicesRequest->status == "Hold")
                                                    <span class="badge badge-dark">
                                                        {{ $servicesRequest->status }}
                                                    </span>
                                                    @endif
                                                    @if ($servicesRequest->status == "Cancelled")
                                                    <span class="badge badge-warning">
                                                        {{ $servicesRequest->status }}
                                                    </span>
                                                    @endif
                                                </td>
                                                <td> {{ \Carbon\Carbon::parse($servicesRequest->created_at)->diffForHumans() }} </td>
                                                <td>
                                                    <a href="{!! route('services.services.show', $servicesRequest->id) !!}" class="btn btn-outline-primary" title="See Details"><i class="fas fa-eye"></i></a>
                                                    <a href="{!! route('services.comments.cancel', $servicesRequest->id) !!}" class="btn btn-outline-warning" title="Cancel Request"><img src="https://img.icons8.com/color/48/000000/cancel--v3.png"
                                                          width="20px" alt=""></a>
                                                    <a data-bs-toggle="modal" data-bs-target="#hardDeleteRequest{{ $loop->index+1 }}" class="btn btn-outline-danger" title="Hard Delete Request"><i class="far fa-trash-alt"></i></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="hardDeleteRequest{{ $loop->index+1 }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">Are you sure?</h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <a href="{!! route('services.agent.destroy',  $servicesRequest->id) !!}" class="btn btn-danger">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No service request found!</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mbp_pagination">
                                    <ul class="page_navigation">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt10">
                    <div class="col-lg-12">
                        <div class="copyright-widget text-center">
                            <p>??2021 Argo. Made By SifzTech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection
