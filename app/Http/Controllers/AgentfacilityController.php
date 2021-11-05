<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AgentfacilityController extends Controller
{
    public function index(Request $request)
    {
      if (Auth::user()->account_role == "Agent") {
        $facilities = DB::table('agentfacilities')->where('added_by', Auth::id())->get();
      }else {
        $facilities = DB::table('agentfacilities')->where('added_by', Auth::user()->created_by)->get();
      }
      return view('Agent.Facility.facilities', compact('facilities'));
    }

    public function create(Request $request)
    {
      return view('Agent.Facility.create');
    }

    public function store(Request $request)
    {
      if (Auth::user()->account_role == "Agent") {
        DB::table('agentfacilities')->insert([
          'facilities' => $request->facilities,
          'added_by' => $request->added_by,
          'created_at' => Carbon::now(),
        ]);
      }else {
        DB::table('agentfacilities')->insert([
          'facilities' => $request->facilities,
          'added_by' => Auth::user()->created_by,
          'created_at' => Carbon::now(),
        ]);
      }

        return back()->with('success', 'Your facility has been created successfully!');
    }

    public function edit(Request $request)
    {
      $facility = DB::table('agentfacilities')->where('id', $request->id)->first();
      return view('Agent.Facility.edit',compact('facility'));
    }

    public function update(Request $request)
    {
      if (Auth::user()->account_role == "Agent") {
        DB::table('agentfacilities')->where('id', $request->id)->update([
            'facilities' => $request->facilities,
            'added_by' => $request->added_by,
            'updated_at' => Carbon::now(),
        ]);
      }else {
        DB::table('agentfacilities')->where('id', $request->id)->update([
          'facilities' => $request->facilities,
          'added_by' => Auth::user()->created_by,
          'updated_at' => Carbon::now(),
        ]);
      }

        return back()->with('success', 'Your category has been updated!');
    }

    public function destroy(Request $request)
    {
        DB::table('agentfacilities')->where('id', $request->id)->delete();
        return back()->with('danger', 'Your category has been deleted');
    }
}
