<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;

class AccountController extends Controller
{
    public function AccountList(Request $request)
    {
      $accounts = DB::table('users')->get();
      return view('Dashboard.Accounts.accounts',compact('accounts'));
    }
}
