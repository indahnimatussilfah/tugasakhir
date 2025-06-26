<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;


class JawabanPelaporanNotification extends Notification
{
    use Queueable;

    protected $pelaporan;

    /**
     * Create a new notification instance.
     */
    public function __construct($pelaporan)
    {
        $this->pelaporan = $pelaporan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable)
    {
        return [
            'pelaporan_id' => $this->pelaporan->id,
            'nama_petugas' => Auth::user()->name,
            'message' => "Laporan Anda telah ditanggapi oleh petugas kesehatan. Silakan cek detail jawabannya.",
            'jawaban' => $this->pelaporan->jawaban
        ];
    }
}
