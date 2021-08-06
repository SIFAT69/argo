<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use App\Models\User;
use App\Models\plan;


class PaymentController extends Controller
{
  public function package_index()
  {
    $plans = Plan::Where('status', 1)->get();
    return view('checkout.package',compact('plans'));
  }
  public function checkout(Request $request)
  {
       $package = DB::table('packages')->where('id', $request->package_id)->first();
      // Enter Your Stripe Secret
      \Stripe\Stripe::setApiKey('sk_test_51Ic31vAvjSDpdiu41rDwfhxI6EGPESq6fageb4qYq180X7c8HqtjBp7L6s9WdI8igbxIPfY1ZeQCW60TGygSythc00GitPxO12');

      $amount = $request->package_price;
      $amount *= 100;
      $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
        'description' => 'Stripe Test Payment',
        'amount' => $amount,
        'currency' => 'USD',
        'description' => 'Payment From Argo',
        'payment_method_types' => ['card'],
      ]);
      $intent = $payment_intent->client_secret;



      return view('checkout.credit-card',compact('intent','package'));

      }

      public function afterPayment()
      {
        //
        // DB::table('payments')->insert([
        //   'user_id' => Auth::id(),
        //   'package_id' => $request->package_id,
        //   'status' => 0,
        // ]);

          return redirect('/dashboard')->with('success', 'Congratulations! Payment complete! Now you can act as an Agent.');
      }

      public function editpayment(Request $request)
      {
        $paymentgateway_keys = DB::table('gatewaysettings')->first();
        return view('Dashboard.Paymentgateway.paymentgateway', compact('paymentgateway_keys'));
      }

      public function transactions()
      {
        return view('Dashboard.Paymentgateway.transaction');
      }
}
