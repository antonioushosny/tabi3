<?php

namespace App\Notifications;

use App\Channels\Messages\WhatsAppMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Channels\WhatsAppChannel;
 

class Whatsapp extends Notification
{
  use Queueable;


  public $password;
  
  public function __construct($password)
  {
    $this->password = $password;
  }
  
  public function via($notifiable)
  {
    return [WhatsAppChannel::class];
  }
  
  public function toWhatsApp($notifiable)
  {
    $password =$this->password;

    return (new WhatsAppMessage)
        ->content("Your passwrod is {$password}  shipped and should be delivered on ");
  }
}