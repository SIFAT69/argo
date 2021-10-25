<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function contracts(Request $request)
    {
        if (Auth::user()->account_role == "Agent") {
          $contracts = DB::table('contracts')->where('agent_id', Auth::id())->get();
          return view('Agent.Contracts.contracts',compact('contracts'));
        }else {
          $contracts = DB::table('contracts')->where('tenant_id', Auth::id())->get();
          return view('Tanent.Contracts.contracts',compact('contracts'));
        }
    }

    public function show(Request $request)
    {
      if (Auth::user()->account_role == "Agent") {
        $contract = DB::table('contracts')->where('id', $request->id)->first();
        return view('Agent.Contracts.view', compact('contract'));
      }else {
        $contract = DB::table('contracts')->where('id', $request->id)->first();
        return view('Tanent.Contracts.view', compact('contract'));
      }
    }

    public function remove(Request $request)
    {

        DB::table('properties')->where('code', $request->code)->update([
            'assigned_to' => "",
        ]);
        DB::table('projects')->where('code', $request->code)->update([
            'assigned_to' => "",
        ]);

        DB::table('contracts')->where('id', $request->id)->delete();
        return back()->with('danger', 'You have deleted a contracts!');
    }
}
