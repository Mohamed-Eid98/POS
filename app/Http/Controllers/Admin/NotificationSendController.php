<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationSendController extends Controller
{
    public function updateDeviceToken(Request $request)
    {

        $user = Auth::user()->update([
            'device_token' => $request->token,
        ]);
        // Auth::user()->device_token =  $request->token;

        // Auth::user()->save();

        return response()->json(['Token successfully stored.']);
    }

    public function sendNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $serverKey = 'AAAAtAWqcQA:APA91bGJP2o_RGYHrxqtTj0CsFNjO6QKU33gQUXMn69fvjwzhRzjrJ1wPw8SMKF0GBG_mfz91W56f5jpOR5M96kX40il4HLlcfdaeaax-on353WYA1bzykq5rTAhizyiLC5yRsGUH6Jj';
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response
        dd($result);
    }
}



// AAAAtAWqcQA:APA91bGJP2o_RGYHrxqtTj0CsFNjO6QKU33gQUXMn69fvjwzhRzjrJ1wPw8SMKF0GBG_mfz91W56f5jpOR5M96kX40il4HLlcfdaeaax-on353WYA1bzykq5rTAhizyiLC5yRsGUH6Jj


// apiKey: "AIzaSyA095Hq0lPUdv82dl35lgbaaND3Lv_fnYM",
// authDomain: "benesize-6cd49.firebaseapp.com",
// projectId: "benesize-6cd49",
// storageBucket: "benesize-6cd49.appspot.com",
// messagingSenderId: "773189169408",
// appId: "1:773189169408:web:35ba4eb8dcdf0211d443e5",
// measurementId: "G-882GB7XM5S"


