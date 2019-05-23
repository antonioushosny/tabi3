<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Favorite extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id','deal_id'
    ];
    
    public function deal()
    {
        return $this->belongsTo('App\Deal','deal_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
