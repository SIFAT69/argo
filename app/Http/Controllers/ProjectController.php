<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function indexProject()
    {
      $projects = DB::table('projects')->where('user_id', Auth::id())->where('status', 0)->orWhere('status', 1)->get();
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


      // Image Uploads start
      foreach ($request->file('images') as $file)
       {
         $name = $file->getClientOriginalName();
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
          $newLocation = 'uploads/'.$meta_image_rename;
          Image::make($meta_image)->save($newLocation,100);
        }

        $slug = Str::slug($request->title);

        DB::table('projects')->insert([
          'user_id' => Auth::id(),
          'status' => 0,
          'title' => $request->title,
          'slug' => $slug,
          'meta_description' => $request->meta_desc,
          'description' => $request->description,
          'images' => $JsonImage,
          'category' => $request->category,
          'city' => $request->city,
          'state' => $request->state,
          'location' => $request->country,
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

        return redirect('/project-list')->with('success', 'Your project has been created. Wating for verify!');
    }

    public function createProjectEditPost(Request $request)
    {
      $project = DB::table('projects')->where('id', $request->id)->first();

      if (!empty($request->youtube_thumb)) {
        $randomNumber =rand();
        $meta_image = $request->file('youtube_thumb');
        $meta_image_rename = $randomNumber.'.'.$meta_image->getClientOriginalExtension();
        $newLocation = 'uploads/'.$meta_image_rename;
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
        'user_id' => Auth::id(),
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

      return redirect('/project-list')->with('success', 'Your project has been updated. Wating for verify!');
    }

    public function softDeleteProject(Request $request)
    {
      DB::table('projects')->where('id', $request->id)->update([
        'status' => 2,
        'updated_at' => Carbon::now(),
      ]);
      return redirect('/project-list')->with('danger', 'Your have deleted a project. You can still restore them from trash!');
    }
    public function restoreProject(Request $request)
    {
      DB::table('projects')->where('id', $request->id)->update([
        'status' => 0,
        'updated_at' => Carbon::now(),
      ]);
      return redirect('/project-view-trash-lists')->with('success', 'Your have restore a project.');
    }
    public function HardDeleteProject(Request $request)
    {
      DB::table('projects')->where('id', $request->id)->delete();
      return redirect('/project-view-trash-lists')->with('danger', 'Your project has been removed from collections!');
    }
}
