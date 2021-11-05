@extends('layouts.agent')
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
                    <div class="col-lg-12">
                    @include('layouts.menu.agentmenu')
                    <div class="col-lg-12 col-xl-12">
                        <div class="candidate_revew_select style2 text-right mb30-991">
                            <ul class="mb0">
                                <li class="list-inline-item">
                                    <div class="candidate_revew_search_box course fn-520">
                                        <form class="form-inline my-2">
                                            <input class="form-control mr-sm-2" type="search" id="myInput" placeholder="Search properties" aria-label="Search">
                                            <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
                                        </form>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{!! route('MyPropertiesCreate') !!}" class="btn btn-success">Create New</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @include('Alerts.success')
                        @include('Alerts.danger')
                        <div class="my_dashboard_review mb40">
                            <div class="property_table">
                                <div class="table-responsive mt0">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Listing Title</th>
                                                <th scope="col">Date published</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Remain Days</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            @forelse ($properties as $property)
                                            <tr>
                                                <th scope="row">
                                                    <div class="feat_property list favorite_page style2">
                                                        <div class="thumb">
                                                            <img class="img-whp" src="../uploads/{{ $property->youtube_thumb }}" alt="fp1.jpg">
                                                            <div class="thmb_cntnt">
                                                                <ul class="tag mb0">
                                                                    @if($property->type == 'Rent')
                                                                        @if($property->assigned_to == null)
                                                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                                            @else
                                                                            <li class="list-inline-item"><a href="#">Rent Out</a></li>
                                                                            @endif
                                                                            @else
                                                                            @if($property->assigned_to == null)
                                                                                <li class="list-inline-item"><a href="#">For Sell</a></li>
                                                                                @else
                                                                                <li class="list-inline-item"><a href="#">Sold Out</a></li>
                                                                                @endif
                                                                                @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="details">
                                                            <div class="tc_content">
                                                                <h4>{{ $property->title }}</h4>
                                                                <p><span class="flaticon-placeholder"></span> {{ $property->city }} {{ $property->states }} {{ $property->location }}</p>
                                                                <a class="fp_price text-thm" href="#">${{ $property->price }}
                                                                    @if($property->type == "Rent") <small>/mo</small>
                                                                        @endif</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td>{{ Carbon\Carbon::parse($property->created_at)->format('Y-M-d') }}</td>
                                                <td><span class="status_tag badge">{{ $property->moderation_status }}</span></td>
                                                <td>
                                                  {{ $property->remaining_days }} Days
                                                  @if ($property->remaining_days <= 5)
                                                  <small class="badge badge-danger">Due Incoming.</small>
                                                  @endif
                                                </td>
                                                {{-- <td>2,345</td> --}}
                                                <td>
                                                    <ul class="view_edit_delete_list mb0">
                                                        @if ($property->assigned_to == Null)
                                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Assign"><a href="{!! route('MyPropertiesAssign', $property->id) !!}"> <img src="https://img.icons8.com/ios-glyphs/30/000000/batch-assign.png" width="22px" alt=""> </li>
                                                        @endif
                                                        @if ($property->remaining_days <= 5)
                                                        <a href="{!! route('agent.offline.payment',$property->id) !!}" class="btn btn-warning" class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Paid Offline">Paid Offline</a>
                                                        @endif
                                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit"><a href="{!! route('MyPropertiesEdit',$property->id) !!}"><i class="far fa-edit"></i></a></li>
                                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="{!! route('agent.HardDeleteProperty', $property->id) !!}"><i class="far fa-trash-alt"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No property found!</td>
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
                            <p>©2021 Argo. Made By SifzTech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
