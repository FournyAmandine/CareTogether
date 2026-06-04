<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisteredSold extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $post)
    {
        $this->onConnection('redis');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        /*return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');*/
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Une annonce que vous avez enregistrée n’est plus disponible',
            'post' => 'Annonce concernée :' . $this->post->name,
            'message_id' => $this->post->id,
            'route' => route('public.posts.show', $this->post->id)
        ];
    }
}
