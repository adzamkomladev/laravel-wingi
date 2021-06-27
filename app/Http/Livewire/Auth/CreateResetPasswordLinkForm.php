<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Notifications\Auth\ResetPasswordLinkNotification;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateResetPasswordLinkForm extends Component
{
    public string $email = '';

    protected $rules = [
        'email' => ['required', 'email'],
    ];

    public function render()
    {
        return view('livewire.auth.create-reset-password-link-form');
    }

    public function submit()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        $user = User::where('email', $this->email)->first();

        if ($user) {

            $user->update([
                'reset_token' => (string)Str::uuid()
            ]);

            $user->notify(new ResetPasswordLinkNotification($user));
        }

        $this->emitUp('resetLinkSent');
    }
}
