<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function show(Request $request)
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'max:100', 'exists:users'],
            'password' => ['required'],
            'name' => ['required'],
            'phone' => ['sometimes']
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        $user = User::create($credentials);

        auth()->login($user);

        return redirect()->intended('welcome');
    }
}
