<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;

class RealstatecategoryController extends Controller
{
    // VIEW FUNCTIONS
    public function index(Request $request)
    {
      $categories = DB::table('realstatecategories')->get();
      return view('Dashboard.RealState.Category.categories',compact('categories'));
    }
    // VIEW FUNCTIONS

    //Category Functional Functions
    public function store(Request $request)
    {
      DB::table('realstatecategories')->insert([
        'name' => $request->realstatecategory,
        'created_at' => Carbon::now(),
      ]);

      return back()->with('success', 'You have created a new category for realstates.');
    }
    public function edit(Request $request)
    {
      DB::table('realstatecategories')->where('id', $request->id)->update([
        'name' => $request->realstatecategory,
        'updated_at' => Carbon::now(),
      ]);

      return back()->with('success', 'You have updated a category for realstates.');
    }
    public function delete(Request $request)
    {
      DB::table('realstatecategories')->where('id', $request->id)->delete();
      return back()->with('danger', 'You have deleted a category for realstates.');
    }
    //Category Functional Functions
}
