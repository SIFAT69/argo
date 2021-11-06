@extends('layouts.agent')
@section('page_title')
  All project
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
                    <a href="#" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Task</a>
                  </li>
                </ul>
              </div>
            </div>

            <!--Create Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create a new task:</h5>
                  </div>
                  <form class="" action="{!! route('agent.store') !!}" method="post">
                    @csrf
                  <div class="modal-body">
                    <label for="">Your Task : </label>
                    <input type="text" class="form-control" name="task">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            {{-- Create Modal --}}


            <div class="col-lg-12">
              @include('Alerts.success')
              @include('Alerts.danger')
              <div class="my_dashboard_review mb40">
                <div class="property_table">
                  <div class="table-responsive mt0">
                    <table class="table">
                      <thead class="thead-light">
                          <tr>
                            <th scope="col">Task No</th>
                            <th scope="col">Task</th>
                            <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody id="myTable">
                        @forelse ($tasks as $task)
                          <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $task->task }}</td>
                            <td>
                              <a href="#" class="btn btn-outline-primary rounded bs-tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#edittask"><i class="far fa-edit"></i></a>
                              <a href="{!! route('agent.delete', $task->id) !!}" class="btn btn-outline-danger rounded bs-tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>

                          <!--Create Modal -->
                          <div class="modal fade" id="edittask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit task:</h5>
                                </div>
                                <form class="" action="{!! route('agent.update', $task->id) !!}" method="post">
                                  @csrf
                                <div class="modal-body">
                                  <label for="">Your Task : </label>
                                  <input type="text" class="form-control" name="task" value="{{ $task->task }}">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save Task</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          {{-- Create Modal --}}
                        @empty
                          <tr>
                            <td colspan="5" class="text-center">No Task found!</td>
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
