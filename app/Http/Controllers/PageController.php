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

      //filters data start
      $categories = array_unique(Property::where('moderation_status', 'Approved')->where('status', 1)->pluck('category')->toArray());
      $bedrooms = array_unique(Property::where('moderation_status', 'Approved')->where('status', 1)->orderBy('flat_beds')->pluck('flat_beds')->toArray());
      $bathrooms = array_unique(Property::where('moderation_status', 'Approved')->where('status', 1)->orderBy('flat_baths')->pluck('flat_baths')->toArray());
      $floors = array_unique(Property::where('moderation_status', 'Approved')->where('status', 1)->orderBy('flat_floors')->pluck('flat_floors')->toArray());
      $minPrice = Property::where('moderation_status', 'Approved')->where('status', 1)->min('price');
      $maxPrice = Property::where('moderation_status', 'Approved')->where('status', 1)->max('price');

      $fes = Property::where('moderation_status', 'Approved')->where('status', 1)->pluck('features');
      $features = [];
      foreach($fes as $feature)
      {
        $feature = json_decode($feature, true);
        foreach($feature as $single)
        {
          $features[] = $single;
        }
      }
      $features = array_unique($features);
      // dd($maxPrice);
      //filters data end

      return view('Font.Properties.properties', compact('properties', 'categories', 'bedrooms', 'bathrooms', 'floors', 'minPrice', 'maxPrice', 'features'));
    }

    public function properties_view(Request $request)
    {
      $property = DB::table('properties')->where('slug', $request->slug)->first();

      $check_views = DB::table('views')->where('post_id', $property->id)->where('post_table', 'properties')->first();
      if (!empty($check_views)) {
        DB::table('views')->where('id', $check_views->id)->update([
          'view_count' => $check_views->view_count+1,
          'updated_at' => Carbon::now(),
        ]);
      }else {
        DB::table('views')->insert([
          'post_table' => 'properties',
          'post_id' => $property->id,
          'view_count' => 1,
          'to_id' => $property->user_id,
          'created_at' => Carbon::now(),
        ]);
      }
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
      $projects  = DB::table('projects')->where('status', 1)->simplePaginate(8);

      //filters data start
      $categories = array_unique(Project::where('status', 1)->pluck('category')->toArray());
      $blocks = array_unique(Project::where('status', 1)->orderBy('flat_blocks')->pluck('flat_blocks')->toArray());
      $floors = array_unique(Project::where('status', 1)->orderBy('flat_floors')->pluck('flat_floors')->toArray());
      $minPrice = Project::where('status', 1)->min('low_price');
      $maxPrice = Project::where('status', 1)->max('max_price');

      $fes = Project::where('status', 1)->pluck('features');
      $features = [];
      foreach($fes as $feature)
      {
        $feature = json_decode($feature, true);
        foreach($feature as $single)
        {
          $features[] = $single;
        }
      }
      $features = array_unique($features);
      // dd($maxPrice);
      //filters data end

      return view('Font.Projects.projects',compact('projects', 'categories', 'blocks', 'floors', 'minPrice', 'maxPrice', 'features'));
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
      $check_views = DB::table('views')->where('post_id', $blog->id)->first();
      if (!empty($check_views)) {
        DB::table('views')->where('post_id', $blog->id)->update([
          'view_count' => $check_views->view_count+1,
          'updated_at' => Carbon::now(),
        ]);
      }else {
        DB::table('views')->insert([
          'post_table' => 'blogs',
          'post_id' => $blog->id,
          'view_count' => 1,
          'to_id' => $blog->posted_by,
          'created_at' => Carbon::now(),
        ]);
      }


      $countViews = DB::table('views')->where('post_id', $blog->id)->where('post_table', 'blogs')->first();
      return view('Font.Blogs.blog_details',compact('blog','countViews'));
    }

    public function agenency_details(Request $request)
    {
      $agents = DB::table('users')->where('id', $request->id)->first();
      return view('Font.Agents.agent_view',compact('agents'));
    }

    public function projects_view($slug)
    {
      $project  = Project::where('status', 1)->where('slug', $slug)->first();

      $check_views = DB::table('views')->where('post_id', $project->id)->where('post_table', 'projects')->first();
      if (!empty($check_views)) {
        DB::table('views')->where('id', $check_views->id)->update([
          'view_count' => $check_views->view_count+1,
          'updated_at' => Carbon::now(),
        ]);
      }else {
        DB::table('views')->insert([
          'post_table' => 'projects',
          'post_id' => $project->id,
          'view_count' => 1,
          'to_id' => $project->user_id,
          'created_at' => Carbon::now(),
        ]);
      }


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

    public function properties_filter(Request $request, $src_home = false)
    {
      // dd($request->all());
      $query = "SELECT * FROM properties WHERE ";
      $data = [];

      if($request->keyword !== null)
      {
        $query .= "title like ? AND ";
        $data[] = "%{$request->keyword}%";
      }

      if($request->location !== null)
      {
        $query .= "(city = ? OR states = ? OR location = ?) AND ";
        $data[] = $request->location;
        $data[] = $request->location;
        $data[] = $request->location;
      }

      if($request->category !== null)
      {
        $query .= "category = ? AND ";
        $data[] = $request->category;
      }

      if($request->type !== null)
      {
        $query .= "type = ? AND ";
        $data[] = $request->type;
      }

      if($request->beds !== null)
      {
        $query .= "flat_beds = ? AND ";
        $data[] = $request->beds;
      }

      if($request->baths !== null)
      {
        $query .= "flat_baths = ? AND ";
        $data[] = $request->baths;
      }

      if($request->floors !== null)
      {
        $query .= "flat_floors = ? AND ";
        $data[] = $request->floors;
      }

      if($request->minArea !== null && $request->maxArea !== null)
      {
        $query .= "size between ? AND ? AND ";
        $data[] = $request->minArea;
        $data[] = $request->maxArea;
      }
      elseif($request->minArea != null)
      {
        $query .= "size >= ? AND ";
        $data[] = $request->minArea;
      }
      elseif($request->maxArea != null)
      {
        $query .= "size <= ? AND ";
        $data[] = $request->maxArea;
      }

      if($request->features != [])
      {
          foreach($request->features as $feature)
          {
            $query .= "features like ? AND ";
            $data[] = "%{$feature}%";
          }
      }

      $query = rtrim($query, "AND ");
      $query = rtrim($query, "WHERE ");
      // dd($data);
      $properties = DB::select($query, $data);
      foreach($properties as $property)
      {
        $images = json_decode($property->images, true);
        foreach($images as $index => $image)
        {
          $image = '../uploads/' . DB::table('libraries')->where('id', $image)->value('file_name');
          $images[$index] = $image;
        }
        $property->images = $images;

        $user = User::find($property->user_id);
        $property->user_name = $user->name;
        $property->user_avatar = '../uploads/' . $user->avatar;

        $property->created_at = Carbon::parse($property->created_at)->diffForHumans();
       }

       if($src_home)
          return $properties;
       else
          return response()->json($properties);
    }

    public function projects_filter(Request $request)
    {
      // dd($request->all());
      $query = "SELECT * FROM projects WHERE ";
      $data = [];

      if($request->keyword !== null)
      {
        $query .= "title like ? AND ";
        $data[] = "%{$request->keyword}%";
      }

      if($request->location !== null)
      {
        $query .= "(city = ? OR state = ? OR location = ?) AND ";
        $data[] = $request->location;
        $data[] = $request->location;
        $data[] = $request->location;
      }

      if($request->category !== null)
      {
        $query .= "category = ? AND ";
        $data[] = $request->category;
      }

      if($request->blocks !== null)
      {
        $query .= "flat_blocks = ? AND ";
        $data[] = $request->blocks;
      }

      if($request->floors !== null)
      {
        $query .= "flat_floors = ? AND ";
        $data[] = $request->floors;
      }

      if($request->features != [])
      {
          foreach($request->features as $feature)
          {
            $query .= "features like ? AND ";
            $data[] = "%{$feature}%";
          }
      }

      $query = rtrim($query, "AND ");
      $query = rtrim($query, "WHERE ");
      // dd($data);
      $projects = DB::select($query, $data);
      foreach($projects as $project)
      {
        $images = json_decode($project->images, true);
        foreach($images as $index => $image)
        {
          $image = '../uploads/' . DB::table('libraries')->where('id', $image)->value('file_name');
          $images[$index] = $image;
        }
        $project->images = $images;

        $user = User::find($project->user_id);
        $project->user_name = $user->name;
        $project->user_avatar = '../uploads/' . $user->avatar;

        $project->created_at = Carbon::parse($project->created_at)->diffForHumans();
       }

        return response()->json($projects);
      // dd($projects);
    }

    public function properties_search(Request $request)
    {
      $properties = $this->properties_filter($request, true);
      // dd($properties);
      return view('Font.Properties.properties_search', compact('properties'));
    }

    public function properties_city_wise($city)
    {
       $properties = Property::where('moderation_status', 'Approved')->where('status', 1)->where('city', $city)->get();
       foreach($properties as $property)
        {
          $images = json_decode($property->images, true);
          foreach($images as $index => $image)
          {
            $image = '../uploads/' . DB::table('libraries')->where('id', $image)->value('file_name');
            $images[$index] = $image;
          }
          $property->images = $images;

          $user = User::find($property->user_id);
          $property->user_name = $user->name;
          $property->user_avatar = '../uploads/' . $user->avatar;

          $property->time = Carbon::parse($property->created_at)->diffForHumans();
        }
       return view('Font.Properties.properties_city_wise', compact('properties', 'city'));
    }
}
