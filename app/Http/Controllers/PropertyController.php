<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;
use App\Events\ActivityHappened;


class PropertyController extends Controller
{
    public function property_list(Request $request)
    {
      $properties = DB::table('properties')->get();
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

      $validatedData = $request->validate([
          'title' => ['required', 'unique:posts'],
          'type' => ['required'],
          'meta_description' => ['required'],
          'description' => ['required'],
          'location' => ['required'],
          'city' => ['required'],
          'category' => ['required'],
          'latitude' => ['required'],
          'longitude' => ['required'],
          'flat_beds' => ['required'],
          'flat_baths' => ['required'],
          'flat_floors' => ['required'],
          'size' => ['required'],
          'price' => ['required'],
          'facilities' => ['required'],
          'features' => ['required'],
          'distance' => ['required'],
          'youtube_thumb' => ['required'],
          'youtube_link' => ['required'],
      ]);


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
        $randomNumber = rand();
        $meta_image = $request->file('youtube_thumb');
        $meta_image_rename = $randomNumber.'.'.$meta_image->getClientOriginalExtension();
        $newLocation = public_path('uploads/'.$meta_image_rename);
        Image::make($meta_image)->save($newLocation,100);
      }

      $slug = Str::slug($request->title);

      DB::table('properties')->insert([
        'code' => 'PROP_' . date('YmdHisv'),
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
        'states' => $request->state,
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
        'is_featured' => 'No',
        'created_at' => Carbon::now(),
      ]);

      ActivityHappened::dispatch(Auth::id(), 'A new property has been created.');

      if (Auth::user()->account_role == "Agent") {
        return back()->with('success', 'Your property has been created. Wating for verify!');
      }else {
        return redirect('/properties-lists')->with('success', 'Your property has been created. Now you should change the status.');
      }
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

      ActivityHappened::dispatch(Auth::id(), 'A property has been updated.');

      return back()->with('success', 'Your property has been updated. Wating for verify!');
    }

    public function softDeleteProperties(Request $request)
    {
      DB::table('properties')->where('id', $request->id)->update([
        'moderation_status' => "Soft_Delete",
        'updated_at' => Carbon::now(),
      ]);

      ActivityHappened::dispatch(Auth::id(), 'A property has been deleted temporarily.');

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

      ActivityHappened::dispatch(Auth::id(), 'A property has been resored.');

      return redirect('/properties-view-trash-lists')->with('success', 'Your have restore a Property.');
    }


    public function HardDeleteProperty(Request $request)
    {
      DB::table('properties')->where('id', $request->id)->delete();

      ActivityHappened::dispatch(Auth::id(), 'A property has been deleted permanently.');

      return back()->with('danger', 'Your property has been removed from collections!');
    }

    public function ModStatusChangeProperty(Request $request)
    {
      DB::table('properties')->where('id', $request->id)->update(['moderation_status' => $request->moderation_status]);

      ActivityHappened::dispatch(Auth::id(), 'Moderation status of a property has been changed.');

      return 'Moderation Status is changed';
    }

    public function DisStatusChangeProperty($id)
    {
      $isActive = DB::table('properties')->where('id', $id)->value('status');

      if ($isActive == 1) {
        DB::table('properties')->where('id', $id)->update([
          'status' => 0,
        ]);
        return back()->with('danger', 'Propery will not be displayed.');
      }else {
        DB::table('properties')->where('id', $id)->update([
          'status' => 1,
        ]);
        return back()->with('success', 'Propery will be displayed.');
      }
    }

    public function IsFeaturedChangeProperty($id)
    {
      $isActive = DB::table('properties')->where('id', $id)->value('is_featured');

      if ($isActive == "Yes") {
        DB::table('properties')->where('id', $id)->update([
          'is_featured' => "No",
        ]);
        return back()->with('danger', 'Not featured property');
      }else {
        DB::table('properties')->where('id', $id)->update([
          'is_featured' => "Yes",
        ]);
        return back()->with('success', 'Featured property');
      }
    }
}
