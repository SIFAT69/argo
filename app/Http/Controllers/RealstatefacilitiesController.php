<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;


class RealstatefacilitiesController extends Controller
{
    public function realstateFacilities()
    {
      $facilities = DB::table('realstatefacilities')->get();
      return view('Dashboard.RealState.Facilities.facilities',compact('facilities'));
    }

    public function realstateFacilitiesStore(Request $request)
    {
      DB::table('realstatefacilities')->insert([
        'facility' => $request->facility,
      ]);

      return back()->with('success', 'You have created a new facility!');
    }

    public function realstateFacilitiesEdit(Request $request)
    {
      DB::table('realstatefacilities')->where('id', $request->id)->update([
        'facility' => $request->facility,
      ]);
      return back()->with('success', 'You have updated a facility!');
    }
    public function realstateFacilitiesDelete(Request $request)
    {
      DB::table('realstatefacilities')->where('id', $request->id)->delete();
      return back()->with('danger', 'You have deleted a facility!');
    }
}
