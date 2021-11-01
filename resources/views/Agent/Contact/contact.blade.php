@extends('layouts.agent')
@section('page_title')
  - All Contacts
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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">View</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody id="myTable">
                        @forelse ($contacts as $contact)
                          <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phoneNumber }}</td>
                            <td>
                              <button type="button" class="btn btn-info" name="button" data-toggle="modal" data-target="#view{{ $loop->index+1 }}"> <i class="fa fa-eye"></i> </button>
                            </td>

                            <form class="" action="{!! route('MessageStatus') !!}" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{ $contact->id }}">
                            <td>
                              <select class="form-control" name="status">
                                <option @if($contact->status == 'Unread') selected @endif value="Unread">Unread</option>
                                <option @if($contact->status == 'Seen') selected @endif  value="Seen">Seen</option>
                                <option @if($contact->status == 'Delete') selected @endif  value="Delete">Delete</option>
                              </select>
                            </td>
                            <td>
                              <button type="submit" class="btn btn-success">Save</button>
                              <a type="button" class="btn btn-primary" href="{{ route('tanents.create', [$contact->email, $contact->name]) }}">Create</a>
                            </td>
                          </form>

                          </tr>
                          <div class="modal fade" id="view{{ $loop->index+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalCenterTitle">{{ $contact->name }}</h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                             <ul class="list-group list-group-flush">
                                              <li class="list-group-item">Email : {{  $contact->email }}</li>
                                              <li class="list-group-item">Phone Number : {{  $contact->phoneNumber }}</li>
                                              <li class="list-group-item">Message : {{  $contact->message }}</li>
                                            </ul>
                                           </div>
                                           <div class="modal-footer">
                                               <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                               {{-- <button type="button" class="btn btn-primary">Save</button> --}}
                                           </div>
                                       </div>
                                   </div>
                        @empty
                          <tr>
                            <td colspan="5" class="text-center">No contact found!</td>
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
