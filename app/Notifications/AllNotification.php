<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AllNotification extends Notification
{
    use Queueable;
    public $notification_id;
    public $message;
    public $user;
    public $type;

    /**
     * Create a new notification instance.
     */
    public function __construct($notification_id, $message, $user, $type )
    {
        $this->notification_id = $notification_id;
        $this->message = $message ;
        $this->user = $user ;
        $this->type = $type ;
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
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id'=> $this->notification_id,
            'message'=>$this->message,
            'user'=>$this->user,
            'type'=>$this->type,
        ];
    }
}
