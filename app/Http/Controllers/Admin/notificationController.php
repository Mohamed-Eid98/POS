<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $notifications = DB::table('notifications')->get();

        return view('notification.notificationView', compact('notifications'));
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

    public function readNotification($id)
{
    // $product = Product::findOrfail($id);
// dd('assa');
    $getId = DB::table('notifications')->where('type' , 'App\Notifications\AllNotification' )->pluck('id');
    foreach ($getId as $id) {
        DB::table('notifications')->where('id' , $id)->update(['read_at' => now()]);
    }

    return redirect()->back();
}
    public function EditNotification($id)
{

    $notification = DB::table('notifications')->find($id);
    return view('notification.notificationEdit' , compact('notification'));

}
    public function UpdateNotification(Request $request)
{

    $id = $request->id;
    $notification = DB::table('notifications')->find($id)->update([
        'title' => $request->body,
        'type' => $request->title,
        'typeNotice' => 'OutOfStock',
    ]);
    session()->flash('edit', 'تم تعديل الاشعار بنجاح ');

    return redirect()->route('notification.show');
}
    public function DeleteNotification($id)
{

    DB::table('notifications')->find($id)->delete();
    session()->flash('delete', 'تم حذف الاشعار بنجاح ');

    return redirect()->back();
}







}
