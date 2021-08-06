<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
    public function AccountList(Request $request)
    {
      $accounts = DB::table('users')->get();
      return view('Dashboard.Accounts.accounts',compact('accounts'));
    }
    public function AccountEdit(Request $request)
    {
      $accounts = DB::table('users')->where('id', $request->id)->first();
      return view('Dashboard.Accounts.edit',compact('accounts'));
    }

    public function AccountEditPost(Request $request)
    {
      if (!empty($request->profile_picture)) {
        $randomNumber =rand();
        $profile_picture = $request->file('profile_picture');
        $profile_picture_rename = $randomNumber.'.'.$profile_picture->getClientOriginalExtension();
        $newLocation = 'uploads/'.$profile_picture_rename;
        Image::make($profile_picture)->resize(90, 90)->save($newLocation,100);

        DB::table('users')->where('id', $request->id)->update([
          'avatar' => $profile_picture_rename,
        ]);
       }
        DB::table('users')->where('id', $request->id)->update([
          'name' => $request->name,
        ]);

      if (!empty($request->password)) {
        DB::table('users')->where('id', $request->id)->update([
          'password' => Hash::make($request->password),
        ]);

      }
      return back()->with('success', 'Profile Update complete.');
    }
}
