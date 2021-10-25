<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RentControllerController extends Controller
{
    public function allTransactions()
    {

      if (Auth::user()->account_role == 'Tenant') {
        $payments = DB::table('rent_controllers')->where('user_id', Auth::id())->orderBy('created_at', 'desc')->simplePaginate(15);
        return view('Tanent.Payments.history', compact('payments'));
      }else if(Auth::user()->account_role == 'Agent'){
        $payments = DB::table('rent_controllers')->where('agent_id', Auth::id())->orderBy('created_at', 'desc')->simplePaginate(15);
        return view('Agent.Payments.history', compact('payments'));
      }else {
        $payments = DB::table('rent_controllers')->orderBy('created_at', 'desc')->get();
        return "admin";
      }
    }

    public function adminAllTransaction(Request $request)
    {
      $payments = DB::table('rent_controllers')->orderBy('created_at', 'desc')->get();

      return view('Dashboard.PaymentGateway.alltransactions',compact('payments'));
    }
}
