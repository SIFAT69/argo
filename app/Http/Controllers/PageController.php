<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function properties_lists(Request $request)
    {
      $properties = DB::table('properties')->where('moderation_status', 'Approved')->where('status', 1)->get();
      return view('Font.Properties.properties',compact('properties'));
    }

    public function projects_lists(Request $request)
    {
      $projects  = DB::table('projects')->where('status', 1)->get();
      return view('Font.Projects.projects',compact('projects'));
    }

    public function agencies_lists(Request $request)
    {
      $agents  = DB::table('users')->where('account_role', 'Agent')->get();
      return view('Font.Agents.agents',compact('agents'));
    }
    public function blogs_lists(Request $request)
    {
      $blogs  = DB::table('blogs')->get();
      return view('Font.Blogs.blogs',compact('blogs'));
    }
    public function contact(Request $request)
    {
      return view('Font.Contact.contact');
    }
}
