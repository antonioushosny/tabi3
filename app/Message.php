<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Message extends Model
{
    use Notifiable;

    protected $fillable = [
        'sender_id','receiver_id','message','chat_id'
    ];

    public function chat()
    {
        return $this->belongsTo('App\Chat','chat_id');
    }
    public function sender()
    {
        return $this->belongsTo('App\User','sender_id');
    }
    public function receiver()
    {
        return $this->belongsTo('App\User','receiver_id');
    }
     
}
