<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static function send_notf($fcm_token, $not, $app_name)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);

        $notificationBuilder = new PayloadNotificationBuilder($app_name);
        $notificationBuilder->setBody($not->body)
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => $not->toarray()]);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $downstreamResponse = FCM::sendTo($fcm_token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();
        $downstreamResponse->tokensToDelete();
        $downstreamResponse->tokensToModify();
        $downstreamResponse->tokensToRetry();
        $downstreamResponse->tokensWithError();
    }

    static function send_notf_array($fcm_tokens, $not, $app_name)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);

        $notificationBuilder = new PayloadNotificationBuilder($app_name);
        $notificationBuilder->setBody($not->body)
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => $not->toarray()]);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $downstreamResponse = FCM::sendTo($fcm_tokens, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();
        $downstreamResponse->tokensToDelete();
        $downstreamResponse->tokensToModify();
        $downstreamResponse->tokensToRetry();
        $downstreamResponse->tokensWithError();
    }


    static function save_notf($fcm_token, $is_all, $type, $type_id, $step = null, $type_model = null, $user_id_model = null, Request $request)
    {
        switch ($type) {
            case 'Order':
                $title_ar = __('site.notifi_order_step' . $step . '_title', [], 'ar');
                $body_ar = __('site.notifi_order_step' . $step . '_body', [], 'ar');
                $title_en = __('site.notifi_order_step' . $step . '_title', [], 'en');
                $body_en = __('site.notifi_order_step' . $step . '_body', [], 'en');
                $notifi = __('site.notifi_order_step' . $step . '_body');
                break;
            case 'Product':
                $title_ar = __('site.notifi_product_title', [], 'ar');
                $body_ar = __('site.notifi_product_body', ['productName' => $type_model->name_ar], 'ar');
                $title_en = __('site.notifi_product_title', [], 'en');
                $body_en = __('site.notifi_product_body', ['productName' => $type_model->name_en], 'en');
                $productName = app()->getLocale() == 'ar' ? $type_model->name_ar : $type_model->name_en;
                $notifi = __('site.notifi_product_body', ['productName' => $productName]);
                break;
            case 'Info':
                if ($type_model != null && $step == 1) {
                    if ($type_model->type_discount == "price") {
                        $descount_ar = $type_model->discount . ' ' . __('site.DZD', [], 'ar');
                        $descount_en = $type_model->discount . ' ' . __('site.DZD', [], 'en');
                    } else {
                        $descount_ar = $type_model->discount . ' %';
                        $descount_en = $type_model->discount. ' %';
                    }
                    $title_ar = __('site.notifi_info_discount_title', [], 'ar');
                    $body_ar = __('site.notifi_info_discount_body', ['discount' => $descount_ar], 'ar');
                    $title_en = __('site.notifi_info_discount_title', [], 'en');
                    $body_en = __('site.notifi_info_discount_body', ['discount' => $descount_en], 'en');
                    $notifi = __('site.notifi_info_discount_body', ['discount' => $type_model->discount]);
                } else {
                    $title_ar = __('site.notifi_info_title', [], 'ar');
                    $body_ar = __('site.notifi_info_body', [], 'ar');
                    $title_en = __('site.notifi_info_title', [], 'en');
                    $body_en = __('site.notifi_info_body', [], 'en');
                    $notifi = __('site.notifi_info_body');
                }
                break;
            default:
                $title_ar = __('site.notifi_title', [], 'ar');
                $body_ar = __('site.notifi_body', [], 'ar');
                $title_en = __('site.notifi_title', [], 'en');
                $body_en = __('site.notifi_body', [], 'en');
                $notifi = __('site.notifi_body');
                break;
        }

        $not = new Notification();
        $not->title = app()->getLocale() == 'ar' ? $title_ar : $title_en;
        $not->typeNotice = app()->getLocale() == 'ar' ? $body_ar : $body_en;
        $not->type_id = $type_id;

        if ($is_all) {
            $not->type = 'All';
            $not->save();

            $users = User::whereNotNull('fcm_token')->get();
            $tokens = $users->pluck('fcm_token')->toArray();
            self::send_notf_array($tokens, $not, $request->header('app_name'));

        } else {
            if ($type_model != null) {
                $not->type = $type;
                $not->type_model = get_class($type_model);
                $not->type_model_id = $type_model->id;
            } else {
                $not->type = $type;
            }

            if ($user_id_model != null) {
                $not->user_id = $user_id_model;
            }

            $not->save();

            if ($fcm_token != null) {
                self::send_notf($fcm_token, $not, $request->header('app_name'));
            }
        }
    }
}
