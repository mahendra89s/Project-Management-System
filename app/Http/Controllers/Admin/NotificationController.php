<?php

namespace App\Http\Controllers\Admin;

use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function show($id)
    {
        $notification = Notification::find($id);
       
        $notification->update([
            'status' => 1 ,
        ]);
        return redirect()->route('admin.notifications');
    }
}
