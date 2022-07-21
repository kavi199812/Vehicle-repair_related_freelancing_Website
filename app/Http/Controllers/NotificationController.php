<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function read()
    {
       // auth('center')->user()->unreadNotifications->markAsRead();
        auth('customer')->user()->unreadNotifications->markAsRead();
        return redirect()->back()->with('notification_success', 'Notifications marked as read');
    }
}
