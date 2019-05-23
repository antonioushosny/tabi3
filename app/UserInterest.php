<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class UserInterest extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id','interest_id'
    ];

    public function interest()
    {
        return $this->belongsTo('App\Interest','interest_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
}
