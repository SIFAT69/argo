<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WithdrawController extends Controller
{
    public function index(Request $request)
    {
      $withdraws = DB::table('withdraws')->orderBy('status', 'desc')->get();
      return view('Dashboard.PaymentGateway.withdraw', compact('withdraws'));
    }

    public function withdraw(Request $request)
    {
      $oldBalance = Auth::user()->balance;
      $newBalance = $oldBalance-$request->balance;

      if (Auth::user()->balance <= 0 || Auth::user()->balance < $newBalance) {
        return back()->with('danger', 'You dont have enough balance for processing withdraw!');
      }

      DB::table('users')->where('id', Auth::id())->update([
        'balance' => $newBalance,
      ]);

      DB::table('withdraws')->insert([
        'agent_id' => Auth::id(),
        'name' => Auth::user()->name,
        'amount' => $request->balance,
        'bank_info' => $request->bank_info,
        'created_at' => Carbon::now(),
      ]);

      return back()->with('success', 'Your withdraw request is under review. Please wait.');
    }

    public function withdrawRequests(Request $request)
    {
      $withdraws = DB::table('withdraws')->where('agent_id', Auth::id())->simplePaginate(15);
      return view('Agent.Payments.withdraw',compact('withdraws'));
    }

    public function complete(Request $request)
    {
      DB::table('withdraws')->where('id', $request->id)->update([
        'status' => 'Complete',
      ]);

      return back()->with('success', 'Withdraw request status has been changed!');
    }
    public function undo(Request $request)
    {
      DB::table('withdraws')->where('id', $request->id)->update([
        'status' => 'Pending',
      ]);

      return back()->with('success', 'Withdraw request status has been changed!');
    }
    public function cancel(Request $request)
    {
      DB::table('withdraws')->where('id', $request->id)->update([
        'status' => 'Canceled',
      ]);

      return back()->with('success', 'Withdraw request status has been changed!');
    }
}
