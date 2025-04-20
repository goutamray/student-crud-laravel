<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StaffAccountNotification extends Notification
{
    use Queueable;


    public $name;
    public $email;
    public $cell;
    public $photo;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this -> name = $data["name"];
        $this -> email = $data["email"];
        $this -> cell = $data["cell"];
        $this -> photo = $data["photo"];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hello! ' . $this -> name)
            ->line('You Are Welcome To Our WebGeniusBD')
            ->action('Active Your Account', url('/'))
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
