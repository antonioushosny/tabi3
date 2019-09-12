<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Payment extends Model
{
    use Notifiable;

    protected $fillable = [
        'title','method','amount','date','user_id','status'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
