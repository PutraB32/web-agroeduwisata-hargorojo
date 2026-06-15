<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Token reset password.
     *
     * @var string
     */
    public $token;

    /**
     * Nama route tujuan reset password.
     *
     * @var string
     */
    public string $resetRouteName;

    /**
     * Buat instance notifikasi baru.
     */
    public function __construct(string $token, string $resetRouteName = 'password.reset')
    {
        $this->token = $token;
        $this->resetRouteName = $resetRouteName;
    }

    /**
     * Dapatkan saluran pengiriman notifikasi.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Dapatkan representasi email dari notifikasi.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url(route($this->resetRouteName, [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        $expireMinutes = config('auth.passwords.users.expire', 60);

        return (new MailMessage)
            ->subject('Permintaan Reset Password - Agroeduwisata Hargorojo')
            ->view('emails.reset-password', [
                'name' => $notifiable->name,
                'url' => $url,
                'expireMinutes' => $expireMinutes,
            ]);
    }
}
