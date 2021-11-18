@extends('layouts.agent')
@section('page_title')
  | Tenant | {{ $tenant->name }}
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
                                          <a class="btn btn-info text-white mb-2" data-toggle="modal" data-target="#uploadDocs">Upload Documents</a>
                                          <a class="btn btn-primary text-white mb-2" href="{!! route('AgentTenantEdit', $tenant->id) !!}">Edit</a>
                                            @if(Route::is('Landlord.show') )
                                            <a class="btn btn-danger text-white mb-2" href="{!! route('Landlord.index') !!}">Go Back</a>
                                            @endif
                                            @if(Route::is('AgentTenantShow') )
                                            <a class="btn btn-danger text-white mb-2" href="{!! route('AgentTenant') !!}">Go Back</a>
                                            @endif
                                            @if(Route::is('AgentStuffShow') )
                                            <a class="btn btn-danger text-white mb-2" href="{!! route('agent.stuff') !!}">Go Back</a>
                                            @endif
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <!-- Modal -->
                      <div class="modal fade" id="uploadDocs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Documents</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{!! route('documents.store') !!}" method="post" enctype="multipart/form-data">
                              @csrf
                            <div class="modal-body">
                              <label for="">Upload documents : </label>
                              <input type="file" class="form-control-file" name="docs[]" multiple>
                              <input type="hidden" class="form-control" name="tenant_id" value="{{ $tenant->id }}">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                          @include('Alerts.success')
                          @include('Alerts.danger')
                          <div class="my_dashboard_review mb40">
                              <div class="col-lg-12">
                                <div class="card">
                                  <div class="card-header">
                                     <h4>{{ $tenant->name }}'s Details:</h4>
                                  </div>
                                  <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> <b>Name: </b> {{ $tenant->name }} </li>
                                        <li class="list-group-item"> <b>Address: </b> {{ $tenant->address }} </li>
                                        <li class="list-group-item"> <b>Email: </b> {{ $tenant->email }} </li>
                                        <li class="list-group-item"> <b>Contact: </b> {{ $tenant->phoneNumber }} </li>
                                        <li class="list-group-item"> <b>Bank Name: </b> {{ $tenant->bank_name }} </li>
                                        <li class="list-group-item"> <b>Bank Account: </b> {{ $tenant->bank_account }} </li>
                                        <li class="list-group-item"> <b>Bank Sort Code: </b> {{ $tenant->bank_sort_code }} </li>
                                        <li class="list-group-item"> <b>Payment Type: </b> {{ $tenant->payment_type }} </li>
                                        <li class="list-group-item"> <b>Date Of Birth: </b> {{ $tenant->dob }} </li>
                                        <li class="list-group-item"> <b>Identification Documents: </b> {{ $tenant->identification_documents }} </li>
                                        <li class="list-group-item"> <b>Documents : </b>
                                          <ul>
                                            @forelse ($documents as $document)
                                              <li>{{ $loop->index+1 }}. <a href="{!! asset('uploads') !!}/docs/{{ $document->documents }}">{{ $document->documents }}</a>  </li>
                                            @empty
                                              <li>No Docs found!</li>
                                            @endforelse
                                          </ul>
                                         </li>
                                        <li class="list-group-item"> <b>Status: </b> <small class="badge badge-success">Active</small> </li>
                                      </ul>
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
