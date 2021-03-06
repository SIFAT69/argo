<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use App\Events\ActivityHappened;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return redirect('/dashboard/agent/select-package');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (!empty($request->account_role)) {
          $accouunt_roles = $request->account_role;
        }else {
          $accouunt_roles = "NewUser";
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'account_role' => $accouunt_roles,
            'license' => $request->license,
            'taxNumber' => $request->taxNumber,
            'phoneNumber' => $request->phoneNumber,
            'faxNumber' => $request->faxNumber,
            'mobileNumber' => $request->mobileNumber,
            'language' => $request->language,
            'companyName' => $request->companyName,
            'address' => $request->address,
            'about' => $request->about,
        ]);

        event(new Registered($user));
        ActivityHappened::dispatch($user->id, 'A new user has been registered.');

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
