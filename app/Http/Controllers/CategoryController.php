<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use App\Events\ActivityHappened;

class CategoryController extends Controller
{
    // Blade Locations
    function categoriesList(Request $request)
    {
      $categories = DB::table('categories')->get();
      return view('Dashboard.Blog.Category.index',compact('categories'));
    }
    // Blade Locations

    //Funtional Functions
    public function store(Request $request)
    {
      DB::table('categories')->insert([
        'title' => $request->title,
        'status' => $request->status,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      ActivityHappened::dispatch(Auth::id(), 'A new category has been created.');

      return back()->with('success', 'You have created a category successfully.');
    }

    public function edit(Request $request)
    {
      DB::table('categories')->where('id', $request->id)->update([
        'title' => $request->title,
        'status' => $request->status,
        'updated_at' => Carbon::now(),
      ]);

      ActivityHappened::dispatch(Auth::id(), 'A category has been updated.');

      return back()->with('success', 'You have updated a category successfully.');
    }

    public function delete(Request $request)
    {
      DB::table('categories')->where('id', $request->id)->delete();
      ActivityHappened::dispatch(Auth::id(), 'A category has been deleted.');

      return back()->with('danger', 'You just deleted a category!');
    }
    //Funtional Functions
}
