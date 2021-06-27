<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.create_password_reset_link');
    }

    public function update(Request $request)
    {
        $user = User::validCode($request->query('reset_token'))->first();

        abort_unless($user, 404, 'This link is invalid or has expired!');

        return view('auth.reset_password', [
            'user' => $user
        ]);
    }
}
