<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNotification extends Notification
{
    use Queueable;

    public $post_id;
    public $Publisher;
    public $Publisher_Photo;
    public $desc;

    public function __construct($post_id , $Publisher , $Publisher_Photo , $desc)
    {
        $this->post_id = $post_id;
        $this->Publisher = $Publisher;
        $this->Publisher_Photo = $Publisher_Photo;
        $this->desc = $desc;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

      public function toArray(object $notifiable): array
    {
        return [
            'post_id' => $this->post_id,
            'Publisher' => $this->Publisher ,
            'Publisher_Photo' => $this->Publisher_Photo ,
            'desc' => $this->desc
        ];
    }
}
