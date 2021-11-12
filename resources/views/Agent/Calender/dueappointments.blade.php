@extends('layouts.agent')
@section('page_title')
 All Appointment
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
                                              <input class="form-control mr-sm-2" type="text" id="myInput" placeholder="Search appointments" aria-label="Search">
                                              <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
                                          </form>
                                      </div>
                                  </li>
                                  <li class="list-inline-item">
                                      <a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create New</a>
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
                                      <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Task</th>
                                          <th scope="col">Date</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody id="myTable">
                                        @forelse ($appointments as $appointment)
                                          <tr>
                                            <th scope="row">{{ $loop->index+1 }}</th>
                                            <td>{{ $appointment->appointment }}</td>
                                            <td>{{ \Carbon\Carbon::parse($appointment->timeframe)->format('d-M-Y') }}</td>
                                            <td>
                                              @if ($appointment->status == "Incomplete")
                                                <a href="{!! route('calender.appointments.status', $appointment->id) !!}" class="btn btn-success">Complete</a>
                                              @else
                                                <a href="{!! route('calender.appointments.status', $appointment->id) !!}" class="btn btn-warning">Undo</a>
                                              @endif
                                              <a href="{!! route('calender.appointments.delete', $appointment->id) !!}" class="btn btn-danger">Delete</a>
                                            </td>
                                          </tr>
                                        @empty
                                          <tr>
                                            <th colspan="3">Hurrah! No work today!</th>
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

  <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create an appointments:</h5>
      </div>
      <form class="" action="{!! route('calender.appointments.save') !!}" method="post">
        @csrf
      <div class="modal-body">
        <label for="">Appointment Details:</label>
        <input type="text" class="form-control mb-3" name="appointment">
        <label for="">Date:</label>
        <input type="date" class="form-control mb-3" name="date">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
