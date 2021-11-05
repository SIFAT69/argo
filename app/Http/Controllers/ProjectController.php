<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;
use App\Events\ActivityHappened;

class ProjectController extends Controller
{
    public function indexProject()
    {
      $projects = DB::table('projects')->where('status', 0)->orWhere('status', 1)->get();
      return view('Dashboard.RealState.Project.allprojects',compact('projects'));
    }
    public function TrashListProjects()
    {
      $projects = DB::table('projects')->where('user_id', Auth::id())->where('status', 2)->get();
      return view('Dashboard.RealState.Trash.projecttrash',compact('projects'));
    }
    public function createProject()
    {
      $cities = DB::table('cities')->get();
      $states = DB::table('states')->get();
      $countries = DB::table('countries')->get();
      $realstatefacilities = DB::table('realstatefacilities')->get();
      $realstatefeatures = DB::table('realstatefeatures')->get();
      $categories = DB::table('realstatecategories')->get();
      return view('Dashboard.RealState.Project.create',compact('cities', 'states', 'countries', 'realstatefacilities','realstatefeatures','categories'));
    }
    public function createProjectEdit(Request $request)
    {
      $cities = DB::table('cities')->get();
      $states = DB::table('states')->get();
      $countries = DB::table('countries')->get();
      $realstatefacilities = DB::table('realstatefacilities')->get();
      $realstatefeatures = DB::table('realstatefeatures')->get();
      $categories = DB::table('realstatecategories')->get();
      $project = DB::table('projects')->where('id', $request->id)->first();
      return view('Dashboard.RealState.Project.edit',compact('cities', 'states', 'countries', 'realstatefacilities','realstatefeatures','categories','project'));
    }

    public function createProjectPost(Request $request)
    {
      if (Auth::user()->account_role == "Agent") {
        if (Auth::user()->limite == 0) {
          return back()->with('danger', 'Your limite is extends please buy new packages.');
        }
      }else {
        $agent_id = Auth::user()->created_by;
        $agent_limite = DB::table('users')->where('id', $agent_id)->value('limite');
        if ($agent_limite == 0) {
          return back()->with('danger', 'Your agent limite is extends please buy new packages.');
        }
      }

      // Image Uploads start
      foreach ($request->file('images') as $index => $file)
       {
         $name = $index . date('YmdHisv') . '.' . $file->getClientOriginalExtension();
         $file->move(public_path('uploads'), $name);
         $files[] = $name;

         $imageID = DB::table('libraries')->insertGetId([
           'uploader_id' => Auth::id(),
           'uploader_name' => Auth::user()->name,
           'file_name' => $name,
           'status' => 1,
           'created_at' => Carbon::now(),
         ]);

         $imgID[] = $imageID;
       }
        $JsonImage = json_encode($imgID, true);
        // foreach ($variable =json_decode($JsonImage) as $value) {
        //   echo $value.'<br>';
        // }
        $JsonFacility = json_encode($request->facility, true);
        $JsonDistance = json_encode($request->distance, true);
        $JsonFeature = json_encode($request->features, true);

        if (!empty($request->youtube_thumb)) {
          $randomNumber =rand();
          $meta_image = $request->file('youtube_thumb');
          $meta_image_rename = $randomNumber.'.'.$meta_image->getClientOriginalExtension();
          $newLocation = public_path('uploads/'.$meta_image_rename);
          Image::make($meta_image)->save($newLocation,100);
        }

        $slug = Str::slug($request->title);
        if (Auth::user()->account_role == "Agent") {
          DB::table('projects')->insert([
            'code' => 'PROJ_' . date('YmdHisv'),
            'user_id' => Auth::id(),
            'status' => 1,
            'title' => $request->title,
            'slug' => $slug,
            'meta_description' => $request->meta_desc,
            'description' => $request->description,
            'images' => $JsonImage,
            'category' => $request->category,
            'city' => $request->city,
            'state' => $request->state,
            'location' => $request->country,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'flat_blocks' => $request->flat_blocks,
            'flat_floors' => $request->flat_floors,
            'flat_number' => $request->flat_number,
            'low_price' => $request->low_price,
            'max_price' => $request->max_price,
            'facilities' => $JsonFacility,
            'features' => $JsonFeature,
            'distance' => $JsonDistance,
            'youtube_thumb' => $meta_image_rename,
            'youtube_link' => $request->youtube_link,
            'created_at' => Carbon::now(),
          ]);
        }else {
          DB::table('projects')->insert([
            'code' => 'PROJ_' . date('YmdHisv'),
            'user_id' => Auth::user()->created_by,
            'status' => 1,
            'title' => $request->title,
            'slug' => $slug,
            'meta_description' => $request->meta_desc,
            'description' => $request->description,
            'images' => $JsonImage,
            'category' => $request->category,
            'city' => $request->city,
            'state' => $request->state,
            'location' => $request->country,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'flat_blocks' => $request->flat_blocks,
            'flat_floors' => $request->flat_floors,
            'flat_number' => $request->flat_number,
            'low_price' => $request->low_price,
            'max_price' => $request->max_price,
            'facilities' => $JsonFacility,
            'features' => $JsonFeature,
            'distance' => $JsonDistance,
            'youtube_thumb' => $meta_image_rename,
            'youtube_link' => $request->youtube_link,
            'created_at' => Carbon::now(),
          ]);
        }
        if (Auth::user()->account_role == "Agent") {
          DB::table('users')->where('id', Auth::user()->id)->update([
            'limite' => Auth::user()->limite-1,
          ]);
        }else {
          DB::table('users')->where('id', Auth::user()->created_by)->update([
            'limite' => $agent_limite-1,
          ]);
        }
        ActivityHappened::dispatch(Auth::id(), 'A project has been created.');

        if (Auth::user()->account_role == "Agent") {
          return back()->with('success', 'Your project has been created. Wating for verify!');
        }else {
          return back()->with('success', 'Your project has been created. Now you should change the status.');
        }
    }

    public function createProjectEditPost(Request $request)
    {
      $project = DB::table('projects')->where('id', $request->id)->first();

      if (!empty($request->youtube_thumb)) {
        $randomNumber =rand();
        $meta_image = $request->file('youtube_thumb');
        $meta_image_rename = $randomNumber.'.'.$meta_image->getClientOriginalExtension();
        $newLocation = public_path('uploads/'.$meta_image_rename);
        Image::make($meta_image)->save($newLocation,100);
      }else {
        $meta_image_rename = $project->youtube_thumb;
      }

      if (!empty($request->features)) {
        $JsonFeature = json_encode($request->features, true);
      }else {
        $JsonFeature = $project->features;
      }

      $JsonFacility = json_encode($request->facility, true);
      $JsonDistance = json_encode($request->distance, true);

      $slug = Str::slug($request->title);

      DB::table('projects')->where('id', $request->id)->update([
        // 'user_id' => Auth::id(),
        'status' => 0,
        'title' => $request->title,
        'slug' => $slug,
        'meta_description' => $request->meta_desc,
        'description' => $request->description,
        // 'images' => $JsonImage,
        'category' => $request->category,
        'city' => $request->city,
        'location' => $request->country,
        'latitude' => $request->latitude,
        'address' => $request->address,
        'longitude' => $request->longitude,
        'flat_blocks' => $request->flat_blocks,
        'flat_floors' => $request->flat_floors,
        'flat_number' => $request->flat_number,
        'low_price' => $request->low_price,
        'max_price' => $request->max_price,
        'facilities' => $JsonFacility,
        'features' => $JsonFeature,
        'distance' => $JsonDistance,
        'youtube_thumb' => $meta_image_rename,
        'youtube_link' => $request->youtube_link,
        'created_at' => Carbon::now(),
      ]);

      ActivityHappened::dispatch(Auth::id(), 'A project has been updated.');

      if (Auth::user()->account_role == "Agent") {
        return redirect()->route('MyProject')->with('success', 'Your project has been updated. Wating for verify!');
      }else {
        return back()->with('success', 'Your project has been updated.');
      }
    }

    public function softDeleteProject(Request $request)
    {
      DB::table('projects')->where('id', $request->id)->update([
        'status' => 2,
        'updated_at' => Carbon::now(),
      ]);

      ActivityHappened::dispatch(Auth::id(), 'A project has been deleted temporarily.');

      return redirect('/project-list')->with('danger', 'Your have deleted a project. You can still restore them from trash!');
    }

    public function restoreProject(Request $request)
    {
      DB::table('projects')->where('id', $request->id)->update([
        'status' => 0,
        'updated_at' => Carbon::now(),
      ]);

      ActivityHappened::dispatch(Auth::id(), 'A project has been resored.');

      return redirect('/project-view-trash-lists')->with('success', 'Your have restore a project.');
    }

    public function HardDeleteProject(Request $request)
    {
      DB::table('projects')->where('id', $request->id)->delete();
      DB::table('users')->where('id', Auth::user()->id)->update([
        'limite' => Auth::user()->limite+1,
      ]);
      ActivityHappened::dispatch(Auth::id(), 'A project has been deleted permanently.');

      return back()->with('danger', 'Your project has been removed from collections!');
    }

    public function ModStatusChangeProject(Request $request)
    {
      DB::table('projects')->where('id', $request->id)->update(['moderation_status' => $request->moderation_status]);
      return 'Moderation Status is changed';

      ActivityHappened::dispatch(Auth::id(), 'Moderation status of a project has been changed.');

    }

    public function DisStatusChangeProject($id)
    {
      $isActive = DB::table('projects')->where('id', $id)->value('status');

      if ($isActive == 1) {
        DB::table('projects')->where('id', $id)->update([
          'status' => 0,
        ]);
        return back()->with('danger', 'Project will be displayed.');
      }else {
        DB::table('projects')->where('id', $id)->update([
          'status' => 1,
        ]);
        return back()->with('success', 'Project will not be displayed.');
      }
    }
}
