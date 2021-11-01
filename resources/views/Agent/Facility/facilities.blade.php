@extends('layouts.agent')
@section('page_title')
Facilities
@endsection
@section('content')
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
                                        <a class="btn btn-success text-white mb-2" href="{!! route('Agentfacility.create') !!}"> Add Facilities </a>
                                    </div>
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
                                                    <th>Facilities Name</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($facilities as $facility)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}.</td>
                                                    <td>{{ $facility->facilities }}</td>
                                                    <td>{{ $facility->created_at }}</td>
                                                    <td>
                                                        <a href="{!! route('Agentfacility.edit', $facility->id) !!}" class="btn btn-outline-primary rounded bs-tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                                                        <a href="{!! route('Agentfacility.delete', $facility->id) !!}" class="btn btn-outline-danger rounded bs-tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>

                                                @empty
                                                  <tr>
                                                    <td colspan="4" class="text-center">No feature added yet!</td>
                                                  </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{--<div class="pck_chng_btn text-right">
                  <a href="{!! route('dashboard') !!}" class="btn btn-lg btn-thm">Return Dashboard</a>
                </div>--}}
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
