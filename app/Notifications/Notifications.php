<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;
// use App\Reservation ;

class Notifications extends Notification
{
    use Queueable;

    protected  $post;

    public function __construct($msg, $type)
    {
        $this->msg = $msg ;

        $this->type = $type;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


 
    // public function toDatabase($notifiable)
    // {
    //     return [
    //         'data' => $this->reserv,
    //         // 'user' => $this->user,
    //     ];
    // }
    

    public function toArray($notifiable)
    {
        return [
            'data' => $this->msg,
            'type' => $this->type,
        
        ];

        // if($this->reserv->response == 'accept'){
        //     return [
        //         'data' => [
        //             'ar' => 'دكتور'.' '.$this->reserv->doctor->user->name .' '. 'وافق'.' ' .' علي حجز'.' ' .$this->reserv->patient->name,
        //             'en' => 'doctor'.' '.$this->reserv->doctor->user->name .' '. 'accept'.' ' .' reservation for'.' ' .$this->reserv->patient->name,
        //         ]
        //     ];
        // }
        // elseif($this->reserv->response == 'reject'){
        //     return [
        //         'data' => [
        //             'ar' => 'دكتور'.' '.$this->reserv->doctor->user->name .' '. 'رفض'.' ' .'  حجز'.' ' .$this->reserv->patient->name,
        //             'en' => 'doctor'.' '.$this->reserv->doctor->user->name .' '. 'reject'.' ' .' reservation for'.' ' .$this->reserv->patient->name,
        //         ]
        //     ];
        // }
        

    }
}
