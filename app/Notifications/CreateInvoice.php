<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateInvoice extends Notification
{
    use Queueable;
    private $invoice_id;
    private $title;
    private $p;
    private $photo;
    private $link;

    /**
     * Create a new notification instance.
     */
    public function __construct($invoice_id,$title,$p,$photo,$link)
    {
      $this->invoice_id=$invoice_id;
      $this->title=$title;
      $this->p=$p;
      $this->photo=$photo;
      $this->link=$link;

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

    public function toArray(object $notifiable): array
    {
        return [
          'id'=>$this->invoice_id,
          'title'=>$this->title,
          'paragraph'=>$this->p,
          'photo'=>$this->photo,
          'link'=>$this->link
        ];
    }
}
