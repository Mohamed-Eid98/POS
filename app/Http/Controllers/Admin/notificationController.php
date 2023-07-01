<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
