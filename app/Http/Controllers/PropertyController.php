<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;


class PropertyController extends Controller
{
    public function property_list(Request $request)
    {
      $properties = DB::table('properties')->where('user_id', Auth::id())->where('moderation_status', 'Approved')->orWhere('moderation_status', 'Pending')->get();
      return view('Dashboard.RealState.Properties.properties',compact('properties'));
    }
    public function property_create(Request $request)
    {
      $cities = DB::table('cities')->get();
      $states = DB::table('states')->get();
      $countries = DB::table('countries')->get();
      $realstatefacilities = DB::table('realstatefacilities')->get();
      $realstatefeatures = DB::table('realstatefeatures')->get();
      $categories = DB::table('realstatecategories')->get();

      return view('Dashboard.RealState.Properties.create',compact('cities', 'states', 'countries', 'realstatefacilities','realstatefeatures','categories'));
    }

    public function property_post(Request $request){
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

      DB::table('properties')->insert([
        'user_id' => Auth::id(),
        'status' => 0,
        'title' => $request->title,
        'type' => $request->type,
        'slug' => $slug,
        'meta_description' => $request->meta_desc,
        'description' => $request->description,
        'images' => $JsonImage,
        'category' => $request->category,
        'city' => $request->city,
        'location' => $request->country,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'flat_beds' => $request->flat_beds,
        'flat_baths' => $request->flat_baths,
        'flat_floors' => $request->flat_floors,
        'size' => $request->size,
        'price' => $request->price,
        'facilities' => $JsonFacility,
        'features' => $JsonFeature,
        'distance' => $JsonDistance,
        'youtube_thumb' => $meta_image_rename,
        'youtube_link' => $request->youtube_link,
        'created_at' => Carbon::now(),
      ]);

      return redirect('/properties-lists')->with('success', 'Your property has been created. Wating for verify!');
    }

    public function property_edit(Request $request)
    {
      $cities = DB::table('cities')->get();
      $states = DB::table('states')->get();
      $countries = DB::table('countries')->get();
      $realstatefacilities = DB::table('realstatefacilities')->get();
      $realstatefeatures = DB::table('realstatefeatures')->get();
      $categories = DB::table('realstatecategories')->get();
      $project = DB::table('properties')->where('id', $request->id)->first();
      return view('Dashboard.RealState.Properties.edit',compact('cities', 'states', 'countries', 'realstatefacilities','realstatefeatures','categories','project'));
    }

    public function createPropertyEditPost(Request $request)
    {
      $project = DB::table('properties')->where('id', $request->id)->first();

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

      DB::table('properties')->where('id', $request->id)->update([
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
        'flat_beds' => $request->flat_beds,
        'flat_baths' => $request->flat_baths,
        'flat_floors' => $request->flat_floors,
        'price' => $request->price,
        'size' => $request->size,
        'facilities' => $JsonFacility,
        'features' => $JsonFeature,
        'distance' => $JsonDistance,
        'youtube_thumb' => $meta_image_rename,
        'youtube_link' => $request->youtube_link,
        'created_at' => Carbon::now(),
      ]);

      return redirect('/properties-lists')->with('success', 'Your property has been updated. Wating for verify!');
    }

    public function softDeleteProperties(Request $request)
    {
      DB::table('properties')->where('id', $request->id)->update([
        'moderation_status' => "Soft_Delete",
        'updated_at' => Carbon::now(),
      ]);
      return redirect('/properties-lists')->with('danger', 'Your have deleted a properties. You can still restore them from trash!');
    }

    public function TrashListProperties(Request $request)
    {
      $projects = DB::table('properties')->where('user_id', Auth::id())->where('moderation_status', 'Soft_Delete')->get();
      return view('Dashboard.RealState.Trash.propertiestrash',compact('projects'));
    }

    public function restoreProperties(Request $request)
    {
      DB::table('properties')->where('id', $request->id)->update([
        'moderation_status' => "Pending",
        'updated_at' => Carbon::now(),
      ]);
      return redirect('/properties-view-trash-lists')->with('success', 'Your have restore a Property.');
    }


    public function HardDeleteProperty(Request $request)
    {
      DB::table('properties')->where('id', $request->id)->delete();
      return redirect('/properties-view-trash-lists')->with('danger', 'Your property has been removed from collections!');
    }
}
