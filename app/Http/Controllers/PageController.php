<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use App\Models\Project;
use App\Models\Property;
use App\Models\User;

class PageController extends Controller
{
    public function properties_lists(Request $request)
    {
      $properties = DB::table('properties')->where('moderation_status', 'Approved')->where('status', 1)->simplePaginate(8);
      return view('Font.Properties.properties',compact('properties'));
    }

    public function properties_view(Request $request)
    {
      $property = DB::table('properties')->where('slug', $request->slug)->first();
      $property->features = json_decode($property->features, true);
      $property->facilities = json_decode($property->facilities, true);
      $property->distance = json_decode($property->distance, true);

      $propertyOwner = User::find($property->user_id);

      $similarProperties = Property::where('moderation_status', 'Approved')->where('status', 1)->where('slug', '<>', $request->slug)->inRandomOrder()->limit(4)->get();
      foreach($similarProperties as $sp)
      {
          $user = User::findOrFail($sp->user_id);

          $sp->user_avatar = $user->avarar;
          $sp->user_name = $user->name;
      }

      $featuredProperties = Property::where('moderation_status', 'Approved')->where('status', 1)->where('slug', '<>', $request->slug)->where('is_Featured', 'Yes')->get();

      return view('Font.Properties.properties_view',compact('property', 'similarProperties', 'propertyOwner', 'featuredProperties'));
    }

    public function projects_lists(Request $request)
    {
      $projects  = DB::table('projects')->where('status', 1)->get();
      return view('Font.Projects.projects',compact('projects'));
    }

    public function agencies_lists(Request $request)
    {
      $agents  = DB::table('users')->where('account_role', 'Agent')->simplePaginate(8);
      return view('Font.Agents.agents',compact('agents'));
    }

    public function blogs_lists(Request $request)
    {
      $blogs  = DB::table('blogs')->paginate(3);
      return view('Font.Blogs.blogs',compact('blogs'));
    }

    public function contact(Request $request)
    {
      return view('Font.Contact.contact');
    }

    public function blog_details(Request $request)
    {
      $blog = DB::table('blogs')->where('slug', $request->slug)->first();
      DB::table('views')->insert([
        'post_table' => 'blogs',
        'post_id' => $blog->id,
        'view_count' => 1,
        'created_at' => Carbon::now(),
      ]);

      $countViews = DB::table('views')->where('post_id', $blog->id)->where('post_table', 'blogs')->count();
      return view('Font.Blogs.blog_details',compact('blog','countViews'));
    }

    public function agenency_details(Request $request)
    {
      $agents = DB::table('users')->where('account_role', 'Agent')->where('id', $request->id)->first();
      return view('Font.Agents.agent_view',compact('agents'));
    }

    public function projects_view($slug)
    {
      $project  = Project::where('status', 1)->where('slug', $slug)->first();
      $project->features = json_decode($project->features, true);
      $project->facilities = json_decode($project->facilities, true);
      $project->distance = json_decode($project->distance, true);

      $projectOwner = User::find($project->user_id);

      $similarProjects = Project::where('status', 1)->where('slug', '<>', $slug)->inRandomOrder()->limit(4)->get();
      foreach($similarProjects as $sp)
      {
          $user = User::findOrFail($sp->user_id);

          $sp->user_avatar = $user->avarar;
          $sp->user_name = $user->name;
      }
      // dd($project->features);
      // dd($similarProjects);
      return view('Font.Projects.projects_view', compact('project', 'similarProjects', 'projectOwner'));
    }
}
