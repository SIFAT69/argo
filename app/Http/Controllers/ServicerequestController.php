<?php

namespace App\Http\Controllers;

use App\Models\Servicerequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ServicerequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->account_role == "Agent")
        {
            $servicesRequests = DB::table('servicerequests')->where('agent_id', Auth::id())->get();
            return view('Agent.Services.index',compact('servicesRequests'));
        }
        if(Auth::user()->account_role == "Tenant"){
            $servicesRequests = DB::table('servicerequests')->where('user_id', Auth::id())->get();
            return view('Tanent.Services.services',compact('servicesRequests'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties = DB::table('properties')->where('assigned_to', Auth::id())->get();
        $projects = DB::table('projects')->where('assigned_to', Auth::id())->get();
        return view('Tanent.Services.create', compact('properties', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_title' => ['required'],
            'type' => ['required'],
            'code_id' => ['required'],
            'title' => ['required'],
            'priority' => ['required'],
            'request_desc' => ['required'],
            'notes' => ['required'],
        ]);

        if($request->type == "Project")
        {
            echo $agent_id = DB::table('projects')->where('code', $request->code_id)->value('user_id');
        }
        else{
            echo $agent_id = DB::table('properties')->where('code', $request->code_id)->value('user_id');
        }
        DB::table('servicerequests')->insert([
            'title' => $request->title,
            'service_title' => $request->service_title,
            'type' => $request->type,
            'code_id' => $request->code_id,
            'priority' => $request->priority,
            'request_desc' => $request->request_desc,
            'notes' => $request->notes,
            'user_id' => Auth::id(),
            'agent_id' => $agent_id,
            'status' => 'New',
            'requester' => Auth::user()->name,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Your service request has been placed. We will give an feedback soon.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicerequest  $servicerequest
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $ServiceRequest = DB::table('servicerequests')->where('id', $request->id)->first();
        $servicesComments = DB::table('commentservices')->where('request_id',  $ServiceRequest->id)->get();
        $servicesExpense = DB::table('expenses')->where('request_id',  $ServiceRequest->id)->get();
        if(Auth::user()->account_role == "Agent"){
            return view('Agent.Services.show',compact('ServiceRequest','servicesComments','servicesExpense'));
        }else if(Auth::user()->account_role == "Tenant"){
            return view('Tanent.Services.show',compact('ServiceRequest','servicesComments','servicesExpense'));
        }else {
          return view('ServiceDashboard.show',compact('ServiceRequest','servicesComments','servicesExpense'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicerequest  $servicerequest
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicerequest $servicerequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicerequest  $servicerequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicerequest $servicerequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicerequest  $servicerequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('servicerequests')->where('id', $request->id)->delete();

        return back()->with('danger','You have deleted a service request from the list!');
    }

    public function updateStatus(Request $request)
    {
       DB::table('servicerequests')->where('id', $request->id)->update([
           'status' => $request->status,
       ]);

       return back()->with('success', 'Your status has been upadated!');
    }

    public function servicesForServiceProviders()
    {
      $agent_id = Auth::user()->created_by;
      $servicesRequests = DB::table('servicerequests')->where('agent_id', $agent_id)->get();
      return view('ServiceDashboard.servicerequest',compact('servicesRequests'));
    }
}
