<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;

class ContactController extends Controller
{
    public function contactSend(Request $request)
    {

      $validatedData = $request->validate([
          'form_name' => 'required',
          'form_email' => 'required|email',
          'form_phone' => 'required',
          'form_subject' => 'required',
          'form_message' => 'required',
      ]);
      DB::table('contacts')->insert([
        'form_name' => $request->form_name,
        'form_email' => $request->form_email,
        'form_phone' => $request->form_phone,
        'form_subject' => $request->form_subject,
        'form_message' => $request->form_message,
        'status' => 'Unread',
        'created_at' => Carbon::now(),
      ]);
      return back()->with('success', 'Your message has been sent successfuly. We will reach you shortly');
    }

    public function allContact(Request $request)
    {
      $contacts = DB::table('contacts')->get();
      return view('Dashboard.Contacts.contact',compact('contacts'));
    }

    public function statusContact(Request $request)
    {
      if ($request->status == "Unread") {
        DB::table('contacts')->where('id', $request->id)->update(['status' => 'Unread']);
      }
      if ($request->status == "Seen") {
        DB::table('contacts')->where('id', $request->id)->update(['status' => 'Seen']);
      }
      if ($request->status == "Delete") {
        DB::table('contacts')->where('id', $request->id)->delete();
      }

      return back()->with('success', 'You have updated contact status!');
    }
}
