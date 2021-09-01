<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use App\Events\ActivityHappened;

class SubscriptionController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        $private_key = DB::table('gatewaysettings')->where('id', 1)->value('private_key');
        $this->stripe = new \Stripe\StripeClient($private_key);
    }

    public function create(Request $request, Plan $plan)
    {
        $plan = Plan::findOrFail($request->get('plan'));

        $user = $request->user();
        $paymentMethod = $request->paymentMethod;

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->newSubscription('yearly', $plan->stripe_plan)
            ->create($paymentMethod, [
                'email' => $user->email,
            ]);

        DB::table('users')->where('id', Auth::id())->update([
          'account_role' => 'Agent',
        ]);
        DB::table('transactions')->insert([
          'amount' => $request->amount,
          'username' => Auth::user()->name,
          'created_at' => Carbon::now(),
        ]);
        return redirect()->route('dashboard')->with('success', 'Your plan subscribed successfully');
    }


    public function createPlan()
    {
        return view('Dashboard.Plans.create');
    }

    public function storePlan(Request $request)
    {
        $data = $request->except('_token');

        $data['slug'] = strtolower($data['name']);
        $price = $data['cost'] *100;

        //create stripe product
        $stripeProduct = $this->stripe->products->create([
            'name' => $data['name'],
        ]);

        //Stripe Plan Creation
        if ($request->description == "Yearly") {
        $stripePlanCreation = $this->stripe->plans->create([
            'amount' => $price,
            'currency' => 'usd',
            'interval' => 'year', //  it can be day,week,month or year
            'product' => $stripeProduct->id,
        ]);
        $data['stripe_plan'] = $stripePlanCreation->id;
        }
        //Stripe Plan Creation
        if ($request->description == "Monthly") {
        $stripePlanCreation = $this->stripe->plans->create([
            'amount' => $price,
            'currency' => 'usd',
            'interval' => 'month', //  it can be day,week,month or year
            'product' => $stripeProduct->id,
        ]);
        $data['stripe_plan'] = $stripePlanCreation->id;
        }

        Plan::create($data);
        ActivityHappened::dispatch(Auth::id(), 'A new subscription has been created.');

        return redirect('/plans')->with('success', 'New subscription package has been created!');
    }
}
