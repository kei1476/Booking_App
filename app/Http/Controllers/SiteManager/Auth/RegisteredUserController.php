<?php

namespace App\Http\Controllers\SiteManager\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SiteManager;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('site_manager.auth.register');
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
            'site_manager_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|max:255|min:8|regex:/^(?=.*?[a-z])(?=.*?\d)[a-z\d]+$/i',
        ]);

        $user = SiteManager::create([
            'site_manager_name' => $request->site_manager_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard('site_manager')->login($user);

        return redirect(RouteServiceProvider::SITE_MANAGER_HOME);
    }
}
