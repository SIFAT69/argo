<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Property;
use App\Models\Project;
use App\Models\ActivityLog;
use App\Models\Payment;
use App\Models\User;
use App\Models\Agenciesmessage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Events\ActivityHappened;
use App\Mail\TenantCreated;
use Illuminate\Support\Facades\Mail;

class TanentController extends Controller
{
    public function TanentDashboard()
    {
      $count_of_properties = Property::where('assigned_to', Auth::id())->count();
      $count_of_projects = Project::where('assigned_to', Auth::id())->count();
      $logs = ActivityLog::where('user_id', Auth::id())->orderBy('id', 'desc')->limit(5)->get();
      return view('Tanent.Dashboard.dashboard', compact('count_of_properties', 'count_of_projects', 'logs'));
    }

	public function tanentProfile()
	{
		$user = Auth::user();
		return view('Tanent.Profile.profile', compact('user'));
	}

	public function updateProfileInformation(Request $request, $id)
	{
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

  public function properties_index()
  {
    $properties = DB::table('properties')->where('assigned_to', Auth::id())->get();
    return view('Tanent.Properties.properties',compact('properties'));
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

  public function projects_index()
  {
    $projects = DB::table('projects')->where('assigned_to', Auth::id())->get();
    return view('Tanent.Project.projects', compact('projects'));
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

  public function tanents_create($email, $name)
  {
    $exist = User::withTrashed()->where('email', $email)->exists();
    if($exist)
        return redirect()->route('MyInbox')->with('danger', 'The user is already registered');
    else
        return view('Agent.Tenant.create', ['email' => $email, 'name' => $name]);
  }

  public function tanents_store(Request $request)
  {
    $data =	$request->validate([
        'name' => 'bail|required|string|max:255',
        'email' => "bail|required|email|max:255|unique:App\Models\User,email",
    ]);

    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 12; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $password = implode($pass);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($password),
        'account_role' => 'Tenant',
        'created_by' => Auth::id(),
    ]);
    ActivityHappened::dispatch(Auth::id(), 'A new user has been created');

    Mail::to($request->email)->send(new TenantCreated($request->email, $password));

    return redirect()->route('MyInbox')->with('success', 'User account is created successfully');
  }

  public function stuff_create()
  {
    return view('Agent.User.stuff_create');
  }

  public function stuff_store(Request $request)
  {
    $data =	$request->validate([
        'name' => 'bail|required|string|max:255',
        'email' => "bail|required|email|max:255|unique:App\Models\User,email",
    ]);

    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 12; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $password = implode($pass);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($password),
        'account_role' => 'Agent Stuff',
        'created_by' => Auth::id(),
    ]);
    ActivityHappened::dispatch(Auth::id(), 'A new user has been created');

    Mail::to($request->email)->send(new TenantCreated($request->email, $password));

    return back()->with('success', 'User account is created successfully');
  }

  public function AgentTenant(Request $request)
  {
      $tenants = DB::table('users')->where('created_by', Auth::id())->where('account_role', 'Tenant')->get();
      return view('Agent.Tenant.view',compact('tenants'));
  }

  public function AgentTenantShow(Request $request)
  {
      $tenant = DB::table('users')->where('id', $request->id)->first();
      return view('Agent.Tenant.show',compact('tenant'));
  }

  public function AgentTenantEdit(Request $request)
  {
    $user = DB::table('users')->where('id', $request->id)->first();
    return view('Agent.Tenant.edit', compact('user'));
  }

  public function AgentTenantDestroy(Request $request , $id)
  {
    $user = User::withTrashed()->findOrFail($id);
    if($user->deleted_at == null)
    {
        $user->delete();
        ActivityHappened::dispatch(Auth::id(), 'An user has been locked.');

        return back()->with('danger', 'User is locked!');
    }
    else
    {
        $user->restore();
        ActivityHappened::dispatch(Auth::id(), 'An user has been unlocked.');

        return back()->with('success', 'User is unlocked!');
    }
  }

}
