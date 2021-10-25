<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use App\Models\EmailConfiguration;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class EmailConfigurationController extends Controller
{
  public function createConfiguration(Request $request)
  {

    $path = base_path('.env');
    if (file_exists($path)) {
        file_put_contents($path, str_replace('MAIL_MAILER='.env('MAIL_MAILER'), 'MAIL_MAILER='.$request->driver, file_get_contents($path)));
        file_put_contents($path, str_replace('MAIL_HOST='.env('MAIL_HOST'), 'MAIL_HOST='.$request->hostName, file_get_contents($path)));
        file_put_contents($path, str_replace('MAIL_PORT='.env('MAIL_PORT'), 'MAIL_PORT='.$request->port, file_get_contents($path)));
        file_put_contents($path, str_replace('MAIL_USERNAME='.env('MAIL_USERNAME'), 'MAIL_USERNAME='.$request->userName, file_get_contents($path)));
        file_put_contents($path, str_replace('MAIL_PASSWORD='.env('MAIL_PASSWORD'), 'MAIL_PASSWORD='.$request->password, file_get_contents($path)));
        file_put_contents($path, str_replace('MAIL_ENCRYPTION='.env('MAIL_ENCRYPTION'), 'MAIL_ENCRYPTION='.$request->encryption, file_get_contents($path)));
        file_put_contents($path, str_replace('MAIL_FROM_ADDRESS='.env('MAIL_FROM_ADDRESS'), 'MAIL_FROM_ADDRESS='.$request->senderEmail, file_get_contents($path)));
        // file_put_contents($path, str_replace('MAIL_FROM_ADDRESS='.env('MAIL_FROM_ADDRESS'), 'MAIL_FROM_ADDRESS='.$request->senderEmail, file_get_contents($path)));
        file_put_contents($path, str_replace('MAIL_FROM_NAME='.env('MAIL_FROM_NAME'), 'MAIL_FROM_NAME='.$request->senderName, file_get_contents($path)));
    }
    $is_exist = DB::table('email_configurations')->get();
    if (empty($is_exist)) {
      EmailConfiguration::create([
            "user_id"       =>      Auth::user()->id,
            "driver"        =>      $request->driver,
            "host"          =>      $request->hostName,
            "port"          =>      $request->port,
            "encryption"    =>      $request->encryption,
            "user_name"     =>      $request->userName,
            "password"      =>      $request->password,
            "sender_name"   =>      $request->senderName,
            "sender_email"  =>      $request->senderEmail
        ]);
    }else {
      EmailConfiguration::where('id', 1)->update([
            "user_id"       =>      Auth::user()->id,
            "driver"        =>      $request->driver,
            "host"          =>      $request->hostName,
            "port"          =>      $request->port,
            "encryption"    =>      $request->encryption,
            "user_name"     =>      $request->userName,
            "password"      =>      $request->password,
            "sender_name"   =>      $request->senderName,
            "sender_email"  =>      $request->senderEmail
        ]);
    }

        return back()->with('success', 'Your mail configuration updated!');
    }

    public function testMailSend(Request $request)
    {
      $toEmail = Auth::user()->email;
      // $toEmail = "kazi.sifat1999@gmail.com";
      $details = [
        'message' => 'Your mail is config is success!',
      ];

      // pass dynamic message to mail class
      Mail::to($toEmail)->send(new TestMail($details));

      return back()->with('success', 'Please check your mail if you get the mail thats mean your configuration is working. Check at : '.$toEmail);
    }
}
