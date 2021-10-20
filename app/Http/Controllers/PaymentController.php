<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Image;
use App\Models\User;
use App\Models\Plan;

use App\Events\ActivityHappened;



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
        'description' => 'Argo Subscription Payment',
        'amount' => $amount,
        'currency' => 'USD',
        'description' => 'Payment From Argo',
        'payment_method_types' => ['card'],
      ]);
      $intent = $payment_intent->client_secret;

      return view('checkout.credit-card',compact('intent','package'));

      }

      public function afterPayment(Request $request)
      {
        if (!empty($request->rent_id)) {

          DB::table('rent_controllers')->where('id', $request->rent_id)->update([
            'status' => 'Complete',
            'agent_id' => $request->agent_id,
            'updated_at' => Carbon::now(),
          ]);

          $remaining_days = DB::table('properties')->where('id', $request->property_id)->value('remaining_days');
          $newDays = $remaining_days+30;

          DB::table('properties')->where('id', $request->property_id)->update([
            'rent_status' => 'Paid',
            'remaining_days' => $newDays,
            'updated_at' => Carbon::now(),
          ]);

          $agent_id = DB::table('properties')->where('id', $request->property_id)->value('user_id');
          $agent_balance = DB::table('users')->where('id', $agent_id)->value('balance');
          $update_balance = $agent_balance+$request->price;

          DB::table('users')->where('id', $agent_id)->update([
            'balance' => $update_balance,
          ]);

         }
          ActivityHappened::dispatch(Auth::id(), 'You just completed a transaction.');
          return redirect('/dashboard')->with('success', 'Congratulations! Payment complete! Now you can act as an Agent.');
      }

      public function editpayment(Request $request)
      {
        $paymentgateway_keys = DB::table('gatewaysettings')->first();
        return view('Dashboard.PaymentGateway.paymentgateway', compact('paymentgateway_keys'));
      }

      public function transactions()
      {
        return view('Dashboard.PaymentGateway.transaction');
      }

      public function tenantRentPayment(Request $request)
      {
        $property = DB::table('properties')->where('id', $request->property_id)->first();
        \Stripe\Stripe::setApiKey('sk_test_51Ic31vAvjSDpdiu41rDwfhxI6EGPESq6fageb4qYq180X7c8HqtjBp7L6s9WdI8igbxIPfY1ZeQCW60TGygSythc00GitPxO12');

        $amount = $property->price;
        $amount *= 100;
        $amount = (int) $amount;

          $payment_intent = \Stripe\PaymentIntent::create([
          'description' => 'Argo Tenant Rent Payment',
          'amount' => $amount,
          'currency' => 'USD',
          'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        $rent_id = DB::table('rent_controllers')->insertGetId([
          'user_id' => Auth::id(),
          'property_id' => $request->property_id,
          'amount' => $property->price,
          'status' => 'Incomplete',
          'created_at' => Carbon::now(),
        ]);
        return view('Tanent.Payments.rentpay',compact('property','intent','rent_id'));
      }

      public function paymentOffline(Request $request)
      {
        $remaining_days = DB::table('properties')->where('id', $request->property_id)->value('remaining_days');
        $newDays = $remaining_days+30;

        DB::table('properties')->where('id', $request->property_id)->update([
          'rent_status' => 'Paid',
          'remaining_days' => $newDays,
          'updated_at' => Carbon::now(),
        ]);
      }
}
