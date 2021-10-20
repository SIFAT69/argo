<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\ActivityHappened;
use Auth;
use Carbon\Carbon;
use Image;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('Dashboard.Plans.index', compact('plans'));
    }

    public function show(Plan $plan, Request $request)
    {
        $paymentMethods = $request->user()->paymentMethods();

        $intent = $request->user()->createSetupIntent();

        return view('Dashboard.Plans.show', compact('plan', 'intent'));
    }

    public function PlanStatus(Request $request)
    {
      $isActive = DB::table('plans')->where('id', $request->id)->value('status');

      if ($isActive == 1) {
        DB::table('plans')->where('id', $request->id)->update([
          'status' => 0,
        ]);
        return back()->with('danger', 'Your packages is no longer in listing.');
      }else {
        DB::table('plans')->where('id', $request->id)->update([
          'status' => 1,
        ]);
        return back()->with('success', 'Your packages is listed again.');
      }
    }

    public function DeletePackages(Request $request)
    {
      DB::table('plans')->where('id', $request->id)->delete();

      ActivityHappened::dispatch(Auth::id(), 'A package has been deleted.');

      return back()->with('danger', 'Ops! You just deleted a package.');
    }
}
