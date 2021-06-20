<?php

namespace App\Listeners\Cart;

use App\Events\Auth\LoggedIn;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PersistCart
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;

        if ($user->is_admin) {
            return;
        }

        // TODO: Get cart data from temporal storage
        // TODO: Persist cart data for user
    }
}
