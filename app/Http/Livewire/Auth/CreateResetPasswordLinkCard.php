<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class CreateResetPasswordLinkCard extends Component
{
    public bool $showForm = true;

    protected $listeners = ['resetLinkSent' => 'hideForm'];

    public function render()
    {
        return view('livewire.auth.create-reset-password-link-card');
    }

    public function hideForm()
    {
        $this->showForm = false;
    }
}
