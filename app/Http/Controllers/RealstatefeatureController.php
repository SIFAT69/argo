<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;


class RealstatefeatureController extends Controller
{
  public function realstateFeature()
  {
    $feature = DB::table('realstatefeatures')->get();
    return view('Dashboard.RealState.Feature.feature',compact('feature'));
  }

  public function realstateFeatureStore(Request $request)
  {
    DB::table('realstatefeatures')->insert([
      'feature' => $request->feature,
    ]);

    return back()->with('success', 'You have created a new feature!');
  }

  public function realstateFeatureEdit(Request $request)
  {
    DB::table('realstatefeatures')->where('id', $request->id)->update([
      'feature' => $request->feature,
    ]);
    return back()->with('success', 'You have updated a feature!');
  }
  public function realstateFeatureDelete(Request $request)
  {
    DB::table('realstatefeatures')->where('id', $request->id)->delete();
    return back()->with('danger', 'You have deleted a feature!');
  }
}
