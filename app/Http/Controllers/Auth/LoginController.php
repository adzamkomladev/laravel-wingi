<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\LoggedIn;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{

    public function create(Request $request)
    {
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request)
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

        return redirect()->intended('/');
    }
}
