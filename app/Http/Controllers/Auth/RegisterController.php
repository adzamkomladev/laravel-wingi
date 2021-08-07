<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Auth\WelcomeUserNotification;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{

    public function create(Request $request)
    {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'max:100', 'unique:users,email'],
            'password' => ['required'],
            'name' => ['required'],
            'phone' => ['sometimes']
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        $user = User::create($credentials);

        auth()->login($user);

        $user->notify(new WelcomeUserNotification($user));

        return redirect()->intended('/');
    }
}
