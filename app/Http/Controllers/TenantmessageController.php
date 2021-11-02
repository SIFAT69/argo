<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TenantmessageController extends Controller
{
    public function index()
    {
      if (Auth::user()->account_role == 'Agent') {
        $tenants = DB::table('users')->where('created_by', Auth::id())->get();
      }else {
        $tenants = DB::table('users')->where('created_by', Auth::user()->created_by)->get();
      }
      return view('Agent.Tenantmessage.index', compact('tenants'));
    }

    public function openCoversation(Request $request)
    {
      if (Auth::user()->account_role == 'Agent') {
        $tenants = DB::table('users')->where('created_by', Auth::id())->get();
        $user_id = $request->id;
        $messages = DB::table('tenantmessages')->where('sender_id', Auth::id())->orWhere('receiver_id', $user_id)->orWhere('sender_id',  $user_id)->orWhere('receiver_id', Auth::id())->get();
      }else {
        $tenants = DB::table('users')->where('created_by', Auth::user()->created_by)->get();
        $user_id = $request->id;
        $messages = DB::table('tenantmessages')->where('sender_id', Auth::user()->created_by)->orWhere('receiver_id', $user_id)->orWhere('sender_id',  $user_id)->orWhere('receiver_id',  Auth::user()->created_by)->get();
      }
      // foreach ($messages as $message) {
      //
      //   // die();
      //   // if ($message->sender_id == Auth::id()) {
      //   //    echo "Sender = ".$message->message.'<br>';
      //   // }
      //   // if ($message->receiver_id == $user_id) {
      //   //   echo $message->receiver_id .'='.$user_id.'<br>';
      //   //    echo "Receiver = ".$message->message.'<br>';
      //   // }
      // }
      // die();
      $name = $request->name;
      $user = DB::table('users')->where('id', $request->id)->first();
      return view('Agent.Tenantmessage.message',compact(
        'messages',
        'tenants',
        'name',
        'user_id',
        'user',
       ));
    }


    public function messageSentPost(Request $request)
    {
         if (Auth::user()->account_role == 'Agent') {
           DB::table('tenantmessages')->insert([
             'sender_id' => Auth::id(),
             'receiver_id' => $request->id,
             'message' => $request->message,
             'status' => 'Unseen',
             'created_at' => Carbon::now(),
           ]);
         }elseif (Auth::user()->account_role == 'Agent Stuff') {
           DB::table('tenantmessages')->insert([
             'sender_id' => Auth::user()->created_by,
             'receiver_id' => $request->id,
             'message' => $request->message,
             'status' => 'Unseen',
             'created_at' => Carbon::now(),
           ]);
         }else {
           DB::table('tenantmessages')->insert([
             'sender_id' => Auth::id(),
             'receiver_id' => $request->id,
             'message' => $request->message,
             'status' => 'Unseen',
             'created_at' => Carbon::now(),
           ]);
         }

      return back()->with('success', 'Message deliverd');
    }

    public function tenantIndex(Request $request)
    {
      $myAgent = DB::table('users')->where('id', Auth::user()->created_by)->first();
      $messages = DB::table('tenantmessages')->where('sender_id', Auth::id())->orWhere('receiver_id', Auth::id())->get();
      $name = $request->name;
      $user_id = $request->id;
      $user = DB::table('users')->where('id', $request->id)->first();
      return view('Tanent.Message.index',compact(
        'messages',
        'myAgent',
        'name',
        'user_id',
        'user',
       ));
    }
}
