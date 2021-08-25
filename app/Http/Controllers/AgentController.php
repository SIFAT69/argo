<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Property;
use App\Models\User;
use App\Models\Agenciesmessage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    public function AgentDashboard()
    {

      $count_of_properties = Property::where('user_id', Auth::id())->count();

    	return view('Agent.Dashboard.dashboard', compact('count_of_properties'));
    }

	public function agentProfile()
	{
		$user = Auth::user();
		return view('Agent.Profile.profile', compact('user'));
	}

	public function updateProfileInformation(Request $request, $id)
	{
		// dd($request->all());
		$data =	$request->validate([
			'name' => 'bail|required|string|max:255',
			'email' => "bail|required|email|max:255|unique:App\Models\User,email,{$id}",
			'license' => 'bail|nullable|string|max:255',
			'taxNumber' => 'bail|nullable|string|max:255',
			'phoneNumber' => 'bail|nullable|string|max:255',
			'faxNumber' => 'bail|nullable|string|max:255',
			'mobileNumber' => 'bail|nullable|string|max:255',
			'language' => 'bail|nullable|string|max:255',
			'companyName' => 'bail|nullable|string|max:255',
			'address' => 'bail|nullable|string|max:2555',
			'about' => 'bail|nullable|string|max:2555',
			// 'avatar' => 'bail|sometimes|image|mimes:jpeg,jpg,png|dimensions:ratio=1/1',
		]);

    if (!empty($request->avatar)) {
      $randomNumber =rand();
      $profile_picture = $request->file('avatar');
      $profile_picture_rename = $randomNumber.'.'.$profile_picture->getClientOriginalExtension();
      $newLocation = 'uploads/'.$profile_picture_rename;
      Image::make($profile_picture)->resize(100, 100)->save($newLocation,100);

      DB::table('users')->where('id', Auth::id())->update([
        'avatar' => $profile_picture_rename,
      ]);
     }

		User::where('id', Auth::id())->update($data);
		return back()->with('success', "Profile Information is Updated");
	}

	public function updateProfileSocialMedia(Request $request, $id)
	{
		// dd($request->all());
		$data =	$request->validate([
			'skype' => 'bail|nullable|string|max:255',
			'website' => 'bail|nullable|string|max:255',
			'facebook' => 'bail|nullable|string|max:255',
			'twitter' => 'bail|nullable|string|max:255',
			'linkedin' => 'bail|nullable|string|max:255',
			'instagram' => 'bail|nullable|string|max:255',
			'googlePlus' => 'bail|nullable|string|max:255',
			'youtube' => 'bail|nullable|string|max:255',
			'pinterest' => 'bail|nullable|string|max:255',
			'vimeo' => 'bail|nullable|string|max:255',
		]);

		User::where('id', $id)->update($data);

		return back()->with('success', "Social Media is Updated");
	}

	public function updateProfilePassword(Request $request, $id)
	{
		$request->validate([
			'oldPassword' => 'bail|required|string|password',
			'newPassword' => 'bail|required|string|min:8|max:255|confirmed'
		]);

		User::where('id', $id)->update([
			'password' => Hash::make($request->newPassword)
		]);

		return back()->with('success', "Password is Updated");
	}

  public function packageHistory(Request $request)
  {
    $packages = DB::table('subscriptions')->where('user_id', Auth::id())->get();
    return view('Agent.Packages.package',compact('packages'));
  }

  public function MyProperties()
  {
    $properties = DB::table('properties')->where('user_id', Auth::id())->get();
    return view('Agent.Properties.properties',compact('properties'));
  }

  public function MyPropertiesCreate()
  {
    $cities = DB::table('cities')->get();
    $states = DB::table('states')->get();
    $countries = DB::table('countries')->get();
    $realstatefacilities = DB::table('realstatefacilities')->get();
    $realstatefeatures = DB::table('realstatefeatures')->get();
    $categories = DB::table('realstatecategories')->get();
    return view('Agent.Properties.create',compact('cities', 'states', 'countries', 'realstatefacilities','realstatefeatures','categories'));
  }

  public function MyPropertiesEdit(Request $request)
  {
    $cities = DB::table('cities')->get();
    $states = DB::table('states')->get();
    $countries = DB::table('countries')->get();
    $realstatefacilities = DB::table('realstatefacilities')->get();
    $realstatefeatures = DB::table('realstatefeatures')->get();
    $categories = DB::table('realstatecategories')->get();
    $project = DB::table('properties')->where('id', $request->id)->first();
    return view('Agent.Properties.edit',compact('cities', 'states', 'countries', 'realstatefacilities','realstatefeatures','categories','project'));
  }

  public function MyProject(Request $request)
  {
    $projects = DB::table('projects')->where('user_id', Auth::id())->get();
    return view('Agent.Project.projects',compact('projects'));
  }

}
