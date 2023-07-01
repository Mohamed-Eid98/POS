<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductNotification extends Notification
{
    use Queueable;
    public $product_id;
    public $message;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($product_id, $message, $user )
    {
        $this->product_id = $product_id;
        $this->message = $message ;
        $this->user = $user ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'product_id'=> $this-> product_id,
            'message'=>$this->message,
            'user'=>$this->user,
        ];
    }
}
