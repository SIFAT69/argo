<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class ConnectstripeController extends Controller
{

    public function connection(Request $request)
    {
      \Stripe\Stripe::setApiKey('sk_test_51Ic31vAvjSDpdiu41rDwfhxI6EGPESq6fageb4qYq180X7c8HqtjBp7L6s9WdI8igbxIPfY1ZeQCW60TGygSythc00GitPxO12');

      $account = \Stripe\Account::create([
        'type' => 'standard',
      ]);

      \Stripe\Stripe::setApiKey('sk_test_51Ic31vAvjSDpdiu41rDwfhxI6EGPESq6fageb4qYq180X7c8HqtjBp7L6s9WdI8igbxIPfY1ZeQCW60TGygSythc00GitPxO12');
      $account_links = \Stripe\AccountLink::create([
        'account' => $account->id,
        'refresh_url' => 'http://127.0.0.1:8000/agent/rent/transaction',
        'return_url' => 'http://127.0.0.1:8000/agent/connect/stripe/success',
        'type' => 'account_onboarding',
      ]);

      DB::table('users')->where('id', Auth::id())->update([
        'account_id' => $account->id,
      ]);
      return redirect($account_links->url);
    }

    public function successConnected(Request $request)
    {
      DB::table('users')->where('id', Auth::id())->update([
        'is_active_account' => 'Yes',
      ]);
      echo "Redirecting....";
      sleep(1);
      echo "Connecting to page....";
      sleep(1);
      echo "Connected....";
      sleep(1);
      return redirect('/agent/rent/transaction')->with('success', 'Your account has been connected successfully');
    }
}
