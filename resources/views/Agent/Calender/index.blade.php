@extends('layouts.agent')
@section('page_title')
 Calender And Appointment
@endsection
@section('content')
<script>function display_ct6() {
    var x = new Date()
    var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
    hours = x.getHours( ) % 12;
    hours = hours ? hours : 12;
    var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear();
    x1 = x1 + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
    document.getElementById('ct6').innerHTML = x1;
    display_c6();
     }
     function display_c6(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct6()',refresh)
    }
    display_c6()
</script>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        @include('Alerts.success')
        @include('Alerts.danger')
        <button type="button" class="btn btn-success mb-3" name="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create An Appointment</button>
        <h2>Today Date: </h2>
        <hr>
        <h1 id='ct6' style="font-size: 80px"></h1>
        <hr>
      </div>
      <div class="col-md-12 mt-3">
        <div class="card">
          <div class="card-body">
            <h3>Todays Appointments : {{ \Carbon\Carbon::now()->format('M-d-Y') }}</h3>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Task</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($appointmentstodays as $appointment)
                  <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $appointment->appointment }}</td>
                    <td>
                      @if ($appointment->status == "Incomplete")
                        <a href="{!! route('calender.appointments.status', $appointment->id) !!}" class="btn btn-success">Complete</a>
                      @else
                        <a href="{!! route('calender.appointments.status', $appointment->id) !!}" class="btn btn-warning">Undo</a>
                      @endif
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
          </div>
        </div>
        <div class="col-md-12 mt-3">
        <div class="card">
          <div class="card-body">
              <h3>Upcoming Appointments : {{ \Carbon\Carbon::now()->addDay(1)->format('M-d-Y') }}</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($appointmentstomorrow as $appointment)
                    <tr>
                      <th scope="row">{{ $loop->index+1 }}</th>
                      <td>{{ $appointment->appointment }}</td>
                      <td>
                        @if ($appointment->status == "Incomplete")
                          <a href="{!! route('calender.appointments.status', $appointment->id) !!}" class="btn btn-success">Complete</a>
                        @else
                          <a href="{!! route('calender.appointments.status', $appointment->id) !!}" class="btn btn-warning">Undo</a>
                        @endif
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

          </div>
        </div>

    </div>
  </div>

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
