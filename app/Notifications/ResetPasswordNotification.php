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
     * Buat instance notifikasi baru.
     */
    public function __construct(string $token)
    {
        $this->token = $token;
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
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Permintaan Reset Password - Agroeduwisata Hargorojo')
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Kami menerima permintaan untuk mereset password akun Anda di portal Desa Hargorojo.')
            ->line('Silakan klik tombol di bawah ini untuk mereset password Anda:')
            ->action('Reset Password', $url)
            ->line('Tautan reset password ini akan kedaluwarsa dalam 60 menit.')
            ->line('Jika Anda tidak meminta reset password, tidak ada tindakan lebih lanjut yang diperlukan.')
            ->salutation('Salam hangat, Admin Desa Hargorojo');
    }
}
