<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ResetPasswordController extends Controller
{
    public function edit(Request $request)
    {
        $user = User::validCode($request->query('reset_token'))->first();

        abort_unless($user, 404, 'This link is invalid or has expired!');

        return Inertia::render('Auth/ResetPassword', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:8',
        ]);

        $user->update([
            'password' => bcrypt($request->input('password')),
            'reset_token' => null
        ]);

        return back();
    }
}
