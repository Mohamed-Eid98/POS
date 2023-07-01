<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateOrder extends Notification
{
    use Queueable;
    public $order_id;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($order_id,$user)
    {
      $this->order_id=$order_id;
       $this->user=$user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via( $notifiable):array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'id'=>$this->order_id,
             'user'=>$this->user,
        ];
    }
}
