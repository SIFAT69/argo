<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Subscription;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $subscription = Subscription::where('user_id', $request->user()->id)->first();

        if ($request->user() && ! $request->user()->subscribed($subscription->name)) {
            return redirect()->route('packageHistory');
        }

        return $next($request);
    }
}