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

		if($request->hasFile('avatar'))
		{
				$path = $request->file('avatar')->store('/images/users');
				$image = Image::make(asset('storage/'.$path))->fit(250, 250)->save('storage/'.$path);

				$oldFile = User::where('id', $id)->value('avatar');

				$data['avatar'] = $path;
				User::where('id', $id)->update($data);
				Storage::delete($oldFile);
				return back()->with('msg_success', 'Profile Information is Updated');
		}

		User::where('id', $id)->update($data);
		return back()->with('msg_success', "Profile Information is Updated");
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

		return back()->with('msg_success', "Social Media is Updated");
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

		return back()->with('msg_success', "Password is Updated");
	}
}
