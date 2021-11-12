<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use App\Events\ActivityHappened;
use Illuminate\Support\Str;

class CalenderController extends Controller
{
    public function index()
    {
      $appointmentstodays = DB::table('calenders')->where('timeframe', Carbon::today())->get();
      $appointmentstomorrow = DB::table('calenders')->where('timeframe', Carbon::today()->addDay(1))->get();
      return view('Agent.Calender.index',compact('appointmentstodays', 'appointmentstomorrow'));
    }
    public function appointments()
    {
      $appointments = DB::table('calenders')->where('status', 'Incomplete')->get();
      return view('Agent.Calender.dueappointments',compact('appointments'));
    }

    public function appointmentsSave(Request $request)
    {
      DB::table('calenders')->insert([
        'appointment' => $request->appointment,
        'timeframe' => $request->date,
      ]);

      return back()->with('success', 'Your appointment has been added!');
    }

    public function appointmentsStatus(Request $request)
    {
      $status = DB::table('calenders')->where('id', $request->id)->value('status');
      if ($status == "Incomplete") {
        DB::table('calenders')->where('id', $request->id)->update([
          'status' => 'Complete',
        ]);
        return back()->with('success', 'You done one for today!');
      }else {
        DB::table('calenders')->where('id', $request->id)->update([
          'status' => 'Incomplete',
        ]);
        return back()->with('success', 'You just undo one more for today!');
      }

    }

    public function appointmentsDelete(Request $request)
    {
      DB::table('calenders')->where('id', $request->id)->delete();
      return back()->with('danger', 'You just deleted appointments!');
    }
}
