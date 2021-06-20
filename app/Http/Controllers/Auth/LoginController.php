<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\LoggedIn;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function show(Request $request)
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'max:100', 'exists:users'],
            'password' => ['required'],
        ]);

        if (!auth()->attempt($credentials)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('welcome');
    }
}
