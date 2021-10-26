@extends('layouts.tanent')
@section('page_title')
All properties
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
                    @include('layouts.menu.tenantmenu')
                    <div class="col-lg-4 col-xl-4 mb10">
                        <div class="breadcrumb_content style2 mb30-991">
                            <h2 class="breadcrumb_title">Properties</h2>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-8">

                        <div class="candidate_revew_select style2 text-right mb30-991">
                            <ul class="mb0">
                                <li class="list-inline-item">
                                    @if(Auth::user()->account_role == "Agent")
                                        <a href="{!! route('services.agent.index') !!}" class="btn btn-danger">Back</a>
                                        @endif
                                        @if(Auth::user()->account_role == "Tenant")
                                            <a href="{!! route('services.request.index') !!}" class="btn btn-danger">Back</a>
                                            @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @include('Alerts.success')
                        @include('Alerts.danger')
                        <div class="my_dashboard_review mb40">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <h4> Services Request Details: </h4>
                                            </li>
                                            <li class="list-group-item"> <strong>Request For : </strong> {{ $ServiceRequest->service_title }} </li>
                                            <li class="list-group-item"> <strong>Apertment Name : </strong> {{ $ServiceRequest->title }} </li>
                                            <li class="list-group-item"> <strong>Type : </strong> {{ $ServiceRequest->type }} </li>
                                            <li class="list-group-item"> <strong>Property ID : </strong> {{ $ServiceRequest->code_id }} </li>
                                            <li class="list-group-item"> <strong>Requested By(Name) : </strong> {{ $ServiceRequest->requester }} </li>
                                            <li class="list-group-item"> <strong>Status : </strong> <span class="badge badge-warning"> {{ $ServiceRequest->status }} </span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        @if (Auth::user()->account_role == "Agent" || Auth::user()->account_role == "Constructor")
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add new expenses</a>
                                        @endif
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Expense name</th>
                                                        <th scope="col">Expense</th>
                                                        <th scope="col">Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($servicesExpense as $expense)
                                                    <tr>
                                                        <td>{{ $expense->expense_name }}</td>
                                                        <td>{{ $expense->expense }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($expense->date)->diffForHumans() }}</td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="4">No expense added yet!</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button class="btn btn-info mt-4" disabled>Total Expense: ${{ DB::table('expenses')->where('request_id', $ServiceRequest->id)->sum('expense') }}</button>
                                </div>


                                {{-- Modals For Expense Start --}}
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add an expense</h5>
                                            </div>
                                            <form action="">
                                                <div class="modal-body">
                                                    <label for="expense_name">Expense Name:</label>
                                                    <input type="text" name="expense_name" id="expense_name" class="form-control mb-2">
                                                    <label for="price">Price:</label>
                                                    <input type="text" name="price" id="price" class="form-control mb-2">
                                                    <label for="date">Date:</label>
                                                    <input type="date" name="date" id="date" class="form-control mb-2">
                                                    <label for="desc">Description:</label>
                                                    <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Write here..." class="form-control mb-2"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal for expense End --}}

                                <div class="col-md-12 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>Request Descriptions: </h3>
                                            <hr>
                                            <p> {{ $ServiceRequest->request_desc }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>Notes: </h3>
                                            <hr>
                                            <p> {{ $ServiceRequest->notes }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <hr>
                                    <h2>All Comments</h2>
                                    <hr>
                                    @forelse ($servicesComments as $comment)
                                    <div class="card mb-2 bg-dark" style="color:white">
                                        <div class="card-body">
                                            <strong>{{ $comment->commented_by }}</strong>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p style="color:white">{{ $comment->comment }}</p>
                                                </div>
                                                <div class="col-md-4"> <small> {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }} </small> </div>
                                            </div>
                                        </div>
                                    </div>

                                    @empty
                                    <div class="card-body bg-dark" style="color:white">
                                        <p>No comments...</p>
                                    </div>
                                    @endforelse

                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="comments">Add a comments</label>
                                            <form action="{!! route('services.comments.store') !!}" method="post">
                                                @csrf
                                                <input type="hidden" name="request_id" value="{{ $ServiceRequest->id }}">
                                                <textarea name="comment" id="" cols="30" rows="5" placeholder="Write your comments..." class="form-control"></textarea>
                                                <button type="submit" class="btn btn-success mt-2">Comment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt10">
                    <div class="col-lg-12">
                        <div class="copyright-widget text-center">
                            <p>©2021 Argo. Made By SifzTech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection
