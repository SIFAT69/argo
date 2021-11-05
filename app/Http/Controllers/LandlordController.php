<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use FontLib\Table\Type\name;

class LandlordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user()->account_role == "Agent") {
        $landlords = DB::table('landlords')->where('added_by', Auth::id())->get();
      }else {
        $landlords = DB::table('landlords')->where('added_by', Auth::user()->created_by)->get();
      }
        return view('Agent.Landlords.index',compact('landlords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Agent.Landlords.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (Auth::user()->account_role == "Agent") {
        DB::table('landlords')->insert([
          'name' => $request->name,
          'address' => $request->address,
          'contact_number' => $request->contact_number,
          'email' => $request->email,
          'bank_name' => $request->bank_name,
          'bank_account' => $request->bank_account,
          'bank_sort_code' => $request->bank_sort_code,
          'added_by' => Auth::id(),
          'created_at' => Carbon::now(),
        ]);
      }else {
        DB::table('landlords')->insert([
          'name' => $request->name,
          'address' => $request->address,
          'contact_number' => $request->contact_number,
          'email' => $request->email,
          'bank_name' => $request->bank_name,
          'bank_account' => $request->bank_account,
          'bank_sort_code' => $request->bank_sort_code,
          'added_by' => Auth::user()->created_by,
          'created_at' => Carbon::now(),
        ]);
      }

        return back()->with('success', 'Your landlord has been added to your list!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return view('Agent.Landlords.view',compact('landlord'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $landlord = DB::table('landlords')->where('id', $request->id)->first();
        return view('Agent.Landlords.edit',compact('landlord'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Landlord $landlord)
    {
      if (Auth::user()->account_role == "Agent") {
        DB::table('landlords')
        ->where('id', $request->id)
        ->update([
          'name' => $request->name,
          'address' => $request->address,
          'contact_number' => $request->contact_number,
          'email' => $request->email,
          'bank_name' => $request->bank_name,
          'bank_account' => $request->bank_account,
          'bank_sort_code' => $request->bank_sort_code,
          'added_by' => Auth::id(),
          'updated_at' => Carbon::now(),
        ]);
      }else {
        DB::table('landlords')
        ->where('id', $request->id)
        ->update([
          'name' => $request->name,
          'address' => $request->address,
          'contact_number' => $request->contact_number,
          'email' => $request->email,
          'bank_name' => $request->bank_name,
          'bank_account' => $request->bank_account,
          'bank_sort_code' => $request->bank_sort_code,
          'added_by' => Auth::user()->created_by,
          'updated_at' => Carbon::now(),
        ]);
      }

        return back()->with('success', 'Youre landlord profile has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('landlords')->where('id', $request->id)->delete();
        return back()->with('danger', 'You have deleted an landord profile!');
    }
}
