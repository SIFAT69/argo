<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Image;
use App\Events\ActivityHappened;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->get();
        return view('Dashboard.Users.index', ['users' => $users]);
    }

    public function agentUsers()
    {   $users = DB::table('users')->where('created_by', Auth::id())->where('account_role', 'Service Providers')->get();
        return view('Agent.User.index', compact('users'));
    }


    public function stuffusers()
    {   $users = DB::table('users')->where('created_by', Auth::id())->where('account_role', 'Agent Stuff')->get();
        return view('Agent.User.stuffs', compact('users'));
    }

    public function agentUsersUpdate(Request $request)
    {
        DB::table('users')->where('id', $request->user_id)->update([
            'account_role' => $request->account_role,
         ]);

         return back()->with('success', 'Your user permission has been set to '.$request->account_role);
    }
    public function stuffUserUpdate(Request $request)
    {
        DB::table('users')->where('id', $request->user_id)->update([
            'role' => $request->role,
         ]);

         return back()->with('success', 'Your user permission has been set to '.$request->account_role);
    }

    public function createnewuser(Request $request)
    {
        return view('Agent.User.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return view('Dashboard.Users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
			// 'avatar' => 'bail|sometimes|image|mimes:jpeg,jpg,png|dimensions:ratio=1/1',
		]);

        if (!empty($request->avatar)) {
            $randomNumber =rand();
            $profile_picture = $request->file('avatar');
            $profile_picture_rename = $randomNumber.'.'.$profile_picture->getClientOriginalExtension();
            $newLocation = public_path('uploads/'.$profile_picture_rename);
            Image::make($profile_picture)->resize(100, 100)->save($newLocation,100);
            User::where('id', $id)->update([
                'avatar' => $profile_picture_rename,
            ]);
        }

		User::where('id', $id)->update($data);
        ActivityHappened::dispatch(Auth::id(), 'An user profile information has been updated.');

		return redirect()->route('users.index')->with('success', "Profile Information is Updated");
    }

    public function update_password(Request $request, $id)
    {
        $request->validate([
			'newPassword' => 'bail|required|string|min:8|max:255|confirmed'
		]);

		User::where('id', $id)->update([
			'password' => Hash::make($request->newPassword)
		]);
        ActivityHappened::dispatch(Auth::id(), 'Password of an user has been updated.');

		return redirect()->route('users.index')->with('success', "Password is changed");
    }

    public function destroy($id)
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
