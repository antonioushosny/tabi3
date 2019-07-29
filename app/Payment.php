<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Payment extends Model
{
    use Notifiable;

    protected $fillable = [
        'title','amount','date','user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
