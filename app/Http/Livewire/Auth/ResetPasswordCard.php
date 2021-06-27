<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class ResetPasswordCard extends Component
{
    public User $user;

    public bool $showForm = true;

    protected $listeners = ['passwordReset' => 'hideForm'];

    public function render()
    {
        return view('livewire.auth.reset-password-card');
    }

    public function hideForm()
    {
        $this->showForm = false;
    }
}
