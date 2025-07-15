<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelaporan;

class NotificationController extends Controller
{
    /**
     * Tampilkan semua notifikasi milik user yang sedang login.
     */
    public function index()
    {
        $notifications = auth()->user()->notifications;

        return view('notifikasi.index', compact('notifications'));
    }

    /**
     * Tandai semua notifikasi sebagai sudah dibaca.
     */
    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('success', 'Semua notifikasi telah ditandai sebagai sudah dibaca.');
    }
    public function show($notificationId)
{
    $notification = auth()->user()->notifications()->findOrFail($notificationId);

    // Tandai sebagai dibaca
    if (is_null($notification->read_at)) {
        $notification->markAsRead();
    }

    // Ambil data dari notifikasi
    $data = $notification->data;

    return view('notifikasi.detail', compact('data'));
}

}
