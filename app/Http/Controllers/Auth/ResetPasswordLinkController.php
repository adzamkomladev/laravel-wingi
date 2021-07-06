<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Auth\ResetPasswordLinkNotification;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ResetPasswordLinkController extends Controller
{
    public function create(Request $request)
    {
        return Inertia::render('Auth/ResetPasswordLink');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            $user->update([
                'reset_token' => (string)Str::uuid()
            ]);

            $user->notify(new ResetPasswordLinkNotification($user));
        }
    }
}
