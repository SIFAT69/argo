<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Property;
use App\Models\Project;
use App\Models\User;
use App\Models\Agenciesmessage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Events\ActivityHappened;
use App\Models\ActivityLog;
use Carbon\Carbon;


class AgentController extends Controller
{
    public function AgentDashboard()
    {
      // dd(Auth::user()->subscription('default')->recurring());
      // Auth::user()->subscription('yearly')->cancelNow();
      // $in = Auth::user()->subscription('monthly')->asStripeSubscription()->current_period_end;
      // dd(date('Y-m-d H:i:s', $in));
      // dd(Auth::user()->subscription('yearly')->asStripeSubscription());

      $count_of_properties = Property::where('user_id', Auth::id())->count();
      $totalViewsProject = DB::table('views')->where('to_id', Auth::id())->where('post_table', 'projects')->sum('view_count');
      $totalViewsProperties = DB::table('views')->where('to_id', Auth::id())->where('post_table', 'properties')->sum('view_count');
      $totalView = $totalViewsProject + $totalViewsProperties;
      $logs = ActivityLog::where('user_id', Auth::id())->orderBy('id', 'desc')->limit(5)->get();
      return view('Agent.Dashboard.dashboard', compact('count_of_properties','totalView', 'logs'));
    }

	public function agentProfile()
	{
		$user = Auth::user();
    if ($user->account_role == "Agent") {
      return view('Agent.Profile.profile', compact('user'));
    }else {
      return view('ServiceDashboard.profile', compact('user'));
    }
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
			'bank_name' => 'bail|nullable|string|max:2555',
			'bank_account' => 'bail|nullable|string|max:2555',
			'bank_sort_code' => 'bail|nullable|string|max:2555',
			'contact_number' => 'bail|nullable|string|max:2555',
			'payment_type' => 'bail|nullable|string|max:2555',
			'dob' => 'bail|nullable|string|max:2555',
			'about' => 'bail|nullable|string|max:2555',
			// 'avatar' => 'bail|sometimes|image|mimes:jpeg,jpg,png|dimensions:ratio=1/1',
		]);

    if (!empty($request->avatar)) {
      $randomNumber =rand();
      $profile_picture = $request->file('avatar');
      $profile_picture_rename = $randomNumber.'.'.$profile_picture->getClientOriginalExtension();
      $newLocation = 'uploads/'.$profile_picture_rename;
      Image::make($profile_picture)->resize(100, 100)->save($newLocation,100);

      DB::table('users')->where('id', $id)->update([
        'avatar' => $profile_picture_rename,
      ]);
     }

		User::where('id',$id)->update($data);
    ActivityHappened::dispatch(Auth::id(), 'User profile information has been updated.');

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
    ActivityHappened::dispatch(Auth::id(), 'User profile information has been updated.');

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
    ActivityHappened::dispatch(Auth::id(), 'Password has been updated.');

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

  public function MyProjectCreate(Request $request)
  {
    $cities = DB::table('cities')->get();
    $states = DB::table('states')->get();
    $countries = DB::table('countries')->get();
    $realstatefacilities = DB::table('realstatefacilities')->get();
    $realstatefeatures = DB::table('realstatefeatures')->get();
    $categories = DB::table('realstatecategories')->get();
    return view('Agent.Project.create',compact('cities', 'states', 'countries', 'realstatefacilities','realstatefeatures','categories'));
  }

  public function MyProjectEdit(Request $request)
  {
    $cities = DB::table('cities')->get();
    $states = DB::table('states')->get();
    $countries = DB::table('countries')->get();
    $realstatefacilities = DB::table('realstatefacilities')->get();
    $realstatefeatures = DB::table('realstatefeatures')->get();
    $categories = DB::table('realstatecategories')->get();
    $project = DB::table('projects')->where('id', $request->id)->first();
    return view('Agent.Project.edit',compact('cities', 'states', 'countries', 'realstatefacilities','realstatefeatures','categories','project'));
  }

  public function MyInbox(Request $request)
  {
    $contacts = DB::table('agenciesmessages')->where('to_id', Auth::id())->get();
    return view('Agent.Contact.contact',compact('contacts'));
  }

  public function MessageStatus(Request $request)
  {
    $check_status = $request->status;
    if ($check_status == "Unread") {
      DB::table('agenciesmessages')->where('id', $request->id)->update([
        'status' => "Unread",
      ]);
    }
    if ($check_status == "Seen") {
      DB::table('agenciesmessages')->where('id', $request->id)->update([
        'status' => "Seen",
      ]);
    }
    if ($check_status == "Delete") {
      DB::table('agenciesmessages')->where('id', $request->id)->delete();
    }
    return back()->with('success', 'Your request has been successfully executed!');
  }

  public function MyPropertiesAssign($id)
  {
    $property = Property::findOrFail($id);
    $tenants = User::withTrashed()->where('account_role', 'Tenant')->get();
    return view('Agent.Properties.property_assign', compact('property', 'tenants'));
  }

  public function StoreMyPropertiesAssign(Request $request, $id)
  {
    $request->validate([
      'tenant_id' => 'bail|required|integer',
      'description' => 'required',
      'contract_interval_amount' => 'required',
      'contract_interval' => 'required',
    ]);

     $contract_duration = $request->contract_interval_amount." ".$request->contract_interval;

     if($request->hasfile('files')) {
        foreach($request->file('files') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/uploads/Files/', $name);
            $imgData[] = $name;

        }
        $ContractFiles  =  json_encode($imgData);
    }else{
        $ContractFiles = 'NULL';
    }

    DB::table('contracts')
    ->insert([
        'contract_name' => $request->tanent_name,
        'contract_property' => $request->property_name,
        'contract_property_id' => $request->contract_property_id,
        'contract_property_type' => $request->contract_property_code,
        'description' => $request->description,
        'tenant_id' => $request->tenant_id,
        'agent_id' => Auth::id(),
        'contract_duration' => $contract_duration,
        'status' => 'Active',
        'files' => $ContractFiles,
        'created_at' => Carbon::now(),
    ]);

    Property::where('id', $id)->update(['assigned_to' => $request->tenant_id]);
    return redirect()->route('MyProperties')->with('success', 'Successfully assigned');
  }

  public function MyProjectsAssign($id)
  {
    $project = Project::findOrFail($id);
    $tenants = User::withTrashed()->where('account_role', 'Tenant')->get();
    return view('Agent.Project.project_assign', compact('project', 'tenants'));
  }

  public function StoreMyProjectsAssign(Request $request, $id)
  {
    $request->validate([
        'tenant_id' => 'bail|required|integer',
        'description' => 'required',
        'contract_interval_amount' => 'required',
        'contract_interval' => 'required',
      ]);

       $contract_duration = $request->contract_interval_amount." ".$request->contract_interval;

       if($request->hasfile('files')) {
          foreach($request->file('files') as $file)
          {
              $name = $file->getClientOriginalName();
              $file->move(public_path().'/uploads/Files/', $name);
              $imgData[] = $name;

          }
          $ContractFiles  =  json_encode($imgData);
      }else{
          $ContractFiles = 'NULL';
      }

      DB::table('contracts')
      ->insert([
          'contract_name' => $request->tanent_name,
          'contract_property' => $request->property_name,
          'contract_property_id' => $request->contract_property_id,
          'contract_property_type' => $request->contract_property_code,
          'description' => $request->description,
          'tenant_id' => $request->tenant_id,
          'agent_id' => Auth::id(),
          'contract_duration' => $contract_duration,
          'status' => 'Active',
          'files' => $ContractFiles,
          'created_at' => Carbon::now(),
      ]);

    Project::where('id', $id)->update(['assigned_to' => $request->tenant_id]);
    return redirect()->route('MyProject')->with('success', 'Successfully assigned');
  }
}
