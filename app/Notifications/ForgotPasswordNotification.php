<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForgotPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $token;
    public $user;
    public $username;

    /**
     * Create a new notification instance.
     */
    public function __construct($token,$user)
    {
        $this->user = $user;
        $this->username = $user->name;
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Password-Reset')
            ->greeting('Hello '.$this->username.',')
            ->line("You've recieved this because We got your request for Password Reset. If it is not you who requested this please ignore this!")
            ->action('Reset- Password', url('http://localhost:8000/reset-password/'.$this->user->id.'/'.$this->token))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
