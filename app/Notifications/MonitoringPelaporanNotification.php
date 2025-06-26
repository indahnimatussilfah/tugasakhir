<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class MonitoringPelaporanNotification extends Notification
{
    use Queueable;

    protected $pengobatan;

    public function __construct($pengobatan)
    {
        $this->pengobatan = $pengobatan;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'pengobatan_id' => $this->pengobatan->id,
            'nama' => $this->pengobatan->petugas_nama ?? 'Petugas',
            'message' => 'Pengobatan Anda telah dimonitor oleh petugas ' . ($this->pengobatan->petugas_nama ?? 'Petugas'),
        ];
    }
}
