<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class LaporanDiprosesNotification extends Notification
{
    use Queueable;

    public function __construct(protected $laporan, protected $oldStatus, protected $newstatus) {}

    public function via($notifiable)
    {
        return ['database']; // Bisa tambah 'database' atau 'sms'
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }


}
