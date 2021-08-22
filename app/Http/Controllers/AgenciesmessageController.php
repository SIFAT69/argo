<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;

class AgenciesmessageController extends Controller
{
    public function agenency_message(Request $request)
    {
      DB::table('agenciesmessages')->insert([
        'name' => $request->name,
        'phoneNumber' => $request->phoneNumber,
        'email' => $request->email,
        'message' => $request->message,
        'to_id' => $request->to_id,
        'created_at' => Carbon::now(),
      ]);

      return back()->with('success', 'Your message has been sent to agenency. They will get back to you shortly!');
    }
}
