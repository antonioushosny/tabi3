<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Chat extends Model
{
    use Notifiable;

    protected $fillable = [
        'sender_id','receiver_id','message'
    ];

    public function messages()
    {
        return $this->hasMany('App\Message','chat_id');
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
