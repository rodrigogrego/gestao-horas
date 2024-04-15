<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RedefinirSenhaNotification extends Notification
{
    use Queueable;
    public $token;
    public $email;
    public $name;
    /**
     * Create a new notification instance.
     */
    public function __construct($token, $email, $name)
    {
        $this->token = $token;
        $this->email = $email;
        $this->name = $name;
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
        $url = 'http://localhost:8000/password/reset/'.$this->token.'?email='.$this->email;
        $minutes = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        $saudacao = 'Olá, '.$this->name;

        return (new MailMessage)
            ->subject('Recuperação da senha')
            ->greeting($saudacao)
            ->line('Foi solicitado uma recuperação da senha no sistema.')
            ->action('Modificar Senha', $url)
            ->line('Esse link vai expirar em '.$minutes.' minutos' )
            ->line('Se não foi requisitado, não faça nada.')
            ->salutation('Até breve!');
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
