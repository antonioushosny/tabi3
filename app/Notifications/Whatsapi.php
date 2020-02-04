<?php 
namespace App\Notifications;

use NotificationChannels\ChatAPI\ChatAPIChannel;
use NotificationChannels\ChatAPI\ChatAPIMessage;
use Illuminate\Notifications\Notification;

class Whatsapi extends Notification
{
    public function via($notifiable)
    {
        return [ChatAPIChannel::class];
    }

    public function toChatAPI($notifiable)
    {
        return ChatAPIMessage::create()
            ->to($notifiable->mobile) // your user phone
            ->file('/path/to/file','My Photo.jpg')
            ->content('Your invoice has been paid');
    }
}