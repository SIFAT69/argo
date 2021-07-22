<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;


class LocationController extends Controller
{
    // View Funtions
    public function indexCountries(Request $request)
    {
      $countries = DB::table('countries')->get();
      return view('dashboard.Location.Countriesindex',compact('countries'));
    }
    public function indexStates(Request $request)
    {
      $countries = DB::table('countries')->get();
      $states = DB::table('states')->get();
      return view('dashboard.Location.statesindex',compact('states','countries'));
    }
    public function indexCities(Request $request)
    {
      $countries = DB::table('countries')->get();
      $states = DB::table('states')->get();
      $cities = DB::table('cities')->get();
      return view('dashboard.Location.citiesindex',compact('states','countries','cities'));
    }
    // View Funtions

    // Countries funcional Function
    public function CountriesPost(Request $request)
    {
        DB::table('countries')->insert([
          'name' => $request->name,
          'nationality' => $request->nationality,
          'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'You have added a new country successfully.');
    }

    public function CountriesEdit(Request $request)
    {
      DB::table('countries')
      ->where('id', $request->id)
      ->update([
        'name' => $request->name,
        'nationality' => $request->nationality,
      ]);

      return back()->with('success', 'You have updated a new country successfully.');
    }



    public function delete(Request $request)
    {
      DB::table('countries')->where('id', $request->id)->delete();
      return back()->with('danger', 'You have deleted a country successfully.');
    }
    // Countries funcional Function


    // States Funtional Funtions
    public function StatesPost(Request $request)
    {
        DB::table('states')->insert([
          'states' => $request->state,
          'country' => $request->country,
          'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'You have added a new state successfully.');
    }

    public function StatesEdit(Request $request)
    {
      DB::table('states')
      ->where('id', $request->id)
      ->update([
        'states' => $request->state,
        'country' => $request->country,
      ]);

      return back()->with('success', 'You have updated a new country successfully.');
    }


    public function StatesDelete(Request $request)
    {
      DB::table('states')->where('id', $request->id)->delete();
      return back()->with('danger', 'You have deleted a country successfully.');
    }

    // States Funtional Funtions


    // Cities Functiona Functions
    public function CitiesPost(Request $request)
    {
        DB::table('cities')->insert([
          'city' => $request->city,
          'state' => $request->states,
          'country' => $request->country,
          'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'You have added a new city successfully.');
    }

    public function CitiesEdit(Request $request)
    {
      DB::table('cities')
      ->where('id', $request->id)
      ->update([
        'city' => $request->city,
        'state' => $request->states,
        'country' => $request->country,
      ]);

      return back()->with('success', 'You have updated a new city successfully.');
    }

    public function CitiesDelete(Request $request)
    {
      DB::table('cities')->where('id', $request->id)->delete();
      return back()->with('danger', 'You have deleted a city successfully.');
    }
    // Cities Functiona Functions


}
