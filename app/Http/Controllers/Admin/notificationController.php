<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\AllNotification;
use Illuminate\Support\Facades\Notification;

class notificationController extends Controller
{
    public function addnotification()
    {

        return view('notification.notificationAdd');
    }
    public function shownotification()
    {

        return view('notification.notificationView');
    }
    public function storeNotification(Request $request)
    {

        $users = User::get();

        $user = auth()->user()->name;

        $message =  $request->name;
        $type =  $request->type;
        $notification_id = uniqid();

    Notification::send($users,new AllNotification( $notification_id , $message , $user, $type));

        session()->flash('add', 'تم ارسال الاشعار بنجاح ');

        return redirect()->back();

            return view('notification.notificationView');
    }





}
