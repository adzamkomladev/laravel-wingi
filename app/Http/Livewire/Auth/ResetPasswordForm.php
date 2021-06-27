<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class ResetPasswordForm extends Component
{
    public User $user;

    public string $password = '';

    protected $rules = [
        'password' => 'required|min:8',
    ];

    public function render()
    {
        return view('livewire.auth.reset-password-form');
    }

    public function submit()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        $this->user->update([
            'password' => bcrypt($this->password),
            'reset_token' => null
        ]);

        $this->emitUp('passwordReset');
    }
}
