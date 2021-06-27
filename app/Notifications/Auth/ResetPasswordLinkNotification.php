<?php

namespace App\Notifications\Auth;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordLinkNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $appName = config('app.name');
        $subject = "Password reset for {$appName} account";
        $greeting = "Hello, {$notifiable->name}!";
        $expiryDate = Carbon::now()->addDays(7)->toDateString();

        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->line("You can reset your password by clicking on the link below.")
            ->action('Reset password', route('auth.reset-password', ['reset_token' => $notifiable->reset_token]))
            ->line("This link will expire on {$expiryDate}");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
