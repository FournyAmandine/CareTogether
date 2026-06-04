<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $message)
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
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nouveau message sur CareTogether')
            ->greeting('Bonjour ' . $notifiable->first_name . ',')
            ->line('Vous avez reçu un nouveau message envoyé par ' . $this->message->sender->first_name . ' ' . $this->message->sender->last_name)
            ->line('Annonce concernée : ' . $this->message->conversation->post->name)
            ->line('Message : ' . $this->message->text)
            ->action('Voir le message', route('user.messages', $this->message->conversation->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'contact' =>  $this->message->sender->first_name . ' ' . $this->message->sender->last_name,
            'message' => 'Vous avez reçu un nouveau message de ' . $this->message->sender->first_name,
            'post' => 'Annonce concernée : ' . $this->message->conversation->post->name,
            'message_id' => $this->message->id,
            'route' => route('user.messages', $this->message->conversation->id)
        ];
    }
}
