<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Property;
use App\Models\Project;
use App\Models\User;
use App\Models\Agenciesmessage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Events\ActivityHappened;
use App\Models\ActivityLog;

class AgentfeaturesController extends Controller
{
    public function agentsFeaturesList(Request $request)
    {
      if (Auth::user()->account_role == 'Agent') {
        $features = DB::table('agentfeatures')->where('added_by', Auth::id())->get();
      }else {
        $features = DB::table('agentfeatures')->where('added_by', Auth::user()->created_by)->get();
      }
      return view('Agent.Feature.feature',compact('features'));
    }

    public function agentsFeaturesAdd()
    {
       return view('Agent.Feature.add_feature');
    }
    public function agentsFeaturesEdit(Request $request)
    {
      $feature = DB::table('agentfeatures')->where('id', $request->id)->first();
       return view('Agent.Feature.edit_feature',compact('feature'));
    }

    public function agentsFeaturesPost(Request $request)
    {
      if (Auth::user()->account_role == 'Agent') {
        DB::table('agentfeatures')->insert([
          'feature' => $request->feature,
          'added_by' => Auth::id(),
        ]);
      }else {
        DB::table('agentfeatures')->insert([
          'feature' => $request->feature,
          'added_by' => Auth::user()->created_by,
        ]);
      }

      return back()->with('success', 'You have successfully added a new feature!');
    }

    public function agentsFeaturesUpdate(Request $request)
    {
      if (Auth::user()->account_role == 'Agent') {
        DB::table('agentfeatures')->where('id', $request->id)->update([
          'feature' => $request->feature,
          'added_by' => Auth::id(),
        ]);
      }else {
        DB::table('agentfeatures')->where('id', $request->id)->update([
          'feature' => $request->feature,
          'added_by' => Auth::user()->created_by,
        ]);
      }

      return back()->with('success', 'You have successfully updated a new feature!');
    }

    public function agentsFeaturesDelete(Request $request)
    {
      DB::table('agentfeatures')->where('id', $request->id)->delete();
      return back()->with('danger', 'You have delete a feature from the list.');
    }
}
