<?php

namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;

use App\Http\Resources\NotificationResource;
use App\Models\FcmToken as FcmTokenModel;
use App\Models\Notification;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function App\Helpers\translate;

class NotificationController extends Controller
{
    protected $count_paginate = 10;

    public function __construct()
    {
    }

    public function index()
    {
        if(!auth()->check())
            return responseApi(403, translate('Unauthenticated user'));

        $notifications= Notification::Notf()->wherehas('users',function ($q) {
            $q->where('users.id',auth()->id());
        })->latest()->get();
        $this->changeStatus('Index');
        return  responseApi(200, translate('return_data_success'),NotificationResource::collection($notifications));

    }
    public function indexNotice()
    {
        if(!auth()->check())
            return responseApi(403, translate('Unauthenticated user'));

        $notifications= Notification::Notice()->wherehas('users',function ($q) {
            $q->where('users.id',auth()->id());
        })->latest()->get();
        $this->changeStatus('Notice');
        return  responseApi(200, translate('return_data_success'),NotificationResource::collection($notifications));

    }
    public function count()
    {
        if(!auth()->check())
            return responseApi(403, translate('Unauthenticated user'));

        $notifications = auth()->user()->notifications()
            ->wherePivot('is_show', 0)
            ->select(DB::raw('COUNT(*) as count_all, SUM(type = "Notice") as count_notice, SUM(type IN ("Info", "Product")) as count_notf'))
            ->first();

        $data['all'] = (integer)$notifications->count_all;
        $data['notf'] = (integer)$notifications->count_notf;
        $data['notice'] = (integer)$notifications->count_notice;

        return  responseApi(200, translate('return_data_success'),$data);


    }

    public function save_token(Request $request)
    {
        if(!auth()->check())
            return responseApi(403, translate('Unauthenticated user'));

        $user=auth()->user();
        $user->fcm_token = $request->fcm_token;
        $user->save();

        return responseApi(200, translate('return_data_success'));
    }
    public function changeStatus($type)
    {
        if ($type == 'Notice'){
            $types=['Notice'];
        }else{
            $types=['Product','Info'];
        }
        UserNotification::where('user_id',auth()->id())->wherehas('notification',function ($q) use($types){
            $q->wherein('type',$types);
        })->update([
            'is_show'=>1
        ]);

        return  true ;

    }
}
