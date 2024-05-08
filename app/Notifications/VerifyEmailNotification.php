<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
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
            ->subject('Verifikasi Email')
            ->line('Klik tombol di bawah ini untuk memverifikasi alamat email Anda.')
            ->action('Verifikasi Email', $this->verificationUrl($notifiable))
            ->line('Jika Anda tidak membuat permintaan untuk memverifikasi alamat email Anda, Anda bisa mengabaikan email ini.');
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

     /**
     * Get the verification URL for the given notifiable entity.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable): string
    {
        return \Illuminate\Support\Facades\URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(10),
            ['id' => $notifiable->getKey()]
        );
    }
}