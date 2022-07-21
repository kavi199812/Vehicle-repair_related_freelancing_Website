<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationControllerCenter extends Controller
{
    public function read()
    {
        auth('center')->user()->unreadNotifications->markAsRead();
        return redirect()->back()->with('notification_success', 'Notifications marked as read');
    }
}
