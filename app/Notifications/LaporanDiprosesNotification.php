<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class LaporanDiprosesNotification extends Notification
{
    use Queueable;

    public function __construct(public $laporan) {}

    public function via($notifiable)
    {
        return ['mail']; // Bisa tambah 'database' atau 'sms'
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Laporan Anda Sedang Diproses')
            ->greeting('Halo ' . $notifiable->name . ',')
            ->line('Laporan Anda dengan judul "' . $this->laporan->judul . '" sedang diproses oleh petugas.')
            ->line('Kami akan memberi tahu lagi saat laporan selesai ditangani.')
            ->line('Terima kasih atas partisipasi Anda.')
            ->salutation('Salam sehat,')
            ;
    }
}
